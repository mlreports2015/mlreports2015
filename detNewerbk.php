<?php
include 'template.php';

head('Details', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>', '', '', 'doeF();');

include 'template2.php';



$id=$_GET['cid'];



$org=$_SESSION['o'];



bTop('Details', $org, $id);

$_SESSION['chkrer']=1;

include 'dcon.php';

$sC="select * from claimant where cid='".$_GET['cid']."' and  org='$org'";
$qC=mysql_query($sC);
$rC=mysql_fetch_array($qC);

$sV="select * from cclist where cid='".$rC['clid']."'";
$qV=mysql_query($sV);
$rV=mysql_fetch_array($qV);

$sA="select * from agency where aid='".$rC['cage']."'";
$qA=mysql_query($sA);
$rA=mysql_fetch_array($qA);

$sS="select * from solicitor where sid='".$rC['csol']."'";
$qS=mysql_query($sS);
$rS=mysql_fetch_array($qS);

$sqlbookinsts = "select note from specInst where cid='".$rC['cid']."' and org='".$_SESSION['o']."'";
//echo $sqlbookinsts;
$sqlbookinstsRes = mysql_query($sqlbookinsts);
$sqlbookinstsPrint = mysql_fetch_row($sqlbookinstsRes);

$sSoi="select * from soi where cid='".$rC['cid']."'";
//echo $sSoi;
$qSoi=mysql_query($sSoi);
$rSoi=mysql_fetch_array($qSoi);

$ll=explode(',', $rC['ll']);
$lat=$ll[0];
$lon=$ll[1];

?>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAYPZsBf6onOkX7jBPcG-eRhROQGNTnT49rb9sb017ZStsrScfERQHWJxzkUf9l3JYhKJdL6tJzOaFAw" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAAYPZsBf6onOkX7jBPcG-eRhRnht8IOGvMwVnxw4_kzHDrL5ZSYRSJnaKk4HIW9_gzHmwzv4yChHF49g" type="text/javascript"></script>
<script src="gmap2.js" type="text/javascript"></script>



<div style="width:1000px;border-color:#000; border-style:none; border-width:1px; padding-top:11px; padding-left:15px; padding-bottom:0px; height:98%;">
<Form method=POST action='Process/det2Newer.php' id=frm name=frm>

<DIV style="float:left;border-radius:6px;border-style:solid;border-width:2px;border-color:#A61515; width:325px; height:430px; overflow:hidden;margin-right:6px;">

<TABLE align=center style="font-family:Arial, Helvetica, sans-serif">

<TR>
<TH colspan='2' align='center'>Claimant Details</TH>
</TR>
<TR>
<TD>Title</TD>
<TD><select name=tt onChange="if (document.getElementById('tt').value=='Ms.' || document.getElementById('tt').value=='Miss' || document.getElementById('tt').value=='Mrs.'){ document.getElementById('gend').value='f'; }else if (document.getElementById('tt').value=='Master' || document.getElementById('tt').value=='Mr.') { document.getElementById('gend').value='m'; } else {document.getElementById('Dgender').style.visibility='visible';}" id='tt'>
<option <? if (strcmp($rC['ct'],"Mr.")==0) echo "selected='selected'"; ?> value=Mr.>Mr.</option>
<option <? if (strcmp($rC['ct'],"Ms.")==0) echo "selected='selected'"; ?> value=Ms.>Ms.</option>
<option <? if (strcmp($rC['ct'],"Miss")==0) echo "selected='selected'"; ?> value=Miss>Miss</option>
<option <? if (strcmp($rC['ct'],"Mrs.")==0) echo "selected='selected'"; ?> value=Mrs.>Mrs.</option>
<option <? if (strcmp($rC['ct'],"Dr.")==0) echo "selected='selected'"; ?> value=Dr.>Dr.</option>
<option <? if (strcmp($rC['ct'],"Master")==0) echo "selected='selected'"; ?> value=Master>Master</option>
<option <? if (strcmp($rC['ct'],"Rev.")==0) echo "selected='selected'"; ?> value=Master>Rev.</option>
</select></TD>
</Tr>
<tr>
<TD>First Name</TD>
<TD><input type="hidden" value="<?php echo $_GET['cid']; ?>" name="id" /><INPUT type='text' value="<?php echo $rC['cfn']; ?>" name='cf' id="cf"></TD>
</tr>
<tr>
<TD>Last Name</TD>
<TD><INPUT type='text' name='cl' id='cl' value="<?php echo $rC['cln']; ?>"></TD>
</TR>
<tr>
<TD>Date of Birth</TD>
<TD><input size=16px type='text' name=dob id='dob' value="<?php echo date('d-m-Y', strtotime($rC['cdb'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'dob');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('dob').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Accident Date</TD>
<TD><input size=16px type='text' name=doa id='doa' value="<?php echo date('d-m-Y', strtotime($rC['cda'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'doa');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doa').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Exam Date</TD>
<TD><input size=16px type='text'  name=doe id='doe' value="<?php echo date('d-m-Y', strtotime($rC['cde'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'doe');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doe').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<td>Exam Time</td>
<td>
<input type="text" name="tm" id="tm" style="width:90px;" /><input type="button" value="&nbsp;List&nbsp;" onclick="showResultAT(document.getElementById('doe').value);" />
</td>
</tr>
<tr>
<TD>Contact-1</TD>
<TD><INPUT type='text' name='cc1' id="cc1" style="width:90px;" value="<?php echo $rC['cc1']; ?>"><input type="button" value="Text" onclick="texterI(document.getElementById('cc1').value);" /></TD>
</TR>
<tr>
<TD>Contact-2</TD>
<TD><INPUT type='text' name='cc2' id="cc2" style="width:90px;" value="<?php echo $rC['cc2']; ?>"><input type="button" value="Text" onclick="texterI(document.getElementById('cc2').value);" /></TD>
</TR>
<tr>
<TD>Post Code</TD>
<TD><INPUT style="width:90px;" type='text' name='cp' id="cpc" value="<?php echo $rC['cp']; ?>" /><input type="hidden" value="<?php echo $lat;?>" name="lat" id="lat" /><input type="hidden" value="<?php echo $lon;?>" name="long" id="long" /><input type="button" onclick="clearest(); javascript:usePointFromPostcode(document.getElementById('cpc').value, showPointLatLng); addressFind();" value="Find" /></TD>
</TR>
<tr>
<tr>
<TD>Address Line 1</TD>
<TD><INPUT type='text' name='ca1' id="ca1" value="<?php echo $rC['ca1']; ?>"></TD>
</TR>
<tr>
<TD>Address Line 2</TD>
<TD><INPUT type='text' name='cty' id="cty" value="<?php echo $rC['ca2']; ?>"></TD>
</TR>
<TD>Email</TD>
<TD><INPUT type='text' name='ce' value="<?php echo $rC['ce']; ?>"></TD>
</TR>
<TR>
<TD>Appointment State:<br/><input type="text" id="appStat" name="appStat" style="width:70px"/></TD><TD>Attended:<input type="radio" id="appStatchk" name="appStatchk" value="attended" onChange="appChng(this.value)"  />&nbsp;<br/>Did Not Attend:<input type="radio" id="appStatchk" name="appStatchk" value="did not attend" onChange="appChng(this.value);" /></TD>
</TR>
</TABLE>

</DIV>


<div style="float:left; width:325px; border-style:solid;border-width:2px;border-color:#A61515; height:430px; overflow:hidden;border-radius:6px;margin-right:6px;">

<table align="center" style="font-family:Arial, Helvetica, sans-serif">
<tr>
<th colspan="2" align="center">Claimant Measurement Estimates: 
<select id='msreEst' name='msreEst' onChange='msreChnge(this.value)'>
<option value=''>----</option>
<option value='non-metric' <?php if($rC['msreType']=='non-metric'){ echo "selected='selected'"; } ?> >non-metric</option>
<option value='metric' <?php if($rC['msreType']=='metric'){ echo "selected='selected'"; } ?> >metric</option>
</select>
</th>
</tr>
<tr>
<td>Height:</td>
<?php $crheight = explode('.',$rC['height']); ?>
<td style='<?php if($rC['msreType']=='metric' ){echo "display:block;";}else{ echo "display:none"; } ?>' id='tdcms'><input type='text' id='cms' name='cms' value='<?php echo $crheight[0]; ?>' />&nbsp;cm</td>
<td style='<?php if($rC['msreType']=='non-metric'){ echo "display:block;"; }else{ echo "display:none;"; } ?>' id='tdft'><input type='text' id='ft' name='ft' size='4' value='<?php echo $crheight[0]; ?>' /> ft <input type='text' id='inches' name='inches' size='3' value='<?php echo $crheight[1]; ?>' /> inches </td>
</tr>
<tr>
<td>Weight:</td>
<?php $crWeight = explode('.',$rC['weight']); ?>
<td style='<?php if($rC['msreType']=='metric' ){echo "display:block;";}else{ echo "display:none"; } ?>' id='tdkg'><input type='text' id='kilos' name='kilos' value='<?php echo $crWeight[0]; ?>' />&nbsp;kgs</td>
<td style='<?php if($rC['msreType']=='non-metric'){ echo "display:block;"; }else{ echo "display:none;"; } ?>' id='tdstn'><input type='text' id='stne' name='stne' size='4' value='<?php echo $crWeight[0]; ?>' />st<input type='text' id='pnds' name='pnds' size='4' value='<?php echo $crWeight[1]; ?>' />llbs
</tr>
<tr>
<td>Type</td><td><select id="accTyp" name="accTyp"><option value="RTA">RTA</option><option value="RTANON">NON-RTA</option></select>
</tr>
<tr>
<th colspan="2" align="center">Clinic</th>
</tr>
<tr>
<td><input type="button" value="Current Clinics" onclick="ifrmr('Current Clinics', 'clinicUpdate.php');" style="width:120px;" /></td>
<td><input type="button" value="New Clinic" onclick="ifrmr('New Clinic', 'clinicSave.php');" style="width:120px;" /></td>
</tr>
<tr>
<td align="left">Clinic</td>
<td align="left">
<input type="text" value="<?php if (strlen(trim($rC['clid']))==0){ echo 'Type to Search'; } else { echo $rV['cn']; } ?>" name="cN" id="cNameI" onFocus="clearer('cNameI');" onBlur="defaulter('cNameI'); defaulter2('cNameH', 'cNameI');" onKeyUp="showResult1(this.value);" />
<input type="hidden" name="cN2" id="cNameH" value="<?php echo $rC['clid']; ?>" />
<br />
<input type="button" onclick="var val=window.prompt('Enter Distance in Miles From Claimant Address');showResult2(val);" value="Get Clinic List" style="width:120px;" />
</td>
</tr>

<tr>
<th colspan="2" align="center">Agency</th>
</tr>
<tr>
<td><input type="button" value="Current Agency" onclick="ifrmr('Current Agencies', 'agencyUpdate.php');" style="width:120px;" /></td>
<td><input type="button" value="New Agency" onclick="ifrmr('New Agency', 'agencySave.php');" style="width:120px;"  /></td>
</tr>
<tr>
<td align="left">Agency</td>
<td align="left">
<input type="text" value="<?php if (strlen(trim($rC['cage']))==0){ echo 'Type to Search'; } else { echo $rA['an']; } ?>" name="aN" id="aNameI" onFocus="clearer('aNameI');" onBlur="defaulter('aNameI');defaulter2('aNameH','aNameI');" onKeyUp="showResultA(this.value);" />
<input type="hidden" name="aN2" id="aNameH" value="<?php echo $rC['cage']; ?>" />
</td>
</tr>
<tr>
<td>
Agency Ref
</td>
<td>
<input type="text" name="aRef" id="aRef" value="<?php echo $rC['cageref']; ?>" />
</td>
</tr>

<tr>
<th colspan="2" align="center">Solicitor</th>
</tr>
<tr>
<td><input type="button" value="Current Solicitor" onclick="ifrmr('Current Solicitors', 'solicitorUpdate.php');" style="width:120px;" /></td>
<td><input type="button" value="New Solicitor" onclick="ifrmr('New Solicitor', 'solicitorSave.php');" style="width:120px;" /></td>
</tr>
<tr>
<td align="left">Solicitor</td>
<td align="left">
<input type="text" value="<?php if (strlen(trim($rC['csol']))==0){ echo 'Type to Search'; } else { echo $rS['sn']; } ?>" name="sN" id="sNameI" onFocus="clearer('sNameI');" onBlur="defaulter('sNameI');defaulter2('sNameH', 'sNameI');" onKeyUp="showResultS(this.value);" />
<input type="hidden" name="sN2" id="sNameH" value="<?php echo $rC['csol']; ?>" />
</td>
</tr>
<tr>
<td>
Solicitor Ref
</td>
<td>
<input type="text" name="sRef" id="sRef" value="<?php echo $rC['csolref']; ?>" />
</td>
</tr>

</table>

</div>


<div style="float:left; width:325px; border-style:solid;border-width:2px;border-color:#A61515; height:430px; overflow:hidden;border-radius:6px;">

<TABLE style="font-family:Arial, Helvetica, sans-serif">
<TR>
<TH colspan='2' align=center>Special Instructions</TH>
</tr>
<tr>
<TD>
</TD>
</TR>
</TABLE>

<div id="sins" style="max-height:82px; overflow:auto; padding-left:5px; font-family:Arial, Helvetica, sans-serif; color:#A61515; padding-left:15px;" align="left">

<?php echo $rSoi['chk'];?>

</div>



<DIV style="position:relative; height:70px;" id="boi">

<TABLE style="font-size:13px;font-family:Arial, Helvetica, sans-serif;width:98%;">
<TR>
</TR>
	<?
	$sac="select * from omp where cid='".$_GET['cid']."' and org='".$_SESSION['o']."'";
	$rac=mysql_query($sac);
	$qac=mysql_fetch_array($rac);
	
//	echo "xy=".$qac['omp'];
//	echo "xyz=".strpos($qac['omp'],'alone');
	?>
<TR>
<TD><b>Appointment State:&nbsp;</b></TD>
<TD><select id='atten' name='atten' onchange='attendAct(this.value)'><option value=''>...select...</option><option <?php if($rC['attend']==0){ echo "selected='selected'"; } ?> value='0'>did not attend</option><option <?php if($rC['attend']==1){ echo "selected='selected'"; }?> value='1'>attended</option><option value='2'>Cancelled Appointment</option><option value='3'>Appointment Set</option></select>
</TD>
</TR>
<TR>
<TD><b>Accompany:</b>&nbsp;</TD><TD><SELECT onchange='togleacm();' name=acm id=acm><OPTION value=''>...select....</OPTION><OPTION <? if (strcmp($qac['aby'],'')==0){echo "selected='selected'";} ?>  value='0' onclick='hideacm();'>Alone</OPTION><OPTION onclick='showacm();' <? if (strcmp($qac['aby'],'')!=0){echo "selected='selected'";} ?> value='1'>Accompanied</OPTION></SELECT><br>
</TD>
</TR>
</TABLE>
</DIV>

<div style="background-color:#FFF; border-style:inset; border-color:#CCC; box-shadow:3px 5px 5px #555;border-width:1px; visibility:hidden; overflow:visible; z-index:22; position:absolute; top:1px;margin-left:-22px; height:55px;width:370px;border-radius:6px;padding:0px;margin:0px;padding-bottom:5px;" id=acmd <? if (strpos($qac['omp'],'alone')!=false || strlen($qac['omp'])==0){echo "style='visibility:hidden;'";} ?> >
<div style="background-color:#77a9c9;padding:0px;margin:0px;width:100%;height:35px;border-radius:6px 6px 0px 0px;font-weight:bold;font-family:Verdana, Geneva, sans-serif;">Accompanying Details</div>
<table cellpadding='5px' style="font-family:Arial, Helvetica, sans-serif;">
<tr>
<td>
First Name</td><td><INPUT value="<? echo trim($qac['afn']); ?> " type='text' name='afnm' style="padding:4px;height:25px;"></td>
</tr>
<tr>
<td>
Last Name</td><td><INPUT value="<? echo trim($qac['aln']); ?> " type='text' name='alnm' style="padding:4px;height:25px;"></td>
</tr>
<tr>
<td>
Relationship</td><td><select name='stts'>

<? if (strcmp($rC['gen'],'m')==0) { ?>
<OPTION <?php if (strcmp($qac['aby'], 'wife')==0) echo "selected='selected'"; ?> value=wife>Wife</OPTION>
<?php } ?>
<? if (strcmp($rC['gen'],'f')==0) { ?>
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
</td>
</tr>
</table>
&nbsp;
<br />
<center><input type="button" value="Done" onclick="hideacm();" /><input type="button" value="Close" onClick="hideacm();" /></center>
</div>




<div>
<TABLE style="font-family:Arial, Helvetica, sans-serif;width:99%;">
<TR>
<TD colspan='1' align='left' style="font-size:13px;"><b>Identification:</b></TD>

<?php
	$sidc="select * from ident where cid='".$_GET['cid']."' and org='".$_SESSION['o']."'";
	$qidc=mysql_query($sidc);
	
	$idchk=0;
	$idp=0;
	$idl=0;
	$idb=0;
	$idu=0;
	$idbc=0;
	$identNo=0;
	
	while ($ridc=mysql_fetch_array($qidc))
	{
		$idchk=1;
		
//		echo $ridc;
		
		if (strpos($ridc['chk'],"Passport")!==false)
		{
			$idp=1;
			$identNo = $ridc['identNo'];
		}
		
		if (strpos($ridc['chk'],"License")!==false)
		{
			$idl=1;
			$identNo = $ridc['identNo'];
		}
		
		if (strpos($ridc['chk'],"Bank")!==false)
		{
			$idb=1;
		}
		
		if (strpos($ridc['chk'],"Utility")!==false)
		{
			$idu=1;
		}
		
		if (strpos($ridc['chk'],"Birth")!==false)
		{
			$idbc=1;
		}
	}
?>
<TD colspan='1' align="left"><SELECT onchange='toglechk();' name=iid id=iid><OPTION <?php if ($idchk==0) echo "selected='selected'"; ?> value='0' onclick='hidechkd();'>Did Not Check</OPTION><OPTION <?php if ($idchk==1) echo "selected='selected'"; ?>  onclick='showchkd();' value='1'>Checked Photo ID</OPTION><OPTION <?php if ($idchk==2) echo "selected='selected'"; ?>  onclick='showchkd2();' value='2'>Checked ID</OPTION></SELECT></TD></TR>

<TD colspan='2'>
<div id=chkd style='<?php if ($idchk==0) echo "visibility:hidden;" ?>border-bottom:solid 1px #900;'  >
<b>Photographic Identification</b>
<table>
<tr>
<td>
<INPUT <?php if ($idp==0) echo "style='background-color : #A61515;'"; else echo "checked='checked'";?> type="checkbox" id=pas name="p" onClick="addCIdNo('passport');pic('pasi','pas');"><INPUT type="hidden" <?php if ($idp==0) echo "value='0'"; else echo "value='1';"?> id="pasi" name="pasi"> Passport 
</td>
<td>
<INPUT <?php if ($idl==0) echo "style='background-color : #A61515;'"; else echo "checked='checked'";?> type="checkbox" id=lic name="l" onClick="addCIdNo('Dlicense');pic('lici','lic');"><INPUT type="hidden" <?php if ($idl==0) echo "value='0'"; else echo "value='1';"?> id="lici" name="lici"> Driving license 
</td>
</tr>
<tr>
<td>
<INPUT <?php if ($idb==0) echo "style='background-color : #A61515;'"; else echo "checked='checked'";?> type="checkbox" id=ban name="b" onClick="pic('resPer','resPer');"><INPUT type="hidden" <?php if ($idb==0) echo "value='0'"; else echo "value='1';"?> id="resPer" name="resPer">Residence Permit 
</td>
</tr>
</table>
</div>

<div id="chkd2" style='<?php if ($idchk==2) echo "visibility:visible"; else echo "visibility:hidden"; ?>;border-bottom:solid 1px #900;'>
<b>Non-photographic Identification</b>
<table>
<tr>
<td>
<INPUT <?php if ($idu==0) echo "style='background-color : #A61515;'"; else echo "checked='checked'";?> type="checkbox" id=uti name="u" onClick="pic('utii','uti');"><INPUT type="hidden" <?php if ($idu==0) echo "value='0'"; else echo "value='1';"?> id="utii" name="utii"> Utility Bill 
</td>
</tr>
<tr>
<td>
<INPUT <?php if ($idbc==0) echo "style='background-color : #A61515;'"; else echo "checked='checked'";?> type="checkbox" id=bir name="bc" onClick="pic('biri','bir');"><INPUT type="hidden" <?php if ($idbc==0) echo "value='0'"; else echo "value='1';"?> id="biri" name="biri"> Birth Certificate 
</td>
<td>
Other<INPUT type="checkbox" id='othID' name="othID" onClick="document.getElementById('othri').style.visibility='visible'"><INPUT type='text' id='othri' name='othri' style="visibility:hidden;border-radius:6px;">
</td>
</tr>
<tr>
<td><div id="idNo" name="idNo"><?php if($idl=='1'){ echo "License No: ".$identNo; } if($idp!='0') { echo "Passport No: ".$identNo; } ?></div></td>
</tr>

</table>

</div>
</TD>
</TR>
</TABLE>
</div>

<textarea name="soiT" id="soiT" style="visibility:hidden;"></textarea>







</div>
<br/>
<input type="button" value="Save Case" onclick="submitter();" />

</div>

</DIV>


<!-- Clinic, Agency, Solicitor -->

<Div id="acr" style='visibility : hidden; position:absolute; width:100%;height:99%;left:0px;top:250px; padding-top:55px; background-image:url(images/bgAP.png);' align="center">

<table width="750px" border="0" style="font-family:Arial, Helvetica, sans-serif; padding:0px;background-repeat:no-repeat;background-color:#FFF;border-radius:6px;box-shadow:2px 5px 4px #e5e5e5;">

<tr style="color:#FFF; font-size:11px;background-color:#77a9c9;border:1px solid #77a9c9;width:100%;padding:0px;border-radius:6px;" height="33px;border:1px solid #CCC;">
<td colspan="6">
<span id="titleD" style="padding-left:10px;width:300px;font-family:Verdana, Geneva, sans-serif;font-size:16px;"></span>
<a onclick="document.getElementById('acr').style.visibility='hidden';" style="float:right;cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>

<tr>
<td align="center" colspan="6" style="overflow:hidden"><iframe id="ifrme" frameborder="0" allowtransparency="true" src="blank.php" style="opacity:0.8; filter:alpha(opacity=80);overflow:hidden;height:370px;" scrolling="no" ></iframe></td>
</tr>

</table>

</DIV>

<!-- Emailing -->
<Div id='emailin' name='emailin' style='visibility : hidden; position:absolute; width:100%; height:100%; top:360px; left:0px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

<table width="750" background="images/bgTAP02.png" style="height:100%;font-family:Arial, Helvetica, sans-serif; padding-left:10px;background-repeat:no-repeat;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
<span id="titleT"></span>
</td>
<td align="right">

<a onclick="document.getElementById('emailin').style.visibility='hidden';" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>
<tr>
<td colspan="6">
<iframe id='mailfrm' name='mailfrm'  src="compose.php"  frameborder='0' style='height:450px;' ></iframe>
</td>
</tr>
<tr>
<td align="center" colspan="6">
	<span id="tInner"></span><br />
	<span style="color:#900" id="tInner2"></span><br />
    <input type="button" value="Close" onclick="document.getElementById('emailin').style.visibility='hidden';" />
</td>
</tr>
</table>

</DIV>

<!-- texting -->

<Div id='texting' style='visibility : hidden; position:absolute; width:100%; height:100%; top:360px; left:0px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

<table width="340" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
<span id="titleT"></span>
</td>
<td align="right">

<a onclick="document.getElementById('texting').style.visibility='hidden';" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>
<tr>
<td align="center" colspan="6">
	<span id="tInner"></span><br />
	<span style="color:#900" id="tInner2"></span>
    <iframe id='textfrm' name='textfrm'  src='' frameborder='0' height='100px' width='290px'></iframe>
    <br />
    <input type="button" value="Close" onclick="document.getElementById('texting').style.visibility='hidden';" />
</td>
</tr>

</table>

</DIV>


<!-- Special Instructions -->

<DIV style='visibility:hidden; width:100%; height:100%; position:absolute; top:360px; left:0px; padding-top:50px; background-image:url(images/bgAP.png);' align="center" id='soid'>
<table width="800" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
Special Instructions
</td>
<td align="right">

<a onclick="document.getElementById('soid').style.visibility='hidden'; chkSoId();" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>

<TR>
	<TD width="3%"><INPUT style="background-color : #A61515;" type="button" id=p name="p" onClick="pic('pi','p');"><INPUT type="hidden" value="0" id="pi" name="pi"></TD>
	<TD width="30%">Check ID</TD>

	<TD width="3%"><INPUT style="background-color : #A61515;" type="button" id='lk' name="lk" onClick="pic('lik','lk');"><INPUT type="hidden" value="0" id="lik" name="nm"></TD>
	<TD width="30%">Check Name</TD>

	<TD width="3%"><INPUT style="background-color : #A61515;" type="button" id=b name="b" onClick="pic('bi','b');"><INPUT type="hidden" value="0" id="bi" name="b"></TD>
	<TD width="33%">Check DoB</TD>
</TR>

<TR>
	<TD><INPUT style="background-color : #A61515;" type="button" id=u name="u" onClick="pic('ui','u');"><INPUT type="hidden" value="0" id="ui" name="a"></TD>
	<TD>Check Date of ident</TD>

	<TD><INPUT style="background-color : #A61515;" type="button" id=c name="c" onClick="pic('ci','c');"><INPUT type="hidden" value="0" id="ci" name="wmr"></TD>
	<TD>Wait for Medical Records</TD>

	<TD><INPUT style="background-color : #A61515;" type="button" id=s1 name="c" onClick="pic('s1i','s1');"><INPUT type="hidden" value="0" id="s1i" name="sraa"></TD>
	<TD>Submit Report w/o Medical Records and an Addendum afterwards</TD>
</TR>

<TR>
	<TD><INPUT style="background-color : #A61515;" type="button" id=s2 name="c" onClick="pic('s2i','s2');"><INPUT type="hidden" value="0" id="s2i" name="srw"></TD>
	<TD>Submit Report w/o Medical Records</TD>

	<TD><INPUT style="background-color : #A61515;" type="button" id=c1 name="c" onClick="pic('c1i','c1');"><INPUT type="hidden" value="0" id="c1i" name="cot"></TD>
	<TD>Comment on any Treatment</TD>

	<TD><INPUT style="background-color : #A61515;" type="button" id=c2 name="c" onClick="pic('c2i','c2');"><INPUT type="hidden" value="0" id="c2i" name="com"></TD>
	<TD>Comment on any Medication</TD>

</TR>

<TR>
	<TD><INPUT style="background-color : #A61515;" type="button" id=c3 name="c" onClick="pic('c3i','c3');"><INPUT type="hidden" value="0" id="c3i" name="copa"></TD>
	<TD>Comment on Effects of Past cdent(s)</TD>

	<TD colspan="2">Other<INPUT type='text' id="othr" name='othr'></TD>
    
    <td colspan="2"><INPUT type='button' id="sbm" value="Save" onclick="svSoId();"></TD>

</tr>

</table>

</DIV>

<div align="right" style="visibility:hidden; position:absolute; top:250px; z-index:1000; width:500px; border-radius:6px;box-shadow:3px 3px 3px #CCC; background-color:#FFF; height:230px;" id="livesearch2">
<div id="ls2I" style="height:190px; width:490px; overflow:auto; padding:2px 6px;">
</div>
<div id="ls2B" align="center">
<input type="button" value="Close" onclick="document.getElementById('livesearch2').style.visibility='hidden';" />
</div>
</div>


<Div id='Dgender' style='visibility : hidden; position:absolute; width:100%; height:100%; top:360px; left:0px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

<table width="750" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
<span id="titleG">Gender</span>
</td>
<td align="right">

<a onclick="document.getElementById('Dgender').style.visibility='hidden';" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>

<tr>
<td align="center" colspan="6">
	<span id="DInner">Gender</span><br />
	<span style="color:#900" id="DInner2"><SELECT name="gen" id="gend"><OPTION <? if (strcmp($rC['gen'],'m')==0) echo "selected='selected'"; ?> value="m">Male</OPTION><OPTION <? if (strcmp($rC['gen'],'m')!=0) echo "selected='selected'"; ?> value="f">Female</OPTION></SELECT></span><br />
    <input type="button" value="Close" onclick="document.getElementById('Dgender').style.visibility='hidden';" />
</td>
</tr>

</table>

</DIV>


</Form>

</div>
<script src="cas.js" type="text/javascript" language="javascript"></script>
<script src="cas2.js" type="text/javascript" language="javascript"></script>
<script src="casAddress.js" type="text/javascript" language="javascript"></script>
<script src="cas3.js" type="text/javascript" language="javascript"></script>
<script src="cas4.js" type="text/javascript" language="javascript"></script>
<script src="texter.js" type="text/javascript" language="javascript"></script>
<script src="booker.js" type="text/javascript" language="javascript"></script>
<script src="aTime.js" type="text/javascript" language="javascript"></script>

<script type="text/javascript" language="javascript">

function clearer(id)
{
	if (id=='cNameI')
	{
		if (document.getElementById(id).value=='Type to Search')
		{
			document.getElementById(id).value='';
		}
	}
	else
	{
		if (document.getElementById(id).value=='Type to Search')
		{
			document.getElementById(id).value='';
		}
	}
}

function addCIdNo(nam)
{
  document.getElementById('idNo').style.visibility='visible';
  if(nam=='passport'){
	   if(document.getElementById('pas').checked){
  			document.getElementById('idNo').innerHTML='Passport No: <input type="text" id="txtid" name="txtid"/>';
	   }else{
			document.getElementById('idNo').innerHTML='';   
	   }
	   
	   
  }else if(nam=='Dlicense'){
  document.getElementById('idNo').innerHTML='License No: <input type="text" id="txtid" name="txtid" />';
  }	
}

function defaulter2(id1, id2)
{
	if (document.getElementById(id1).value=='')
	{
		document.getElementById(id2).value='';
		defaulter(id2);
	}
}

function defaulter(id)
{
	if (document.getElementById(id).value=='')
	{
		if (id=='cNameI')
		{
			document.getElementById(id).value='Type to Search';
		}
		else
		{
			document.getElementById(id).value='Type to Search';
		}
	}
}


function addressFind()
{
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		showResult4(document.getElementById('lat').value+','+document.getElementById('long').value);
	}
	else
	{
		setTimeout('addressFind()', 500);
	}
}

function chkSoId()
{
	var chkSoV=0;

	if (document.getElementById('pi').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('bi').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('lik').value=='1')
	{
		chkSoV=1;
	}
	
	
	if (document.getElementById('ui').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('ci').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('s1i').value=='1')
	{
		chkSoV=1;
	}
	
	
	if (document.getElementById('s2i').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('c1i').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('c2i').value=='1')
	{
		chkSoV=1;
	}
	
	
	if (document.getElementById('c3i').value=='1')
	{
		chkSoV=1;
	}
	
	if (document.getElementById('othr').value!='')
	{
		chkSoV=1;
	}
	
	if (chkSoV==0)
	{
		document.getElementById('son').selected=true;
	}
	else
	{
		document.getElementById('soy').selected=true;
	}
}

function svSoId()
{
	document.getElementById('sins').innerHTML='';
	
	if (document.getElementById('pi').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'* Check ID';
	}
	
	if (document.getElementById('bi').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Check Name';
	}
	
	if (document.getElementById('lik').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Check DoB';
	}
	
	
	if (document.getElementById('ui').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Check Date of ident';
	}
	
	if (document.getElementById('ci').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Wait for Medical Records';
	}
	
	if (document.getElementById('s1i').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Submit Report w/o Medical Records with an Addendum afterwards';
	}
	
	
	if (document.getElementById('s2i').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Submit Report w/o Medical Records';
	}
	
	if (document.getElementById('c1i').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Comment on Treatment';
	}
	
	if (document.getElementById('c2i').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Comment on Medication';
	}
	
	
	if (document.getElementById('c3i').value=='1')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Comments on Past idents';
	}
	
	if (document.getElementById('othr').value!='')
	{
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+document.getElementById('othr').value;
	}
	
	document.getElementById('soid').style.visibility='hidden';
	
	chkSoId();
}


