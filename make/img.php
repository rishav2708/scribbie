<style>
	.upload{height:324px;width:300px;}
</style>
<script>
	function see()
	{
		alert("ok");
	}
</script>
<?php
session_start();
$s=$_GET['q'];
shell_exec("python photo_show.py ".$s);
$a=json_decode(file_get_contents('photo.json'));
echo "<table border=0><td><img src='".$a[2]."'></img><font class='userName'>".$a[1]."</font></td>";
echo "<tr><td><img class='upload' src=".$a[0]."></img></td></tr></table>\n";
echo "<div id='show_likes'>";
echo shell_exec('python check_rate.py '.$s)." people like this!!";
echo"</div>";
?>
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('img_disp').style.display='none';document.getElementById('fade').style.display='none'">X</a>
