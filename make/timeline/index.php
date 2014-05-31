<?php
if(!isset($_SESSION['email']))
{
header('Location:http://localhost');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.short{position:absolute;width:68px;height:68px;top:90px;left:95px;border-radius:50px;}
#status1{resize:none;border:2px solid grey;width:350px;height:60px;border-radius:3px;}
.post{border-radius:4px;background:rgb(59,89,172);border-color:rgb(59,89,172);border-style:none;color:white;height:35px;width:90px;font-size:12px;float:right;cursor:pointer;}
.add_data{border-radius:4px;background:rgb(59,89,172);border-color:rgb(59,89,172);border-style:none;color:white;height:35px;width:90px;font-size:12px;float:right;cursor:pointer;}
.two{word-wrap: break-word;font-size:12px;width:534px;overflow:auto;border:1px solid grey;border-radius:2px;}
.adjust{width:234px;height:234px;}
.black_overlay{
			ovrflow:auto;
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
    .white_content {
	color:black;
        display: none;
        position: fixed;
        top: 25%;
        left: 25%;
        width: 50%;
        height: 50%;
        padding: 45px;
        border-radius:5px;
        border: 0px solid #989DD4;
        background-color: white;
        z-index:1004;
        overflow: auto;
    }
.xbutton{background:white;position:absolute;top:-1px;right:0px;font-size:16pt;border-radius:8px;text-align:center;text-decoration:none;z-index:200;color:black;font-style:bold;}
.xbutton:hover{color:gray;}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TimeLine</title>
<meta name="keywords" content="mini social, free download, website templates, CSS, HTML" />
<meta name="description" content="Mini Social is a free website template from templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/coda-slider.css" type="text/css" media="screen" charset="utf-8" />

<script src="js/jquery-1.2.6.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-1.3.3.js" type="text/javascript"></script>
<script src="js/jquery.localscroll-1.2.5.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.serialScroll-1.2.1.js" type="text/javascript" charset="utf-8"></script>
<script src="js/coda-slider.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript" charset="utf-8"></script>
<script>
function view_likers(v)
{
document.getElementById('img_disp').innerHTML='';
	var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('img_disp').innerHTML=xml.responseText;
}
}
xml.open('GET','http://localhost/view_likers.php?q='+v.value,true);
xml.send();
	document.getElementById('img_disp').style.display='block';
	document.getElementById('fade').style.display='block';
}
</script>
</head>
<body>

<div id="slider">
	
    <div id="templatemo_sidebar">
    	<div id="templatemo_header">
        	<a href="http://localhost"><?php session_start();  $s="python /var/www/img_path.py ".$_SESSION['email']; 
$b=shell_exec($s);
echo "<img class='short' src='".$b."' ></img>";echo $_SESSION['email'];?></a>
        </div> <!-- end of header -->
        
        <ul class="navigation">
            <li><a href="#home">Most Liked Status<span class="ui_icon home"></span></a></li>
            <li><a href="#aboutus">Friends' Bond<span class="ui_icon aboutus"></span></a></li>
            <li><a href="#services">Details<span class="ui_icon services"></span></a></li>
            <li><a href="#gallery">Gallery<span class="ui_icon gallery"></span></a></li>
            <li><a href="#contactus">Contact Us<span class="ui_icon contactus"></span></a></li>
        </ul>
    </div> <!-- end of sidebar -->

	<div id="templatemo_main">
    	<div id="social_box">
            <form name="Status_form" id="Status_form" action="http://localhost/status.php" method="post">
<table border=0 cellpadding="1">
<tr><td><textarea id="status1" name="status1" type="text" placeholder="Write a comment..." autocomplete="off" aria-autocomplete="list" role="textbox" onfocus="this.style.height='100px'"></textarea></td><td><button type="submit" id="uipost" class="post">Post</button></td></tr>
</table>               
        </div>
        
        <div id="content">
        
        <!-- scroll -->
        
        	
            <div class="scroll">
                <div class="scrollContainer">
                
                    <div class="panel" id="home">
                        <h1>Most Liked posts of you...</h1>    
                        <div class="image_wrapper image_fl">
