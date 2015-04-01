<?php
include 'template.php';

head('Details', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>', '', '', 'doeF();');

?>

<BODY background="images/back.png" onLoad="doeF();">


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Details', $org, $id);


$s="select * from claimant where cid=".$id." and org='$org'";
$q=mysql_query($s);
$r=mysql_fetch_array($q);

?>

<FORM action="Process/det2.php" method="POST">

<DIV style="float:left; width:33%;border-style:solid;border-width:2px;border-color:#A61515;">

<TABLE align=center>

<TR>
<TH colspan='2' align='center'>Claimant Details</TH>
</TR>
<TR>
<TD>Title</TD>

<TD><select name=tt>
<option <? if (strcmp($r['ct'],"Mr.")==0) echo "selected='selected'"; ?> value=Mr.>Mr.</option>
<option <? if (strcmp($r['ct'],"Ms.")==0) echo "selected='selected'"; ?> value=Ms.>Ms.</option>
<option <? if (strcmp($r['ct'],"Miss")==0) echo "selected='selected'"; ?> value=Miss>Miss</option>
<option <? if (strcmp($r['ct'],"Mrs.")==0) echo "selected='selected'"; ?> value=Mrs.>Mrs.</option>
<option <? if (strcmp($r['ct'],"Dr.")==0) echo "selected='selected'"; ?> value=Dr.>Dr.</option>
<option <? if (strcmp($r['ct'],"Master")==0) echo "selected='selected'"; ?> value=Master>Master</option>
</select></TD>

</Tr>
<tr>
<TD>First Name</TD>
<TD><INPUT value="<? echo $r['cfn']; ?> " type='text' name='cf'></TD>
</tr>
<tr>
<TD>Last Name</TD>
<TD><INPUT value="<? echo $r['cln']; ?> " type='text' name='cl'></TD>
</TR>
<TR>
<TD>Gender</TD>
<TD><SELECT name="gen"><OPTION <? if (strcmp($r['gen'],'m')==0) echo "selected='selected'"; ?> value="m">Male</OPTION><OPTION <? if (strcmp($r['gen'],'m')!=0) echo "selected='selected'"; ?> value="f">Female</OPTION></SELECT></TD>
</TR>
<tr>
<TD>Date of Birth</TD>
<TD><INPUT value="<? echo date('d-m-Y',strtotime($r['cdb']));?> " size=16px type='text' name=dob id='dob'><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'dob');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('dob').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Accident</TD>
<TD><INPUT value="<? echo date('d-m-Y',strtotime($r['cda'])); ?> " size=16px type='text' name=doa id='doa'><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'doa');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doa').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Examination</TD>
<TD><INPUT value="<? echo date('d-m-Y',strtotime($r['cde']));?> " size=16px type='text' name=doe id='doe'><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'doe');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doe').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Contact-1</TD>
<TD><INPUT value="<? echo $r['cc1']; ?> " type='text' name='cc1'></TD>
</TR>
<tr>
<TD>Contact-2</TD>
<TD><INPUT value="<? echo $r['cc2']; ?> " type='text' name='cc2'></TD>
</TR>
<tr>
<TD>Address Line 1</TD>
<TD><INPUT value="<? echo $r['ca1']; ?> " type='text' name='ca1'></TD>
</TR>
<tr>
<TD>Address Line 2</TD>
<TD><INPUT value="<? echo $r['ca2']; ?> " type='text' name='ca2'></TD>
</TR>
<tr>
<TD>Post Code</TD>
<TD><INPUT value="<? echo $r['cp']; ?> " type='text' name='cp'></TD>
</TR>
<tr>
<TD>Email</TD>
<TD><INPUT value="<? echo $r['ce']; ?> " type='text' name='ce'></TD>
</TR>
</TABLE>

</DIV>


<DIV style="float:left;width:33%;border-style:solid;border-width:2px;border-color:#A61515;">

<TABLE>
<tr>
<TH>Consulting Room</TH>
</tr>
<tr>
<TD>Select Existing/New</TD><td><SELECT onchange='togleac();' name=c id=acm><OPTION value='0' onclick='showccr();'>Current Clinics</OPTION><OPTION onclick='showacr();' value='1'>Add a Clinic</option></select></td>
</tr>
</table>

<div id=ccr style='visibility:visible;'>
<SELECT name='cn2' id=c>

<?
include "dcon.php";

$sag="select * from cclist";
$rag=mysql_query($sag);
while($rocl=mysql_fetch_array($rag))
{
	if ($r['clid']==$rocl['cid'])
		echo "<option selected=true value=".$rocl['cid'].">".$rocl['cn']."</option>";
	else
		echo "<option 	value=".$rocl['cid'].">".$rocl['cn']."</option>";
}
?>

</SELECT>
</div>

