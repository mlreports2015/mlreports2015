// JavaScript Document

var xmlhttp;


function showResult4(str)
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
	  document.getElementById("ls2I").innerHTML="";
     document.getElementById("livesearch2").style.visibility='visible';
	 document.getElementById('ls2B').innerHTML="<input type='button' value='Close' onclick='document.getElementById(\"livesearch2\").style.visibility=\"hidden\";' />";
  }
xmlhttp=GetXmlHttpObject4()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="casAddress.php";
url=url+"?ll="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged4 ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged4()
{
if (xmlhttp.readyState==4)
  {
  var csv=String(xmlhttp.responseText);
  
  csv0=csv.split('"');

  var city=csv0[1].split(',');
  
// finding City Name
  document.getElementById('cty').value=city[1].replace(' ','');
  
  var street=city[0].split(' ');
  
// finding Address Range
  var addresses=street[0];
  var address=street[0].split('-');
  
  for (var i=parseInt(address[0]); i<=parseInt(address[1]); i++)
  {
	  document.getElementById("ls2I").innerHTML=document.getElementById("ls2I").innerHTML+"<br><a onclick='setAdd(\""+i+"\");' style='cursor:pointer;'>"+i+'</a>';
  }
  document.getElementById('ls2I').innerHTML=document.getElementById('ls2I').innerHTML;
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
// finding Street Name
  street=street.slice(1);
  street=street.join();
  street=street.replace(',', ' ');
  document.getElementById('ca1').value=street;
  
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
  document.getElementById('livesearch2').align='left';
  document.getElementById('livesearch2').style.left=findPosX(document.getElementById('ca1'));
  document.getElementById('livesearch2').style.top=findPosY(document.getElementById('ca1'))+25;
  }
}

function GetXmlHttpObject4()
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


function setAdd(i)
{
	document.getElementById('ca1').value=i+' '+document.getElementById('ca1').value;
	
	document.getElementById("livesearch2").style.visibility='hidden';
}