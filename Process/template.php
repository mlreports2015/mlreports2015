<?

function head($parameter, $importedCSS, $importedJS, $inpageCSS, $inpageJS, $onLoad)
{
session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include "dcon.php";

?>

<HTML>

<TITLE><? echo $_SESSION['n']; ?>'s mlr <?php echo $parameter; ?></TITLE>

<script language="javascript" type="text/javascript" src="livesearch.js"></script>

<style type="text/css">
#livesearch
  {
	  font-family:Arial, Helvetica, sans-serif;
  margin:0px;
  width:650px;
  z-index:2;
  position:absolute;
  right:2px;
  top:50px;
  background-color:#FFF;
  padding-left:10px;
  height:250px;
  overflow:auto;
  visibility:hidden;
  }
  
#lsclose
{
	font-family:Arial, Helvetica, sans-serif;
  margin:0px;
  width:650px;
  z-index:2;
  position:absolute;
  right:2px;
  top:30px;
  visibility:hidden;
  background-color:#000;
  padding-left:0px;
}

</style>



<style>

a.li:link {
	color: #FFF;
	font-family:Arial, Helvetica, sans-serif;
}

a.li:visited {
	color: #FFF;
	font-family:Arial, Helvetica, sans-serif;
}

a.li:hover {
	color: #000;
	font-family:Arial, Helvetica, sans-serif;
}

a.li:active {
	color: #000;
	font-family:Arial, Helvetica, sans-serif;
}


a.l:link {
	color:#000;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:visited {
	color:#000;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:hover {
	color: #A61515;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:active {
	color: #FFF;
	background-color:#A61515;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}


a.l2:link {
	color:#fff;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l2:visited {
	color:#000;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l2:hover {
	text-decoration:underline;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l2:active {
	color: #FFF;
	background-color:#A61515;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
}


li
{
	font-size:16px;
	font-weight:200;
	font-family:Arial, Helvetica, sans-serif;
}



a.lr:link {
	color:#A61515;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:visited {
	color:#A61515;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:hover {
	color: #555;
	text-indent:2px;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:active {
	color:#A61515;
	font-family:Arial, Helvetica, sans-serif;
}



a.lb:link {
	color:#000;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:visited {
	color:#000;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:hover {
	color: #555;
	text-indent:2px;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:active {
	color:#000;
	font-family:Arial, Helvetica, sans-serif;
}

</style>

<?php

echo $importedCSS;
echo $importedJS;
echo $inpageCSS;
echo $inpageJS;

?>

<SCRIPT language='JavaScript' type='text/javascript'>
var img1 = new Image();
img1.src='images/dDn.png';

var img2 = new Image();
img2.src='images/dDn2.png';

var img3 = new Image();
img3.src='images/dUp.png';

function dDnF()
{
	if (document.getElementById('dDnM').style.visibility=='visible')
	{
		document.getElementById('dDnB').src=img1.src;
		document.getElementById('dDnM').style.visibility='hidden';
	}
	else if (document.getElementById('dDnM').style.visibility=='hidden')
	{
		document.getElementById('dDnB').src=img3.src;
		document.getElementById('dDnM').style.visibility='visible';
	}
}
function subm()
{
	if (document.getElementById('cf').value.length==0)
	{
		alert('First Name of Client Blank');
	}
	else if (document.getElementById('cl').value.length==0)
	{
		alert('Last Name of Client Blank');
	}
	else
	{
		while (document.getElementById('dob').value.length==0)
		{
			if (confirm ('Leave DoB Blank?'))
			{
				document.getElementById('dob').value='01-01-1200';
			}
			else
			{
				document.getElementById('dob').value=prompt('Enter DoB (format dd-mm-YYYY)');


				var valid=new RegExp("\\d\\d-\\d\\d-\\d\\d\\d\\d");

				if (document.getElementById('dob').value.match(valid))
				{
					var vv='';
  				}
				else
				{
    					document.getElementById('dob').value=0;
  				}
			}
		}

		while (document.getElementById('doa').value.length==0)
		{
			if (confirm ('Leave DoA Blank?'))
			{
				document.getElementById('doa').value='01-01-1200';
			}
			else
			{
				document.getElementById('doa').value=prompt('Enter DoA (format dd-mm-YYYY)');
			}
		}

		while (document.getElementById('doe').value.length==0)
		{
			if (confirm ('Leave DoE Blank?'))
			{
				document.getElementById('doe').value='01-01-1200';
			}
			else
			{
				document.getElementById('doe').value=prompt('Enter DoE (format dd-mm-YYYY)');
				
			}
		}

		document.frm.submit();
	}
}
function MM_swapImgRestore() { //v3.0
	if (document.getElementById('dDnM').style.visibility!='visible')
	{
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  if (document.getElementById('dDnM').style.visibility!='visible')
	{
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
}
</SCRIPT>

<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>
<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

</HEAD>

<BODY background="images/back.png" marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" rightmargin="0" style="margin-top:0px; margin-left:0px; margin-right:0px" onLoad="var browser=navigator.appName; var t=document.getElementById('txt1').style.top; if (browser=='Netscape'){document.getElementById('txt1').style.top='-8px';} else if (browser=='Opera'){document.getElementById('txt1').style.top='-17px';}<?php echo $onLoad;?>;MM_preloadImages('images/dDn2.png')" >

<DIV style="width:100%;" />
<table height=200 width="100%" style="width:100%;">
<tr>
<td rowspan="2" width:25%>
<IMG align="middle" src="image/Logo.png" />
</td>

<td align="right" height=59 width="75%" style="color:#000; background-image:url(image/redCurve.png); background-repeat:no-repeat; background-position:right top; padding-top:0px; margin-top:0px; font-family:Arial, Helvetica, sans-serif;" cellpadding=0>

<table>
<tr>
<td>
<a id="li" class="li" href="logout.php" style="font-family:Arial, Helvetica, sans-serif; position:relative; top:-20px; right:25px; text-decoration:none;">Logout</a>
</td>
<td>
<form>
<input id='txt1' type="text" value="Quick Search" style="position:relative; top:-5px; left:-10px;" onKeyUp="showResult(this.value)" onFocus="this.value='';" onBlur="this.value='Quick Search'; if (document.getElementById('livesearch').focus()==false){document.getElementById('livesearch').style.visibility='hidden';}" />
</form>
</td>
<td>
<b style="font-family:Arial, Helvetica, sans-serif; color:#FFF; position:relative; top:-20px; font-weight:normal; right:5px;">Tel : 0161 839 3703</b>
</td>
</tr>
</table>

</td>
</tr>

<tr>
<td height="161" align="center">

<DIV style="float:right;right:20px;width:100%;">
<A <?php if (strcmp($parameter, 'Home')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;color:#fff; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?>
    href=home.php> &nbsp;Home&nbsp; </A>
<a onMouseOut="MM_swapImgRestore()" onMouseOver="this.style.cursor='pointer'; MM_swapImage('Image3','','images/dDn2.png',1)" onClick="dDnF();"><img id="dDnB" src="images/dDn.png" height="15" name="Image3" border="0"></a>
<A <?php if (strcmp($parameter, 'Admin')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;margin-left:20px; color:#fff; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?>
    href=adminNewer.php> &nbsp;Add Case&nbsp; </A> 
<A <?php if (strcmp($parameter, 'Search')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;color:#fff; margin-left:20px; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?>
    href=search.php> &nbsp;General Search&nbsp; </A> 
<A <?php if (strcmp($parameter, 'Incomplete')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;color:#fff; margin-left:20px; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?> 
	href=await.php?l=0>Awaiting Appointment</A> 
<A <?php if (strcmp($parameter, 'Complete')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;color:#fff; margin-left:20px; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?> 
	href=complete.php>Complete Cases</A> 
    <A <?php if (strcmp($parameter, 'Availability')==0)
	{
		echo 'style="font-family:Arial, Helvetica, sans-serif;color:#fff; margin-left:20px; background-color:#A61515; text-decoration:none; font-size:22; font-weight:300;"';
	}
	else
	{
		echo 'class="l" style="font-family:Arial, Helvetica, sans-serif;text-decoration:none; font-size:22; font-weight:300;"';
	}
	?> 
	href=ab.php>Availability</A>
</DIV>

</td>
</tr>

</table>
<div id="dDnM" style="position:absolute; top:160px; width:100%; visibility:hidden;" align="center">

<?php
$s="select * from claimant where org='".$_SESSION['o']."' and stat=''";
$q=mysql_query($s);
$n=mysql_num_rows($q);

$num=$n/50;

echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif;'>";
for ($i=0; $i<=$num; $i++)
{
	echo "<a class='lr' href='homeC.php?l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
}
echo '</div>';
?>

</div>
</DIV>

<div id="lsclose">
<a style="width:100%; background-color:#000;" onClick="document.getElementById('livesearch').style.visibility='hidden';document.getElementById('lsclose').style.visibility='hidden';" href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','image/window-close.png',1)"><img style="float:right;" src="image/window-closeo.png" name="Image2" width="18" height="18" border="0"></a>
</div>
<div id="livesearch">
</div>

<?
}
}
?>