<?php

include 'template.php';

head('Symptoms', '<link href="CSS/eff.css" rel="stylesheet" type="text/css"><link href="CSS/multiple-select.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/eff.js"></script><script src="Scripts/jquery-1.11.2.js"></script> <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script><script src="Scripts/jquery.multiple.select.js"></script>', '', '', '');
?>

<BODY onLoad="doeF();">
<script>

   $(document).ready(function(){
							  
	$("#shck").multipleSelect({ 
	
	onClose:function(){
	   if($("#sre").val().trim()=="has not resolved"){
		  if($("#snres").css("visibility")=="hidden"){
	        $("#snres").css("visibility","visible");
		  }else{
			 $("#snres").css("visibility","hidden"); 
		  }
	   }
	}
							   
	});
	
	
	$("#prob").multipleSelect();
	$("#mprob").multipleSelect();
	
	
							  });

</script>

<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

$q=mysql_query("select * from claimant where cid=$id and org='$org'");
  $r=mysql_fetch_array($q);

bTop('Symptoms', $org, $id);

?>

<FORM method="POST" action="Process/eff.php" name="eff">

<?php 

$si="select * from eff where cid='$id' and org='".$_SESSION['o']."' and tp='l'  and msg='Does not report any initial symptoms.'";
$qi=mysql_query($si);
$qqi=mysql_num_rows($qi)-1;

//$pmp=0;

if ($qqi==-1)
{
	$si="select * from eff where cid='$id' and org='".$_SESSION['o']."' and tp='l' ORDER BY bdy_ord";
	//echo $si;
	$qi=mysql_query($si);
	$qqi=mysql_num_rows($qi);
	
	if ($qqi==-1)
		$qqi=0;
	
//	$pmp=1;
	
//	echo "here";
}

$sl="select * from eff where cid='$id' and org='".$_SESSION['o']."' and tp='i' and msg='Does not report any later symptoms.'";
$ql=mysql_query($sl);
$qql=mysql_num_rows($ql)-1;

//$pmp=0;

if ($qql==-1)
{
	$sl="select * from eff where cid='$id' and org='".$_SESSION['o']."' and tp='i' ORDER BY bdy_ord";
	//echo $sl;
	$ql=mysql_query($sl);
	$qql=mysql_num_rows($ql);
	
	if ($qql==-1)
		$qql=0;
	
//	$pmp=1;
	
//	echo "here";
}



$d2=mktime(22,0,0,date('m',strtotime($r['cde'])),date('d',strtotime($r['cde'])),date('Y',strtotime($r['cde'])));
if(mktime(22,0,0,date('m',time()),date('d',time()),date('Y',time()))>=$d2){
	
   $d2 =mktime(22,0,0,date('m',time()),date('d',time()),date('Y',time())); 

}
$d1=mktime(22,0,0,date('m',strtotime($r['cda'])),date('d',strtotime($r['cda'])),date('Y',strtotime($r['cda'])));

$dd=floor(($d2-$d1)/2628000);
echo "<input type='hidden' id='dtdiff' name='dtdiff' value='".$dd."'/>";

?>

<input type="hidden" value="<?php echo $qqi;?>" name="tv" id="theValue" />
<input type="hidden" value="<?php echo $qql;?>" name="tv2" id="theValue2" />

<input type="hidden" value="<? echo $_GET['cid'];?>" name="id" />

 

<DIV align="left" id="sh" style="background-color:#FFF;">
	<CENTER><H3>Shock<input type='button' id='tglshock' name='tglshock' value='+' onClick="tglshk()" border="0" style="border:none;background-color:#FFF;border-radius:6px;margin-left:6px;" /></H3></CENTER>
	
    
    
    <TABLE border="0" id='tblsh' name='tblsh' align='center' rules="all" cellpadding="6px" style='display:none;width:50%;font-family:Verdana, Geneva, sans-serif;border:none;'>
		<TR>
			
			<TD style="width:150px;">
				<SELECT style="width:150px;">
					<OPTION value="i">Initial Symptom</OPTION>
				</SELECT>
			</TD>
			<TD>Suffered</TD>
			<TD><DIV style="width:150px;">
            	<label for="shlv">mild</label>
                <input type="radio" id="shlv" name="shlv" value="mild" /> 
            	<br/>
            	<label for="shlvmod">moderate</label>
                <input type="radio" id="shlvmod" name="shlv" value="moderate"/> 
                <br/>
            	<label for="shlvsev">severe</label>
                <input type="radio" id="shlvsev" name="shlv" value="severe"/>
            	</DIV>
			
			</TD>

			<TD>
				<select name="shck" id="shck" multiple="multiple" style="width:200px">
					
					<option value="crying">Crying</option>
					<option value="dizziness">Dizziness</option>
                    <option value="shock">Shock</option>
                    <option value="sickness">Sickness</option>
                    <option value="vomiting">Vomiting</option>
                    <option value="unconscious">Unconscious</option>
                    
				</select>
			</TD>
			
			<TD colspan='2'>
				<SELECT name="sre" id="sre" onclick="notres('sres','snres','sre');" style="width:150px;">
					<OPTION value="resolved after">resolved after</option>
					<OPTION value="has not resolved">has not resolved</OPTION>
				</SELECT>
				<DIV id="sres">
					<INPUT type="text" size="5" name="sress" value="1" id="sress"> 
						<SELECT name="sresa" id="sresa" style="width:150px;">
							<OPTION value="day">days</OPTION>
							<OPTION value="week" selected >weeks</OPTION>
							<OPTION value="month">months</OPTION>
							<OPTION value="year">years</OPTION>
						</SELECT>
					</DIV>
					<DIV id="snres" style="visibility:hidden;">
						causing 
						<SELECT name="srdis" id="srdis" style="width:120px">
							<OPTION value="mild">mild</OPTION>
							<OPTION value="moderate">moderate</OPTION>
							<OPTION value="severe">severe</OPTION>
						</SELECT> 
						disability
					</DIV>
				</TD>
                
			</TR>
			
			<TR>
				<TD colspan="6" align="center"><INPUT type="button" onClick="addshock();" value="ADD" style="border-radius:6px;height:25px;width:100px;"></TD>
				</TR>
			</TABLE>
</DIV>

<DIV id='shk' > </DIV>

