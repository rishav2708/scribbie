<?php
$var=$_POST;
$b=json_encode($var);
$email=$_POST['id'];
//$pass=$_POST['pass'];

echo $email;
$shell_code="python create.py "."'".$b."'";
//echo $shell_code;
echo shell_exec($shell_code);
$code='python smtp.py '.$email;
//echo shell_exec($code);
?>