function clearest()
{
	document.getElementById('livesearch').innerHTML='';
	
	document.getElementById('lat').value='';
	document.getElementById('long').value='';
	
	document.getElementById('ca1').value='';
	document.getElementById('cty').value='';
}


function chkClear()
{
	if (document.getElementById('soi').value=='0')
	{
		if (confirm('You Would Loose All Special Instructions, Continue?'))
		{
			document.getElementById('pi').value='0';
			document.getElementById('bi').value='0';
			document.getElementById('lik').value='0';
			document.getElementById('ui').value='0';
			document.getElementById('ci').value='0';
			document.getElementById('s1i').value='0';
			document.getElementById('s2i').value='0';
			document.getElementById('c1i').value='0';
			document.getElementById('c2i').value='0';
			document.getElementById('c3i').value='0';
			document.getElementById('othr').value='';
			
			document.getElementById('p').style.backgroundColor='#A61515';
			document.getElementById('b').style.backgroundColor='#A61515';
			document.getElementById('lk').style.backgroundColor='#A61515';
			document.getElementById('u').style.backgroundColor='#A61515';
			document.getElementById('c').style.backgroundColor='#A61515';
			document.getElementById('s1').style.backgroundColor='#A61515';
			document.getElementById('s2').style.backgroundColor='#A61515';
			document.getElementById('c1').style.backgroundColor='#A61515';
			document.getElementById('c2').style.backgroundColor='#A61515';
			document.getElementById('c3').style.backgroundColor='#A61515';
			
			document.getElementById('sins').innerHTML='';
		}
		else
		{
			document.getElementById('soy').selected=true;
		}
	}
}