<?php
session_start();
shell_exec("python liked_posts.py ".$_SESSION['email']);
$b=json_decode(file_get_contents('status.json'));
if(!sizeof($b))
echo "No Posts!! Not a frequent user yet!!!";
foreach($b as $var)
{
echo "<div class='two'>";
echo $var[0]."</br>";
echo "Rated: ".$var[1]."</br>";
$code="python /var/www/check_rate.py ".$var[2];
$a=shell_exec("python /var/www/genId.py");
echo "<input type='hidden' id=".$a." name=".$a." value=".$var[2].">";
echo "<a href='javascript:void(0);' onclick='view_likers(".$a.");' >".shell_exec($code)."</a>";
echo "</div>";
echo "</br>";
}
?>
</div>
                 <div class="cleaner_h40"></div>
                        
                        <h2>Theory Behind the Search</h2> 
                        <p><em>The algorithm simply follows a search to the edges of likes and the result is displayed.We are looking for a further Development on this one</em></p>
                        <p>Later,it will also show you the emotions of people that are connected with your posts. All the comments and other things!
We are looking forward to implement scribblie suggestions to pics..!! and modify pics of a person the way we do in newspapers!!
</p>
                        <div class="btn_more"><a href="#aboutus">More <span>&raquo;</span></a></div>
                    </div> <!-- end of home -->
                    
                    <div class="panel" id="aboutus">
<h1>Know Your Bondings...</h1></br>
                       <?php
			echo nl2br(shell_exec("python see_bonding.py ".$_SESSION['email']));
			
                        ?></br></br>
<p><em>This basic bonding technique is newly defined where one person can have analysis of his/her friends bond with himself/herself. We simply check for the heaviness contained in the edges of your friendship and your mutual <b>likings</b>,<b>sharings</b> and <b>ratings</b></em></p>
                                            </div>
                    
                    <div class="panel" id="services">
                        <h1>Details</h1>
                		<?php
			$b=shell_exec('python details.py '.$_SESSION['email']);
			echo nl2br($b);
	?>
	<button class='add_data' href='javascript:void(0);'>Add Data</button>
                    </div>
                
                    <div class="panel" id="gallery">
                        <h1>Your Gallery(Most Liked Photos)</h1>
                        <?php
		shell_exec('python liked_photos.py '.$_SESSION['email']);
		$a=json_decode(file_get_contents('photo.json'));
		foreach($a as $var)
		{
			echo "<img class='adjust' src=/".$var[0]."></img></br>";
			echo "Ratings: ".$var[1];
			echo "</br>";
			$code="python /var/www/check_rate.py ".$var[2];
			$a=shell_exec("python /var/www/genId.py");
echo "<input type='hidden' id=".$a." name=".$a." value=".$var[2].">";
echo "<a href='javascript:void(0);' onclick='view_likers(".$a.");' >".shell_exec($code)."</a>";
		}

		?>
                        
                    </div>
                
                    <div class="panel" id="contactus">
                        <h1>Feel free to send us a message</h1>
                        <div id="contact_form">
                            <form method="post" name="contact" action="#contactus">
                                
                                <label for="author">Your Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                                <div class="cleaner_h10"></div>
                                
                                <label for="email">Your Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                                <div class="cleaner_h10"></div>
                                
                                <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                                <div class="cleaner_h10"></div>
                                
                                <input type="submit" class="submit_btn" name="submit" id="submit" value="Send" />
                                <input type="reset" class="submit_btn" name="reset" id="reset" value="Reset" />
                            
                            </form>
						</div>
                    </div>
                
                </div>
			</div>
            
        <!-- end of scroll -->
        
        </div> <!-- end of content -->
        
        <div id="templatemo_footer">

            Copyright © 2048 <a href="#">Scribbie</a> 
        
        </div> <!-- end of templatemo_footer -->
    
    </div> <!-- end of main -->
</div>
<div id="img_disp" class="white_content">
<a class='xbutton' href = "javascript:void(0)" onclick = "document.getElementById('img_disp').style.display='none';document.getElementById('fade').style.display='none';">X</a>
</div>
<div id="fade" class="black_overlay" ></div>
</body>
</html>

