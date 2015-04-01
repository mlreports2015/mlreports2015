<?php

include 'template.php';

head('Prognosis', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', "<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/prog.js\"></script>", '', '','');
?>

<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Prognosis', $org, $id);

?>

<?php $id= $_GET['cid']; 

$sqlprog="select * from prog where id=$id and org='".$_SESSION['o']."'";
$qprog=mysql_query($sqlprog);
$numprog=mysql_num_rows($qprog);

$sqlres1="select * from eff where cid=$id and stat='unresolved' and org='".$_SESSION['o']."'";
$qres1=mysql_query($sqlres1);
$nres1=mysql_num_rows($qres1);

$sqlres="select * from eff where cid=$id and stat!='unresolved' and org='".$_SESSION['o']."'";
$qres=mysql_query($sqlres);
$nres=mysql_num_rows($qres);

$sqlfinComm="select * from final_comms where cid=$id and org='".$_SESSION['o']."'";
$sqlfinCommRes = mysql_query($sqlfinComm);

$sqlpmh = "select hist from pmh where not hist = 'There was no relevant past medical history.' and id=$id and org='".$_SESSION['o']."'";
$sqlpmhres = mysql_query($sqlpmh);
$sqlpmhprintnum = mysql_num_rows($sqlpmhres);





$nresX=0;
if ($numprog>0)
{
	$nresX=$numprog-1;
}
else
{
	$nresX=$nres-1;
}

?>


<FORM method="POST" action="Process/prog.php" name="frm" id="frm">

<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />
<input type="hidden" value="<?php echo $nresX;?>" name="tv" id="theValue" />

<?
$org=$_SESSION['o'];
  $q=mysql_query("select * from claimant where cid=$id and org='$org'");
  $r=mysql_fetch_array($q);
  $g=$r['gen'];
  
  if ($g=='m')
  {
  $g1='His';
  $g='He';
  }
  else
  {
  $g1='Her';
  $g='She';
  }

// echo $r['cda'];
// echo $r['cde'];

$d2=mktime(22,0,0,date('m',strtotime($r['cde'])),date('d',strtotime($r['cde'])),date('Y',strtotime($r['cde'])));
$d1=mktime(22,0,0,date('m',strtotime($r['cda'])),date('d',strtotime($r['cda'])),date('Y',strtotime($r['cda'])));

$dd=floor(($d2-$d1)/2628000);
echo "<input type='hidden' id='dtdiff' name='dtdiff' value='".$dd."'/>";
  
  $n=$r['ct']." ".$r['cln'];
  
  
$s="select * from eff where cid=$id and prob!='Shock' and prob!='-' and stat!='resolved' and org='".$_SESSION['o']."' ORDER BY bdy_ord";
//echo $s;
$q=mysql_query($s);
$i=0;
while($r=mysql_fetch_array($q))
{


?>

<DIV align="center">
<TABLE align="center" border="1" rules="all" style="font-family:Verdana, Geneva, sans-serif;">
<TR>
<TD>

<INPUT type=text value="<?echo $r['prob'];?>" name="prob[<?echo $i;?>]" id="prob[<?echo $i;?>]" />
<INPUT type=hidden value="<?echo $r['stat'];?>" name="rex[<?echo $i;?>]" id="rex[<?echo $i;?>]" />
<SELECT name="cause[<?echo $i;?>]" id="cause[<?echo $i;?>]" onclick="if (document.getElementById('cause[<?echo $i;?>]').value=='secondary to'){document.getElementById('cause2[<?echo $i;?>]').style.visibility='visible';}else {document.getElementById('cause2[<?echo $i;?>]').style.visibility='hidden';}">
<!-- 	<OPTION value="..">Other(please specify in text box)</OPTION> -->
<OPTION selected="selected" value="a whiplash injury">Whiplash</OPTION>
	<OPTION value="an exacerbation of a pre-existing condition">exacerbation of a pre-existing condition</OPTION>
	<OPTION value="a trauma from the seatbelt">from the seatbelt</OPTION>
    <OPTION value="a direct trauma">direct trauma</OPTION>
    <OPTION value="trauma from the accident">trauma from accident</OPTION>
	<OPTION value="a sprain sustained in the accident">sprain sustained in the accident</OPTION>
	<OPTION value="secondary to">secondary to (select from the next list)</OPTION>
    <option value="stress of accident">stress of accident</option>
    <option value="a broken windscreen">broken windscreen</option>
    <option value="a broken window">broken window</option>
    <option value="impacting the steering wheel">steering wheel</option>
    <option value="an air-bag deploying">air-bag deploying</option>
    <option value="a loose object in car">loose object in car</option>
    <option value="hitting the steering wheel">hitting steering wheel</option>
    <option value="getting hand stuck between objects">getting hand caught between objects</option>
    <option value="the vehicle overturning">vehicle overturning</option>
    <option value="falling off the bike">falling off the bike</option>
    <option value="getting hit by other passenger(s)">getting hit by other passenger(s)</option>
    <option value="a fall">a fall</option>
    <option value="being over-worked">being over-worked</option>
    <option value="slipping at work">slipping at work</option>
    <option value="medical negligence">medical negligence</option>
    <option value="lifting a heavy item">lifting a heavy item</option>
    <option value="sports">sports</option>
</SELECT>
<SELECT style="visibility:hidden;" name="cause2[<?echo $i;?>]" id="cause2[<?echo $i;?>]">
	<OPTION value="head ache">head ache</OPTION>
	<OPTION value="neck pain">neck pain</OPTION>
	<OPTION value="back pain">back pain</OPTION>
	<OPTION value="lower back pain">lower back pain</OPTION>
	<OPTION value="upper back pain">upper back pain</OPTION>
	<OPTION value="shoulder pain">shoulder pain</OPTION>
	<OPTION value="left shoulder pain">left shoulder pain</OPTION>
	<OPTION value="right shoulder pain">right shoulder pain</OPTION>
	<OPTION value="arm pain">arm pain</OPTION>
	<OPTION value="left arm pain">left arm pain</OPTION>
	<OPTION value="right arm pain">right arm pain</OPTION>
	<OPTION value="chest pain">chest pain</OPTION>
	<OPTION value="stomach pain">stomach pain</OPTION>
	<OPTION value="legs pain">legs pain</OPTION>
	<OPTION value="left leg pain">left leg pain</OPTION>
	<OPTION value="right leg pain">right leg pain</OPTION>
</SELECT>
<INPUT type="hidden" name="oth[<?echo $i;?>]" id="oth[<?echo $i;?>]">
</TD>
</TR>

<TR>
<TD>
Current level of disability
	<SELECT name="hlev[<?echo $i;?>]" id="hlev[<?echo $i;?>]">
		<OPTION value="mild">mild</OPTION>
		<OPTION value="moderate" <?php if($r['lvl']=='moderate'){ echo "selected"; }?> >moderate</OPTION>
		<OPTION value="mild to moderate" <?php if($r['lvl']=='mild to moderate'){ echo "selected"; }?> >mild to moderate</OPTION>
		<OPTION value="moderately severe">moderately severe</OPTION>
		<OPTION value="severe" <?php if($r['lvl']=='severe'){ echo "selected"; }?> >severe</OPTION>
	</SELECT>
</TD>
</TR>

<TR>
<TD>
through 
<SELECT name="ftrt[<?echo $i;?>]" id="ftrt[<?echo $i;?>]" onclick="refffun(<?php echo $i;?>);">
	<option value="plastic surgery">Plastic Surgery</option>
	<OPTION value="cphysio">Continue Physiotherapy</OPTION>
	<OPTION selected="selected" value="physio">Physiotherapy</OPTION>
	<OPTION value="cortho">Continue Orthopaedic</OPTION>
	<OPTION value="ortho">Orthopaedic</OPTION>
	<OPTION value="cdent">Continue Dentist</OPTION>
	<OPTION value="dent">Dentist</OPTION>
	<OPTION value="cspec">Continue Specialist</OPTION>
	<OPTION value="spec">Specialist</OPTION>
	<OPTION value="cpsy">Continue Psychologist</OPTION>
	<OPTION value="psy">Psychologist</OPTION>
	<OPTION value="cpsyc">Continue Psychatrist</OPTION>
	<OPTION value="psyc">Psychatrist</OPTION>
    <OPTION value="xray">X-Ray</OPTION>
    <OPTION value="MRI">MRI Scan</OPTION>
    <OPTION value="ultra">Ultra-Sound</OPTION>
	<OPTION value="exer">Gentle Exercise</OPTION>
	<OPTION value="none">No Treatment</OPTION>
</SELECT> 

<select name="wr[<?echo $i;?>]" id="wr[<?echo $i;?>]" onclick="resove('[<?echo $i;?>]')">
<option value="will resolve over">will resolve over</option>
<option value="will not resolve">will not resolve</option>
<option value="slowly">will resolve slowly and steadily</option>
</select>
<div id="resdx[<?echo $i;?>]" style="visibility:visible;">
<input type="text" size='2' id='resd0[<?echo $i;?>]' onfocus="document.getElementById('msggg[<? echo $i;?>]').style.visibility='visible';" onblur="document.getElementById('msggg[<? echo $i;?>]').style.visibility='hidden';" />

 to 

<INPUT type="text" size="2" name="resd[<?echo $i;?>]" id="resd[<?echo $i;?>]" onblur="chkmnths('[<?php echo $i;?>]');"> 
					<SELECT name="resp[<?echo $i;?>]" id="resp[<?echo $i;?>]">
						<OPTION value="days">days</OPTION>
						<OPTION value="weeks">weeks</OPTION>
						<OPTION selected="selected" value="months">months</OPTION>
						<OPTION value="years">years</OPTION>
					</SELECT>
                    
<div id='msggg[<? echo $i;?>]' style="visibility:hidden; background-color:#FFC;">
Sentence construction would be <font color="#CC0000">'I anticipate that with appropriate management, the *problem* will resolve over the next *n* to *m* months from the date of assessment'</font> where *n* is the number filled in this field. For <font color="#CC0000">'I anticipate that with appropriate management, the *problem* will resolve over the next *m* months from the date of assessment'</font> sentence construction, leave this field blank.
</div>

</div>
<div id="sess[<?php echo $i;?>]" style="visibility:visible;">
recommended expert sessions (optional) 
<INPUT type="text" size="5" name="psess[<?echo $i;?>]" id="psess[<?echo $i;?>]"> 
</div>

					<center>Sentence Construction : 
                    <select id="sentence[<?echo $i;?>]">
                    	<option value="5">Sentence 1</option>
                    	<option value="1">Sentence 2</option>
                        <option value="2">Sentence 3</option>
                        <option value="3">Sentence 4</option>
                        <option value="4">Sentence 5</option>
                    </select>
                    
                    
                    <INPUT type="button" value="Add" onClick="generate2('<? echo $dd; ?>', <?php echo $i;?>);" />
                    </center>

</TD>
</TR>

</TABLE>
<?
$i++;
}

if($sqlpmhprintnum>=1){
	
?>
<div style="width:88%;height:180px;font-family:sans-serif;">
Final Comments (If applicable) 
<div style="width:100%;height:100px;font-family:sans-serif;">

<textarea id="finalComms" name="finalComms" cols="80" rows="3" style="float:left;border:1px solid #CCC;border-radius:6px;padding:5px;margin-right:5px;" >
</textarea>
<select size="5" onchange="addTofinalComms(this.value);" style="float:left;">
<option value="">---Selectable phrases---</option>
<option value="I do not believe a review of medical records is required in this case.">I do not believe a review of medical records is required in this case. </option>
<option value="The prognosis I have given is for the symptoms to return to their pre-accident level">The prognosis I have given is for the symptoms to return to their pre-accident level </option>
<option value="The claimant has made a full recovery. There will be no long-term sequelae.">The claimant has made a full recovery. There will be no long-term sequelae. </option>
<option value="On the balance of probability only 50% of the prognosis is due to the index accident">The balance of probability 50% of prognosis is due to index accident.</option>
<option value="On the balance of probability 65% of the prognosis is due to the index accident">The balance of probablity 65% of prognosis is due to index accident.</option>
<option value="On the balance of probability 70% of the prognosis is due to the index accident">The balance of probability 70% of prognosis is due to index accident.
<option value="It is not possible to apportion the cause of the injuries between the impacts.">It is not possible to apportion the cause of the injuries between the impacts. </option>
<option value="Each of the impacts is equally responsible for the claimant's injuries" >Each of the impacts is equally responsible for the claimant's injuries.</option>
</select>
</div>
<INPUT type="button" value="Add Comment" onClick="addFinComms();" style="border:none;height:30px;border-radius:6px;" />
</div>
<hr/>
<?php 
}
?>


<INPUT type="button" value="Generate" onClick="generate('<? echo $dd; ?>');" />
<INPUT type="hidden" value="<?echo $i;?>" name="elems" id="elems" />

<div align="center" id='pro'>
<?php

if ($numprog==0)
{
	
?>

<DIV id="pror" align="center" style="border-style:solid;color:#A61515">
<h3>Unresolved</h3>
<?php
$i=0;
while ($rres=mysql_fetch_array($qres1))
{
	echo "<textarea style='background-color:#33AA33;' cols='30' rows='4' name='tx[$i]' id='tx[$i]'>".$rres['msg']."</textarea><br>";
	$i=$i+1;
}

?>
</div>
<DIV id="pres" align="center" style="border-style:solid;color:#A61515">
<h3>Resolved</h3>
<?php
$i=0;
while ($rres=mysql_fetch_array($qres))
{
	echo "<input type='hidden' value='Block' name='h[$i]' id='h[$i]'>";
	echo "<input type=button onclick='ignore($i);' style='width:80px; background-color:#AA3333;cursor=pointer;color:#fff;' name='b[$i]' id='b[$i]' value='Block'>";
	echo "<input type='hidden' name='prob[$i]' id='prob[$i]' value='".$rres['prob']."'>";
	echo "<textarea style='background-color:#33AA33;' cols='30' rows='4' name='t[$i]' id='t[$i]'>".$rres['msg']."</textarea>";
	$i=$i+1;
}
}
else
{
	$i=0;
	while ($rres=mysql_fetch_array($qprog))
	{
		echo "<input type='hidden' value='Block' name='h[$i]' id='h[$i]'>";
		echo "<input type=button onclick='ignore($i);' style='width:80px; background-color:#AA3333;cursor=pointer;color:#fff;' name='b[$i]' id='b[$i]' value='Block'>";
		echo "<input type='hidden' name='rid[$i]' id='rid[$i]' value='".$rres['id']."'>";
		echo "<input type='hidden' name='prob[$i]' id='prob[$i]' value='".$rres['prob']."'>";
		echo "<textarea style='background-color:#33AA33;' cols='30' rows='4' name='t[$i]' id='t[$i]'>".$rres['prog']."</textarea><br>";
		$i=$i+1;
	}
}


$i=0;
while ($finres=mysql_fetch_array($sqlfinCommRes))
	{
		echo "<input type='hidden' value='Block' name='h[$i]' id='h[$i]'>";
		echo "<input type=button onclick='ignore($i);' style='width:80px; background-color:#AA3333;cursor=pointer;color:#fff;' name='b[$i]' id='b[$i]' value='Block'>";
		echo "<input type='hidden' name='rid[$i]' id='rid[$i]' value='".$finres['cid']."'>";
		echo "<textarea style='background-color:#33AA33;' cols='30' rows='4' name='t[$i]' id='t[$i]'>".$finres['msg']."</textarea><br>";
		$i=$i+1;
	}
?>

 </DIV>
</div>
<INPUT type="submit" value="Submit" />

</DIV>
</FORM>

<div id='wrnblock' name='wrnblock' style="position:absolute;top:210px;height:2500px;width:98%;background-color:#000000;opacity:0.8;display:none;"/>

<div id='wrnsecblk' name='wrnsecblk' style="position:absolute;z-index:120;height:260px;width:700px;left:320px;top:280px;border:solid 1px red;-moz-border-radius:5px;display:none;border-radius:5px;">
  <div style="background-color:#fff;width:98%;height:97%;opacity:1.0;font-size:x-large;text-align:center;">
  		Prognosis period expired. <br/> Do you wish to change this symptom to resolved?<br/><br/>
		<input type='hidden' value='' name='idprob' id='idprob' />
		<input type='hidden' value='<?php echo $_GET['cid']; ?>' id='cId' name='cId' />
	    <input type='button' value='yes' id='ybutt' name='ybutt' title='yes' onclick="progWarnCorr();" />
		<input type='button' value='no' id='nbutt' name='nbutt' title='no' onclick="offProgWarn();"/>
  </div>
  <div>
  	<iframe id="ifrmwarn" name="ifrmwarn" frameborder='0' style='width:400px;height:50px;'/>
  </div>
</div>

