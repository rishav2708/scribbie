<?php
$qrtext = $_POST['qrText'];
print $qrtext;
session_start();
$filename="temp".(rand()%100000).".png";
include "phpqrcode/qrlib.php"; 
$text = $_POST["qrText"];
QRcode::png($text, $filename);
echo "<img src='$filename' width=200 height=200 >";
echo "New QR code generated!".$filename;
session_destroy();
?>


