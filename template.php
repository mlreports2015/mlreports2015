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
	$credits = "select mlCredit from about where org='".$_SESSION['o']."' and name='".$_SESSION['n']."'";
	
	$creditsres= mysql_query($credits);
	
	$creditPrint = mysql_fetch_row($creditsres);
	
	
	

?>

<HTML>

<TITLE><? echo $_SESSION['n']; ?>'s mlr <?php echo $parameter; ?></TITLE>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

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
select, input{
  
  border-radius:6px;
  border:1px solid #CCC:

}

</style>



<style>
ul.topnavi {
	
	width:1000px;
	height:40px;
	padding:0px;
	margin:0px;
	postion:fixed;
	margin-top:16px;
	background-color:#77a9c9;
	list-style:none;
}

ul.topnavi li{
	
	width:140px;
	height:40px;
	padding:0px;
	margin:0px;
	float:left;
}

ul.topnavi li:hover{
	
	width:140px;
	margin:0px;
	padding:0px;
	float:left;
	font-weight:bold;
	
}


ul.topnavi li a{
	
	width:140px;
	margin:0px;
	padding:0px;
	float:left;
	color:#FFF;
	text-decoration:none;
	
}

ul.topnavi li a:hover{
	
	width:140px;
	margin:0px;
	padding:0px;
	float:left;
	font-weight:bold;
	color:#FFF;
	text-decoration:none;
	
}


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
	color:#FFF;
	text-decoration:none;
    width:120px;
	float:left;
	height:30px;
	margin-left:4px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:link img {
  position:absolute;
  margin-top:-10px;
  margin-left:-20px;
  visibility:hidden;
}

