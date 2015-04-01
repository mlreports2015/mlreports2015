// JavaScript Document

var xmlhttp;


function showResultAT(str)
{
if (str.length==0)
  {
  document.getElementById("ls2I").innerHTML="";
  document.getElementById("ls2B").innerHTML=document.getElementById("ls2B").innerHTML+"<input type='button' value='New Clinic' /><input type='button' value='Extend Clinic' />";
  
  document.getElementById("livesearch2").style.visibility='hidden';
  document.getElementById("livesearch2").style.border="0px";
  return;
  }
else
  {
     document.getElementById("livesearch2").style.visibility='visible';
	 document.getElementById("ls2B").innerHTML="<input type='button' value='Close' onclick='document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' /><br><input type='button' value='New Clinic' onclick='ifrmr(\"New Appointment Sheet\", \"aTimeAb.php\"); document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' />";
  }
xmlhttp=GetXmlHttpObjectAT()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="aTime.php";
url=url+"?dt="+str+'&ven='+document.getElementById('cNameH').value;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChangedAT ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChangedAT()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("ls2I").innerHTML=xmlhttp.responseText;
  document.getElementById('livesearch2').style.left=findPosX(document.getElementById('tm'));
  document.getElementById('livesearch2').style.top=findPosY(document.getElementById('tm'))+25;
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
  }
}

function GetXmlHttpObjectAT()
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