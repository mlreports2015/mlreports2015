// JavaScript Document

var xmlhttp;


function showResult2(str)
{
if (str.length==0)
  {
  document.getElementById("ls2I").innerHTML="";
  document.getElementById("livesearch2").style.visibility='hidden';
  document.getElementById("livesearch2").style.border="0px";
  return;
  }
else
  {
     document.getElementById("livesearch2").style.visibility='visible';
	 document.getElementById('ls2B').innerHTML="<input type='button' value='Close' onclick='document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' />";
  }
xmlhttp=GetXmlHttpObject2()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="cas2.php";
url=url+"?q="+str+'&lat='+document.getElementById('lat').value+'&long='+document.getElementById('long').value;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged2 ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged2()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("ls2I").innerHTML=xmlhttp.responseText;
  document.getElementById('livesearch2').style.left=findPosX(document.getElementById('cNameI'));
  document.getElementById('livesearch2').style.top=findPosY(document.getElementById('cNameI'))+25;
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
  }
}

function GetXmlHttpObject2()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}