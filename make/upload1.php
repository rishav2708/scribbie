<?php
session_start();
if($_FILES['status']['error']>0)
{
	echo "<script>alert('Error');</script>";
	header('Location:personal.php');
}
else
{
	echo "Stored in: ".$_FILES['status']['tmp_name']."</br>";
	$b=move_uploaded_file($_FILES['status']['tmp_name'],"users/". $_FILES["status"]["name"]);
	if($b)
	{
		$folder="users/";
		$path=$_FILES['status']['name'];
		$tot=$folder.$path;
		$code="python path1.py ".$_SESSION['email']." ".$tot;
		exec($code,$b);
		header('Location:personal.php');
	}
}
?>
