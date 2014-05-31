
<?php
session_start();
$option=htmlentities($_POST['status1'],ENT_QUOTES);
$option="'".$option."'";
$user=$_SESSION['email'];
echo $option;
$statement="python status.py ".$option." ".$user;
exec($statement,$b);
header('Location:index.php');
?>
