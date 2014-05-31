<style>
img {height:45px;width:45px;}

</style>
<?php
//echo $_GET['q'];
echo nl2br("People Who Rate this!!\n");
shell_exec("python /var/www/view_likers.py ".$_GET['q']);
$a=json_decode(file_get_contents('/var/www/likers.json'));
//echo $a;
foreach($a as $var)
{
echo nl2br("<img src='/".$var[1]."'></img>  <b>".$var[0]."</b> rates it: <b>". $var[2]."</b>\n");
}
?>
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('img_disp').style.display='none';document.getElementById('fade').style.display='none'">X</a>
