<html>
<script src="/ajax/jquery.js"></script>
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
 $(document).ready(function()
{
    $('#q').autocomplete(
    {
        source: "rsrc.php",
        minLength: 2
    });
});
</script>
<input type="text" id="q" autocomplete="off">
</html>
