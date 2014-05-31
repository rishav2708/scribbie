<style type="text/css">
table{z-index:1000;background:transparent;opacity:1;pointer-events:auto;}
#b1{color:white;background:rgb(59,89,152);border-style:none;border-width:4px;box-shadow:rgb(59,89,152) 1px 1px 1px 1px;border-radius:5px;border-color:rgb(59,89,152);}
#img1{height:60px;width:180px;}
#b1{color:white;background:rgb(59,89,152);border-style:none;border-width:4px;box-shadow:rgb(59,89,152) 1px 1px 1px 1px;border-radius:5px;border-color:rgb(59,89,152);}
.q{height:34px;width:180px;border-style:bold;border-width:2px;box-shadow:rgb(89,89,89) 1px 1px 1px 1px;border-radius:5px;border-color:rgb(89,89,89);}
#pic_div{background:white;color:red;font-family:sans-serif;font-size:10pt;height:15px;width:180px;border-radius:0px 190px 190px 190px;border-style:none;padding:10px;text-align:center;font-style:bold}
table{position:absolute;top:45px;align:center;right:435px;background:white;border-radius:45px;padding:45px;transition-timing-function:ease-in;}
</style>
<script>
function check()
{
alert('hi');
}
</script>
<?php
session_start();
exec("python img.py",$out);
$_SESSION['code']=$out;
foreach($_SESSION as $var=>$val)
{
foreach($val as $a)
$b.=$a;
}
$_SESSION['code']=$b;
?>
<table border=0 cellpadding=4 id="my_login_container" onclick="check();">
<tr>
<td><input type="text" class="q" name="user" id="user" placeholder="UserName"/></td>
</tr>
<tr>
<td><input type="password" class="q" name="pass" id="pass" placeholder="Password"/></td>
</tr>
<tr>
<td><img id="img1" src="captcha.png" title="captcha" onmousedown="return false;" onmousemove="return false;"> </img></td>
</tr>
<tr>
<td><input type="text" id="q" name="q" class="q" /></td>
</tr>
<tr>
<td><input type="button" value="Submit" class="b1" id="b1" name="b1" onclick="ajaxify_it(event);'" title="Submit"/></td>
</tr>
<tr>
<td><div id="pic_div">
</div></td>
</tr>
</table>
