<?php

include 'template.php';

head('PMH', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/pmh.js"></script>', '', '', '');
?>

<BODY onLoad="doeF();" style="background-color:#FFF;padding:0px;width:98%;">


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('PMH', $org, $id);

$s00="select * from claimant where org='$org' and cid='$id'";
$q00=mysql_query($s00);
$r00=mysql_fetch_array($q00);

$gen=$r00['gen'];
$naming =$r00['ct'].' '.$r00['cln'];

$heshe='';
if ($gen=='f')
{
	$heshe='her';
}
else
{
	$heshe='his';
}

//check if there is any chance of a hist stating there is not relevant medical history .

$s="select * from pmh where id='$id' and org='".$_SESSION['o']."' and hist='There was no relevant past medical history.' or hist='There was no relevant past medical history'";
//echo $s;
$q=mysql_query($s);
$qq1=mysql_num_rows($q);

$qq=$qq1-1;


//define if selection has been 'There was no relevant past medical history'
// specify no information should be shown due to irrelvance.
$pmp=0;   

//echo $qq1."<br>";

//echo $qq;

if ($qq==-1)
{
	$s="select * from pmh where id='$id' and org='".$_SESSION['o']."'";
	$q=mysql_query($s);
	$qq=mysql_num_rows($q)-1;
	
	if ($qq==-1)
		$qq=0;
	
	$pmp=1;
	
//	echo "here";
}

//echo $pmp;
?>

<FORM method="POST" action="Process/pmh.php" style="background-color:#FFF;padding:6px;">

<input type="hidden" value="<?php echo $naming; ?>" name="claimName" id="claimName" />

<input type="hidden" value="<?php echo $qq; ?>" name="tv" id="theValue" />

<input type="hidden" value="<? echo $id;?>" name="id" />


<CENTER><SELECT name="pmh" id="pmh" onclick="xtogglex();"><OPTION <?php if ($qq1==0) echo "selected='selected'"; ?> value="0">None</OPTION><OPTION <?php if ($qq1>0) echo "selected='selected'"; ?> value="1">Yes</OPTION>
<OPTION value="0">No</OPTION>
</SELECT></CENTER>


<DIV id=n align="center" <?php if ($pmp==1) echo "style='visibility:visible;'"; ?> >
	<TEXTAREA cols="100" rows=1 name="non">There was no relevant past medical history.</TEXTAREA>
	<br />
	<CENTER><INPUT type="submit" value="SUBMIT" style="height:28px;width:86px;border-radius:6px;" /></CENTER>
</DIV>

<DIV id=prev>
<?php 

if ($pmp==1)
{
	
	//echo $pmp;
	$i=1;
	while ($r=mysql_fetch_array($q))
	{
	
	  //print_r($r);
		if (trim($r['hist']))
		{
			
			echo "<textarea cols=100 rows=2 id='t[$i]' name='t[$i]'>".$r['hist']."</textarea>";
			echo "<input type='hidden' value='Block' name='te[$i]' id='te[$i]' />";
			echo "<input type='button' style='background-color:#AA3333;color:#FFF;' onclick=\"ignoreit('$i');\" value='Block' id='b[$i]' name='b[$i]' /><br />";
			$i=$i+1;
		}
	}
}

?>

</DIV>

<DIV <?php if ($pmp==1) echo "style='visibility:hidden;'";?> id=p align="center">
	<SELECT onclick="pmhm();" multiple="true" id="pas" style="border-radius:6px;border:1px solid #CCC;">
		<OPTION value="accident">Accident</OPTION>
		<OPTION value="medical">Medical</OPTION>
		<OPTION value="musculoskeletal">Musculoskeletal</OPTION>
		<OPTION value="confidential">Confidential</OPTION>
		<OPTION value="other">Other</OPTION>
	</SELECT>
</DIV>


<DIV align="left" id="acc" name="acc" style="font-family:Verdana, Geneva, sans-serif;margin-top:10px;">
	<TABLE border="1" rules="all" cellpadding="5px" align="center">
		<TR>
			<TD>Type</TD>
			<TD>
			<SELECT name="atp" id="atp">
				<OPTION value="an accident">an accident</OPTION>
				<OPTION value="an accident at home">an accident at home</OPTION>
				<OPTION value="an accident at work">an accident at work</OPTION>
				<OPTION value="a fall">a fall</OPTION>
				<OPTION value="a lifting accident">a lifting accident</OPTION>
				<OPTION value="a road traffic accident">a road traffic accident</OPTION>
				<OPTION value="a sporting accident">a sporting accident</OPTION>
			</SELECT>
			</TD>

			<TD>Resulting in</TD>
			<TD>
				<SELECT name="ci" id="ci" multiple>
					<OPTION value="head">head injury</OPTION>
					<OPTION value="neck">neck injury</OPTION>
					<OPTION value="back">back injury</OPTION>
					<OPTION value="lower back">lower back injury</OPTION>
					<OPTION value="upper back">upper back injury</OPTION>
					<OPTION value="shoulders">shoulders injury</OPTION>
					<OPTION value="neck and shoulders">neck and shoulders injury</OPTION>
					<OPTION value="left shoulder">left shoulder injury</OPTION>
					<OPTION value="right shoulder">right shoulder injury</OPTION>
					<OPTION value="arms">arms injury</OPTION>
					<OPTION value="left arm">left arm injury</OPTION>
					<OPTION value="right arm">right arm injury</OPTION>
					<OPTION value="left wrist">left wrist injury</OPTION>
					<OPTION value="right wrist">right wrist injury</OPTION>
					<OPTION value="wrists">wrists injury</OPTION>
					<OPTION value="left hand">left hand injury</OPTION>
					<OPTION value="right hand">right hand injury</OPTION>
					<OPTION value="hands">hands injury</OPTION>
					<OPTION value="chest">chest injury</OPTION>
					<OPTION value="abdomen">abdomen injury</OPTION>
					<OPTION value="legs">legs injury</OPTION>
					<OPTION value="left leg">left leg injury</OPTION>
					<OPTION value="right leg">right leg injury</OPTION>
					<OPTION value="left knee">left knee injury</OPTION>
					<OPTION value="right knee">right knee injury</OPTION>
					<OPTION value="knees">knees injury</OPTION>
					<OPTION value="left ankle">left ankle injury</OPTION>
					<OPTION value="right ankle">right ankle injury</OPTION>
					<OPTION value="ankles">ankles injury</OPTION>
					<OPTION value="left foot">left foot injury</OPTION>
					<OPTION value="right foot">right foot injury</OPTION>
					<OPTION value="feet">feet injury</OPTION>
   					<OPTION value="forehead">forehead injury</OPTION>
                    <OPTION value="eyes">eyes injury</OPTION>
                    <option value="nose">nose injury</option>
                    <option value="lips">lips injury</option>
                    <option value="cheeks">cheeks injury</option>
                    <option value="teeth">teeth injury</option>
                    <option value="ears">ears injury</option>
                    <option value="whiplash">whiplash injury</option>
				</SELECT>
			</TD>
	
			<TD>
				<INPUT type="text" size="3" name="ago" id="ago"> 
				<SELECT name="agot" id=agot>
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
				 ago <br/>or<br/>
                 Dated <input type="text" size="11" name="dtago" id="dtago" />
			</TD>
			
			<TD>
				<SELECT name="re" id="re" onclick="notres();">
					<option value='.'>...</option>
					<OPTION value="resolved">resolved</OPTION>
					<OPTION value="had not resolved">had not resolved</OPTION>
				</SELECT>
				<DIV id="resolve">
					<INPUT type="text" size="5" name="res" id="res"> 
					<SELECT name="resa" id="resa">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
				</DIV>
				<DIV id="nresolve" style="visibility:hidden;">
					causing 
					<SELECT name="rdis" id="rdis">
						<OPTION value="mild">mild</OPTION>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
					</SELECT> 
					disability
				</DIV>
			</TD>
		</TR>
		
		<TR>
			<TD colspan="6" align="center"><INPUT type="button" onClick="addacc('<?php echo $heshe; ?>');" value="ADD" style="border-radius:7px;width:60px;height:26px;cursor:pointer;"></TD>
		</TR>
	</TABLE>
</DIV>

<div id="xac"> </div>

<DIV id="med" style="font-family:Verdana, Geneva, sans-serif;margin-top:10px;">
	<TABLE border="1" rules="all" cellpadding="5px" align="center">
		<TR>
			<TD>Suffering from
			
				<SELECT name="suf" id="sfrom" onclick="otherid();">
					<OPTION value="angina">angina</OPTION>
					<OPTION value="anxiety">anxiety</OPTION>
					<OPTION value="anxiety and depression">anxiety and depression</OPTION>
					<OPTION value="asthma">asthma</OPTION>
					<OPTION value="COPD">COPD</OPTION>
					<OPTION value="depression">depression</OPTION>
					<OPTION value="diabetes">diabetes</OPTION>
					<OPTION value="epilepsy">epilepsy</OPTION>
					<OPTION value="heart attack">heart attack</OPTION>
					<OPTION value="heart disease">heart disease</OPTION>
					<OPTION value="hypertension">hypertension</OPTION>
					<OPTION value="migrane">migrane</OPTION>
					<OPTION value="stroke">stroke</OPTION>
					<OPTION value=".">other</OPTION>
				</SELECT>
				<DIV id='othid' style="visibility:hidden;">Other:&nbsp;<INPUT type="text" name="suf1" /></DIV>
			</TD>
			<TD>Severity
            
				<SELECT name="ssev" id="ssev">
					<OPTION value="none">none</OPTION>
					<OPTION value="well controlled">well controlled</OPTION>
					<OPTION value="occasional">occasional</OPTION>
					<OPTION value="">intermittent</OPTION>
					<OPTION value="mild">mild</OPTION>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="recurrent">recurrent</OPTION>
					<OPTION value="frequent">frequent</OPTION>
					<OPTION value="constant">constant</OPTION>
					<OPTION value="poorly controlled">poorly controlled</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				for the past 
				<INPUT type="text" name="mpast" id="mpast" size="3"> 
				<SELECT name="mpastt" id="mpastt">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
			</TD>
		</TR>
		
		<TR>
			<TD align="center" colspan="6"><INPUT type="button" value="ADD" onClick="addmed();" style="height:26px;width:60px;border-radius:7px;cursor:pointer;"></TD>
		</TR>
	</TABLE>
</DIV>

<DIV id="xme"> </DIV>



<DIV id="musc" style="font-family:Verdana, Geneva, sans-serif;margin-top:10px">
	<TABLE align="center" border="1" rules="all" cellpadding="5px">
		<TR>
			<TD>Suffering from
				<SELECT name="mus" id="msuf">
					<OPTION value="back pain">back pain</OPTION>
					<OPTION value="hip pain">hip pain</OPTION>
					<OPTION value="knee pain">knee pain</OPTION>
					<OPTION value="neck pain">neck pain</OPTION>
					<OPTION value="shoulder pain">shoulder pain</OPTION>
					<OPTION value="wrist pain">wrist pain</OPTION>
					<OPTION value="arthritis">arthritis</OPTION>
					<OPTION value="baker's cyst">baker's cyst</OPTION>
					<OPTION value="chondromalacia patellae">chondromalacia patellae</OPTION>
					<OPTION value="deformity">deformity</OPTION>
					<OPTION value="disc disease of the neck">disc disease of the neck</OPTION>
					<OPTION value="disc disease of the back">disc disease of the back</OPTION>
					<OPTION value="gout">gout</OPTION>
					<OPTION value="inflammation">inflammation</OPTION>
					<OPTION value="joint replacement">joint replacement</OPTION>
					<OPTION value="pain">pain</OPTION>
					<OPTION value="spinal stenosis of the neck">spinal stenosis of the neck</OPTION>
					<OPTION value="spinal stenosis of the back">spinal stenosis of the back</OPTION>
					<OPTION value="weakness">weakness</OPTION>
				</SELECT>
			</TD>
			<TD>
				severity before was 
				<SELECT name="msev" id="msev">
					<OPTION value="none">none</OPTION>
					<OPTION value="well controlled">well controlled</OPTION>
					<OPTION value="occasional">occasional</OPTION>
					<OPTION value="">intermittent</OPTION>
					<OPTION value="mild">mild</OPTION>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="recurrent">recurrent</OPTION>
					<OPTION value="frequent">frequent</OPTION>
					<OPTION value="constant">constant</OPTION>
					<OPTION value="poorly controlled">poorly controlled</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
			</TD>
			
			<TD>
				currently symptomatic?
				<SELECT id="msympt">
					<OPTION value="yes">yes</OPTION>
					<OPTION value="no">no</OPTION>
				</SELECT>
			</TD>
			
			<td>
				for the past 
				<INPUT type="text" size="3" id="mpas">
				<SELECT name="mmpast" id="mmpast">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
			</td>
			
			<TD>
				effected by accident
				<SELECT id="meff">
					<OPTION value="yes">yes</OPTION>
					<OPTION value="no">no</OPTION>
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD colspan="6" align="center"><INPUT type="button" value="ADD" onClick="addmusc();" style="width:70px;height:26px;border-radius:6px;cursor:pointer;"></TD>
		</TR>
	</TABLE>
</DIV>

<DIV id="xmu"> </DIV>


<DIV align="center" id="other">

	<TEXTAREA name="oth" cols="100" rows="5"></TEXTAREA>

</DIV>

<DIV id="hhh" <?php if ($pmp==1) echo "style='visibility:hidden;'"; else echo "style='visibility:hidden;'"; ?>>
<div id="myDiv" align="center"> </div>

<CENTER><INPUT type="submit" value="SUBMIT" style="height:28px;width:86px;border-radius:6px;" /></CENTER>
</DIV>

<!-- <CENTER><INPUT type="button" value="Finalize" onclick="final();"></CENTER> -->
</FORM>

</BODY>

</HTML>