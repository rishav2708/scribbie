<?php
class PosTagger {
        private $dict;
       
        public function __construct($lexicon) {
                $fh = fopen($lexicon, 'r');
                while($line = fgets($fh)) {
                        $tags = explode(' ', $line);
                        $this->dict[strtolower(array_shift($tags))] = $tags;
                }
                fclose($fh);
        }
       
        public function tag($text) {
                preg_match_all("/[\w\d\.]+/", $text, $matches);
                $nouns = array('NN', 'NNS');
               
                $return = array();
                $i = 0;
                foreach($matches[0] as $token) {
                        // default to a common noun
                        $return[$i] = array('token' => $token, 'tag' => 'NN'); 
                       
                        // remove trailing full stops
                        if(substr($token, -1) == '.') {
                                $token = preg_replace('/\.+$/', '', $token);
                        }
                       
                        // get from dict if set
                        if(isset($this->dict[strtolower($token)])) {
                                $return[$i]['tag'] = $this->dict[strtolower($token)][0];
                        }      
                       
                        // Converts verbs after 'the' to nouns
                        if($i > 0) {
                                if($return[$i - 1]['tag'] == 'DT' &&
                                        in_array($return[$i]['tag'],
                                                        array('VBD', 'VBP', 'VB'))) {
                                        $return[$i]['tag'] = 'NN';
                                }
                        }
                       
                        // Convert noun to number if . appears
                        if($return[$i]['tag'][0] == 'N' && strpos($token, '.') !== false) {
                                $return[$i]['tag'] = 'CD';
                        }
                       
                        // Convert noun to past particile if ends with 'ed'
                        if($return[$i]['tag'][0] == 'N' && substr($token, -2) == 'ed') {
                                $return[$i]['tag'] = 'VBN';
                        }
                       
                        // Anything that ends 'ly' is an adverb
                        if(substr($token, -2) == 'ly') {
                                $return[$i]['tag'] = 'RB';
                        }
                       
                        // Common noun to adjective if it ends with al
                        if(in_array($return[$i]['tag'], $nouns)
                                                && substr($token, -2) == 'al') {
                                $return[$i]['tag'] = 'JJ';
                        }
                       
                        // Noun to verb if the word before is 'would'
                        if($i > 0) {
                                if($return[$i]['tag'] == 'NN'
                                        && strtolower($return[$i-1]['token']) == 'would') {
                                        $return[$i]['tag'] = 'VB';
                                }
                        }
                       
                        // Convert noun to plural if it ends with an s
                        if($return[$i]['tag'] == 'NN' && substr($token, -1) == 's') {
                                $return[$i]['tag'] = 'NNS';
                        }
                       
                        // Convert common noun to gerund
                        if(in_array($return[$i]['tag'], $nouns)
                                        && substr($token, -3) == 'ing') {
                                $return[$i]['tag'] = 'VBG';
                        }
                       
                        // If we get noun noun, and the second can be a verb, convert to verb
                        if($i > 0) {
                                if(in_array($return[$i]['tag'], $nouns)
                                                && in_array($return[$i-1]['tag'], $nouns)
                                                && isset($this->dict[strtolower($token)])) {
                                        if(in_array('VBN', $this->dict[strtolower($token)])) {
                                                $return[$i]['tag'] = 'VBN';
                                        } else if(in_array('VBZ',
                                                        $this->dict[strtolower($token)])) {
                                                $return[$i]['tag'] = 'VBZ';
                                        }
                                }
                        }
                       
                        $i++;
                }
               
                return $return;
        }
}
$net=array();
function intersect($s1,$s2)
{
global $net;
$s1=explode(' ',$s1);
$s2=explode(' ',$s2);
$intersect=array();
foreach($s2 as $v)
{
if(!in_array($v,$s1))
array_push($intersect,$v);
}
$s=implode(' ',$s1)." and ".implode(' ',$intersect);
array_push($net,$s);
//echo json_encode($net);
//echo "<li class='list1' value=".$s.">".$s."</li>";
}
function comparison($m,$k)
{
$new=array();
$net1=array();
$sugg=array('Places in X and having Y nearby','X having Places and Y within 10 kms');
foreach($sugg as $str)
{
foreach($m as $x)
array_push($new,str_replace('X',$x,$str));
}
//echo json_encode($new);
foreach($new as $str)
{
$t=str_replace('Places',$k[0],$str);
$s=str_replace('Y',$k[1],$t);
//echo $s;
array_push($net1,$s);
//echo "<li class='list1' value=".$s.">".$s."</li>";
}
echo json_encode($net1);
}
function printTag($tags)
{
global $net;
global $net1;
$con=mysqli_connect("localhost","root","salvation123","yatriplace");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$m=array();
$k=array();
foreach($tags as $t)
{
$result=mysqli_query($con,"SELECT * FROM table2 WHERE cityname='".$t['token']."'");
$row=mysqli_fetch_array($result);
if($row)
{
array_push($m,$t['token']);
}
else
{
$query="SELECT * FROM table1 WHERE suggestions_soundex=LEFT(SOUNDEX('".$t['token']."'),10);";
$q=mysqli_query($con,$query);
$ans=mysqli_fetch_array($q);
if(!($ans)) continue;
$type=$ans['suggestions'];
array_push($k,$type);
}
}
/*foreach($tags as $t)
{
if($t["tag"]=="NNS" || $t["tag"]=="NNS\n")
array_push($k,$t['token']);
}*/
//echo json_encode($k);
//echo json_encode($m);
if(sizeof($k)==2)
{
	
	comparison($m,$k);
}
else
{
$new=array();
$sugg=array("Places in X","Places near X","famous Places in X","Places in X with rating more than 5","Places in X with no wrong records","Places in X visited by my friends");
foreach($sugg as $str)
{
foreach($m as $x)
array_push($new,str_replace('X',$x,$str));
}
$new1=array();
foreach($new as $str)
{
foreach($k as $x)
array_push($new1,str_replace('Places',$x,$str));
}
//var_dump($new1);
$result=array();
foreach($new1 as $s)
{
array_push($result,$s);
}

for($i=2;$i<sizeof($new1)-1;$i++)
{
	for($j=$i+1;$j<sizeof($new1);$j++)
	{
		intersect($new1[$i],$new1[$j]);
	}
}
$result=array_merge($result,$net);
echo json_encode($result);
//echo json_encode($net);
//echo json_encode($net);
$script= "python break.py '".$b."'";
//echo $script;
//$t=shell_exec($script);
//echo $t;
/*foreach($t as $v)
{
echo $v."</br>";
}*/
}
}
$tagger = new PosTagger('lexicon.txt');
$tags = $tagger->tag($_GET['term']);
//echo $_GET['term'];
printTag($tags);
?>