<DIV align="left" id="shh" style="background-color:#FFF;">
	<CENTER><H3>Psychological Problems <INPUT type="button" id="tglmh" name="tglmh" onClick="tglil();" value="+" style="border:none;background-color:#FFF;border-radius:6px;"/></H3></CENTER>
	<TABLE border="0" id="tblil" name="tblil" align="center" rules="all" cellpadding="4px" style='display:none;width:80%;border:none;font-family:Verdana, Geneva, sans-serif;'>
		<TR>
			<TD>
            	<input type="radio" id="mhini" name="il">Initial Symptom</input><br/>
                <input type="radio" id="mhltr" name="il">Later Symptom</input><br/>
                
			<!--<SELECT id="il" onclick="if (document.getElementById('il').value=='l')document.getElementById('latetm').style.visibility='visible'; else document.getElementById('latetm').style.visibility='hidden';">
					<OPTION value="i">Initial Symptom</OPTION>
					<OPTION value="l">Later Symptom</OPTION>
				</SELECT>-->
                
				<DIV id="latetm" style="visibility:hidden;">
					Developed symptom after
					<INPUT type="text" id="ltme" />
					<SELECT name="ltmh" id="ltmh">
						<OPTION value="hour">hours</OPTION>
						<OPTION selected="selected" value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
					</SELECT>
				</DIV>
				
			</TD>
			<TD>Suffered</TD>
			<TD width="130px">
            
            	<input type="radio" id="mhlvlmld" name="mhlvl" value="mild">mild</input><br/>
                <input type="radio" id="mhlvlmod" name="mhlvl" value="moderate">moderate</input><br/>
                <input type="radio" id="mhlvlsev" name="mhlvl" value="severe">severe</input> <br/>
				<SELECT name="mhlev" id="mhlev">
					<OPTION value="mild">mild</OPTION>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe" selected>severe</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="mprob" id="mprob" multiple="multiple" style="width:140px">
				    <OPTION value="">..Select an Option..</OPTION>
                    <OPTION value="shock">shock</OPTION>
					<OPTION value="anxiety">anxiety</OPTION>
					<OPTION value="nightmares">nightmares</OPTION>
					<OPTION value="depression">depression</OPTION>
					<OPTION value="enuresis">enuresis</OPTION>
					<OPTION value="social-wthdrawal">social-wthdrawal</OPTION>
					<OPTION value="panic-attacks">panic-attacks</OPTION>
                    <OPTION value="post-traumatic stress disorder">post-traumatic stress disorder</OPTION>
                    <OPTION value="obsessive-Compulsive Disorder">obsessive-Compulsive Disorder</OPTION>
                    <OPTION value="agoraphobia">agoraphobia</OPTION>
                    <OPTION value="generalized anxiety disorder">generalized anxiety disorder</OPTION>
                    <OPTION value="mood disorder">mood disorder</OPTION>
                    <OPTION value="clinical depression">clinical depression</OPTION>
                    <OPTION value="psychotic disorders">psychotic disorders</OPTION>
                    <OPTION value="obsessive–compulsive disorder">obsessive–compulsive disorder</OPTION>
                    <OPTION value="paranoid personality disorder">paranoid personality disorder</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="mre" id="mre" onclick="notres('res','pres','re');">
					<OPTION value="resolved after">resolved after</OPTION>
					<OPTION selected="selected" value="has not resolved">has not resolved</OPTION>
				</SELECT>
				<DIV id="res" style="visibility:hidden;">
					<INPUT type="text" size="5" name="mress" id="mress"> 
					<SELECT name="mresa" id="mresa">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month" selected>months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
				</DIV>
<DIV id="acby" style="visibility:visible">				
caused by
<SELECT name="mcause" id="mcause" onclick="secon();">
	<option value=".">Unknown</option>
	<OPTION value="an exacerbation of a pre-existing condition">exacerbation of a pre-existing condition</OPTION>
    <option value="stress of accident">stress of accident</option>
    <option value="being over-worked">being over-worked</option>
    <option value="slipping at work">slipping at work</option>
    <option value="medical negligence">medical negligence</option>
    <option value="lifting a heavy item">lifting a heavy item</option>
    <option value="sports">sports</option>
</SELECT>


				</DIV>
				<DIV id="pres" style="visibility:visible;">
					causing 
					<SELECT name="mrdis" id="mrdis">
						<OPTION value="mild">mild</OPTION>
						<OPTION selected="selected" value="mild and occasional">mild and occasional</OPTION>
						<OPTION value="mild to moderate">mild to moderate</OPTION>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
						<OPTION value="persisting">persisting</OPTION>
					</SELECT> 
					disability
				</DIV>
			</TD>
		</TR>
			
		<TR>
			<TD colspan="6" align="center"><INPUT type="button" onClick="addmenhlth();" value="ADD" style="width:100px;height:24px;border-radius:6px;"></TD>
		</TR>
	</TABLE>
</DIV>

<DIV id="mpn"> </DIV>



