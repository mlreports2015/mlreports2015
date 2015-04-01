<?php

include 'template.php';

head('Accident', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/accid.js"></script>', '', '', '');
?>

<!--<BODY background="images/back.png" onLoad="doeF();" style="background-color:#FFF;width:98%;height:89%;">-->


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Accident', $org, $id);

?>
<div style="width:100%;height:99%;background-color:#FFF;height:850px;border-radius:6px;">
<FORM action="Process/accid2.php" method="POST" name="frm" id="frm">

<INPUT type="hidden" value="<? echo $_GET['cid']; ?>" name="id">

<TABLE border="1" align="center" cellpadding="6px" width="70%" height="800px" style="font-family:sans-serif;background-color:#FFF;border-radius:6px;">

<?
$ss="select * from claimant where cid='$id' and org='".$_SESSION['o']."'";
// echo $ss;
$qq=mysql_query($ss);
$res=mysql_fetch_array($qq);

$sa="select * from accid where id='$id' and org='".$_SESSION['o']."'";
// echo $sa;
$qa=mysql_query($sa);
$ra=mysql_fetch_array($qa);

?>

<INPUT type="hidden" value="<? echo trim($res['ct']); ?>" id='tt' />
<INPUT type="hidden" value="<? echo trim($res['cln']); ?>" id='cln' />
<INPUT type="hidden" value="<? echo $res['gen']; ?>" id='gnd' />
<INPUT type="hidden" value="<? echo $res['cda'];?>" id='cda' />

<TR style="">
<TD style="border-radius:6px 0px 0px 0px;border:none;border-bottom:1px solid #CCC;">Accident Type</TD>
<TD style="border-radius:0px 6px 0px 0px;border:none;border-bottom:1px solid #CCC;">RTA<input type="radio" id="rta" name="rta" value='rta' onchange="checkRTA('RTA');" />&nbsp;&nbsp;non-RTA<input type="radio" id="rta" name="rta" value='non' onchange="checkRTA('non');" /><input type="hidden" id="rtastat" name="rtastat" /></TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Time</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="t" id="t">
<OPTION value="">..select..</OPTION>
<OPTION value="at dawn">dawn</OPTION>
<OPTION value="in the morning">morning</OPTION>
<OPTION value="at noon">noon</OPTION>
<OPTION value="in the afternoon">afternoon</OPTION>
<OPTION value="at dusk">dusk</OPTION>
<OPTION value="in the evening">evening</OPTION>
<OPTION value="at night">night</OPTION>
</SELECT>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Vehicle</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="veh" id="veh" onChange="idex0(document.frm.veh.options[document.frm.veh.selectedIndex].value); toway();">
<OPTION value="car">car</OPTION>
<OPTION value="taxi">taxi</OPTION>
<OPTION value="4 x 4">4 x 4</OPTION>
<OPTION value="van">van</OPTION>
<OPTION value="bus">bus</OPTION>
<OPTION value="lorry">lorry</OPTION>
<OPTION value="truck">truck</OPTION>
<OPTION value="motor-bike">motor-bike</OPTION>
<OPTION value="bicycle">bicycle</OPTION>
<OPTION value="MPV">MPV</OPTION>
<OPTION value="mini-bus">mini-bus</OPTION>
<OPTION value="smart-car">smart-car</OPTION>
<OPTION value="saloon">saloon</OPTION>
<OPTION value="hatch-back">hatch-back</OPTION>
<OPTION value="estate">estate</OPTION>
<OPTION value="jeep">jeep</OPTION>
<OPTION value="SUV">SUV</OPTION>
<OPTION value="on foot">on foot</OPTION>
<OPTION value="____">other</OPTION>
</SELECT>
<input type="hidden" id="othveh" name="othveh" />
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Seated at</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="loc" id="loc">
<OPTION value="driver">driver</OPTION>
<OPTION value="front-passenger">front-passenger</OPTION>
<OPTION value="front-passenger (child seat)">front-passenger (child seat)</OPTION>
<OPTION value="rear-passenger">rear-passenger</OPTION>
<OPTION value="rear-passenger (child seat)">rear-passenger (child seat)</OPTION>
<OPTION value="rear-passenger (booster seat)">rear-passenger (booster seat)</OPTION>
<OPTION value="passenger">passenger</OPTION>
<OPTION value="rider">rider</OPTION>
<OPTION value="pillion">pillion</OPTION>
</SELECT>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Accident with</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="aw" id="aw" onChange='chkothaw()'>
<OPTION value="a car">car</OPTION>
<OPTION value="a taxi">taxi</OPTION>
<OPTION value="a 4 x 4">4 x 4</OPTION>
<OPTION value="a van">van</OPTION>
<OPTION value="a bus">bus</OPTION>
<OPTION value="a lorry">lorry</OPTION>
<OPTION value="a truck">truck</OPTION>
<OPTION value="an MPV">MPV</OPTION>
<OPTION value="a mini-bus">mini-bus</OPTION>
<OPTION value="a smart-car">smart-car</OPTION>
<OPTION value="a saloon">saloon</OPTION>
<OPTION value="a hatch-back">hatch-back</OPTION>
<OPTION value="an estate">estate</OPTION>
<OPTION value="a jeep">jeep</OPTION>
<OPTION value="an SUV">SUV</OPTION>
<OPTION value="an ambulance">ambulance</OPTION>
<option value="an emergency vehicle">Emergency Vehicle</option>
<OPTION value="an tractor">tractor</OPTION>
<OPTION value="a motor-bike">motor-bike</OPTION>
<OPTION value="a bicycle">bicycle</OPTION>
<OPTION value="an electric-pole">electric-pole</OPTION>
<OPTION value="a lamp post">lamp post</OPTION>
<option value="a sign post">sign post</option>
<OPTION value="a barrier">barrier</OPTION>
<OPTION value="a barrier and spun around">barrier and spun around</OPTION>
<OPTION value="pedestrian">pedestrian</OPTION>
<OPTION value="____">other</OPTION>
</SELECT>
<INPUT type='hidden' id='othaw' name='othaw' />
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Seat-Belt</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="sb" id="sb" onChange="toggleExemp();">
<OPTION value="was" selected="selected">yes</OPTION>
<OPTION value="was not">no</OPTION>
</SELECT>

<input type="hidden" value="1" id="sbb" name="sbb" />

<div id="exempDiv" style="visibility:hidden;">
	Exemption : 
	<select name="exemp" id="exemp" onChange="toggleExemp2();">
    	<option value="">No</option>
    	<option value="1">Yes</option>
    </select>
    
    <span style="visibility:hidden;" id="exempSp">
    	Form :
        <select name="exempF" onChange='exemptst(this.value)'>
        	<option value="">...</option>
			<option value="oth">other</option>
            <option value="The claimant was driving a licensed taxi.">Driving a licensed taxi.</option>
            <option value="The claimant was driving a hire vehicle carrying passengers.">Driving a hire vehicle carrying passengers</option>
            <option value="The claimant was riding a vehicle being used under a trade license for the purpose of investigating a mechanical fault in the vehicle.">Investigating a fault in the vehicle.</option>
        	<option value="The claimant had exemption on medical grounds.">Medical grounds</option>
            <option value="The claimant was seating in a stationary vehicle that had its engine off">Seated with engine off</option>
            <option value="He was driving a vehicle constructed or adapted for carrying goods while on a journey that did not exceed 50 meters and the journey was undertaken for the purpose of delivering or collecting goods.">In a vehicle for carrying goods.</option>
            <option value="The calimant was performing a manoeuvre which involved reversing.">Reversing</option>
            <option value="The claimant was supervising a provisional license holder while the said holder was performing a manoeuvre which involved reversing.">Supervising a provisional license holder while they were reversing.</option>
            <option value="The claimant was conducting a test of competence to drive.">Conducting a test of competence to drive.</option>
            <option value="The claimant was in a vehicle being used for fire brigade purposes.">In a vehicle being used for fire brigade purposes.</option>
            <option value="The claimant was in a vehicle being used for police purposes.">In a vehicle being used for police purposes.</option>
            <option value="The claimant was in a vehicle carrying a person in lawful custody.">In a vehicle carrying a person in lawful custody.</option>
            <option value="The claimant was riding a vehicle being used under a trade license for the purpose of remedying a mechanical fault in the vehicle.">Remedying a fault in the vehicle.</option>
            <option value="The claimant was wearing a disabled person's belt.">Wearing a disabled person's belt.</option>
            <option value="The claimant was riding in a vehicle while it was taking part in a procession organized by or on behalf of the court.">Part of a procession</option>
            <option value="The claimant was in a vehicle which does not have seatbelts fitted.">No seatbelts fitted</option>
        </select>
		<br/>
		<div id='exemptdiv'  name='exemptdiv' style='visibility:hidden'>
		if other, please state details here:<input type='text' id='exempOth' name='exempOth' size='70' />
    	</div>
	</span>
</div>

</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Head Restraint</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="hr" id="hr">
<OPTION value="was not">no</OPTION>
<OPTION value="was" selected="selected">yes</OPTION>
</SELECT>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Air Bag</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="ab" id="ab">
<OPTION value="was not" >no</OPTION>
<OPTION value="was" selected="selected">yes</OPTION>
</SELECT>
<SELECT name="abd" id="abd">
<OPTION value="deployed">deploy</OPTION>
<OPTION value="did not deploy" selected="selected">not deployed</OPTION>
</SELECT>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Location</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="locat" id="locat" onChange="toway();">
<OPTION value="on a main road">main road</OPTION>
<OPTION value="on a motor way">motor way</OPTION>
<OPTION value="at a set of traffic lights">traffic light</OPTION>
<OPTION value="in a residential street">residential street</OPTION>
<OPTION value="in a car park">car park</OPTION>
<OPTION value="on a side road">side road</OPTION>
<OPTION value="at a junction">junction</OPTION>
<OPTION value="at a round-about">round-about</OPTION>
<OPTION value="in a country lane">country lane</OPTION>
<OPTION value="on a motorway slip-road">motorway slip-road</OPTION>
<OPTION value="on a mincunian way">mincunian way</OPTION>
<OPTION value="at a pelican crossing">pelican crossing</OPTION>
<OPTION value="on a dual-carriageway">dual-carriageway</OPTION>
<OPTION value="in a ford">ford</OPTION>
<OPTION value="on a bridge">Bridge</OPTION>
<OPTION value="____">Other</OPTION>
</SELECT>
<INPUT type='hidden' id='othlocat' name='othlocat' />
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">State</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="stat" id="stat" onChange="toway();">
<OPTION value="stationary">stationary</OPTION>
<OPTION value="moving">moving</OPTION>
<OPTION value="parked">parked</OPTION>
<option value="braking">braking</option>
<option value="reversing">reversing</option>
<option value="manovering">manouvering</option>
<option value="slowing down">slowing</option>

</SELECT>

<select id="stat2" name="stat2">
<option value="on">on</option>
<option value="in">in</option>
<option value="at">at</option>
</select>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Collided/Struck</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="cost" id="cost" onchange='costchk(this.value);'>
<OPTION value="collided with">collided</OPTION>
<OPTION value="was struck by" selected="selected">struck</OPTION>
<OPTION value="was shunted">shunted</OPTION>
<OPTION value="was flipped over">flipped over </OPTION>
<OPTION value="was spun around">spun around</OPTION>
</SELECT>
<SELECT name='costa' id='costa' style='visibility:hidden'>
<OPTION value=''>.....</OPTION>
</SELECT>
</SELECT>
Impact no:
<SELECT id='impctNo' name='impctNo' onChange="impctNoChck(this.value)">
<OPTION value="">--</OPTION>
<OPTION value="1">1</OPTION>
<OPTION value="2">2</OPTION>
<OPTION value="multiple">Multi</OPTION>
</SELECT>

<TABLE id='impctTbl' name='impctTbl'>

</TABLE>

</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;" >Impact</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="impact" id="impact">
<OPTION value="front">front</OPTION>
<OPTION value="rear" selected="selected">rear</OPTION>
<OPTION value="left front corner">left front corner</OPTION>
<OPTION value="left rear corner">left rear corner</OPTION>
<OPTION value="right front corner">right front corner</OPTION>
<OPTION value="right rear corner">right rear corner</OPTION>
<OPTION value="passenger's side">passenger's side</OPTION>
<OPTION value="driver's side">driver's side</OPTION>
<OPTION value="rear passenger left side">rear passenger left</OPTION>
<OPTION value="rear passenger right side">rear passenger right</OPTION>
<OPTION value="not known">not known</OPTION>
</SELECT>




</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Thrown</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name='thr2' id='thr2'>
<OPTION value='was thrown'>was thrown</OPTION>
<OPTION value='jerked'>jerked</OPTION>
</SELECT>

<SELECT name="thr" id="thr" onChange="tgglthr(this.value);">
<OPTION value="sideways">sideways</OPTION>
<OPTION value="forward then backward" selected="selected">forward then backward</OPTION>
<OPTION value="backward then forward">backward then forward</OPTION>
<OPTION value="in all directions">In All Directions</OPTION>
</SELECT>
<INPUT type='text' id='oththr' name='oththr' style='visibility:hidden;' />
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Damage</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="dam" id="dam">
<OPTION value="write-off">write-off</OPTION>
<OPTION value="cause extensive damage to">extensive</OPTION>
<OPTION value="cause moderate damage to">moderate</OPTION>
<OPTION value="cause minor damage to">minor</OPTION>
<OPTION value="unknown">unknown</OPTION>
</SELECT>
</TD>
</TR>

<TR>
<TD style="border:none;border-bottom:1px solid #CCC;">Speed</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="spe" id="spe">
	<OPTION value="">Unknown</OPTION>
	<OPTION value="10 mph">10 mph</OPTION>
	<OPTION value="20 mph">20 mph</OPTION>
	<OPTION value="30 mph">30 mph</OPTION>
	<OPTION value="40 mph">40 mph</OPTION>
	<OPTION value="50 mph">50 mph</OPTION>
	<OPTION value="60 mph">60 mph</OPTION>
	<OPTION value="70 mph">70 mph</OPTION>
	<OPTION value="low speed">Low Speed</OPTION>
	<OPTION value="High speed">High Speed</OPTION>
	<OPTION value="Very High speed">Very High Speed</OPTION>
    </SELECT>
</TD>
</TR>

<tr>
<TD style="border:none;border-bottom:1px solid #CCC;">Got off/Got Up</TD>
<TD style="border:none;border-bottom:1px solid #CCC;">
<SELECT name="gc" id="gc">
	<OPTION value="">---</option>
	<OPTION value="got out of the vehicle unaided.">unaided</OPTION>
	<OPTION value="needed help to get out of the vehicle.">needed help</OPTION>
</SELECT>
</TD></tr>

<tr>
<td style="border:none;border-bottom:1px solid #CCC;">Visibility</td>
<td style="border:none;border-bottom:1px solid #CCC;">
	<select id="vis">
    	<option value="">---</option>
    	<option value="very low">very low</option>
        <option value="low">low</option>
        <option value="normal">normal</option>
	</select>
</td>
</tr>

<tr>
<td style="border:none;border-bottom:1px solid #CCC;">Weather Conditions</td>
<td style="border:none;border-bottom:1px solid #CCC;">
	<select id="wcond">
    	<option value="">---</option>
    	<option value="sunny">sunny</option>
        <option value="dark">dark</option>
		<option value="dull">dull</option>
        <option value="cloudless">cloudless</option>
        <option value="cloudy">cloudy</option>
        <option value="drizzling">drizzle</option>
        <option value="raining">rainy</option>
        <option value="foggy with surface spray">foggy</option>
        <option value="foggy with surface spray">foggy with surface spray</option>
        <option value="raining with surface spary">rain with surface spary</option>
        <option value="drizzling with surface spray">drizzling with surface spray</option>
        <option value="cloudy with surface spray">cloudy with surface spray</option>
        <option value="sunny with surface spray">sunny with surface spray</option>
	</select>
</td>
</tr>

<tr>
<td align="center" colspan="2" style="border:none;border-bottom:1px solid #CCC;"><select id="sentence">
									<option value="1">As Paragraph</option>
                                    <option value="2">As Points</option>
                                    <option value="3">As Headings</option>
								</select>
</td>
</tr>

<TR><TD align="center" colspan="2" style="border:none;"><INPUT type="button" value="ADD" onClick="format();" style="height:26px;width:80px;border-radius:7px;"><INPUT type="button" value="Suggestion" onClick="tgglside('accident');" style="height:26px;width:80px;border-radius:7px;background-color:#FFF;border:none;"></TD></TR>

<TR><TD colspan="2" align="center" style="border:none;"><div align="left" id="accident" style="height:150px; width:90%; border-color:#444; border-width:1px; border-style:inset; overflow:auto; border-radius:6px; background-color:#cfe2ee;" ><? echo $ra['accid']; ?></div></TD></TR>

<textarea name="accident2" id="accident2" rows="0" cols="0" style="height:0px; width:0px;" ></textarea>

<TR><TD align="center" colspan="2" style="border:none;"><INPUT type="button" onClick="submiter();" value="SUBMIT" style="height:26px;width:80px;border-radius:7px;" /></TD></TR>

</TABLE>



</FORM>

</div>

<script type="text/javascript" language="javascript">

document.getElementById('accident').contentEditable='true';

function checkRTA(option)
{


rtaradio = document.getElementsByName('rta');
 if(rtaradio.item(0).checked)
 {
   alert(rtaradio.item(0).value);
   document.getElementById('rtastat').value=rtaradio.item(0).value;
 }
 else if(rtaradio[1].checked)
 {
	alert(rtaradio[1].value);
	document.getElementById('rtastat').value=rtaradio[1].value;
	document.getElementById('sb').selectedIndex=1;
	document.getElementById('sb').disabled=true;
	document.getElementById('ab').selectedIndex=1;
	document.getElementById('ab').disabled=true;
	document.getElementById('hr').selectedIndex=1;
	document.getElementById('hr').disabled=true;
 }

}

</script>

</BODY>