function placer(nm, id)
{
	document.getElementById('cNameI').value=nm;
	document.getElementById('cNameH').value=id;
	
	document.getElementById('livesearch2').style.visibility='hidden';
}


function placerA(nm, id)
{
	document.getElementById('aNameI').value=nm;
	document.getElementById('aNameH').value=id;
	
	document.getElementById('livesearch2').style.visibility='hidden';
}


function placerS(nm, id)
{
	document.getElementById('sNameI').value=nm;
	document.getElementById('sNameH').value=id;
	
	document.getElementById('livesearch2').style.visibility='hidden';
}


function attendAct(att)
{
	alert(att);
	
	if(att=='0'){
	   document.getElementById('acm').disabled=true;	
	   if(confirm('do you wish to send a dna notification')){
		   //add iframe emailer frame for sending email notifications/notices to agencies 
		   document.getElementById('mailfrm').src="compose.php?typ=DNA&mlr=<?php echo $_GET['cid']; ?>";
		   document.getElementById('emailin').style.visibility='visible';
		   
		   
	   }
	}else if(att=='1'){
		 document.getElementById('acm').disabled=true;	
	   if(confirm('do you wish to send an attendance notifcation')){
		   //add iframe emailer frame for sending email notifications/notices to agencies 
		   document.getElementById('mailfrm').src="compose.php?typ=attend&mlr=<?php echo $_GET['cid']; ?>";
		   document.getElementById('emailin').style.visibility='visible';
		   
		   
	   }
		
		
	   
	}else if(att=='2'){
		   document.getElementById('acm').disabled=true;	
	   if(confirm('do you wish to send a cancellation message')){
		   //add iframe emailer frame for sending email notifications/notices to agencies 
		   document.getElementById('mailfrm').src="compose.php?typ=cancel&mlr=<?php echo $_GET['cid']; ?>";
		   document.getElementById('emailin').style.visibility='visible';
		   
		   
	   }
		
	}else{
		document.getElementById('acm').disabled=false;	
	}
	
}

