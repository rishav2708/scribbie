<html>
<body>
<?php
$fp=fopen('record.txt','r');
while(!feof($fp))
{
echo fgets($fp);
}
?>
<script type="text/javascript" src="/posttagger/jquery.js"></script>
	<script type="text/javascript" src="/posttagger/raphael.js"></script>
	<script type="text/javascript" src="/posttagger/json2.js"></script>
	<script type="text/javascript" src="/posttagger/raphael.sketchpad.js"></script>
<div class="span-8">
			<p>
				Scribble Now....
			</p>
			<div style="height:260px;" class="widget">
				<div id="sketchpad_editor"></div>
			</div>
		</div>

		<div class="span-8">
			<form action="save.php" method="post">
				<input type="hidden" id="input1" name="input1" />
			<textarea id="see" name="see"></textarea>
			<?php
session_start();
//echo $_SESSION['email'];
shell_exec("python /var/www/myfriends.py ".$_SESSION['email']);
$a=json_decode(file_get_contents("data.json"));
echo "To: ";
echo "<select id='select1' name='select1'>";
foreach($a as $var)
{
echo "<option value=".$var[1].">".$var[1]."</option>";
}
echo "</select>";
?>

			<input type="submit" id="save" name="save" value="Submit"/>
			</form>
		</div>

		<div class="span-8 last">
			<h3>Viewer</h3>
			<p>
				<a href="javascript:void(0);" id="update_sketchpad_viewer">Click</a>
				to display the JSON data in the viewer.
			</p>
			<div style="height:260px;" class="widget">
				<div id="sketchpad_viewer"></div>
			</div>
		</div>

		<script type="text/javascript">
var colors=["red","green","blue","yellow","black"];
var i=0;
			$(document).ready(function() {
				var strokes = [];				var sketchpad_editor = Raphael.sketchpad("sketchpad_editor", {
					width: 300,
					height: 240,
					editing: true,	// true is default
					strokes: strokes
				});
var pen=sketchpad_editor.pen();
				sketchpad_editor.change(function() {
					$("#input1").val(sketchpad_editor.json());
pen.color(colors[(i)%4]);
i=(i+1)%4;
				});

				var sketchpad_viewer = Raphael.sketchpad("sketchpad_viewer", {
					width: 300,
					height: 240,
					editing: false
				});

				$("#update_sketchpad_viewer").click(function() {
					sketchpad_viewer.json($('#input1').val());

				});
			});
$('#save').click(function(){
    var svg = $('#sketchpad_viewer').html();
    alert(svg);
    document.getElementById('see').value=svg;
});
</script>
</body>
</html>
