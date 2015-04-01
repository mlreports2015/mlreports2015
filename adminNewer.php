<?php

include 'template.php';

head('Admin','','','','','');

$_SESSION['chkrer']=1;

?>

<script src="" type="text/javascript"></script>

<DIV style="margin-top:7px; height:760px; overflow:hidden;" align="center">

<div style="width:1000px;padding-top:11px; padding-left:11px; padding-bottom:0px; height:688px;">

<Form method=POST action='admin2newer.php' id=frm name=frm>

<DIV style="float:left;border-style:solid;border-width:2px;border-color:#A61515; width:455px; height:400px; overflow:hidden;margin-left:40px;border-radius:6px;">

<TABLE align=center style="font-family:Arial, Helvetica, sans-serif">

<TR>
<TH colspan='2' align='center'>Claimant Details</TH>
</TR>
<TR>
<TD>Title</TD>
<TD><select onChange="if (document.getElementById('tt').value=='Ms.' || document.getElementById('tt').value=='Miss' || document.getElementById('tt').value=='Mrs.'){ document.getElementById('gend').value='f'; }else if (document.getElementById('tt').value=='Master' || document.getElementById('tt').value=='Mr.') { document.getElementById('gend').value='m'; } else {document.getElementById('Dgender').style.visibility='visible';}" id="tt" name=tt><option value=Mr.>Mr.</option><option value=Ms.>Ms.</option><option value=Miss>Miss</option><option value=Mrs.>Mrs.</option><option value=Dr.>Dr.</option><option value=Master>Master</option><option value="Rev.">Rev.</option></select></TD>
</Tr>
<tr>
<TD>First Name</TD>
<TD><INPUT type='text' name='cf' id="cf"></TD>
</tr>
<tr>
<TD>Last Name</TD>
<TD><INPUT type='text' name='cl' id='cl'></TD>
</TR>
<tr>
<TD>Date of Birth</TD>
<TD><input size=16px type='text' onblur="chkDt(this);" name=dob id='dob'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'dob');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('dob').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Accident</TD>
<TD><input size=16px type='text' onblur="chkDt(this);" name=doa id='doa'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'doa');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doa').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<TD>Date of Examination</TD>
<TD><input size=16px type='text' onblur="chkDt(this);" name=doe id='doe'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'doe');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doe').value='';"><img src='images/clear.png' border=0></a></TD>
</TR>
<tr>
<td>Time of Examination</td>
<td>
<input type="text" name="tm" id="tm" style="width:90px;" />
<!--<input type="button" value="&nbsp;List&nbsp;" onclick="showResultAT(document.getElementById('doe').value);" />-->
</td>
</tr>
<tr>
<TD>Contact-1</TD>
<TD><INPUT type='text' name='cc1' id="cc1" style="width:90px;"><input type="button" value="Text" onclick="texterI(document.getElementById('cc1').value);" /></TD>
</TR>
<tr>
<TD>Contact-2</TD>
<TD><INPUT type='text' name='cc2' id="cc2" style="width:90px;"><input type="button" value="Text" onclick="texterI(document.getElementById('cc2').value);" /></TD>
</TR>
<tr>
<TD>Post Code</TD>
<TD><INPUT style="width:90px;" type='text' name='cp' id="cpc" /><input type="hidden" value="" name="lat" id="lat" /><input type="hidden" value="" name="long" id="long" /><input type="button" value="Find" onclick="clearest(); javascript:usePointFromPostcode(document.getElementById('cpc').value, showPointLatLng); addressFind();" /></TD>
</TR>
<tr>
<tr>
<TD>Address Line 1</TD>
<TD><INPUT type='text' name='ca1' id="ca1"></TD>
</TR>
<tr>
<TD>Address Line 2</TD>
<TD><INPUT type='text' name='cty' id="cty"></TD>
</TR>
<TD>Email</TD>
<TD><INPUT type='text' name='ce'></TD>
</TR>
</TABLE>

</DIV>


<div style="float:left; width:455px; border-style:solid;border-width:2px;border-color:#A61515; height:400px;margin-left:5px;overflow:hidden; border-radius:6px;">