<DIV align="left" id="shh" style="background-color:#FFF;">
	<CENTER><H3>Pain<input type='button' id='tglpn' name='tglpn' value='+' onClick="tglpain();" style="border:none;background-color:#FFF;border-radius:6px;margin-left:6px;" /></H3></CENTER>
	<TABLE border="0" align="center" id="tblpn" rules="all" name="tblpn" cellpadding="4px" style="display:none;width:80%;border:none;font-family:Verdana, Geneva, sans-serif;">
		<TR>
			<TD>
            	<input type="radio" id="pinsym" name="pinsym" value='i' >Initial Symptom </input><br/>
                <input type="radio" id="platsym" name="pinsym" value='l'>Later Symptoms</input><br/>
            
            	
				
                
                <input type="checkbox" id="iib" onChange="stiff()"/>Stiffness<INPUT id="iii" type="hidden" value="0" />
				<DIV id="latetm" style="visibility:hidden;">
					Developed symptom after
					<INPUT type="text" id="ltme" />
					<SELECT name="ltmh" id="ltmh">
						<OPTION value="hour">hours</OPTION>
						<OPTION selected="selected" value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
					</SELECT>
				</DIV>
				
			</TD>
			<TD>Suffered</TD>
			<TD width="130px">
            	<input type="radio" id="hlvlmld" name="hlvl" value="mild">Mild</input><br/>
                <input type="radio" id="hlvlmod" name="hlvl" value="moderate">Moderate</input><br/>
                <input type="radio" id="hlvlsev" name="hlvl" value="severe" >Severe</input> <br/>
            
				<SELECT name="hlev" id="hlev">
					<OPTION value="mild">mild</OPTION>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe" selected>severe</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="prob" id="prob" multiple='multiple' style="width:150px;">
                	
                    <OPTION value="AC joint pain">AC joint</OPTION>
                     <OPTION value="(abdominal) right upper quadrant pain">(abdominal) right upper quadrant</OPTION>
                    <OPTION value="(abdominal) left upper quadrant pain">(abdominal) left upper quadrant</OPTION>
                    <OPTION value="(abdominal) right lower quadrant pain">(abdominal) right lower quadrant</OPTION>
                    <OPTION value="(abdominal) left lower quadrant pain">(abdominal) left lower quadrant</OPTION>
                    <OPTION value="acromion pain">acromion</OPTION>
					<OPTION value="arms pain">arms</OPTION>
					<OPTION value="left arm pain">left arm</OPTION>
					<OPTION value="right arm pain">right arm</OPTION> 
                    <OPTION value="armpit pain">armpit</OPTION>
                    <OPTION value="left armpit pain">left armpit</OPTION>
                    <OPTION value="right armpit pain">right armpit</OPTION>
                     <option value="areola pain">areola</option>
                    <OPTION value="abdomen pain">abdomen</OPTION>
                    <OPTION value="ankles pain">ankles</OPTION>
					<OPTION value="left ankle pain">left ankle</OPTION>
					<OPTION value="right ankle pain">right ankle</OPTION>
                    <option value="breasts pain">breasts</option>
                    <option value="left breast pain">left breast</option>
                    <option value="right breast pain">right breast</option>
					<OPTION value="back pain">back</OPTION>
                    <OPTION value="upper back pain">upper back</OPTION>
					<OPTION value="lower back pain">lower back</OPTION>
                    <OPTION value="biceps pain">biceps</OPTION>
					<OPTION value="left bicep pain">left bicep</OPTION>
					<OPTION value="right bicep pain">right bicep</OPTION>
                    <option value="cheeks pain">cheeks</option>
                    <option value="left cheek pain">left cheek</option>
                    <option value="right cheek pain">right cheek</option>
                     <OPTION value="coracoid process pain">coracoid process</OPTION>
                     <option value="chin pain">chin</option>
                    <OPTION value="cervical spine pain">cervical spine</OPTION>
                    <OPTION value="clavicle pain">clavicle</OPTION>
                    <OPTION value="collarbone pain">collarbone</OPTION>
                    <OPTION value="cleft of venus pain">cleft of venus</OPTION>
                    
                    <OPTION value="calves pain">calves</OPTION>
                    <OPTION value="left calf pain">left calf</OPTION>
                    <OPTION value="right calf pain">right calf</OPTION>
                    
                    <OPTION value="chest pain">chest</OPTION>
                    <option value="ears pain">ears</option>
                    <option value="left ear pain">left ear</option>
                    <option value="right ear pain">right ear</option>
                    <OPTION value="left eye pain">left eye</OPTION>
                    <OPTION value="right eye pain">right eye</OPTION>
                    <OPTION value="eyes pain">eyes</OPTION>
                        
                   <option value="fingers pain">fingers pain</option>
                    <option value="left hand fingers pain">left hand fingers</option>
                    <option value="right hand fingers pain">right hand fingers pain</option>
                     <option value="finger nails pain">finger nails pain</option>
                    <option value="left-hand finger nails pain">left-hand finger nails pain</option>
                    <option value="right-hand finger nails pain">right-hand finger nails pain</option>
                    <OPTION value="forehead pain">forehead</OPTION>
                    
                    <OPTION value="feet pain">feet</OPTION>
					<OPTION value="left foot pain">left foot</OPTION>
					<OPTION value="right foot pain">right foot</OPTION>
                    
                    <OPTION value="heels pain">heels</OPTION>
                    <OPTION value="left heel pain">left heel</OPTION>
                    <OPTION value="right heel pain">right heel</OPTION>
                    <OPTION value="foot soles pain">foot soles</OPTION>
                    <OPTION value="left foot sole pain">left foot sole</OPTION>
                    <OPTION value="right foot sole pain">right foot sole</OPTION>
                    <OPTION value="(feet) balls pain">(feet) balls</OPTION>
                    <OPTION value="(feet) left ball pain">(feet) left ball</OPTION>
                    <OPTION value="(feet) right ball pain">(feet) right ball</OPTION>
                    <OPTION value="toes pain">toes</OPTION>
                    <OPTION value="left foot toes pain">left foot toes</OPTION>
                    <OPTION value="right foot toes pain">right foot toes</OPTION>
                    <OPTION value="toe nails pain">toe nails</OPTION>
                    <OPTION value="left toe nails pain">left toe nails</OPTION>
                    <OPTION value="right toe nails pain">right toe nails</OPTION>

                    <OPTION value="left hip pain">left hip</OPTION>
                    <OPTION value="right hip pain">right hip</OPTION>
                    <OPTION value="headache" selected >head</OPTION>
                     <OPTION value="hands pain">hands</OPTION>
					<OPTION value="left hand pain">left hand</OPTION>
					<OPTION value="right hand pain">right hand</OPTION>
                    <option value="incisors pain">incisors</option>
                    <option value="inter-vertebrael disc pain">inter-vertebrael disc</option>
                    <option value="jaw pain">jaw</option>
                    <option value="jaw bone pain">jaw bone</option>
                    <option value="upper jaw pain">upper jaw</option>
                    <option value="lower jaw pain">lower jaw</option>
                    <OPTION value="knee pains">knee</OPTION>
                    <OPTION value="left knee pain">left knee</OPTION>
					<OPTION value="right knee pain">right knee</OPTION>
                      <OPTION value="knuckles pain">knuckles</OPTION>
                    <OPTION value="left knuckle pain">left knuckle</OPTION>
                    <OPTION value="right knuckle pain">right knuckle</OPTION>
                    <OPTION value="legs pain">legs</OPTION>
					<OPTION value="left leg pain">left leg</OPTION>
					<OPTION value="right leg pain">right leg</OPTION>
                    <option value="lips pain">lips</option>
                    <OPTION value="upper lip pain">upper lip</OPTION>
                    <OPTION value="lower lip pain">lower lip</OPTION>

                     <option value="molars pain">molars</option>  
                     <OPTION value="neck pain">neck</OPTION>
                      <option value="nose pain">nose</option>
                    <option value="nose bridge pain">nose bridge</option>
                    
                    <OPTION value="left nostril pain">left nostril pain</OPTION>
                    <OPTION value="right nostril pain">right nostril</OPTION>
                    <OPTION value="nostrils pain">nostrils pain</OPTION>
                     <option value="nipples pain">nipples</option>
                    <option value="left nipple pain">left nipple</option>
                    <option value="right nipple pain">right nipple</option>
                    <option value="navel pain">navel</option>
                      <OPTION value="palms pain">palms</OPTION>
                    <OPTION value="left palm pain">left palm</OPTION>
                    <OPTION value="right palm pain">right palm</OPTION>
                    <OPTION value="pectoral pain">pectoral</OPTION>
                    <option value="premolar pain">premolar</option>
                    <OPTION value="ribs pain">ribs</OPTION>

                    <OPTION value="shoulders pain">shoulders</OPTION>
					<OPTION value="left shoulder pain">left shoulder</OPTION>
					<OPTION value="right shoulder pain">right shoulder</OPTION>
                     <option value="shoulder blades pain">shoulder blades</option>
                    <option value="left shoulder blade pain">left shoulder blade</option>
                    <option value="right shoulder blade pain">right shoulder blade</option>
                    <OPTION value="neck and shoulders pain">neck and shoulders</OPTION>
					   <OPTION value="lumbar spine pain">lumbar spine</OPTION>
                    <option value="sacrum spine pain">sacrum spine</option>
                   <OPTION value="shin pain">shins</OPTION>
                    <OPTION value="left shin pain">left shin</OPTION>
                    <OPTION value="right shin pain">right shin</OPTION>
                     <OPTION value="scapula pain">scapula</OPTION>
                    <OPTION value="sternum pain">sternum</OPTION>
                    <OPTION value="spinal pain">spine</OPTION>
					
                    <OPTION value="left temple pain">left temple</OPTION>
                    <OPTION value="right temple pain">right temple</OPTION>
                    <OPTION value="temples pain">temples</OPTION>
                     <option value="teeth pain">teeth</option>
                    <option value="tongue pain">tongue</option>
                   <OPTION value="thoratic pain">thoratic</OPTION>
                  <OPTION value="triceps pain">triceps</OPTION>
					<OPTION value="left tricep pain">left tricep</OPTION>
					<OPTION value="right tricep pain">right tricep</OPTION>
                     <OPTION value="trapezius pain">trapezius</OPTION>
                   
                    <OPTION value="wrists pain">wrists</OPTION>
					<OPTION value="left wrist pain">left wrist</OPTION>
					<OPTION value="right wrist pain">right wrist</OPTION>
                    
                    <OPTION value="genitalia pain">genitalia</OPTION>
                    <OPTION value="penis pain">penis</OPTION>
                    <OPTION value="scrotum pain">scrotum</OPTION>
                    <OPTION value="mons pubis pain">mons pubis</OPTION>

					<OPTION value="anxiety">anxiety</OPTION>
					<OPTION value="nightmares">nightmares</OPTION>
					<OPTION value="depression">depression</OPTION>
					<OPTION value="enuresis">enuresis</OPTION>
					<OPTION value="social-wthdrawal">social-wthdrawal</OPTION>
					<OPTION value="panic-attacks">panic-attacks</OPTION>
                    <OPTION value="post-traumatic stress disorder">post-traumatic stress disorder</OPTION>
                    <OPTION value="obsessive-Compulsive Disorder">obsessive-Compulsive Disorder</OPTION>
                    <OPTION value="agoraphobia">agoraphobia</OPTION>
                    <OPTION value="generalized anxiety disorder">generalized anxiety disorder</OPTION>
                    <OPTION value="mood disorder">mood disorder</OPTION>
                    <OPTION value="clinical depression">clinical depression</OPTION>
                    <OPTION value="psychotic disorders">psychotic disorders</OPTION>
                    <OPTION value="obsessive–compulsive disorder">obsessive–compulsive disorder</OPTION>
                    <OPTION value="paranoid personality disorder">paranoid personality disorder</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="re" id="re" onclick="notres('res','pres','re');">
					<OPTION value="resolved after">resolved after</OPTION>
					<OPTION selected="selected" value="has not resolved">has not resolved</OPTION>
				</SELECT>
				<DIV id="res" style="visibility:hidden;">
					<INPUT type="text" size="5" name="ress" id="ress"> 
					<SELECT name="resa" id="resa">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month" selected>months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
