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

<SCRIPT language="JavaScript">
<!--
var headID = document.getElementsByTagName("head")[0];
var cssNode = document.createElement('link');
var browser=navigator.appName;

if ((browser=="Microsoft Internet Explorer"))
{
	cssNode.type = 'text/css';
	cssNode.rel = 'stylesheet';
	cssNode.href = 'CSS/msie.css';
	cssNode.media = 'screen';
	headID.appendChild(cssNode);
// 	alert("1024 + "+browser);
}
else if (browser=="Netscape" || browser=="Konqueror")
{
	cssNode.type = 'text/css';
	cssNode.rel = 'stylesheet';
	cssNode.href = 'CSS/ns.css';
	cssNode.media = 'screen';
	headID.appendChild(cssNode);
// 	alert("1280");
}
else if (browser=="Opera")
{
	cssNode.type = 'text/css';
	cssNode.rel = 'stylesheet';
	cssNode.href = 'CSS/op.css';
	cssNode.media = 'screen';
	headID.appendChild(cssNode);
// 	alert("1280");
}

//-->
</SCRIPT>

<TITLE><? echo $_SESSION['n']; ?>'s mLr Home</TITLE>
<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

<link href="templates/b1.css" type="text/css" rel="StyleSheet" rev="StyleSheet" />
<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

</HEAD>

<body style="background-color:#c7fd9c;" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">

<?php

include "templates/template.php";

head();
menu1();
menu3();

?>

<DIV style="margin-top:7px;border-right-style:solid;border-right-width:1px;border-right-color:#fff;">

<Form method=POST action='admin2.php' id=frm name=frm>

<DIV style="float:left;border-right-style:solid;border-right-width:2px;border-right-color:#870524;width:33%; height:500px">

<TABLE align=center>

<TR>
<TH colspan='2' align='center'>Claimant Details</TH>
</TR>
<TR>
<TD>Title</TD>
<TD><select name=tt><option value=Mr.>Mr.</option><option value=Ms.>Ms.</option><option value=Miss>Miss</option><option value=Mrs>Mrs</option><option value=Dr.>Dr.</option><option value=Master>Master</option></select></TD>
</Tr>
<tr>
<TD>First Name</TD>
<TD><INPUT type='text' name='cf'></TD>
</tr>
<tr>
<TD>Last Name</TD>
<TD><INPUT type='text' name='cl'></TD>
</TR>
<TR>
<TD>Gender</TD>
<TD><SELECT name="gend"><OPTION value="m">Male</OPTION><OPTION value="f">Female</OPTION></SELECT></TD>
</TR>
<tr>
<TD>Date of Birth</TD>
<TD><input size=16px type='text' name=dob id='dob'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'dob');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('dob').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Accident</TD>
<TD><input size=16px type='text' name=doa id='doa'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'doa');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doa').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Examination</TD>
<TD><input size=16px type='text'  name=doe id='doe'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'doe');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doe').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Contact-1</TD>
<TD><INPUT type='text' name='cc1'></TD>
</TR>
<tr>
<TD>Contact-2</TD>
<TD><INPUT type='text' name='cc2'></TD>
</TR>
<tr>
<TD>Address Line 1</TD>
<TD><INPUT type='text' name='ca1'></TD>
</TR>
<tr>
<TD>Address Line 2</TD>
<TD><INPUT type='text' name='ca2'></TD>
</TR>
<tr>
<TD>Post Code</TD>
<TD><INPUT type='text' name='cp'></TD>
</TR>
<tr>
<TD>Email</TD>
<TD><INPUT type='text' name='ce'></TD>
</TR>
<tr>
<td colspan="2"><input type="checkbox" value="1" name="lis" /> Letter of Instruction from solicitor</td>
</tr>
<tr>
<td colspan="2"><input type="checkbox" value="1" name="mr" /> Medical Records</td>
</tr>
<tr>
<td colspan="2"><input type="checkbox" value="1" name="er" /> Engineering Report</td>
</tr>
<tr>
<td colspan="2"><input type="checkbox" value="1" name="lia" /> Letter of Instruction from agency</td>
</tr>
</TABLE>

</DIV>


<DIV id="csa" style="border-right-color : #870524; border-right-style : solid; border-right-width : 2px; float : left; height : 500px; line-height : 0px; min-height : 0px; width : 33%;">

<TABLE>
<tr>
<TH>Consulting Room</TH>
</tr>
<tr>
<TD>Select Existing/New</TD><TH><SELECT onchange='togleac();' name=c id=acm><OPTION value='0' onclick='showccr();'>Current Clinics</OPTION><OPTION onclick='showacr();' value='1'>Add a Clinic</option></select></td>
</tr>
</table>

<div id=ccr style='visibility:visible;'>
Select Existing
<SELECT name='cn2' id=c>

<?
include "dcon.php";

