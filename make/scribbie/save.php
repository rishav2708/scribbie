<?php
session_start();
echo "From: ".$_SESSION['email'];
echo "To: ".$_POST['select1'];
echo $_POST['see'];
$fp=fopen("record.txt","a");
fwrite($fp,"From: ".$_SESSION['email']."</br>");
fwrite($fp,"To: ".$_POST['select1']."</br>");
fwrite($fp,$_POST['see']);
fwrite($fp,"</br>");
fclose($fp);
echo "Done";
?>