caused by
<SELECT name="cause" id="cause" onclick="secon();">
	<option value=".">Unknown</option>
	<OPTION selected="selected" value="a whiplash injury">Whiplash</OPTION>
	<OPTION value="an exacerbation of a pre-existing condition">exacerbation of a pre-existing condition</OPTION>
	<OPTION value="a trauma from the seatbelt">from the seatbelt</OPTION>
    <OPTION value="a direct trauma">direct trauma</OPTION>
	<OPTION value="a sprain sustained in the accident">sprain sustained in the accident</OPTION>
	<OPTION value="secondary to">secondary to (select from the next list)</OPTION>
    <option value="stress of accident">stress of accident</option>
    <option value="broken windscreen">broken windscreen</option>
    <option value="broken window">broken window</option>
    <option value="air-bag deploying">air-bag deploying</option>
    <option value="loose object in car">loose object in car</option>
    <option value="hitting steering wheel">hitting steering wheel</option>
    <option value="getting hand stuck between objects">getting hand caught between objects</option>
    <option value="vehicle overturning">vehicle overturning</option>
    <option value="falling off the bike">falling off the bike</option>
    <option value="getting hit by other passenger(s)">getting hit by other passenger(s)</option>
    <option value="a fall">a fall</option>
    <option value="being over-worked">being over-worked</option>
    <option value="slipping at work">slipping at work</option>
    <option value="medical negligence">medical negligence</option>
    <option value="lifting a heavy item">lifting a heavy item</option>
    <option value="sports">sports</option>
</SELECT>