<Div id=acr style='visibility : hidden;'>
<TABLE>
<TH colspan=2 align='center'>New Clinic</TH>
<TR>
<TD>Name</TD><TD><INPUT type='text' name='cn1'></TD>
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
</TABLE>
</DIV>

<DIV id="cdets" style="position:relative; top:-110px;">
<DIV id="aa">
<TABLE>
<TR>
<TH colspan='2' align=center>Case Details</TH>
</tr>
<tr>
<TD colspan="2">Agency</TD>
</tr>
<tr>
<TD>Select Existing/New</TD>
<td><SELECT onchange='togleag();' name=age id=agen><OPTION value='0' onclick='showcage();'>Current Agencies</OPTION><OPTION onclick='shownage();' value='1'>Add an Agency</option></select></td>
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
$ra=mysql_query($s);

while ($q=mysql_fetch_array($ra))
{
	if ($r['cage']==$q['aid'])
		echo "<option selected='selected' value=".$q['aid'].">".$q['an']."</option>";
	else
		echo "<option value=".$q['aid'].">".$q['an']."</option>";
}

?>
</SELECT>
</TD>
</tr>
</TABLE>
</DIV>

<DIV id=nage style='visibility : hidden;'>
<TABLE>
<TH colspan=2 align='center'>New Agency</TH>
<TR>
<TD>Name</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='an'></TD>
</TR>
<tr>
<TD>Address</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='aa'></TD>
</tr>
<tr>
<TD>Post Code</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='ap'></TD>
</tr>
<tr>
<TD>Email</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='ae'></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='ac'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='af'></TD>
</tr>
</TABLE>
</DIV>

<DIV style="position:relative;top:-150px;" id="aar" align="center">Agency Reference <INPUT type=text name=aref value="<? echo $r['cageref']; ?> "></DIV>

</DIV>


<DIV style="position:relative;top:-130px;" id="ss">
<table>
<tr>
<TD colspan="2">Solicitor</TD>
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
$rs=mysql_query($s);

while ($q=mysql_fetch_array($rs))
{
	if ($r['csol']==$q['sid'])
		echo "<option selected='selected' value=".$q['sid'].">".$q['sn']."</option>";
	else
		echo "<option value=".$q['sid'].">".$q['sn']."</option>";
}

?>
</SELECT>
</TD>
</tr>
</TABLE>
</DIV>

<Div id=nsol style='visibility : hidden;'>
<TABLE>
<TH colspan=2 align='center'>New Solicitor</TH>
<TR>
<TD>Name</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='sn'></TD>
</TR>
<tr>
<TD>Address</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='sa'></TD>
</tr>
<tr>
<TD>Post Code</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='sp'></TD>
</tr>
<tr>
<TD>Email</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='se'></TD>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='sc'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT value="<? echo $r['']; ?> " type='text' name='sf'></TD>
</tr>
</TABLE>
</TD>
</Div>

<DIV align="center" id="ssr" style="position:relative;top:-160px;">Solicitor Reference <INPUT type=text name=sref value="<? echo $r['csolref']; ?> "></DIV>

</DIV>

</DIV>
</DIV>


<DIV style="float:right;width:32%;border-style:solid;border-width:2px;border-color:#A61515;">

<H4><center>Special Instructions</center></H4>

<?php 

$ssi="select * from soi where cid='$id' and org='".$_SESSION['o']."'";
$qsi=mysql_query($ssi);
while ($rsi=mysql_fetch_array($qsi))
{
	echo "<p style='background-color:#AA5555;'>".$rsi['chk']."</p>";
}