a.l:visited {
	color:#FFF;
	text-decoration:none;
	 width:120px;
	margin-left:4px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:hover {
	color: #A61515;
	font-weight:bold;
	margin-left:4px;
	width:120px;
	font-family:Arial, Helvetica, sans-serif;
}

a.l:active {
	color: #666;
	background-color:#A61515;
	width:180px;
	margin-left:10px;
	font-family:Arial, Helvetica, sans-serif;
}


a.l1:link {
	color:#000;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;
	
}

a.l1:visited {
	color:#000;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;	
}
a.l1:hover {

	color:#fff;
	text-decoration:none;
	margin-left:20px;
	font-family:Arial, Helvetica, sans-serif;

}
a.l1:active {
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
	text-decoration:none;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:visited {
	color:#A61515;
	text-decoration:none;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:hover {
	color: #555;
	text-decoration:underline;
	text-indent:2px;
	font-family:Arial, Helvetica, sans-serif;
}

a.lr:active {
	color:#A61515;
	text-decoration:none;
	font-family:Arial, Helvetica, sans-serif;
}



a.lb:link {
	color:#000;
	text-decoration:none;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:visited {
	color:#000;
	text-decoration:none;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:hover {
	color: #555;
	text-decoration:underline;
	text-indent:2px;
	font-family:Arial, Helvetica, sans-serif;
}

a.lb:active {
	color:#000;
	font-family:Arial, Helvetica, sans-serif;
}


table tr a:hover
{
	
	color:#000;
	text-decoration:none;

}

table tr a
{
	
	color:#000;
	text-decoration:none;

}
table tr:nth-child(odd){

	background-color:rgba(204,204,204,0.4);

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

<?php if($creditPrint[0]>2 && $creditPrint[0]< 40){
	
	echo "alert('credit limit low please check');";
		
}
?>

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

function updtusr()
{

	document.getElementById('det_block').style.visibility='visible';
}

function tgglProfLst()
{

if(document.getElementById('profLst').style.display=='block'){

document.getElementById('profLst').style.display='none';

	
}else{

document.getElementById('profLst').style.display='block';

}

}


function tgglside(elem)
{
  if(document.getElementById('side_block').style.visibility=='hidden')
  {
   document.getElementById('side_block').style.visibility='visible';
   document.getElementById('sdefrm').src="phrase.php?elem="+elem;
   }
    else{
	document.getElementById('side_block').style.visibility='hidden';
   }

}


</SCRIPT>

<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>
<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

</HEAD>

<BODY marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" rightmargin="0" style="background-image:url('images/3D-Floral_pattern.png');background-attachment:fixed;margin-top:0px; margin-left:0px;opacity: 0.8; margin-right:0px;height:100%" onLoad="var browser=navigator.appName; var t=document.getElementById('txt1').style.top; if (browser=='Netscape'){document.getElementById('txt1').style.top='-8px';} else if (browser=='Opera'){document.getElementById('txt1').style.top='-17px';}<?php echo $onLoad;?>;MM_preloadImages('images/dDn2.png')" >

 <div id="redRound" style="position:fixed; width:100%; height:60px;color:#fff;background-color:#77a9c9;border-radius:0px 0px 8px 8px;margin:0px;margin-top:0px;z-index:1000;box-shadow:5px 5px 4px #999;" align="center">
<form id="srchfrm" name="srchfrom" method="post"  action="searchProcessor02.php" style=""> 
<div style="width:260px;height:40px;padding:0px;float:right;margin-right:40px;margin-top:5px;"><img src="images/search_ic.png" height="27px" style="padding:0px 3px;margin:0px;" title="search" onMouseOver="document.getElementById('srchBox').style.width='130px'"/>
   <input type="text" id='srchBox' name="srchBox" value="quick" style="position:absolute;border-radius:6px;color:#CCC;background-color:#cfe2ee;height:25px;width:30px;padding:0px;margin:0px;" onFocus="this.style.backgroundColor='#fff';this.value='';this.style.width='130px';" onBlur="this.style.backgroundColor='#cfe2ee';this.style.width='30px';"  title="quick search"/>
<input type="submit" value="" style="visibility:hidden"/>
</div>
</form>
<ul class="topnavi">
<li>
<a href='home.php'>HOME</a>
</li>
<li>
<a href='adminNewer.php'>ADD CASE</a>
</li>
<li>
<a href='solicitorSaveXtra.php'>ADD SOLICITOR</a>
</li>
<li>
<a href='complete.php'>COMPLETED</a>
</li>
<li>
<a href='await.php?l=0'>AWAITING</a>
</li>
<li onMouseOver="document.getElementById('clinicList').style.visibility='visible';" onMouseOut="document.getElementById('clinicList').style.visibility='hidden';">
<a href='lists.php'>CLINICS</a>
<ul id="clinicList" name="clinicList" style="list-style:none;margin:0;height:120px;width:100px;background-color:#77a9c9;visibility:hidden;">
<li style="height:25px;">&nbsp;</li>
<li style="margin-left:-30px;height:28px;"><a href="clinicSaveXtra.php">Add Clinics</a></li>
<li style="margin-left:-30px;height:28px;">Lists</li>
</ul>
</li>
<li style="margin:-30px;">
<?php echo $_SESSION['n']; ?>&nbsp;<img src="images/bgTriang.png" style="padding:0px;margin:0px;" onClick="tgglProfLst()"/>
<ul id="profLst" style="width:150px;list-style:none;background-color:#77a9c9;height:110px;text-align:left;display:none;margin-top:8px;border-radius:0px 0px 6px 6px">
<li style="cursor:pointer">
Your Account
</li>
<li style="cursor:pointer">
<a title='your Words' onclick='tgglside()'>Your Words</a>
</li>
<li style="cursor:pointer">
<a href='logout.php' title='logout' >Logout</a>
</li>
</ul>
</li>
</ul>




</div>

<DIV style="width:100%;;height:150%;background-color:#FFF;padding-bottom:5px;" />
<table height="180px" width="100%" border="0" cellpadding="0"  cellspacing="0" style="width:100%;">
<tr>
<td rowspan="2" width='25%'>
<IMG src="image/Logo.png" style="border:none;" border='0' />
</td>


<tr valign="bottom">
<td valign='bottom' bdcolor="#A61515">

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
<!--</DIV>-->

<div id="lclose" style="border:2px solid #999;visibility:hidden;">
<a style="width:100%;" onClick="document.getElementById('livesearch').style.visibility='hidden';document.getElementById('lclose').style.visibility='hidden';" href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','image/window-close.png',1)"><img style="float:right;" src="image/window-closeo.png" name="Image2" width="18" height="18" border="0"></a>
</div>
<div id="livesearch" style="border:1px solid #999;">
</div>


<div id='side_block' name='side_block' align='right' style='float:right;position:fixed;;top:30px;right:40px; height:450px;width:310px;border:solid 1px #000;-moz-border-radius:6px;border-radius:6px;border-color:#CCC;background-color:#77a9c9;visibility:hidden;font-family:Arial, Helvetica, sans-serif;box-shadow:3px 3px 5px #666;'>

<div id='ttl' style='width:240px;'><img src='image/window-close.png' align="right" title='close window' onClick="document.getElementById('side_block').style.visibility='hidden'"/></div><br/>
<iframe style='width:99%;height:97%;overflow:hidden;' id='sdefrm' frameborder='0' name='sdefrm' src='phrase.php' ></iframe>

</div>



<div id='det_block' style='position:absolute;top:350px;left:450px;height:550px;width:450px;border:solid 1px #ccc;-moz-border-radius:5px;border-color:#A61515;background-color:#FFFFFF;visibility:hidden;font-family:Arial, Helvetica, sans-serif;-moz-box-shadow:-5px 5px 5px #666;'>

<div id='ttl' style='width:440px;'><img src='image/window-close.png' align="right" title='close window' onClick="document.getElementById('det_block').style.visibility='hidden'"/></div><br/><br/>
<iframe style='width:98%;height:97%;overflow:hidden;' id='tempfrm' frameborder='0' name='tempfrm' src='./Process/updateUser02.php?nm=<?php echo $_SESSION['n'] ?>&org=<?php echo $_SESSION['o']; ?>' ></iframe>

</div>


<?
}
}
?>

</DIV>