<div id="dsec" style="visibility:hidden;">
<SELECT name="cause2" id="cause2">
	
    <OPTION value="arm pain">arm pain</OPTION>
	<OPTION value="left arm pain">left arm pain</OPTION>
	<OPTION value="right arm pain">right arm pain</OPTION>
    <OPTION value="back pain">back pain</OPTION>
	<OPTION value="lower back pain">lower back pain</OPTION>
	<OPTION value="upper back pain">upper back pain</OPTION>
    <OPTION value="chest pain">chest pain</OPTION>
    <OPTION value="head ache">head ache</OPTION>
	<OPTION value="legs pain">legs pain</OPTION>
	<OPTION value="left leg pain">left leg pain</OPTION>
	<OPTION value="right leg pain">right leg pain</OPTION>
    <OPTION value="neck pain">neck pain</OPTION>
	<OPTION value="shoulder pain">shoulder pain</OPTION>
	<OPTION value="left shoulder pain">left shoulder pain</OPTION>
	<OPTION value="right shoulder pain">right shoulder pain</OPTION>
	<OPTION value="stomach pain">stomach pain</OPTION>
	
</SELECT>
</div>
				</DIV>
				<DIV id="pres">
					causing 
					<SELECT name="rdis" id="rdis">
						<OPTION value="mild">mild</OPTION>
						<OPTION selected="selected" value="mild and occasional">mild and occasional</OPTION>
						<OPTION value="mild to moderate">mild to moderate</OPTION>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
						<OPTION value="persisting">persisting</OPTION>
					</SELECT> 
					disability
				</DIV>
			</TD>
		</TR>
			
		<TR>
			<TD colspan="6" align="center"><INPUT type="button" onClick="addpain();" value="ADD" style="border-radius:6px;height:25px;width:100px;"></TD>
		</TR>
	</TABLE>
</DIV>

<DIV id="pn"> </DIV>

<DIV align="left" id="shh" style="background-color:#FFF;">
	<CENTER><H3>Fractures <INPUT type="button" id="tglfacs" name="tglfacs" onClick="tgfracs();" value="+" style="border:none;background-color:#FFF;border-radius:6px;"/></H3></CENTER>
	<TABLE border="0" id="tbfacs" name="tbfacs" align="center" rules="all" cellpadding="4px" style='display:none;width:60%;border:none;padding:6px;background-color:#FFF;'>
		<TR>
			<TD style="width:120px;">&nbsp;</TD>
			<TD>Suffered </TD>
            <TD>
				<SELECT name="faclvl" id="faclvl">
                	 <OPTION value="a fracture of">Fracture</OPTION>
                     <OPTION value="a compound Fracture of">Compound fracture</OPTION>
                     <OPTION value="a incomplete Fracture of">incomplete fracture</OPTION>
                </SELECT>
			</TD>
            <TD>
				<SELECT name="facprob" id="facprob">
				    <OPTION value="">..Select an Option..</OPTION>
                    <OPTION value="skull">skull</OPTION>
                    <OPTION value="jaw">jaw</OPTION>
                    <OPTION value="Clavicle">Clavicle</OPTION>
					<OPTION value="Humerus">Humerus</OPTION>
					<OPTION value="Sternum">Sternum</OPTION>
                    <OPTION value="Rib">Rib</OPTION>
                    <OPTION value="Spine">Spine</OPTION>
					<OPTION value="Pelvis">Pelvis</OPTION>
					<OPTION value="Ulna">Ulna</OPTION>
					<OPTION value="Radius">Radius</OPTION>
					<OPTION value="Carpals">Carpals</OPTION>
                    <OPTION value="Metacarpals">Metacarpals</OPTION>
                    <OPTION value="Phalanges">obsessive-Compulsive Disorder</OPTION>
                    <OPTION value="Femur">Femure</OPTION>
                    <OPTION value="Patella">Patella</OPTION>
                    <OPTION value="Tibia">Tibia</OPTION>
                    <OPTION value="Tarsal">Tarsal</OPTION>
                    <OPTION value="Metatarsel">Metatarsel</OPTION>                  
				</SELECT>
			</TD>
			
			<TD style="width:320px;padding:5px;">
				<SELECT name="facre" id="facre" onclick="">
					<OPTION value="healed">healed</OPTION>
                    <OPTION value="not-healed">not yet healed</OPTION>
					<OPTION selected="selected" value="has not resolved">has not resolved</OPTION>
				</SELECT>
				
<DIV id="acby" style="visibility:visible">				
caused by
<SELECT name="faccause" id="faccause" onclick="secon();">
	<option value=".">Unknown</option>
	<OPTION value="an exacerbation of a pre-existing condition">exacerbation of a pre-existing condition</OPTION>
    <option value="stress of accident">stress of accident</option>
    <option value="being over-worked">being over-worked</option>
    <option value="slipping at work">slipping at work</option>
    <option value="medical negligence">medical negligence</option>
    <option value="lifting a heavy item">lifting a heavy item</option>
    <option value="sports">sports</option>
</SELECT>


				</DIV>
				<DIV id="pres" style="visibility:visible;">
					causing 
					<SELECT name="facrdis" id="facrdis">
						<OPTION value="mild">mild</OPTION>
						<OPTION selected="selected" value="mild and occasional">mild and occasional</OPTION>
						<OPTION value="mild to moderate">mild to moderate</OPTION>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
						<OPTION value="persisting">persisting</OPTION>
					</SELECT> 
					disability
				</DIV>
			</TD>
		</TR>
			
		<TR>
			<TD colspan="6" align="center"><INPUT type="button" onClick="addFracture();" value="ADD" style="width:100px;height:24px;border-radius:6px;"></TD>
		</TR>
	</TABLE>
</DIV>

<DIV id="fracs"> </DIV>