function closerLS2()
{
	document.getElementById('livesearch2').style.visibility='hidden';
}


function ifrmr(ttl, pg)
{
	document.getElementById('titleD').innerHTML=ttl;
	document.getElementById('ifrme').src=pg+'?org=<?php echo $_SESSION['o'];?>&lnm=<?php echo $_SESSION['n'];?>';
	//identify the current scroll bar top position
	var scrollTp = document.body.scrollTop;
	document.getElementById('acr').style.top=scrollTp +"px";
	document.getElementById('acr').style.visibility='visible';
}


function ifrmrClose()
{
	document.getElementById('acr').style.visibility='hidden';
}

function appChng(){

     if(document.getElementsByName("appStatchk").item(0).checked){
		
		if(confirm("do you wish to send notification of attendance")){
		
		document.getElementById('appStat').value="Attended";
				   }
		
	 }else if(document.getElementsByName("appStatchk").item(1).checked){
		 
		 document.getElementById('appStat').value="Did Not Attend";
	 }
	
}
	


function texterI(arg)
{
	var E=0;
	var D='';
	var argC=arg.replace(' ', '');
	
	argDoe=document.getElementById('doe').value;
	argTme = document.getElementById('tm').value;
	argCellNo = argC;
	
	if (argC.length<=10)
	{
		E=1;
		D='Phone Number is Missing';
	}
	
	argC=document.getElementById('doe').value.replace(' ','');
	if (argC.length==0)
	{
		E=1;
		D=D+'<br>Date of Examination is Missing';
	}
	
	argC=document.getElementById('tm').value.replace(' ','');
	if (argC.length==0)
	{
		E=1;
		D=D+'<br>Time of Examination is Missing';
	}

	if (document.getElementById('cNameI').value!='Type to Search')
	{
		argC=document.getElementById('cNameI').value.replace(' ','');
		if (argC.length==0)
		{
			E=1;
			D=D+'<br>Clinic has not been selected';
		}
	}
	else
	{
		E=1;
		D=D+'<br>Clinic has not been selected';
	}
	
	if (document.getElementById('aNameI').value!='Type to Search')
	{
		argC=document.getElementById('aNameI').value.replace(' ','');
		if (argC.length==0)
		{
			E=1;
			D=D+'<br>Agency has not been selected';
		}
	}
	else
	{
		E=1;
		D=D+'<br>Agency has not been selected';
	}
	
	if (E==0)
	{
		document.getElementById('tInner').innerHTML='Texting...';
		//document.getElementById('tInner2').innerHTML='(This is not a delivery report)';
		document.getElementById('textfrm').src='texter.php?dt='+argDoe+'&tm='+argTme+'&nums='+argCellNo;		
		
		
		//create a texter mechanism to send actual sms message from the current system (sms message for informing clients of their appointments)
		document.getElementById('texting').style.visibility='visible';
		//texter(arg);
	}
	else
	{
		document.getElementById('tInner').innerHTML='Please Fix The Following Errors To Send A Text';
		document.getElementById('tInner2').innerHTML=D;
		document.getElementById('texting').style.visibility='visible';
	}
}

