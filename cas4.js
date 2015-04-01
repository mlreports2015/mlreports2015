// JavaScript Document

var xmlhttpS;


function showResultS(str)
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
xmlhttpS=GetXmlHttpObjectS()
if (xmlhttpS==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="cas4.php";
url=url+"?q="+str+'&lat='+document.getElementById('lat').value+'&long='+document.getElementById('long').value;
url=url+"&sid="+Math.random();
xmlhttpS.onreadystatechange=stateChangedS ;
xmlhttpS.open("GET",url,true);
xmlhttpS.send(null);
}

function stateChangedS()
{
if (xmlhttpS.readyState==4)
  {
  document.getElementById("ls2I").innerHTML=xmlhttpS.responseText;
  document.getElementById('livesearch2').style.left=findPosX(document.getElementById('sNameI'));
  document.getElementById('livesearch2').style.top=findPosY(document.getElementById('sNameI'))+25;
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
  }
}

function GetXmlHttpObjectS()
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