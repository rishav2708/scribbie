<?php
session_start();
if(!isset($_SESSION['email']))
{
header('Location:index.php');
}
?>
<html>
<style type="text/css">
body{overflow:auto; height:100%;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;font-size:12pt;}
.market{position:fixed;top:0;bottom:0;left:0;z-index:1000;background:rgb(51,51,51);width:235px;height:935px;overflow:auto;}
#tool_container{position:absolute;top:0px;left:0px;right:0px;background:rgb(59,89,152);z-index:10;border-style:bold;border-color:rgb(59,89,152);border-width:20px;color:white;font-style:bold;font-size:14pt;padding-top:12px;padding-right:20px;font-family:lucida sans serif sans-serif ubuntu;box-shadow:rgb(59,89,272)0.5px 0.5px 0.5px 0.5px;border-radius:3px;padding-left:435px;padding-bottom:8px;padding-right:19px;}
.design_div{float:right;height:20px;width:22px;
background:url(more.png)-124px -18px;cursor:pointer;}
.search{height:34px;width:445px;border-style:bold;border-radius:5px;border-color:(255,0,0);border-width:0.9px;font-size:14px;font-family:sans-serif;}
.src{background:url(icons1.png)-18px -1655px;height:16px;width:16px;z-index:2;cursor:pointer;position:absolute;top:20px;left:848px;}
#uitools{display:block;position:absolute;top:58px;right:3px;background:rgb(255,255,255);border-style:bold;border-width:12pt;border-color:rgb(59,89,152);z-index:1000;box-shadow:black 2px 2px 2px 2px;padding:0;opacity:1;}
li{list-style:none;background:rgb(255,255,255);height:5px;padding-bottom:5px;cursor:pointer;border-style:bold;border-width:2px;border-color:rgb(244,244,244);padding:20px;width:234px;}
li:hover{background:rgb(59,89,152);color:white;font-style:bold;}
.upArrow{background:url(more.png)-104px -20px;width:22px;height:11px;position:absolute;right:10px;top:-10px;box-shadow:transparent 2px 2px 2px 2px;z-index: -10;}
.uicomment{position:absolute;top:120px;left:320px;border-width:3px;border-style:bold;border-color:black;box-shadow:black 1px 1px 1px;font-style:bold;font-weight:12pt;font-size:14px;background:#FFFFFF;font-family:helvetica tahoma Arial;padding:8px;border:1px solid #B0B0B0;}
textarea{height:63px;width:610px;border-style:bold;z-index:3;font-size:14px;box-shadow:black 1px 1px 1px;border-width:2px;border-color:rgb(51,51,51);padding:5px;resize:none;}
.up{position:absolute;left:20px;top:33px;word-wrap:normal;}
.span1{z-index:100;font-style:none;font-weight:bold;font-size:12pt;background:#B0B0B0;padding:5px;font-size:12pt;border-radius:4px;border-style:none;box-shadow:#B0B0B0 1px 1px 1px 1px;cursor:pointer;}
.post{border-radius:4px;background:rgb(59,89,172);border-color:rgb(59,89,172);border-style:none;color:white;height:35px;width:90px;font-size:12px;float:right;cursor:pointer;}
tr{border:1px solid #B0B0B0;padding:1px;}
.news{position:absolute;top:10px;left:715px;font-family: sans-serif;font-size:12px;width:230px;}
.book{cursor:pointer;}
.one{background:url(book_sprites.png)0 0;width:110px;height:165px;}
.cartSpan{background:url(sprites.png)0 -87px;width:24px;height:21px;position:absolute;left:37px;}
.cartSpan1{background:url(sprites.png)0 -87px;width:24px;height:21px;position:absolute;left:152px;}
.cartSpan2{background:url(sprites.png)0 -87px;width:24px;height:21px;position:absolute;right:30px;top:7px;}
.two{background:url(book_sprites.png)0 160px;width:110px;word-wrap:break-word;font-size:12pt;}
.three{background:url(book_sprites.png)0 320px;width:110px;height:160px;}
.four{background:url(books_sprites.png)0 0px;width:100px;height:152px;}
.five{background:url(books_sprites.png)0 146px;width:95px;height:150px;}
.td1{padding:0;}
td{padding:5px;}
.fblogo{background:url(icons1.png)-4px 945px;height:25px;width:25px;}
.right{position:absolute;top:10px;right:0;}
.hint{position:absolute;top:423px;left:840px;border:1px solid black;font-family: sans-serif;font-size:10px;height:110px;box-shadow:rgb(51,51,51) 3px 3px 3px 3px;}
.up1{position:absolute;top:-10px;}
.verify{border-style:solid;width:75px;position:absolute;right:45px;height:24px;border:1px solid rgb(59,89,152);background:rgb(59,89,172);color:white;border-radius:2px;z-index:2;box-shadow:rgb(59,89,172)1px 1px 1px 1px;}
.uisearch{position:absolute;width:445px;border:3px solid rgb(200,200,200);left:433px;background-color:white;z-index:1000;top:44px;overflow:none;border-radius:10px;min-height:0px;max-height:10px;}
.full{width:445px;border:0px solid rgb(200,200,200);border-radius:5px;}
.position1{position:absolute;top:10px;left:210px;}
img{height:30px;width:30px;cursor:pointer;border-radius:3px;text-align:center;}
.font1{color:white;padding:5px;width:185px;position:absolute;bottom:5px;}
.font1:hover{background:#7F7F7F;cursor:pointer;}
#upload_photo{position:absolute;top:100px;}
button{background:#474695;padding:2px;border-color:#555489;border-radius:4px;size:12px;}
#file{background:#474695;padding:2px;border-color:#555489;border-radius:4px;size:12px;width:200px;height:35px;}
#info1{position:absolute;top:20px;left:10px;}
#myfriends{position:fixed;top:410px;left:25px;z-index:2000000;color:#FFFFFF;overflow:auto;}
#status{positon:absolute;top:620px;left:610px;bottom:210px;z-index:2000000;}
#one{font-size:12pt;color:#A52A2A;}
.one{font-size:12pt;color:#A52A2A;}
.two{color:#000000;font-size:14pt;font-family:serif;border-radius:3px;border:solid 1px;padding:5px;width:680px;}
a{color:#535DCC;cursor:pointer;font-style:underline;font-size:9pt;}
.pos{position:absolute;left:190px;}
.like{border:none;color:blue;}
select{background:#444D89;border-radius:2px;width:17px;border-color:#7E2222;}
.glike{color:#000000;font-style:bold;font-weight:12pt;font-size:9pt;}
		.black_overlay{
			ovrflow:auto;
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
        display: none;
        position: fixed;
        top: 25%;
        left: 25%;
        width: 50%;
        height: 50%;
        padding: 45px;
        border-radius:5px;
        border: 0px solid #989DD4;
        background-color: white;
        z-index:1002;
        overflow: auto;
    }
.adjust{font-size:15px;}
.xbutton{background:white;position:absolute;top:-1px;right:0px;font-size:16pt;border-radius:8px;text-align:center;text-decoration:none;z-index:200;color:black;font-style:bold;}
.xbutton:hover{color:gray;}
.uploaded{height:132px;width:234px;position:absolute;left:134px;}
#show_scribbie{overflow:auto;background:url(/posttagger/scribbie.jpg);}
li{list-style:none;font-size:12pt;color:black;background:rgb(59,89,172);border-radius:4px;width:510px;}
</style>
<title>Scribbie</title>
<body onload="$('#uitools').hide();$('#uihint').hide();$('.uisearch').hide();display_people();">
<link rel="stylesheet" type="text/css" href="/ajax/jquery.custom-scrollbar.css" />
<script src='ajax/jquery.js'></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="yatriplace/js/classie.js"></script>
		<script src="yatriplace/js/uisearch.js"></script>
<script>
function show_div()
{
$("#uitools").toggle('slow');
}
function check_div()
{
$("#uihint").toggle('slow');
}
function display_results(e)
{
var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('search_div').innerHTML=xml.responseText;
}
}
var val=document.getElementById('q').value;
xml.open('GET','rsrc.php?q='+val,true);
xml.send();
$(".uisearch").show('slow');
}

/*function display_people()
{
var xmlhttp=new XMLHttpRequest;
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('news_feed').innerHTML=xmlhttp.responseText;
}
}
//var val=document.getElementById('q').value;
xmlhttp.open('GET','view.php',true);
xmlhttp.send();
$(".uisearch").show('slow');
}*/
function disp(variable,rstr,val)
{
	
	var a=new XMLHttpRequest;
a.onreadystatechange=function()
{
if(a.readyState==4 && a.status==200)
{	
	rstr.innerHTML=a.responseText;
}
}
a.open("POST","rate.php",true);
a.setRequestHeader("Content-type","application/x-www-form-urlencoded");
a.send("user="+variable.value+"&rate="+val.value);
}
function disp_overlay(v)
{
	document.getElementById('img_disp').innerHTML='';
	var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('img_disp').innerHTML=xml.responseText;
}
}
xml.open('GET','img.php?q='+v.value,true);
xml.send();
	document.getElementById('img_disp').style.display='block';
	document.getElementById('fade').style.display='block'
}
function view_likers(v)
{
document.getElementById('img_disp').innerHTML='';
	var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('img_disp').innerHTML=xml.responseText;
}
}
xml.open('GET','view_likers.php?q='+v.value,true);
xml.send();
	document.getElementById('img_disp').style.display='block';
	document.getElementById('fade').style.display='block';
}
function ajax_scribbie()
{
//document.getElementById('scribbie_disp').innerHTML='';
document.getElementById('scribbie_disp').style.display='block';
document.getElementById('fade').style.display='block';

}
function scribbie_show()
{
document.getElementById('show_scribbie').innerHTML='';
	var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('show_scribbie').innerHTML=xml.responseText;
}
}
xml.open('GET','/posttagger/sav1.php?q=1',true);
xml.send();
	document.getElementById('show_scribbie').style.display='block';
	//document.getElementById('img_disp').style.background='/posttagger/scribbie.jpg';
	document.getElementById('fade').style.display='block';

}
$(document).ready(function()
{
    $('#q').autocomplete(
    {
        source: "rsrc.php",
        minLength: 2
    });
});

</script>
<div id="tool_container" >
<input class="search" placeholder="Enter your search term..." type="text" value="" name="q" id="q"  autocomplete="off">
<div id="img_src" class="src"></div>
<div class="design_div" height="1" width="1"  onclick="show_div();"></div>
</div>
</div>
<div id="uitools">
<div class="upArrow"></div>
<li onclick="window.location.href='logout.php';">Logout</li>
<li>Add Products</li>
<li>Poll</li>
</div>
<div id="market_div" class="market">
	<?php
session_start();
$usr=$_SESSION['email'];
$code="python img_path.py ".$usr;
$s=shell_exec($code);
echo "<div id='info1' name='info1'><img src=".$s."/>";
echo "<a href='timeline' class='font1'> ".$_SESSION["email"]."</a> </div>";
?>
</div>
<div id="comment_box" class="uicomment">
<div id='scribbie_info'>
<b id='one'>The Team</b></br>
Here happy to introduce.. scribbie where you can express</br>
your feelings the way you feel them. A person with true essence of art</br>
will always love to use this idea with sole purpose of ease feeling </br>
and relinquishing happiness...!!</br>
We implement it here as a trial for all our users...</br>
It will go on to further levels if it is admired between the groups and friends ;)
<a href='javascript:void(0);' onclick='ajax_scribbie()'>See how</a></br>
<a href='javascript:void(0);' onclick='scribbie_show()'>Scribbies so far</a></br>
</div></br></br>
<form name="Status_form" id="Status_form" action="status.php" method="post">
<table border=0 cellpadding="1">
<tr>
<td class="td1"><span role="button" class="span1" href = "javascript:void(0)" onclick = "document.getElementById('status_disp').style.display='block';document.getElementById('fade').style.display='block'">Write comment</span></td>
<td class="td1 pos"><span role="button" class="span1" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Some Pic Moments...</span></td>
<td class="td1"><div class="upArrow up"></div></td>
</tr>
<tr>
<td><textarea id="status1" name="status1" type="text" placeholder="Hello <?php echo $_SESSION['email']?>, How'z u hlding up??" autocomplete="off" aria-autocomplete="list" role="textbox" onfocus="this.style.height='100px'"></textarea></td></tr>
<tr><td><button type="submit" id="uipost" class="post">Post</button></td></tr>
</table>
</form>
<div id="news_feed" class="uicomment news">
	<style type="text/css">
	li{border-radius:4px;border:1px none;}
	#s1{width:95px;height:25px;}
</style>
<?php
session_start();
echo "People You May Know..</br></br>";
echo "<form id='f1' name='f1' method='post' action='valid.php'>";
$user=$_SESSION['email'];
$code="python view.py ".$user;
exec($code,$b);
echo "<select id='s1' name='s1'>";
foreach($b as $v)
echo "<option  value=".$v." >".$v."</option>";
echo "</select></br></br><button type='submit'>Add To Your Network</button></form>";
?>
</div>
<?php
	session_start();
	exec("python status_update.py ".$_SESSION['email'],$b);
	$a=json_decode(file_get_contents("status.json"));
	foreach($a as $var)
	{
		//echo sizeof($var);
		echo"<div id='one'>";
		echo nl2br("<b>".$var[0]."</b>\n</div>");
		//$ht=htmlentities($var[1]);
		$b=$var[2];
		echo "<div id= 'two' name='two' class='two'>";
		//echo $_SERVER['REMOTE_ADDR'];
		echo "<form id='rate1' name='rate1' action='rate.php' method='get'>";
		echo "<div id=".$b." class='adjust'>";
		$c=explode(' ',$var[1]);
		$d=array(':)'=>"<img src='halloween_happy.ico'  title=':)'/>",
			'lol'=>"<img src='lol.jpeg' title='lol' />'",
			':D'=>"<img src='lol.jpeg' title='lol' />'",
			"fuck"=>"<img src='1373664398_88011.ico' title='fuck' />") ;
		for($i=0;$i<sizeof($c);$i++)
		{
			if(in_array($c[$i],array_keys($d)))
			$c[$i]=$d[$c[$i]];
			echo $c[$i].' ';
		}

		echo nl2br("\n\n\n</div>");
		//$txtbx=shell_exec('python genId.py');
		//$var3=shell_exec('python genId.py');
		//$var4=shell_exec('python genId.py');
		echo "<input readonly='readonly' type='hidden' id=".$var[3]." name=".$var[3]." value=".$b." />
		<select id=".$var[5]." name=".$var[5].">
		<option value=0>0</option>
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
				</select>\n\n\n\n";
				echo "<a class='like' onclick= 'disp(".$var[3].",".$var[4].",".$var[5].");'>Rate</a></br>";
				echo "<div id='".$var[4]."' class='glike'>";
				$code="python check_rate.py ".$b;
				echo "<a href='javascript:void(0);' onclick='view_likers(".$var[3].")'>".shell_exec($code)."</a>people like this!!!";
				echo "</div>";
	echo "</form>";
	echo "</div>";
	}
	shell_exec("rm status.json");
	?>
	<?php
	session_start();
	exec("python photo_update.py ".$_SESSION['email'],$b);
	$a=json_decode(file_get_contents("photo.json"));
	foreach($a as $var)
	{
		//echo sizeof($var);
		echo"<div id='one'>";
		echo nl2br("<b>".$var[0]."</b>\n</div>");
		//$ht=htmlentities($var[1]);
		$b=$var[2];
		echo "<div id= 'two' name='two' class='two'>";
		//echo $_SERVER['REMOTE_ADDR'];
		echo "<form id='rate1' name='rate1' action='rate.php' method='get'>";
		echo "<div id=".$b.">";
		echo nl2br("<img class='uploaded' src=".$var[1]." onclick='disp_overlay(".$var[3].");'></img>"."\n\n\n\n</div>");
		//$txtbx=shell_exec('python genId.py');
		//$var3=shell_exec('python genId.py');
		//$var4=shell_exec('python genId.py');
		echo "<input readonly='readonly' type='hidden' id=".$var[3]." name=".$var[3]." value=".$b." />
		<select id=".$var[5]." name=".$var[5].">
		<option value=-2>-2</option>
		<option value=-1>-1</option>
		<option value=0>0</option>
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
				</select>\n\n\n\n";
				echo "<a class='like' onclick= 'disp(".$var[3].",".$var[4].",".$var[5].");'>Rate</a></br>";
				echo "<div id='".$var[4]."' class='glike'>";
				$code="python check_rate.py ".$b;
				echo "<a href='javascript:void(0)' onclick='view_likers(".$var[3].")'>".shell_exec($code)."</a> people like this!!";
				echo "</div>";
	echo "</form>";
	echo "</div>";
	}
	shell_exec("rm photo.json");
	?>
</div>
<div id="myfriends" name="myfriends">
	My friends..</br>
	<?php
	session_start();
	$usr=$_SESSION["email"];
	$code="python myfriends.py ".$usr;
	exec($code,$a);
	$data=json_decode(file_get_contents('data.json'));
	echo "</br>";
	foreach($data as $var)
	{
		
		echo "<img src= ".$var[0]."></img> ".$var[1]."</br>";
	}
	shell_exec("rm data.json");
	?>
</div>
<div id="uihint" class="uicomment hint">
</div>
<div role="search" id="search_div" class="uisearch">
</div>
<div id="light" class="white_content"> 
<form id="upload_photo" name="upload_photo" action="upload.php" method="post" enctype="multipart/form-data">
For Creating a profile...</br>
<input type="file" id="file" name="file"/></br></br>
<button type="submit" id="submit" name="submit" value="submit">Submit</button>
</form></br>
<form id="upload_photo_status" name="upload_photo_status" action="upload1.php" method="post" enctype="multipart/form-data">
For uploading...</br>
<input type="file" id="status" name="status"/>
<button type="submit" id="submit1" name="submit1" value="submit">Submit</button>
</form>
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">X</a></div>
    <div id="fade" class="black_overlay" ></div>
<div id="img_disp" class="white_content">
<form name="Status_form" id="Status_form" action="status.php" method="post">
<table border=0 cellpadding="1">
<tr>
<td><textarea id="status1" name="status1" type="text" placeholder="Write a comment..." autocomplete="off" aria-autocomplete="list" role="textbox" onfocus="this.style.height='100px'"></textarea></td></tr>
<tr><td><button type="submit" id="uipost" class="post">Post</button></td></tr>
</tr>
</table>
</form>
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('img_disp').style.display='none';document.getElementById('fade').style.display='none'">X</a>
</div>
<div id="status_disp" class="white_content">
<form name="Status_form" id="Status_form" action="status.php" method="post">
<table border=0 cellpadding="1">
<tr>
<td><textarea id="status1" name="status1" type="text" placeholder="Write a comment..." autocomplete="off" aria-autocomplete="list" role="textbox" onfocus="this.style.height='100px'"></textarea></td></tr>
<tr><td><button type="submit" id="uipost" class="post">Post</button></td></tr>
</tr>
</table>
</form>
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('status_disp').style.display='none';document.getElementById('fade').style.display='none'">X</a>
</div>
<div id="scribbie_disp" class="white_content">
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('scribbie_disp').style.display='none';document.getElementById('fade').style.display='none'">X</a>
<script type="text/javascript" src="/posttagger/jquery.js"></script>
	<script type="text/javascript" src="/posttagger/raphael.js"></script>
	<script type="text/javascript" src="/posttagger/json2.js"></script>
	<script type="text/javascript" src="/posttagger/raphael.sketchpad.js"></script>
<div class="span-8">
			<p>
				Draw a sketch below.
			</p>
			<div style="height:260px;" class="widget">
				<div id="sketchpad_editor"></div>
			</div>
		</div>

		<div class="span-8">
			<form action="/posttagger/save.php" method="post">
				<input type="hidden" id="input1" name="input1" />
			<textarea id="see" name="see"></textarea>
			<input type="submit" id="save" name="save" value="Submit"/>
			</form>
		</div>

		<div class="span-8 last">
			<p>
				<a href="javascript:void(0);" id="update_sketchpad_viewer">Click</a>
				to display the JSON data in the viewer.
			</p>
			<div style="height:260px;" class="widget">
				<div id="sketchpad_viewer"></div>
			</div>
		</div>

		<script type="text/javascript">
var colors=["red","green","blue","yellow","black"];
var i=0;
			$(document).ready(function() {
				var strokes = [];				var sketchpad_editor = Raphael.sketchpad("sketchpad_editor", {
					width: 300,
					height: 240,
					editing: true,	// true is default
					strokes: strokes
				});
var pen=sketchpad_editor.pen();
				sketchpad_editor.change(function() {
					$("#input1").val(sketchpad_editor.json());
pen.color(colors[(i)%5]);
i=(i+1)%5;
				});

				var sketchpad_viewer = Raphael.sketchpad("sketchpad_viewer", {
					width: 300,
					height: 240,
					editing: false
				});

				$("#update_sketchpad_viewer").click(function() {
					sketchpad_viewer.json($('#input1').val());

				});
			});
$('#save').click(function(){
    var svg = $('#sketchpad_viewer').html();
    alert(svg);
    document.getElementById('see').value=svg;
});
</script>

</div>                 
<div id="show_scribbie" class="white_content">
</div>
</body>
</html>