<table align="center" style="font-family:Arial, Helvetica, sans-serif">

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
<input type="text" value="Type to Search" name="cN" id="cNameI" onFocus="clearer('cNameI');" onBlur="defaulter('cNameI'); defaulter2('cNameH', 'cNameI');" onKeyUp="showResult1(this.value);" />
<input type="hidden" name="cN2" id="cNameH" />
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
<input type="text" value="Type to Search" name="aN" id="aNameI" onFocus="clearer('aNameI');" onBlur="defaulter('aNameI');defaulter2('aNameH','aNameI');" onKeyUp="showResultA(this.value);" />
<input type="hidden" name="aN2" id="aNameH" />
</td>
</tr>
<tr>
<td>
Agency Ref
</td>
<td>
<input type="text" name="aRef" id="aRef" />
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
<input type="text" value="Type to Search" name="sN" id="sNameI" onFocus="clearer('sNameI');" onBlur="defaulter('sNameI');defaulter2('sNameH', 'sNameI');" onKeyUp="showResultS(this.value);" />
<input type="hidden" name="sN2" id="sNameH" />
</td>
</tr>
<tr>
<td>
Solicitor Ref
</td>
<td>
<input type="text" name="sRef" id="sRef" />
</td>
</tr>

</table>

</div>
<br/>
<div style="width:980px; border-style:solid;border-width:2px;border-color:#A61515; height:250px;floar:left;overflow:hidden;">

<TABLE style="font-family:Arial, Helvetica, sans-serif">
<TR>
<TH colspan='2' align=center>Special Instructions</TH>
</tr>
<tr>
<TD>
<SELECT onchange='toglesoi(); chkClear();' name='soi' id='soi'>
	<OPTION id="son" value='0' onclick='hidesoi();'>No</OPTION>
    <OPTION id="soy" onclick='showsoi();' value='1'>Yes</OPTION>
</SELECT>
</TD>
</TR>





</TABLE>

<div id="sins" style="max-height:200px; overflow:auto; padding-left:5px;" align="left">
</div>

<TABLE>
<TR>
<TH align=center>Booking Instructions</TH>
</TR>
<tr>
<TD><TEXTAREA name=bi cols=30 rows=7></TEXTAREA></TD>
</TR>
</TABLE>

<textarea name="soiT" id="soiT" style="visibility:hidden;"></textarea>

</div>
<input type="button" value="Create Reminder" onclick="document.getElementById('doeRem').style.visibility='visible';" /><br />
<input type="button" value="Save Case" onclick="submitter();" />

</div>

</DIV>


<!-- Clinic, Agency, Solicitor -->

<Div id=acr style='visibility : hidden; position:absolute; width:100%; height:100%; top:220px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

<table width="750" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
<span id="titleD"></span>
</td>
<td align="right">

<a onclick="document.getElementById('acr').style.visibility='hidden';" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>

<tr>
<td align="center" colspan="6"><iframe id="ifrme" frameborder="0" height="270" width="750px;" allowtransparency="true" src="blank.php" style="opacity:0.8; filter:alpha(opacity=80);" scrolling="auto"></iframe></td>
</tr>

</table>

</DIV>


<!-- texting -->

<Div id='texting' style='visibility : hidden; position:absolute; width:100%; height:100%; top:220px; padding-top:50px; background-image:url(images/bgAP.png); z-index:3;' align="center">

<table width="750" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

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
	<span style="color:#900" id="tInner2"></span><br />
    <input type="button" value="Close" onclick="document.getElementById('texting').style.visibility='hidden';" />
</td>
</tr>

</table>

</DIV>


<!-- Special Instructions -->

<DIV style='visibility:hidden; width:100%; height:100%; position:absolute; top:220px; padding-top:50px; background-image:url(images/bgAP.png);' align="center" id='soid'>
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
	<TD>Check Date of Accident</TD>

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
	<TD>Comment on Effects of Past Accident(s)</TD>

	<TD colspan="2">Other<INPUT type='text' id="othr" name='othr'></TD>
    
    <td colspan="2"><INPUT type='button' id="sbm" value="Save" onclick="svSoId();"></TD>

</tr>

</table>

</DIV>

