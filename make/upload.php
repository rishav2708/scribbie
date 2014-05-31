<?php
session_start();
if($_FILES['file']['error']>0)
{
	echo "<script>alert('Error');</script>";
	header('Location:personal.php');
}
else
{
	echo "Stored in: ".$_FILES['file']['tmp_name']."</br>";
	$b=move_uploaded_file($_FILES['file']['tmp_name'],"upload/". $_FILES["file"]["name"]);
	if($b)
	{
		$folder="upload/";
		$path=$_FILES['file']['name'];
		$tot=$folder.$path;
		$code="python path.py ".$_SESSION['email']." ".$tot;
		exec($code,$b);
		header('Location:personal.php');
	}
}
?>
