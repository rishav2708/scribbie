<?php
session_start();
$str="python friend.py ".$_SESSION["email"]." ".$_POST["s1"];
exec($str,$b);
header('Location:personal.php');
?>
