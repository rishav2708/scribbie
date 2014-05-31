<?php
session_start();
$rate=$_POST['user'];
//$rate='"'.$_POST['user'].'"';
$user=$_SESSION['email'];
$value=$_POST['rate'];
$code="python rate.py  ".$rate." ".$user." ".$value;
//echo $rate;
echo shell_exec($code)." people like this!!!";
//header('Location:index.php');
?>