<div align="right" style="visibility:hidden; position:absolute; top:250px; z-index:2; width:500px; background-color:#FFF; height:200px; " id="livesearch2">
<div id="ls2I" style="height:150px; width:490px; overflow:auto;">
</div>
<div id="ls2B" align="center">
<input type="button" value="Close" onclick="document.getElementById('livesearch2').style.visibility='hidden';" />
</div>
</div>


<Div id='Dgender' style='visibility : hidden; position:absolute; width:100%; height:100%; top:220px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

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
	<span style="color:#900" id="DInner2"><SELECT name="gend" id="gend"><OPTION value="m">Male</OPTION><OPTION value="f">Female</OPTION></SELECT></span><br />
    <input type="button" value="Close" onclick="document.getElementById('Dgender').style.visibility='hidden';" />
</td>
</tr>

</table>

</DIV>


<!-- Creating a Reminder-->
<Div id='doeRem' style='visibility : hidden; position:absolute; width:100%; height:100%; top:220px; padding-top:50px; background-image:url(images/bgAP.png);' align="center">

<table width="750" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

<tr style="color:#FFF; font-size:11px;" height="27px;">
<td colspan="5">
<span>DoE Reminder</span>
</td>
<td align="right">

<a onclick="document.getElementById('doeRem').style.visibility='hidden';" style="cursor:pointer;">
<img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
</a>

</td>
</tr>

<tr>
<td>
Reminder Date
</td>
<td>
<input size=16px type='text' onblur="chkDt(this);" name=doeR id='doeR'><a href='#' onClick="setYears(1900, 2012); showCalender(this, 'doeR');"><img src='images/calender.png' border=0></a><a href='#' onClick="document.getElementById('doeR').value='';"><img src='images/clear.png' border=0></a>
</td>
</tr>
<tr>
<td>
Reminder Urgency
</td>
<td>
<select name="doeRU">
	<option value="1">Normal</option>
    <option value="0">Low</option>
    <option value="2">High</option>
</select>
</td>
</tr>
<tr>
<td>
Reminder Text
</td>
<td>
<select id="doeRTS">
	<option value="Create Appointment">Create Appointment</option>
	<option value="Contact Solicitor">Contact Solicitor</option>
    <option value="Contact Agency">Contact Agency</option>
    <option value="Contact Claimant">Contact Claimant</option>
    <option value=""></option>
</select>
<br />
<input type="button" value="Add" onclick="adRem();" />
</td>
</tr>
<tr>
<td colspan="2">
<div id="doeRTD" style="height:80px; width:470px; background-color:#FFF;" align="left"></div>
<input type="text" id="doeRT" name="doeRT"></textarea>
</td>
</tr>

<tr>
<td align="center" colspan="6">
    <input type="button" value="Save Case" onclick="submitter2();" />
</td>
</tr>

</table>

</DIV>



</Form>

<script src="cas.js" type="text/javascript" language="javascript"></script>
<script src="cas2.js" type="text/javascript" language="javascript"></script>
<script src="casAddress.js" type="text/javascript" language="javascript"></script>
<script src="cas3.js" type="text/javascript" language="javascript"></script>
<script src="cas4.js" type="text/javascript" language="javascript"></script>
<script src="texter.js" type="text/javascript" language="javascript"></script>
<script src="booker.js" type="text/javascript" language="javascript"></script>
<script src="aTime.js" type="text/javascript" language="javascript"></script>

<script type="text/javascript" language="javascript">

document.getElementById('doeRTD').contentEditable='true';

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
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Check Date of Accident';
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
		document.getElementById('sins').innerHTML=document.getElementById('sins').innerHTML+'<br>* '+'Comments on Past Accidents';
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


function closerLS2()
{
	document.getElementById('livesearch2').style.visibility='hidden';
}


function ifrmr(ttl, pg)
{
	document.getElementById('titleD').innerHTML=ttl;
	document.getElementById('ifrme').src=pg+'?org=<?php echo $_SESSION['o'];?>&lnm=<?php echo $_SESSION['n'];?>';
	document.getElementById('acr').style.visibility='visible';
}


function ifrmrClose()
{
	document.getElementById('acr').style.visibility='hidden';
}