$sag="select * from cclist";
$rag=mysql_query($sag);
while($rocl=mysql_fetch_array($rag))
{
	echo "<option value=".$rocl['cid'].">".$rocl['cn']."</option>";
}
?>

</SELECT>
</div>

<div id="nvenD" style="visibility:hidden; position:relative; top:-23px;">
<input type="text" id="nvenI" size="10" readonly="true" />
<input type="button" id="nvenB" onclick="eVen();" value="Edit" />
</div>

<DIV id="cdets" style="">
<DIV id="aa">
<TABLE>
<TR>
<TH colspan='2' align=center>Case Details</TH>
</tr>
<tr>
<TH colspan="2">Agency</TH>
</tr>
<td>
<TD>Select Existing/New</TD>
<TH><SELECT onchange='togleag();' name=age id=agen><OPTION value='0' onclick='showcage();'>Current Agencies</OPTION><OPTION onclick='shownage();' value='1'>Add an Agency</option></select></td>
</tr>
</table>
<tr>
<DIV id="cage" style="visibility:visible;">
<table>
<tr>
<TD>Select Existing</TD><TD>
<SELECT name="sag">
<?
$s="select * from agency";
// echo $s;
$r=mysql_query($s);

while ($q=mysql_fetch_array($r))
{
	echo "<option value=".$q['aid'].">".$q['an']."</option>";
}

?>
</SELECT>
</TD>
</tr>
</TABLE>
</DIV>

<div id="nageD" style="visibility:hidden; position:relative; top:-23px;">
<input type="text" id="nageI" size="10" readonly="true" />
<input type="button" id="nageB" onclick="eAge();" value="Edit" />
</div>

<DIV style="" id="aar" >Agency Reference <INPUT type=text name=aref></DIV>

</DIV>


<DIV style="" id="ss">
<table>
<tr>
<TH colspan="2">Solicitor</TH>
</tr>
<tr>
<TD>Select Existing/New</TD>
<td><SELECT onchange='togleso();' name=sol id=sol><OPTION value='0' onclick='showcsol();'>Current Solicitor</OPTION><OPTION onclick='shownsol();' value='1'>Add a Solicitor</option></select></td>
</tr>
</table>
<tr>
<DIV id="csol" style="visibility:visible;">
<table>
<tr>
<TD>Select Existing</TD><TD>
<SELECT name="sso">
<?
$s="select * from solicitor";
$r=mysql_query($s);

while ($q=mysql_fetch_array($r))
{
	echo "<option value=".$q['sid'].">".$q['sn']."</option>";
}

?>
</SELECT>
</TD>
</tr>
</TABLE>
</DIV>

<div id="nsolD" style="visibility:hidden; position:relative; top:-23px;">
<input type="text" id="nsolI" size="10" readonly="true" />
<input type="button" id="nsolB" onclick="eSol();" value="Edit" />
</div>

<DIV id="ssr" style="">Solicitor Reference <INPUT type=text name=sref></DIV>

</DIV>


</DIV>
</DIV>


<DIV id="sb" style="float:right;width:32%;border-right-style:solid;border-right-width:2px;border-right-color:#870524;height:500px">

<TABLE>
<TR>
<TH colspan='2' align=center>Special Instructions</TH>
</tr>
<tr>
<TD><SELECT onchange='toglesoi();' name=soin id=soi><OPTION value='0' onclick='hidesoi();'>No</OPTION><OPTION onclick='showsoi();' value='1'>Yes</OPTION></SELECT></TD></TR>
</TABLE>
<DIV style='visibility:hidden;height:350px;' id='soid'>
<table style="width:90%;">

<TR>
	<TD width="3%"><INPUT style="background-color : #AAAAFF;" type="button" id=p name="p" onclick="pic('pi','p');"><INPUT type="hidden" value="0" id="pi" name="pi"></TD>
	<TD width="30%">Check ID</TD>

	<TD width="3%"><INPUT style="background-color : #AAAAFF;" type="button" id=l name="l" onclick="pic('li','l');"><INPUT type="hidden" value="0" id="li" name="nm"></TD>
	<TD width="30%">Check Name</TD>

	<TD width="3%"><INPUT style="background-color : #AAAAFF;" type="button" id=b name="b" onclick="pic('bi','b');"><INPUT type="hidden" value="0" id="bi" name="b"></TD>
	<TD width="33%">Check DoB</TD>
</TR>

<TR>
	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=u name="u" onclick="pic('ui','u');"><INPUT type="hidden" value="0" id="ui" name="a"></TD>
	<TD>Check Date of Accident</TD>

	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c name="c" onclick="pic('ci','c');"><INPUT type="hidden" value="0" id="ci" name="wmr"></TD>
	<TD>Wait for Medical Records</TD>

	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=s1 name="c" onclick="pic('s1i','s1');"><INPUT type="hidden" value="0" id="s1i" name="sraa"></TD>
	<TD>Submit Report w/o Medical Records and an Addendum afterwards</TD>