<DIV align="left" id="shh">
	<CENTER><H3>Bruising/Burn/Laceration/Grazing/Ligaments/Tendons/Bleeding<input id="tglbrnh" name="tglbrnh" type='button' onclick='tglbrn()' value='+' style="background-color:#FFF;border-radius:6px;border:none;"/></H3></CENTER>
	<TABLE border="0" align="center" id='tblbrn' rules="all" cellpadding="4px" style='display:none;width:80%;background-color:#FFF;'>
		<TR>
			<TD>
				<SELECT id="bil">
					<OPTION value="burns">Burn</OPTION>
					<OPTION value="bruising">Bruising</OPTION>
					<OPTION value="grazing">Grazing</OPTION>
					<OPTION value="laceration">Laceration</OPTION>
                    <option value="swelling">swelling</option>
                    <option value="torn ligaments">torn ligaments</option>
                    <option value="torn tendons">torn tendons</option>
					<option value="bleeding">bleeding</option>
				</SELECT>
			</TD>
			<TD>Suffered</TD>
			<TD>
				<SELECT name="bhlev" id="bhlev">
					<OPTION value="mild">mild</OPTION>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="bprob" id="bprob">
					<OPTION value="AC joint pain">AC joint</OPTION>
                     <OPTION value="(abdominal) right upper quadrant pain">(abdominal) right upper quadrant</OPTION>
                    <OPTION value="(abdominal) left upper quadrant pain">(abdominal) left upper quadrant</OPTION>
                    <OPTION value="(abdominal) right lower quadrant pain">(abdominal) right lower quadrant</OPTION>
                    <OPTION value="(abdominal) left lower quadrant pain">(abdominal) left lower quadrant</OPTION>
                    <OPTION value="acromion pain">acromion</OPTION>
					<OPTION value="arms pain">arms</OPTION>
					<OPTION value="left arm pain">left arm</OPTION>
					<OPTION value="right arm pain">right arm</OPTION> 
                    <OPTION value="armpit pain">armpit</OPTION>
                    <OPTION value="left armpit pain">left armpit</OPTION>
                    <OPTION value="right armpit pain">right armpit</OPTION>
                     <option value="areola pain">areola</option>
                    <OPTION value="abdomen pain">abdomen</OPTION>
                    <OPTION value="ankles pain">ankles</OPTION>
					<OPTION value="left ankle pain">left ankle</OPTION>
					<OPTION value="right ankle pain">right ankle</OPTION>
                    <option value="breasts pain">breasts</option>
                    <option value="left breast pain">left breast</option>
                    <option value="right breast pain">right breast</option>
					<OPTION value="back pain">back</OPTION>
                    <OPTION value="upper back pain">upper back</OPTION>
					<OPTION value="lower back pain">lower back</OPTION>
                    <OPTION value="biceps pain">biceps</OPTION>
					<OPTION value="left bicep pain">left bicep</OPTION>
					<OPTION value="right bicep pain">right bicep</OPTION>
                    <option value="cheeks pain">cheeks</option>
                    <option value="left cheek pain">left cheek</option>
                    <option value="right cheek pain">right cheek</option>
                     <OPTION value="coracoid process pain">coracoid process</OPTION>
                     <option value="chin pain">chin</option>
                    <OPTION value="cervical spine pain">cervical spine</OPTION>
                    <OPTION value="clavicle pain">clavicle</OPTION>
                    <OPTION value="collarbone pain">collarbone</OPTION>
                    <OPTION value="cleft of venus pain">cleft of venus</OPTION>
                    
                    <OPTION value="calves pain">calves</OPTION>
                    <OPTION value="left calf pain">left calf</OPTION>
                    <OPTION value="right calf pain">right calf</OPTION>
                    
                    <OPTION value="chest pain">chest</OPTION>
                    <option value="ears pain">ears</option>
                    <option value="left ear pain">left ear</option>
                    <option value="right ear pain">right ear</option>
                    <OPTION value="left eye pain">left eye</OPTION>
                    <OPTION value="right eye pain">right eye</OPTION>
                    <OPTION value="eyes pain">eyes</OPTION>
                        
                   <option value="fingers pain">fingers pain</option>
                    <option value="left hand fingers pain">left hand fingers</option>
                    <option value="right hand fingers pain">right hand fingers pain</option>
                     <option value="finger nails pain">finger nails pain</option>
                    <option value="left-hand finger nails pain">left-hand finger nails pain</option>
                    <option value="right-hand finger nails pain">right-hand finger nails pain</option>
                    <OPTION value="forehead pain">forehead</OPTION>
                    
                    <OPTION value="feet pain">feet</OPTION>
					<OPTION value="left foot pain">left foot</OPTION>
					<OPTION value="right foot pain">right foot</OPTION>
                    
                    <OPTION value="heels pain">heels</OPTION>
                    <OPTION value="left heel pain">left heel</OPTION>
                    <OPTION value="right heel pain">right heel</OPTION>
                    <OPTION value="foot soles pain">foot soles</OPTION>
                    <OPTION value="left foot sole pain">left foot sole</OPTION>
                    <OPTION value="right foot sole pain">right foot sole</OPTION>
                    <OPTION value="(feet) balls pain">(feet) balls</OPTION>
                    <OPTION value="(feet) left ball pain">(feet) left ball</OPTION>
                    <OPTION value="(feet) right ball pain">(feet) right ball</OPTION>
                    <OPTION value="toes pain">toes</OPTION>
                    <OPTION value="left foot toes pain">left foot toes</OPTION>
                    <OPTION value="right foot toes pain">right foot toes</OPTION>
                    <OPTION value="toe nails pain">toe nails</OPTION>
                    <OPTION value="left toe nails pain">left toe nails</OPTION>
                    <OPTION value="right toe nails pain">right toe nails</OPTION>

                    <OPTION value="left hip pain">left hip</OPTION>
                    <OPTION value="right hip pain">right hip</OPTION>
                    <OPTION value="headache" selected >head</OPTION>
                     <OPTION value="hands pain">hands</OPTION>
					<OPTION value="left hand pain">left hand</OPTION>
					<OPTION value="right hand pain">right hand</OPTION>
                    <option value="incisors pain">incisors</option>
                    <option value="inter-vertebrael disc pain">inter-vertebrael disc</option>
                    <option value="jaw pain">jaw</option>
                    <option value="jaw bone pain">jaw bone</option>
                    <option value="upper jaw pain">upper jaw</option>
                    <option value="lower jaw pain">lower jaw</option>
                    <OPTION value="knee pains">knee</OPTION>
                    <OPTION value="left knee pain">left knee</OPTION>
					<OPTION value="right knee pain">right knee</OPTION>
                      <OPTION value="knuckles pain">knuckles</OPTION>
                    <OPTION value="left knuckle pain">left knuckle</OPTION>
                    <OPTION value="right knuckle pain">right knuckle</OPTION>
                    <OPTION value="legs pain">legs</OPTION>
					<OPTION value="left leg pain">left leg</OPTION>
					<OPTION value="right leg pain">right leg</OPTION>
                    <option value="lips pain">lips</option>
                    <OPTION value="upper lip pain">upper lip</OPTION>
                    <OPTION value="lower lip pain">lower lip</OPTION>

                     <option value="molars pain">molars</option>  
                     <OPTION value="neck pain">neck</OPTION>
                      <option value="nose pain">nose</option>
                    <option value="nose bridge pain">nose bridge</option>
                    
                    <OPTION value="left nostril pain">left nostril pain</OPTION>
                    <OPTION value="right nostril pain">right nostril</OPTION>
                    <OPTION value="nostrils pain">nostrils pain</OPTION>
                     <option value="nipples pain">nipples</option>
                    <option value="left nipple pain">left nipple</option>
                    <option value="right nipple pain">right nipple</option>
                    <option value="navel pain">navel</option>
                      <OPTION value="palms pain">palms</OPTION>
                    <OPTION value="left palm pain">left palm</OPTION>
                    <OPTION value="right palm pain">right palm</OPTION>
                    <OPTION value="pectoral pain">pectoral</OPTION>
                    <option value="premolar pain">premolar</option>
                    <OPTION value="ribs pain">ribs</OPTION>

                    <OPTION value="shoulders pain">shoulders</OPTION>
					<OPTION value="left shoulder pain">left shoulder</OPTION>
					<OPTION value="right shoulder pain">right shoulder</OPTION>
                     <option value="shoulder blades pain">shoulder blades</option>
                    <option value="left shoulder blade pain">left shoulder blade</option>
                    <option value="right shoulder blade pain">right shoulder blade</option>
                    <OPTION value="neck and shoulders pain">neck and shoulders</OPTION>
					   <OPTION value="lumbar spine pain">lumbar spine</OPTION>
                    <option value="sacrum spine pain">sacrum spine</option>
                   <OPTION value="shin pain">shins</OPTION>
                    <OPTION value="left shin pain">left shin</OPTION>
                    <OPTION value="right shin pain">right shin</OPTION>
                     <OPTION value="scapula pain">scapula</OPTION>
                    <OPTION value="sternum pain">sternum</OPTION>
                    <OPTION value="spinal pain">spine</OPTION>
					
                    <OPTION value="left temple pain">left temple</OPTION>
                    <OPTION value="right temple pain">right temple</OPTION>
                    <OPTION value="temples pain">temples</OPTION>
                     <option value="teeth pain">teeth</option>
                    <option value="tongue pain">tongue</option>
                   <OPTION value="thoratic pain">thoratic</OPTION>
                  <OPTION value="triceps pain">triceps</OPTION>
					<OPTION value="left tricep pain">left tricep</OPTION>
					<OPTION value="right tricep pain">right tricep</OPTION>
                     <OPTION value="trapezius pain">trapezius</OPTION>
                   
                    <OPTION value="wrists pain">wrists</OPTION>
					<OPTION value="left wrist pain">left wrist</OPTION>
					<OPTION value="right wrist pain">right wrist</OPTION>
                    
                    <OPTION value="genitalia pain">genitalia</OPTION>
                    <OPTION value="penis pain">penis</OPTION>
                    <OPTION value="scrotum pain">scrotum</OPTION>
                    <OPTION value="mons pubis pain">mons pubis</OPTION>

					<OPTION value="anxiety">anxiety</OPTION>
					<OPTION value="nightmares">nightmares</OPTION>
					<OPTION value="depression">depression</OPTION>
					<OPTION value="enuresis">enuresis</OPTION>
					<OPTION value="social-wthdrawal">social-wthdrawal</OPTION>
					<OPTION value="panic-attacks">panic-attacks</OPTION>
                    <OPTION value="post-traumatic stress disorder">post-traumatic stress disorder</OPTION>
                    <OPTION value="obsessive-Compulsive Disorder">obsessive-Compulsive Disorder</OPTION>
                    <OPTION value="agoraphobia">agoraphobia</OPTION>
                    <OPTION value="generalized anxiety disorder">generalized anxiety disorder</OPTION>
                    <OPTION value="mood disorder">mood disorder</OPTION>
                    <OPTION value="clinical depression">clinical depression</OPTION>
                    <OPTION value="psychotic disorders">psychotic disorders</OPTION>
                    <OPTION value="obsessive–compulsive disorder">obsessive–compulsive disorder</OPTION>
                    <OPTION value="paranoid personality disorder">paranoid personality disorder</OPTION>
				</SELECT>
				</SELECT>
			</TD>
			
			<TD>
				<SELECT name="bre" id="bre" onclick="notresBurn('bres','bbres','bre');">
                	<option value="">unknown</option>
					<OPTION value="resolved after">resolved</OPTION>
					<OPTION value="has not resolved">has not resolved</OPTION>
				</SELECT>
				<DIV id="bres" style="visibility:hidden;">
                	(optional) after
					<INPUT type="text" size="5" name="bress" id="bress"> 
						<SELECT name="bresa" id="bresa">
							<OPTION value="day">days</OPTION>
							<OPTION value="week">weeks</OPTION>
							<OPTION value="month" selected>months</OPTION>
							<OPTION value="year">years</OPTION>
						</SELECT>
                        
