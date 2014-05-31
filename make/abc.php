<?php
session_start();
$user=$_POST["email"];
$password=$_POST["pass"];
$shell="python confirm.py ".$user." ".$password;
$b=shell_exec($shell);
if($b==1)
{
	$_SESSION["email"]=$_POST["email"];
	header('Location:personal.php',true,302);
}
else
	header('Location:index.php');
?>