function texterI(arg)
{
	var E=0;
	var D='';
	var argC=arg.replace(' ', '');
	if (argC.length==0)
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
		document.getElementById('tInner2').innerHTML='(This is not a delivery report)';
		
		texter(arg);
	}
	else
	{
		document.getElementById('tInner').innerHTML='Please Fix The Following Errors To Send A Text';
		document.getElementById('tInner2').innerHTML=D;
		document.getElementById('texting').style.visibility='visible';
	}
}


function submitter()
{
	var n1=document.getElementById('cf').value.replace(' ', '');
	var n2=document.getElementById('cl').value.replace(' ', '');
	
	var aref=document.getElementById('aRef').value.replace(' ', '');
	var sref=document.getElementById('sRef').value.replace(' ', '');
	
	var rTxt=document.getElementById('doeRTD').innerHTML;
	
	document.getElementById('doeRT').value=rTxt;
	
	var E1=1;<!-- Error for first and last name!>
	var E2=1;<!-- Error for Agency and Solicitor Reference!>
	var W1=0;<!-- Warning for missing doe!>
	
	if (n1.length>0 && n2.length>0)
	{
		E1=0;
	}
	
	if (aref.length>0 || sref.length>0)
	{
		E2=0;
	}
	
	if (E1==0 || E2==0)
	{
		document.getElementById('soiT').innerHTML=document.getElementById('sins').innerHTML;
		
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
				
				if (confirm('Create Reminder?')==true)
				{
					
					document.getElementById('doeRem').style.visibility='visible';
					
					W1=1;
				}
			}
			else
			{
				document.getElementById('doe').value=prompt('Enter DoE (format dd-mm-YYYY)');
			}
		}
		
		if (W1==0)
		{
			document.frm.submit();
		}
	}
	else
	{
		document.getElementById('texting').style.visibility='visible';
		document.getElementById('tInner').innerHTML='No Identifiers For This Case Entered';
		document.getElementById('tInner2').innerHTML="Enter atleast one of the following <br><div style='width:60%;' align='left'><ul align='left'><li>Client's first and last name.</li><li>Solicitor's Referrance</li><li>Agent's Referrance</li></ul></div>";
	}
}



function submitter2()
{
	var n1=document.getElementById('cf').value.replace(' ', '');
	var n2=document.getElementById('cl').value.replace(' ', '');
	
	var aref=document.getElementById('aRef').value.replace(' ', '');
	var sref=document.getElementById('sRef').value.replace(' ', '');
	
	var rTxt=document.getElementById('doeRTD').innerHTML;
	
	document.getElementById('doeRT').value=rTxt;
	
	
	var E1=1;// Error for first and last name!>
	var E2=1;// Error for Agency and Solicitor Reference!>
	
	if (n1.length>0 && n2.length>0)
	{
		E1=0;
	}
	
	if (aref.length>0 || sref.length>0)
	{
		E2=0;
	}
	
	if (E1==0 || E2==0)
	{
		document.getElementById('soiT').innerHTML=document.getElementById('sins').innerHTML;
		
		document.frm.submit();
	}
	else
	{
		document.getElementById('texting').style.visibility='visible';
		document.getElementById('tInner').innerHTML='No Identifiers For This Case Entered';
		document.getElementById('tInner2').innerHTML="Enter atleast one of the following <br><div style='width:60%;' align='left'><ul align='left'><li>Client's first and last name.</li><li>Solicitor's Referrance</li><li>Agent's Referrance</li></ul></div>";
	}
}


function chkDt(val)
{
	val.value=val.value.replace(/\//gi, "-");
/*	val.value=val.value.replace(/./gi, "-");
	val.value=val.value.replace(/:/gi, "-");
	val.value=val.value.replace(/\\/gi, "-");
	val.value=val.value.replace(/_/gi, "-");
	val.value=val.value.replace(/,/gi, "-");
	val.value=val.value.replace(/|/gi, "-");*/
}



function adRem()
{
	document.getElementById('doeRTD').innerHTML=document.getElementById('doeRTD').innerHTML+'<br>* '+document.getElementById('doeRTS').value;
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