caused by
<SELECT name="causeBurn" id="causeBurn" onclick="seconBurn();">
	<option value=".">Unknown</option>
	<OPTION selected="selected" value="a whiplash injury">Whiplash</OPTION>
	<OPTION value="an exacerbation of a pre-existing condition">exacerbation of a pre-existing condition</OPTION>
	<OPTION value="a trauma from the seatbelt">from the seatbelt</OPTION>
	<OPTION value="a sprain sustained in the accident">sprain sustained in the accident</OPTION>
	<OPTION value="secondary to">secondary to (select from the next list)</OPTION>
    <option value="stress of accident">stress of accident</option>
    <option value="broken windscreen">broken windscreen</option>
    <option value="broken window">broken window</option>
    <option value="air-bag deploying">air-bag deploying</option>
    <option value="loose object in car">loose object in car</option>
    <option value="hitting steering wheel">hitting steering wheel</option>
    <option value="getting hand stuck between objects">getting hand caught between objects</option>
    <option value="vehicle overturning">vehicle overturning</option>
    <option value="falling off the bike">falling off the bike</option>
    <option value="getting hit by other passenger(s)">getting hit by other passenger(s)</option>
    <option value="a fall">a fall</option>
    <option value="being over-worked">being over-worked</option>
    <option value="slipping at work">slipping at work</option>
    <option value="medical negligence">medical negligence</option>
    <option value="lifting a heavy item">lifting a heavy item</option>
    <option value="sports">sports</option>
</SELECT>

