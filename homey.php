<?

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

<TITLE><? echo $_SESSION['n']; ?>'s mLr Home</TITLE>

<script language="javascript" type="text/javascript" src="livesearch.js"></script>

<style type="text/css">
#livesearch
  {
  margin:0px;
  width:350px;
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
  margin:0px;
  width:350px;
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
}

a.li:visited {
	color: #FFF;
}

a.li:hover {
	color: #000;
}

a.li:active {
	color: #000;
}


a.l:link {
	color:#000;
	text-decoration:none;
}

a.l:visited {
	color:#000;
	text-decoration:none;
}

a.l:hover {
	color: #A61515;
}

a.l:active {
	color: #FFF;
	background-color:#A61515;
}


li
{
	font-size:16px;
	font-weight:200;
}



a.lr:link {
	color:#A61515;
}

a.lr:visited {
	color:#A61515;
}

a.lr:hover {
	color: #555;
	text-indent:2px;
}

a.lr:active {
	color:#A61515;
}



a.lb:link {
	color:#000;
}

a.lb:visited {
	color:#000;
}

a.lb:hover {
	color: #555;
	text-indent:2px;
}

a.lb:active {
	color:#000;
}

</style>

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</HEAD>

<BODY background="images/back.png" marginheight="0" topmargin="0" marginwidth="0" leftmargin="0" rightmargin="0" style="margin-top:0px; margin-left:0px; margin-right:0px" onLoad="var browser=navigator.appName; var t=document.getElementById('txt1').style.top; if (browser=='Netscape'){document.getElementById('txt1').style.top='-8px';} else if (browser=='Opera'){document.getElementById('txt1').style.top='-17px';};MM_preloadImages('image/window-close.png')" >

<DIV style="width:100%;" />
<table height=200 width="100%" style="width:100%;">
<tr>
<td rowspan="2" width:25%>
<IMG align="middle" src="image/Logo.png" />
</td>

<td align="right" height=59 width="75%" style="color:#000; background-image:url(image/redCurve.png); background-repeat:no-repeat; background-position:right top; padding-top:0px; margin-top:0px;" cellpadding=0>

<table>
<tr>
<td>
<a id="li" class="li" href="logout.php" style="position:relative; top:-20px; right:25px; text-decoration:none;">Logout</a>
</td>
<td>
<form>
<input id='txt1' type="text" value="Quick Search" style="position:relative; top:-5px; left:-10px;" onkeyup="showResult(this.value)" onFocus="this.value='';" onBlur="this.value='Quick Search'; if (document.getElementById('livesearch').focus()==false){document.getElementById('livesearch').style.visibility='hidden';}" />
</form>
</td>
<td>
<b style="position:relative; top:-20px; font-weight:normal; right:5px;">Tel : 0161 839 3703</b>
</td>
</tr>
</table>

</td>
</tr>

<tr>
<td height="161" align="center">

<DIV style="float:right;right:20px;width:100%;">
<A style="color:#fff; background-color:#A61515; text-decoration:none; font-size:24; font-weight:300;" href=home.php>Home</A> 
<A class="l" style="margin-left:15px; text-decoration:none; font-size:24; font-weight:300;" href=admin.php>Add Case</A> 
<A class="l" style="margin-left:15px; text-decoration:none; font-size:24; font-weight:300;" href=search.php>General Search</A> 
<A class="l" style="margin-left:15px; text-decoration:none; font-size:24; font-weight:300;" href=incomplete.php>Incomplete Cases</A> 
<A class="l" style="margin-left:15px; text-decoration:none; font-size:24; font-weight:300;" href=complete.php>Complete Cases</A> 
</DIV>

</td>
</tr>

</table>
</DIV>

<div id="lsclose">
<a style="width:100%; background-color:#000;" onClick="document.getElementById('livesearch').style.visibility='hidden';document.getElementById('lsclose').style.visibility='hidden';" href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','image/window-close.png',1)"><img style="float:right;" src="image/window-closeo.png" name="Image2" width="18" height="18" border="0"></a>
</div>
<div id="livesearch">
</div>

<DIV style="width:100%;float:right;">
<TABLE width="100%" align="center" border="1">

<TR>
<TD>ID</font></Th>
<Th>Firt Name</font></Th>
<Th>Last Name</font></Th>
<Th>DOB</font></Th>
<Th>DOA</font></Th>
<Th>DOE</font></Th>
<Th>Address</font></Th>
<Th>Post Code</font></Th>
<Th>Contact</font></Th>
<Th>Solicitor Reference</font></Th>
<Th>Agency Reference</font></Th>
<Th>Agency</font></Th>
<Th>Solicitor</font></Th>

</TR>
<?
include "dcon.php";
$i=0;
$s="select * from claimant where org='".$_SESSION['o']."' and stat='' ORDER BY cid DESC";
// echo "s=".$_SESSION['o'];
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
// 	echo $r['cid'];
$s1="select * from solicitor where sid='".$r['csol']."'";
$s2="select * from agency where aid='".$r['cage']."'";

$q1=mysql_query($s1);
$q2=mysql_query($s2);

$r1=mysql_fetch_array($q1);
$r2=mysql_fetch_array($q2);

if ($i%2==0)
{
	$s="class='lr'";
}
else
{
	$s="class='lb'";
}
?>
<TR>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cfn'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cln'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cdb']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cda']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo date('d-m-Y',strtotime($r['cde']));?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['ca1']."<br>".$r['ca2'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cp'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cc1']."<br>".$r['cc2'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['csolref'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r['cageref'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r2['an'];?></A></TD>
<TD><A <?php echo $s; ?> href='det.php?cid=<?echo $r['cid'];?>'><?echo $r1['sn'];?></A></TD>
</TD>
</TR>

<?
$i=$i+1;
}
?>

</TABLE>
</DIV>



</Body>
</HTML>

<?
}
?>