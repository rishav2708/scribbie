<?php
session_set_cookie_params(160000000);
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION['email']))
{
header('Location:personal.php');
}
?>
<html id="html1">
<style type="text/css">
body{background:url(prof.png);}
#div2{  
        margin:-5px;
        top:-17px;
        background-color:rgb(59,89,152);
        font-size:65;
        font-style:bold;
        color:white;
        font-family:Purisa;
        font-style:italic;
        padding-top:3px;
        padding-left:55px;
        padding-bottom:20px;
        height:90px;
        width:1244px;
      }
.form1 {float:right;
        padding-top:-50px;
        white-space:nowrap;
       }
.user-pass{font-size:10pt;font-family:sans-serif;padding}
.logInButton{-moz-box-shadow:rgb(0,0,0.0.0) 0 1px 0 0;
               box-shadow:rgb(0,0,0.0.0) 0 1px 0 0;
              color:white;
              background-color:rgb(59,89,152);
              border-radius:5px;
              -moz-border-radius:5px;
              
           }
.container{background:transparent;
           padding:4px;
           font-family:Dingbats;}
.display {position:absolute;
          top:100px;
          left:80px;
          }
.icon {
       background:transparent;
       height:40px;
       width:35px;
       }
    
.sign-up{position:absolute;white-space:pre;left:700px;top:10px;}
 select{border:1px solid #ccc;border-color:#eeeeee;height:34px;color:white;font-size:18pt;border-radius:4px;width:245px;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;background:rgb(59,89,152);}
.uiSignUp{box-shadow:rgb(0,0,0.0.2) 0 1px 0 0;-moz-box-shadow:rgb(0,0,0.0.2) 0 1px 0 0;-webkit-box-shadow:rgb(0,0,0.0.2) 0 1px 0 0;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px,width:245px;height:34px;font-size:18pt;}
.gender{white-space:normal;}
.signUpButton{height:38px;width:200px;-webkit-box-shadow:rgb(0,0,1)0 2px 1px 0;box-shadow:rgb(0,0,1)0 2px 1px 0;-mz-box-shadow:rgb(0,0,1)0 2px 1px 0;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;color:black;background-color:#228B22;font-family:Ubuntu,sans,Lucida;font-size:21pt;font-weight:bold;}
</style>
<script>
var pattern=/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/;
function check()
{
if (document.form2.id.value == "")
{
alert("email is required");
return false;
}
if (document.form2.userName.value == "")
{
alert("Username is required");
return false;
}
if(document.form2.Phone.value=="")
{
alert("Give correct Phone Number,please");
return false;
}
if(document.form2.passWord.value=="")
{
alert("Password is required");
return false;
}
if(document.form2.cpassWord.value=="")
{
alert("cPassword is required");
return false;
}
if(document.form2.cpassWord.value!=document.form2.passWord.value)
{
alert("Password Does Not match");
return false;
}
if(pattern.test(document.form2.Phone.value)==false)
{
alert("Give correct Phone Number,please!");
return false;
}
return true;
}
</script>
<head>
<link rel="shortcut icon" href="1372865219_172106.ico"/>
<title>Welome To Scribbie!!</title>
</head>
<body id="body1" name="body1">
<div id="div2">
<font>scribbie</font>
<form method="post" action="abc.php" id="form1" class="form1">
<font class="user-pass"><b>UserName:</b></font>
<input type="text" name="email" id="email" class="email" size="10"/>
<font class="user-pass"><b>PassWord:</b></font>
<input type="password" name="pass" id="pass" size="10"/>
<input type="submit" id="logIn" value="Log In" class="logInButton" />
</form>
</div>
<div class="container display">
<h1><b><font><b>Sign Up To :</b></font></b></h1>
<p align="justified"><img class="icon" src="1372863281_36874.ico"/><b>Know Your Ratings...</b></p></br></br>
<p align="justified"><img class="icon" src="health_care_shield.ico"/><b>Find Out the one to help or be helped!</b></p></br></br>
<p align="justified"><img class="icon" src="halloween_happy.ico"/><b>Help others and get helped..!!</b></p></br></br>
<p align='justified'><img class='icon' src='/upload/prof.png' /><b>Scribble around to formulize art with friendship</b></p>
<div class="container sign-up">
<form id="form2" name="form2" action="register.php" method="post" onsubmit="return check();">
Email Id:
<input type="text" id="id" name="id" size="15" class="uiSignUp"/>
UserName:
<input type="text" id="userName" name="userName" size="15" class="uiSignUp"/>
Phone:
<input type="text" id="Phone" name="Phone" size="15" class="uiSignUp"/>
Password:
<input type="password" id="passWord" name="passWord" size="15" class="uiSignUp" />
Confirm Password:
<input type="password" id="cpassWord" name="cpassWord" size="15" class="uiSignUp"/>
Date Of Birth:
<div class="select1">
<select name="month" class="dmy" value="Month">
	<option value="1">January
	<option value="2">February
	<option value="3">March
	<option value="4">April
	<option value="5">May
	<option value="6">June
	<option value="7">July
	<option value="8">August
	<option value="9">September
	<option value="10">October
	<option value="11">November
	<option value="12">December
</select>
<select name="day" class="dmy" value="day">
	<option value="1">1
	<option value="2">2
	<option value="3">3
	<option value="4">4
	<option value="5">5
	<option value="6">6
	<option value="7">7
	<option value="8">8
	<option value="9">9
	<option value="10">10
	<option value="11">11
	<option value="12">12
	<option value="13">13
	<option value="14">14
	<option value="15">15
	<option value="16">16
	<option value="17">17
	<option value="18">18
	<option value="19">19
	<option value="20">20
	<option value="21">21
	<option value="22">22
	<option value="23">23
        <option value="24">24
	<option value="25">25
	<option value="26">26
	<option value="27">27
	<option value="28">28
	<option value="29">29
	<option value="30">30
	<option value="31">31
</select>
<select name="year" class="dmy" value="year">
        <option value="1989">1989
        <option value="1990">1990
        <option value="1991">1991
        <option value="1992">1992
        <option value="1993">1993
        <option value="1994">1994
        <option value="1995">1995
        <option value="1996">1996
        <option value="1997">1997
        <option value="1998">1998
        <option value="1999">1999
        <option value="2000">2000
        <option value="2001">2001
	<option value="2002">2002
	<option value="2003">2003
	<option value="2004">2004
	<option value="2005">2005
</select></div>
<input type="radio" value="male" id='sex' name='sex'/>Male
<input type="radio" value="female" id="sex" name="sex"/>FeMale
<input type="submit" value="Sign Up" class="signUpButton"/>
</form>
© Rishav
</div>
</div>
</body>
</html>