<div id="dsecBurn" style="visibility:hidden;">
<SELECT name="cause2Burn" id="cause2Burn">

    <OPTION value="arm pain">arm pain</OPTION>
	<OPTION value="left arm pain">left arm pain</OPTION>
	<OPTION value="right arm pain">right arm pain</OPTION>
    <OPTION value="back pain">back pain</OPTION>
     <OPTION value="lower back pain">lower back pain</OPTION>
	<OPTION value="upper back pain">upper back pain</OPTION>
	<OPTION value="chest pain">chest pain</OPTION> 
	<OPTION value="head ache">head ache</OPTION>
	<OPTION value="legs pain">legs pain</OPTION>
	<OPTION value="left leg pain">left leg pain</OPTION>
	<OPTION value="right leg pain">right leg pain</OPTION>
    <OPTION value="neck pain">neck pain</OPTION>
	<OPTION value="shoulder pain">shoulder pain</OPTION>
	<OPTION value="left shoulder pain">left shoulder pain</OPTION>
	<OPTION value="right shoulder pain">right shoulder pain</OPTION>
	<OPTION value="stomach pain">stomach pain</OPTION>
	
</SELECT>
					</DIV>
                    
                    
                    
					<DIV id="bbres" style="visibility:hidden;">
						causing 
						<SELECT name="brdis" id="brdis">
							<OPTION value="mild">mild</OPTION>
							<OPTION value="mild and occasional">mild and occasional</OPTION>
							<OPTION value="mild to moderate">mild to moderate</OPTION>
							<OPTION value="moderate">moderate</OPTION>
							<OPTION value="severe">severe</OPTION>
						</SELECT> 
						disability
					</DIV>
				</TD>
			</TR>
			
			<TR>
				<TD colspan="6" align="center"><INPUT type="button" onClick="addbruise();" value="ADD" style="width:100px;height:24px;border-radius:6px;"></TD>
				</TR>
			</TABLE>
</DIV>

<DIV id="bru"> </DIV>



<DIV align="center" id="other" style="border-bottom:1px solid #CCC;padding-bottom:8px;background-color:#FFF;" >
	<CENTER><H3>Other</H3></CENTER>
	
	<SELECT id="oil">
		<OPTION value="i">Initial Symptom</OPTION>
		<OPTION value="l">Later Symptom</OPTION>
	</SELECT><br/>
	
	<TEXTAREA name="oth" id="oth" cols="100" rows="5"></TEXTAREA>
	<br/>
	<SELECT id="ores">
		<OPTION value="resolved">Resolved</OPTION>
		<OPTION value="unresolved">Unresolved</OPTION>
	</SELECT>
	<br/><br/>
	<INPUT type="button" onClick="addother();" value="ADD" style="width:90px;height:25px;border-radius:6px;">
</DIV>


<div id="bdy" name="bdy" style="position:absolute;height:550px;width:350px;background-image:url('images/bodyatom.jpg');" >

			<div style="margin-top:0px;height:280px;;">
            <div style="margin-top:45px;">head</div>
            <div style="margin-top:80px;margin-left:-130px;">left shoulder</div>
			<div style="margin-top:70px;margin-left:-170px;">left arm</div>
       		<div style="margin-top:-10px;">Chest</div>
            <div style="margin-top:-120px;margin-left:130px;">right shoulder</div>
			<div style="margin-top:70px;margin-left:170px;">right arm</div>
           
            </div>
            
            <div style="height:300px;;">
            
            <div style="margin-top:00px;margin-left:180px;">right hand</div>
            <div style="margin-top:-20px;margin-left:-180px;">left hand</div>
            
              <div style="margin-top:10px;margin-left:-130px;">left leg</div>
              <div style="margin-top:10px;margin-left:-130px;">left knee</div>
                <div style="margin-top:80px;margin-left:-140px;">left ankle</div>
              <div style="margin-top:0px;margin-left:-140px;">left foot</div>
              
              <div style="margin-top:-170px;margin-left:130px;">right leg</div>
               <div style="margin-top:10px;margin-left:140px;">right knee</div>
                <div style="margin-top:80px;margin-left:140px;">right ankle</div>
              <div style="margin-top:0px;margin-left:140px;">right foot</div>
            
            
            </div>
            
            
            

</div>

<div id="myDiv" align="center" style="width:300px;margin-top:10px;"><input type="button" value="Add All" width='140px' onClick="processall();" /><input type="button" onClick="ignoreall(document.getElementById('iino').value)" Value="Remove All" /> </div>
<!-- <CENTER><INPUT type="button" value="Finalize" onclick="final();"></CENTER> -->

<?php 

$ii=1;
while ($ri=mysql_fetch_array($qi))
{
	echo "<input type='hidden' value='".$ri['stat']."' name='ih[$ii]' id='ih[$ii]' />";
	echo "<input type='hidden' value='".$ri['prob']."' name='ip[$ii]' id='ip[$ii]' />";
	echo "<textarea cols=100 rows=2 id='i[$ii]' name='i[$ii]' style='border-radius:6px;border:1px solid #CCC;padding:5px;'>".$ri['msg']."</textarea>";
	echo "<input type='hidden' value='Block' name='pphhi[$ii]' id='pphhi[$ii]' />";
	echo "<input type='button' style='background-color:#AA3333;color:#FFF;' onclick=\"ignorei('$ii');\" value='Remove' id='pphhib[$ii]' name='pphhib[$ii]' /><br />";
	$ii=$ii+1;
}

$il=1;
while ($rl=mysql_fetch_array($ql))
{
	echo "<input type='hidden' value='".$rl['stat']."' name='lh[$il]' id='lh[$il]' />";
	echo "<input type='hidden' value='".$rl['prob']."' name='lp[$il]' id='lp[$il]' />";
	echo "<textarea cols=100 rows=2 id='l[$il]' name='l[$il]'>".$rl['msg']."</textarea>";
	echo "<input type='hidden' value='Block' name='pphhl[$il]' id='pphhl[$il]' />";
	echo "<input type='button' style='background-color:#AA3333;color:#FFF;' onclick=\"ignorel('$il');\" value='Remove' id='pphhlb[$il]' name='pphhlb[$il]' /><br />";
	$il=$il+1;
}

?>
<input type="hidden" value="<?php echo $ii; ?>" id="iino" name="iino" /> 
<CENTER><INPUT type="reset" value="RESET IT" style="width:90px;height:25px;border-radius:7px;" ><INPUT type="submit" value="SUBMIT" style="width:90px;height:25px;border-radius:7px;"></CENTER>

	
</FORM>

</BODY>

</HTML>
