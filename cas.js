// JavaScript Document

var xmlhttp;


function showResult1(str)
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
xmlhttp=GetXmlHttpObject1()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="cas.php";
url=url+"?q="+str+'&lat='+document.getElementById('lat').value+'&long='+document.getElementById('long').value;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged1 ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged1()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("ls2I").innerHTML=xmlhttp.responseText;
  document.getElementById('livesearch2').style.left=findPosX(document.getElementById('cNameI'));
  document.getElementById('livesearch2').style.top=findPosY(document.getElementById('cNameI'))+25;
  document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
  }
}

function GetXmlHttpObject1()
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

function findPosX(obj)
  {
    var curleft = 0;
    if(obj.offsetParent)
        while(1) 
        {
          curleft += obj.offsetLeft;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.x)
        curleft += obj.x;
    return curleft;
  }
  
function findPosY(obj)
  {
    var curtop = 0;
    if(obj.offsetParent)
        while(1)
        {
          curtop += obj.offsetTop;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.y)
        curtop += obj.y;
    return curtop;
  }