?>
<!--<TABLE width="100%">-->
<!--<TR>-->
<!--<TH colspan='2' align=center>Special Instructions</TH>-->
<!--</tr>-->
<!--<tr>-->
<!--<TD><SELECT onchange='toglesoi();' name=soi id=soi><OPTION value='0' onclick='hidesoi();'>No</OPTION><OPTION onclick='showsoi();' value='1'>Yes</OPTION></SELECT></TD></TR>-->
<!--</TABLE>-->
<!---->
<!--<DIV style='visibility:hidden' id='soid'>-->
<!---->
<!--<table>-->
<!---->
<!--<TR>-->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=p name="p" onclick="pic('pi','p');"><INPUT type="hidden" value="0" id="pi" name="pi"></TD>-->
<!--	<TD>Check ID</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=l name="l" onclick="pic('li','l');"><INPUT type="hidden" value="0" id="li" name="nm"></TD>-->
<!--	<TD>Check Name</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=b name="b" onclick="pic('bi','b');"><INPUT type="hidden" value="0" id="bi" name="b"></TD>-->
<!--	<TD>Check DoB</TD>-->
<!--</TR>-->
<!---->
<!--<TR>-->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=u name="u" onclick="pic('ui','u');"><INPUT type="hidden" value="0" id="ui" name="a"></TD>-->
<!--	<TD>Check Date of Accident</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c name="c" onclick="pic('ci','c');"><INPUT type="hidden" value="0" id="ci" name="wmr"></TD>-->
<!--	<TD>Wait for Medical Records</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=s1 name="c" onclick="pic('s1i','s1');"><INPUT type="hidden" value="0" id="s1i" name="sraa"></TD>-->
<!--	<TD>Submit Report w/o Medical Records and an Addendum afterwards</TD>-->
<!--</TR>-->
<!---->
<!--<TR>-->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=s2 name="c" onclick="pic('s2i','s2');"><INPUT type="hidden" value="0" id="s2i" name="srw"></TD>-->
<!--	<TD>Submit Report w/o Medical Records</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c1 name="c" onclick="pic('c1i','c1');"><INPUT type="hidden" value="0" id="c1i" name="cot"></TD>-->
<!--	<TD>Comment on any Treatment</TD>-->
<!---->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c2 name="c" onclick="pic('c2i','c2');"><INPUT type="hidden" value="0" id="c2i" name="com"></TD>-->
<!--	<TD>Comment on any Medication</TD>-->
<!---->
<!--</TR>-->
<!---->
<!--<TR>-->
<!--	<TD><INPUT style="background-color : #AAAAFF;" type="button" id=c3 name="c" onclick="pic('c3i','c3');"><INPUT type="hidden" value="0" id="c3i" name="copa"></TD>-->
<!--	<TD>Comment on Effects of Past Accident(s)</TD>-->
<!---->
<!--	<TD colspan="4">Other<INPUT type='text' name='othr'></TD>-->
<!---->
<!--</tr>-->
<!---->
<!--</table>-->
<!---->
<!--</DIV>-->
<!---->
<!--</table>-->

<DIV style="position:relative; " id="boi">

<TABLE>
<TR>
<TH>Attended</TH>
</TR>
	<?
	$sac="select * from accomp where cid='$id' and org='".$_SESSION['o']."'";
//	echo $sac;
	$rac=mysql_query($sac);
	$qac=mysql_fetch_array($rac);
	
//	echo "xy=".$qac['accomp'];
//	echo "xyz=".strpos($qac['accomp'],'alone');
	?>
<TR>
<TD><SELECT onchange='togleacm();' name=acm id=acm><OPTION <? if (strpos($qac['accomp'],'alone')>0 || strlen($qac['accomp'])==0){echo "selected='selected'";} ?>  value='0' onclick='hideacm();'>Alone</OPTION><OPTION onclick='showacm();' <? if (strpos($qac['accomp'],'alone')==false && strlen($qac['accomp'])>0){echo "selected='selected'";} ?> value='1'>Accompanied</OPTION></SELECT><br>
</TR>
<tr>
<TD colspan="2">
<div id=acmd <? if (strpos($qac['accomp'],'alone')!=false || strlen($qac['accomp'])==0){echo "style='visibility:hidden;'";} ?> >
First Name<INPUT value="<? echo trim($qac['afn']); ?> " type='text' name='afnm'>
<br>
Last Name<INPUT value="<? echo trim($qac['aln']); ?> " type='text' name='alnm'>
<br>
Relationship<select name='stts'>

<? if (strcmp($r['gen'],'m')==0) { ?>
<OPTION <?php if (strcmp($qac['aby'], 'wife')==0) echo "selected='selected'"; ?> value=wife>Wife</OPTION>
<?php } ?>
<? if (strcmp($r['gen'],'f')==0) { ?>
<OPTION <?php if (strcmp($qac['aby'], 'husband')==0) echo "selected='selected'"; ?> value=husband>Husband</OPTION>
<?php } ?>
<OPTION <?php if (strcmp($qac['aby'], 'civil partner')==0) echo "selected='selected'"; ?> value='civil partner'>Civil Partner</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'partner')==0) echo "selected='selected'"; ?> value=partner>Partner</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'girlfriend')==0) echo "selected='selected'"; ?> value=girlfriend>Girlfriend</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'boyfriend')==0) echo "selected='selected'"; ?> value=boyfriend>Boyfriend</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'daughter')==0) echo "selected='selected'"; ?> value=daughter>Daughter</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'son')==0) echo "selected='selected'"; ?> value=son>Son</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'mother')==0) echo "selected='selected'"; ?> value=mother>Mother</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'father')==0) echo "selected='selected'"; ?> value=father>Father</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'parents')==0) echo "selected='selected'"; ?> value=parents>Parents</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'sister')==0) echo "selected='selected'"; ?> value=sister>Sister</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'brother')==0) echo "selected='selected'"; ?> value=brother>Brother</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'friend')==0) echo "selected='selected'"; ?> value=friend>Friend</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'carer')==0) echo "selected='selected'"; ?> value=carer>Carer</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'interpreter')==0) echo "selected='selected'"; ?> value=interpreter>Interpreter</OPTION>
<OPTION <?php if (strcmp($qac['aby'], 'solicitor')==0) echo "selected='selected'"; ?> value=solicitor>Solicitor</OPTION>
</SELECT>
</div>

