function retrace_ajax(e)
{
var xml=new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState==4 &&xml.status==200)
{
document.getElementById('show_applet').innerHTML=xml.responseText;
}
}
xml.open('GET','index.php?q=1',true);
xml.send();
}

function ajaxify_it(e)
{
var xml= new XMLHttpRequest;
xml.onreadystatechange=function()
{
if(xml.readyState<=3)
{
setTimeout(function(){document.getElementById('load_container').style.opacity=0.9;},0);
}
else if(xml.readyState==4&&xml.status==200)
{
setTimeout(function(){document.getElementById('load_container').innerHTML=xml.responseText;
document.getElementById('load_container').style.pointerEvents='auto';
},1000);
}
}
if(xml.readyState==4)
xml.open('GET','validate.php?q=1',true);
xml.send();
}

