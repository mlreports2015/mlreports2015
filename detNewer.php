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



<div style="width:102%;border-color:#000;background-color:#FFF; border-style:none; border-width:1px; padding-top:11px; padding-left:15px; padding-bottom:0px; height:100%;" align="center">





<Form method=POST action='Process/det2Newer.php' id=frm name=frm>
<div style="width:88%;padding-top:11px; height:420px; padding-bottom:0px;" align="center">

<DIV style="border-radius:6px;border-style:solid;border-width:2px;border-color:#A61515; width:88%; height:330px; overflow:hidden;margin-right:6px;">

<TABLE align=center style="font-family:Arial, Helvetica, sans-serif" cellpadding="10px" cellspacing="5px">

<TR>
<TH colspan='7' align='center' style="height:25px;text-align:center;" >Claimant Details</TH>
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

<TD>First Name</TD>
<TD><input type="hidden" value="<?php echo $_GET['cid']; ?>" name="id" /><INPUT type='text' value="<?php echo $rC['cfn']; ?>" class="form-control" name='cf' id="cf"></TD>

<TD>Last Name</TD>
<TD><INPUT type='text' name='cl' id='cl' value="<?php echo $rC['cln']; ?>" class="form-control" ></TD>
</TR>
<tr>
<TD>Date of Birth</TD>
<TD><input size=16px type='text' name=dob id='dob' style="float:left;width:110px;" class="form-control" value="<?php echo date('d-m-Y', strtotime($rC['cdb'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'dob');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('dob').value='';"><img src='images/clear.png' border=0></a></TD>

<TD>Accident Date</TD>
<TD colspan='3'><input size=16px type='text' name=doa id='doa' style="float:left;width:110px;" class="form-control" value="<?php echo date('d-m-Y', strtotime($rC['cda'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'doa');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doa').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Exam Date</TD>
<TD colspan='2'><input size=16px type='text'  name=doe id='doe' class="form-control" style="float:left;width:110px;" value="<?php echo date('d-m-Y', strtotime($rC['cde'])); ?>"><a href='#' onClick="setYears(1900, 2015); showCalender(this, 'doe');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doe').value='';"><img src='images/clear.png' border=0></a></TD>
<td>Exam Time</td>
<td>
<input type="text" name="tm" id="tm" style="width:110px;float:left;" class="form-control"  ></input><input type="button" value="List" onclick="showResultAT(document.getElementById('doe').value);" class="btn btn-info" style="height:32px;float:inherit;"/>
</td>
</tr>
<tr>
<TD>Contact-1</TD>
<TD><INPUT type='text' name='cc1' id="cc1" style="width:120px;float:left" class="form-control" value="<?php echo $rC['cc1']; ?>"><input type="button" value="Text" class="btn btn-info" style="float:inherit;height:32px;" onclick="texterI(document.getElementById('cc1').value);" /></TD>
<TD>Contact-2</TD>
<TD><INPUT type='text' name='cc2' id="cc2" style="width:120px;float:left;" class="form-control"  value="<?php echo $rC['cc2']; ?>"><input type="button" value="Text" onclick="texterI(document.getElementById('cc2').value);" class="btn btn-info" style="float:inherit;height:32px;"  /></TD>
<TD>Email</TD>
<TD><INPUT type='text' name='ce' class="form-control" value="<?php echo $rC['ce']; ?>"></TD>
</TR>

<tr>
<tr>
<TD>Address Line 1</TD>
<TD><INPUT type='text' name='ca1' id="ca1" class="form-control" value="<?php echo $rC['ca1']; ?>"></TD>
</TR>
<tr>
<TD>Address Line 2</TD>
<TD><INPUT type='text' name='cty' id="cty" class="form-control" value="<?php echo $rC['ca2']; ?>"></TD>
</TR>

<TR>
<TD>Post Code</TD>
<TD><INPUT style="width:100px;" type='text' name='cp' id="cpc" value="<?php echo $rC['cp']; ?>" class="form-control" /><input type="hidden" value="<?php echo $lat;?>" name="lat" id="lat" /><input type="hidden" value="<?php echo $lon;?>" name="long" id="long" /></TD>
</TR>
<TR>
<TD>Appointment State:</TD><TD><input type="hidden" id="appStat" name="appStat" style="width:70px"/></TD><TD>&nbsp; Attended:<input type="radio" id="appStatchk" name="appStatchk" value="attended" onChange="appChng(this.value)"  />&nbsp;</TD><TD>Did Not Attend:<input type="radio" id="appStatchk" name="appStatchk" value="did not attend" onChange="appChng(this.value);" /></TD>
</TR>
</TABLE>

</DIV>

<div style="width:88%;padding-top:11px; height:530px; padding-bottom:0px;" align="center">

<div style="float:left; width:50%; border-style:solid;border-width:2px;border-color:#A61515; height:530px; overflow:hidden;border-radius:6px;margin-right:6px;">

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
<input type="text" value="<?php if (strlen(trim($rC['clid']))==0){ echo 'Type to Search'; } else { echo $rV['cn']; } ?>" class="form-control" name="cN" id="cNameI" onFocus="clearer('cNameI');" onBlur="defaulter('cNameI'); defaulter2('cNameH', 'cNameI');" onKeyUp="showResult1(this.value);" />
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
<input type="text" value="<?php if (strlen(trim($rC['cage']))==0){ echo 'Type to Search'; } else { echo $rA['an']; } ?>" class="form-control" name="aN" id="aNameI" onFocus="clearer('aNameI');" onBlur="defaulter('aNameI');defaulter2('aNameH','aNameI');" onKeyUp="showResultA(this.value);" />
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
<td><input type="button" value="Current Solicitor" onclick="ifrmr('Current Solicitors', 'solicitorUpdate.php');" class="form-control" style="width:120px;" /></td>
<td><input type="button" value="New Solicitor" onclick="ifrmr('New Solicitor', 'solicitorSave.php');" style="width:120px;" /></td>
</tr>
<tr>
<td align="left">Solicitor</td>
<td align="left">
<input type="text" value="<?php if (strlen(trim($rC['csol']))==0){ echo 'Type to Search'; } else { echo $rS['sn']; } ?>" class="form-control" name="sN" id="sNameI" onFocus="clearer('sNameI');" onBlur="defaulter('sNameI');defaulter2('sNameH', 'sNameI');" onKeyUp="showResultS(this.value);" />
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


<div style="float:left; width:48%; border-style:solid;border-width:2px;border-color:#A61515; height:530px; overflow:hidden;border-radius:6px;">

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

<textarea name="soiT" id="soiT" style="visibility:hidden;width:78%;border-radius:7px;" class='form-control' rows="6"></textarea>


</div>

</div>

</div>

<br/>

<div style='width:98%;' align='center'><br/><br/>
<input type="button" value="Save Case" class="btn btn-success" onclick="submitter();" style="margin-top:5px;width:30%;height:32px;float:inherit;"/>
</div>

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


</body>
</html>