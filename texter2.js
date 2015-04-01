// JavaScript Document

var xmlhttp;


function texter(nums, txt)
{
if (nums.length==0)
  {
  document.getElementById("tInner").innerHTML="";
  document.getElementById("texting").style.visibility='hidden';
  return;
  }
else
  {
     document.getElementById("texting").style.visibility='visible';
  }
xmlhttp=GetXmlHttpObjectT()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }

var url="texter.php";
var aNamer=document.getElementById('aNameI').value;
aName=aNamer.replace(' ', '+');
url=url+"?nums="+nums+'&dt='+document.getElementById('doe').value+'&tm='+document.getElementById('tm').value+'&cid='+document.getElementById('cNameH').value+'&aName='+aName;
xmlhttp.onreadystatechange=stateChangedT;
alert('0');
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}


function stateChangedT()
{
	alert('1');
if (xmlhttp.readyState==4)
  {
	  alert('2');
  document.getElementById("tInner").innerHTML=xmlhttp.responseText;
  }
}

function GetXmlHttpObjectT()
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