function msreChnge(vle){

	if(vle=='non-metric'){
		
		document.getElementById('tdft').style.display='block';
		document.getElementById('tdstn').style.display='block';
		
		document.getElementById('tdcms').style.display='none';
		document.getElementById('tdkg').style.display='none';
		
	}else if(vle=='metric'){
		
		document.getElementById('tdcms').style.display="block";
		document.getElementById('tdkg').style.display="block";
		
		document.getElementById('tdft').style.display="none";
		document.getElementById('tdstn').style.display="none";

		
	}

}


function submitter()
{
	//document.frm.submit();
	
	var n1=document.getElementById('cf').value.replace(' ', '');
	var n2=document.getElementById('cl').value.replace(' ', '');
	
	var aref=document.getElementById('aRef').value.replace(' ', '');
	var sref=document.getElementById('sRef').value.replace(' ', '');
	
	var E1=1;
	var E2=1;
	
//	alert('1');
	
	if (n1.length>0 && n2.length>0)
	{
		E1=0;
	}
	
	if (aref.length>0 || sref.length>0)
	{
		E2=0;
	}
	
	//alert('2');
	
	if (E1==0 || E2==0)
	{
		//alert('2.5');
		//alert(document.getElementById('soiT').innerHTML);
		//alert(document.getElementById('sins').innerHTML);
//		document.getElementById('soiT').innerHTML=document.getElementById('sins').innerHTML;
		
		//alert('3');
		
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
		//alert('4');
		
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
		//alert('5');

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
		//alert('6');
		
		document.frm.submit();
	}
	else
	{
		document.getElementById('texting').style.visibility='visible';
		document.getElementById('tInner').innerHTML='No Identifiers For This Case Entered';
		document.getElementById('tInner2').innerHTML="Enter atleast one of the following <br><div style='width:60%;' align='left'><ul align='left'><li>Client's first and last name.</li><li>Solicitor's Referrance</li><li>Agent's Referrance</li></ul></div>";
		//alert('7');
	}
}


</script>


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

</body>
</html>