</TD>
</TR>
</TABLE>


<TABLE>
<TR>
<TH colspan='2' align=center>Identification</TH>
</tr>
<tr>
<?php
	$sidc="select * from ident where cid='$id' and org='".$_SESSION['o']."'";
	$qidc=mysql_query($sidc);
	
	$idchk=0;
	$idp=0;
	$idl=0;
	$idb=0;
	$idu=0;
	$idbc=0;
	while ($ridc=mysql_fetch_array($qidc))
	{
		$idchk=1;
		
//		echo $ridc;
		
		if (strcmp($ridc['chk'],"	• Passport was checked.")==0)
		{
			$idp=1;
		}
		
		if (strcmp($ridc['chk'],"	• Driving license was checked.")==0)
		{
			$idl=1;
		}
		
		if (strcmp($ridc['chk'],"	• Bank card was checked.")==0)
		{
			$idb=1;
		}
		
		if (strcmp($ridc['chk'],"	• Utility bill was checked.")==0)
		{
			$idu=1;
		}
		
		if (strcmp($ridc['chk'],"	• Birth certificate was checked.")==0)
		{
			$idbc=1;
		}
	}
?>
<TD><SELECT onchange='toglechk();' name=iid id=iid><OPTION <?php if ($idchk==0) echo "selected='selected'"; ?> value='0' onclick='hidechkd();'>Did Not Check</OPTION><OPTION <?php if ($idchk==1) echo "selected='selected'"; ?>  onclick='showchkd();' value='1'>Checked</OPTION></SELECT></TD></TR>

<TD><div id=chkd <?php if ($idchk==0) echo "style='visibility:hidden;'" ?> >

<INPUT <?php if ($idp==0) echo "style='background-color : #AAAAFF;'"; else echo "style='background-color : #0000AA;'";?> type="button" id=pas name="p" onClick="pic('pasi','pas');"><INPUT type="hidden" <?php if ($idp==0) echo "value='0'"; else echo "value='1';"?> id="pasi" name="pasi"> Passport 
<INPUT <?php if ($idl==0) echo "style='background-color : #AAAAFF;'"; else echo "style='background-color : #0000AA;'";?> type="button" id=lic name="l" onClick="pic('lici','lic');"><INPUT type="hidden" <?php if ($idl==0) echo "value='0'"; else echo "value='1';"?> id="lici" name="lici"> Driving license 
<INPUT <?php if ($idb==0) echo "style='background-color : #AAAAFF;'"; else echo "style='background-color : #0000AA;'";?> type="button" id=ban name="b" onClick="pic('bani','ban');"><INPUT type="hidden" <?php if ($idb==0) echo "value='0'"; else echo "value='1';"?> id="bani" name="bani"> Bank Card 
<INPUT <?php if ($idu==0) echo "style='background-color : #AAAAFF;'"; else echo "style='background-color : #0000AA;'";?> type="button" id=uti name="u" onClick="pic('utii','uti');"><INPUT type="hidden" <?php if ($idu==0) echo "value='0'"; else echo "value='1';"?> id="utii" name="utii"> Utility Bill 
<INPUT <?php if ($idbc==0) echo "style='background-color : #AAAAFF;'"; else echo "style='background-color : #0000AA;'";?> type="button" id=bir name="bc" onClick="pic('biri','bir');"><INPUT type="hidden" <?php if ($idbc==0) echo "value='0'"; else echo "value='1';"?> id="biri" name="biri"> Birth Certificate 
<br>Other<INPUT value="none" type='text' name='othri'></div></TD>
</TR>
</TABLE>

<H4><center>Medical Records</center></H4><br />

<?php 

$smed="select * from mreps where id='$id' and org='".$_SESSION['o']."'";
$qmed=mysql_query($smed);
$rmed=mysql_fetch_array($qmed);

$mchk=0;

//echo $rmed['msg'];

if (strcmp($rmed['msg'],"The claimant's medical records were used in compiling this report.")==0)
{
	$mchk=1;
}

?>
<SELECT name="mnote">
<OPTION <?php if ($mchk==1) echo "selected='selected'";?> value="1">Yes</OPTION>
<OPTION <?php if ($mchk==0) echo "selected='selected'";?> value="0">No</OPTION>
</SELECT>

<INPUT type="hidden" value="<?echo $_GET['cid'];?>" name="cid">

</DIV>
</Div>

<DIV align=center><INPUT value="Submit" type=submit value=Submit></DIV>

</FORM>

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
</select>
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

</body>
</HTML>