</TR>

<TR>
	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=s2 name="c" onclick="pic('s2i','s2');"><INPUT type="hidden" value="0" id="s2i" name="srw"></TD>
	<TD>Submit Report w/o Medical Records</TD>

	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c1 name="c" onclick="pic('c1i','c1');"><INPUT type="hidden" value="0" id="c1i" name="cot"></TD>
	<TD>Comment on any Treatment</TD>

	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c2 name="c" onclick="pic('c2i','c2');"><INPUT type="hidden" value="0" id="c2i" name="com"></TD>
	<TD>Comment on any Medication</TD>

</TR>

<TR>
	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c3 name="c" onclick="pic('c3i','c3');"><INPUT type="hidden" value="0" id="c3i" name="copa"></TD>
	<TD>Comment on Effects of Past Accident(s)</TD>

	<TD colspan="4">Other<INPUT type='text' name='othr'></TD>

</tr>

</table>

</DIV>

<DIV style="position:relative; top:-350px;" id="boi">
<TABLE>
<TR>
<TH align=center>Booking Instructions</TH>
</TR>
<tr>
<TD><TEXTAREA name=bi cols=40 rows=10></TEXTAREA></TD>
</TR>
</TABLE>
</DIV>


</DIV>

<br />
<DIV align=center><INPUT type=submit value=Submit></DIV>

<Div class="cas" id=acr style="" align="center">
<TABLE style="background-color:#870524;position:relative;top:50px;">
<TH colspan=2 align='center'>New Clinic</TH>
<TR style="height:0px;">
<TD>Name</TD><TD><INPUT type='text' name='cn1' id="cn1"></TD>
</TR>
<tr>
<TD>Address</TD><TD><INPUT type='text' name='ca'></TD>
</tr>
<tr>
<TD>Post Code</TD><TD><INPUT type='text' name='cpc'></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' name='cc'></TD>
</tr>
<tr align="center"><td colspan="2"><input type="button" value="Add Venue" onclick="addclinic();" /></td></tr>
</TABLE>
</Div>

<DIV align="center" class="cas" id=nage style='visibility : hidden;'>
<TABLE style="background-color:#870524;position:relative;top:50px;">
<TH colspan=2 align='center'>New Agency</TH>
<TR>
<TD>Name</TD><TD><INPUT type='text' name='an'></TD>
</TR>
<tr>
<TD>Address</TD><TD><INPUT type='text' name='aa'></TD>
</tr>
<tr>
<TD>Post Code</TD><TD><INPUT type='text' name='ap'></TD>
</tr>
<tr>
<TD>Email</TD><TD><INPUT type='text' name='ae'></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' name='ac'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT type='text' name='af'></TD>
</tr>
</TABLE>
</DIV>

<Div align="center" class="cas" id=nsol style='visibility : hidden;'>
<TABLE style="background-color:#870524;position:relative;top:50px;">
<TH colspan=2 align='center'>New Solicitor</TH>
<TR>
<TD>Name</TD><TD><INPUT type='text' id="sn" name='sn'></TD>
</TR>
<tr>
<TD>Address</TD><TD><INPUT type='text' name='sa'></TD>
</tr>
<tr>
<TD>Post Code</TD><TD><INPUT type='text' name='sp'></TD>
</tr>
<tr>
<TD>Email</TD><TD><INPUT type='text' name='se'></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' name='sc'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT type='text' name='sf'></TD>
</tr>
<tr><td colspan="2" align="center"><input type="button" value="Add Solicitor"  onclick="addsolic();" /></td></tr>
</TABLE>
</Div>


<table id='calenderTable'>
<tbody id='calenderTableHead'>
<tr>
<td colspan='4' align='left'>
<select onChange="showCalenderBody(createCalender(document.getElementById('selectYear').value, this.selectedIndex, false));" id='selectMonth'>
<option value='0'>January</OPTION>
<option value='1'>February</option>
<option value='2'>March</option>
<option value='3'>April</option>
<option value='4'>May</option>
<option value='5'>June</option>
<option value='6'>July</option>
<option value='7'>August</option>
<option value='8'>September</option>
<option value='9'>October</option>
<option value='10'>November</option>
<option value='11'>December</option>
</SELECT>
</td>
<td colspan='2' align='center'><select onChange="showCalenderBody(createCalender(this.value, document.getElementById('selectMonth').selectedIndex, false));" id='selectYear'></select></td>
<td align='right'><a href='#' onClick='closeCalender();'>X</a></td>
</tr>
</tbody>
<tbody id='calenderTableDays'>
<tr style=''>
<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Thu</td><td>Fr</td><td>Sa</td>
</tr>
</tbody>
<tbody id='calender'></tbody>
</table>

<table height=400px><tr><td></td></tr></table>

</BODY>

</HTML>

<?
}
?>