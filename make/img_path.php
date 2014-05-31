<?php
session_start();
$usr=$_SESSION['email'];
echo $usr;
$code="python img_path.py ".$usr;
$s=shell_exec($code);
echo "<img src=".$s."/>";
?>
