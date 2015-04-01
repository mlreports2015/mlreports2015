<?php

session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include 'dcon.php';
?>
<HEAD>
<TITLE>MLR Case</TITLE>

<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

<?
echo "<link href=\"CSS/pmh.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/life.js\"></script>
	<link href=\"CSS/calender.css\" rel=\"stylesheet\" type=\"text/css\">
	<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/calender_date_picker.js\"></script>";
?>

</HEAD>

<?
$id= $_GET['cid'];

$org=$_SESSION['o'];
  $q=mysql_query("select * from claimant where cid=$id and org='$org'");
  $r=mysql_fetch_array($q);
  $g=$r['gen'];
  
  $gg=$g;

  $claim=$r['ct'].' '.$r['cfn'].' '.$r['cln'];

  if ($g=='m')
  {
  $g1='His';
  $g='He';
  $g2='he';
  }
  else
  {
  $g1='Her';
  $g='She';
  $g2='she';
  }
  
  $n=$r['ct']." ".trim($r['cln']);
  
  
?>

<BODY background="images/back.png" onLoad="init('<?php echo $g;?>', '<?php echo $g2;?>', '<?php echo $claim;?>');">

<DIV style="background-image : url('images/fe.png'); background-repeat : no-repeat; width:1024px; float:right;">
<IMG align="middle" src="images/title3.png" />
<IMG align="middle" src="images/life.png" style="margin-left : 700px;" />
</DIV>

<DIV style="float:right;right:20px;width:100%;">
<A href=admin.php>Add Case</A> |
<A href=all.php>All Cases</A> |
<A href=search.php>General Search</A> |
<A href=incomplete.php>Incomplete Cases</A> |
<A href=complete.php>Complete Cases</A> |
</DIV>

<br />
<br />
<br />
<br />
<br />
<br />

<CENTER><H1><? echo "ML".$id;?></H1></CENTER>

<CENTER>
<DIV align="center">

<A href="det.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Details</A> | 

<A href="pmh.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">PMH</A> | 

<A href="accid.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Accident</A> | 

<A href="effect.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Symptoms</A> | 

<A href="treat.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Treatment</A> | 

<A href="life.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Life</A> | 

<A href="exam.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>"> Examination </A> | 

<A href="summary.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Summary</A> | 

<A href="prog.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Prognosis </A> | 

<A href="repgen.php?cid=<? echo $id; ?>&id=<? echo rand(0,1000); ?>">Report</A>

<Div style="width:100%"></DIV>
</A>
</CENTER>


<?php 

$s1="select * from dlive where id='$id' and org='".$_SESSION['o']."'";
//echo $s1;
$q1=mysql_query($s1);
$r1=mysql_num_rows($q1);

?>

<FORM method="POST" action="Process/life.php">
	
<input type="hidden" value="<?php echo $r1; ?>" name="tv" id="theValue" />

<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />

<CENTER><H1>Life</H1></CENTER>

<DIV align="center">

<SELECT name=inves>
	<OPTION value="<?echo $g;?> did not have any investigations.">There was no Investigation</OPTION>
	<OPTION value="<?echo $g;?> had an investigation.">There was an investigation</OPTION>
</SELECT>


<H3>Employment</H3>
<TABLE border="1">
	<TR>
		<TD>Works as 
			<SELECT name=wjob id="wjob">
				<OPTION value=.>other</OPTION>
				<OPTION value="Administrator">administrator</OPTION>
				<OPTION value="Armed-Forces">armed-forces</OPTION>
				<OPTION value="Baker">baker</OPTION>
				<OPTION value="Child">child</OPTION>
				<OPTION value="Chef">chef</OPTION>
				<OPTION value="Cleaner">cleaner</OPTION>
				<OPTION value="Computer-Programmer">computer-programmer</OPTION>
				<OPTION value="Delivery-Driver">delivery-driver</OPTION>
				<OPTION value="Doctor">doctor</OPTION>
				<OPTION value="Door-Man">door-man</OPTION>
				<OPTION value="Driver">driver</OPTION>
				<OPTION value="Driving-Instructor">driving-instructor</OPTION>
				<OPTION value="Electrician">electrician</OPTION>
				<OPTION value="Engineer">engineer</OPTION>
				<OPTION value="Homemaker">homemaker</OPTION>
				<OPTION value="Labourer">labourer</OPTION>
				<OPTION value="Manager">Manager</OPTION>
				<OPTION value="Musician">musician</OPTION>
				<OPTION value="Nurse">nurse</OPTION>
				<OPTION value="Operator">operator</OPTION>
				<OPTION value="Plumber">plumber</OPTION>
				<OPTION value="Police-Officer">police-officer</OPTION>
				<OPTION value="Retired">retired</OPTION>
				<OPTION value="School-Teacher">school-teacher</OPTION>
				<OPTION value="Secretary">secretary</OPTION>
				<OPTION value="Security-Guard">security-guard</OPTION>
				<OPTION value="Shop-Assistant">shop-assistant</OPTION>
				<OPTION value="Student">student</OPTION>
				<OPTION value="Surgeon">Surgeon</OPTION>
				<OPTION value="Taxi-Driver">taxi-driver</OPTION>
				<OPTION value="University-Professor">university-professor</OPTION>
				<OPTION value="Receptionist">receptionist</OPTION>
				<OPTION value="Unemployed">unemployed</OPTION>
				<OPTION value="Waiter">waiter</OPTION>
			</SELECT>
			<INPUT type="text" name="wjob1" id="wjob1" size="8" />
		</TD>
		<TD>for <INPUT type="text" id="whour" size="3" /> hours/week</TD>
		<TD>
			had to take 
			<INPUT type="text" id="woff" size="3" /> 
			<SELECT name="whh" id="whh">
				<OPTION value="day">day</OPTION>
				<OPTION value="week">week</OPTION>
				<OPTION value="month">month</OPTION>
				<OPTION value="year">year</OPTION>
			</SELECT> 
			off
		</TD>
	</TR>
	<TR><TD colspan="3" align="center"><INPUT onClick="addemp('<? echo $g ?>');" type="button" value="Add" /></TD></TR>
</TABLE>

<TEXTAREA rows="1" cols="100" id="work0" name="work0"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>
<TEXTAREA rows="1" cols="100" id="work1" name="work1"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>
<TEXTAREA rows="1" cols="100" id="work2" name="work2"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 2,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>


<H3>Home Circumstances</H3>
<TABLE border="1">
	<TR>
		<TD>
			Lives 
			<select name='lw' id="lw">
				<OPTION value=alone>alone</OPTION>
				<OPTION value=wife>Wife</OPTION>
				<OPTION value=husband>Husband</OPTION>
				<OPTION value=partner>Partner</OPTION>
				<OPTION value=girlfriend>Girlfriend</OPTION>
				<OPTION value=boyfriend>Boyfriend</OPTION>
				<OPTION value=children>Children</OPTION>
				<OPTION value=daughter>Daughter</OPTION>
				<OPTION value=son>Son</OPTION>
				<OPTION value=mother>Mother</OPTION>
				<OPTION value=father>Father</OPTION>
				<OPTION value=parents>Parents</OPTION>
				<OPTION value=sister>Sister</OPTION>
				<OPTION value=brother>Brother</OPTION>
				<OPTION value=friend>Friend</OPTION>
				<OPTION value=carer>Carer</OPTION>
			</SELECT>	
		</TD>
		<TD>children <INPUT type="text" id="lch" size="2" /> </TD>
		<TD>
			eldest <INPUT type="text" id="lchey" size="3" /> years <INPUT type="text" id="lchem" size="3" /> months
			youngest <INPUT type="text" id="lchyy" size="3" /> years <INPUT type="text" id="lchym" size="3" /> months
		</TD>
	</TR>
	<TR><TD colspan="3" align="center"><INPUT onClick="addhc('<? echo $g;?>');" type="button" value="Add" /></TD></TR>
</TABLE>

<TEXTAREA cols="100" id="daily" name="daily"><?php $sh="select * from hcirc where id='$id' and org='$org'"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg'] ?></TEXTAREA>


<H3>Travel</H3>

<CENTER><b>While Driving </b></CENTER><br />
<TABLE border="1">
	<TR>
		<TD>
			<SELECT name="twd" id="twd" onclick="ttwd1(('<? echo $g;?>'));">
				<OPTION value="none">none</OPTION>
				<OPTION value="does not drive">does not drive</OPTION>
				<OPTION value="anxiety">anxiety</OPTION>
				<OPTION value="physical discomfort">physical discomfort</OPTION>
				<OPTION value="anxiety and physical discomfort">anxiety and physical discomfort</OPTION>
			</SELECT>
			<div id="difd" style="visibility:hidden;">
				<input type="checkbox" id="diffd" value="d" onClick="ttwd2(('<? echo $g;?>'));"/> Different Anxiety and Physical Discomfort
			</div>
		</TD>
		<TD>
			<div id="d1xyz">
			<table>
			<tr>
				<td>
					currently
					<SELECT id="twdc">
						<Option value="mild">mild</Option>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
					</SELECT>
				</TD>
				<TD>
					<SELECT id="tdr">
						<OPTION value="-">...</OPTION>
						<OPTION value="will resolve after">will resolve after</OPTION>
						<OPTION value="resolved">resolved</OPTION>
					</SELECT>
					<INPUT type="text" size="3" id="tdrr" />
					<SELECT name="" id="tddr">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
				</td>
			</tr>
			</table>
			</div>
			<div id="d2xyz" style="position:relative; top:-25px; visibility:hidden;">
				<table>
					<tr>
					<td>
					current anxiety
					<SELECT id="twdca">
						<Option value="mild">mild</Option>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
					</SELECT>
					<br>
					current physical discomfort
					<SELECT id="twdcd">
						<Option value="mild">mild</Option>
						<OPTION value="moderate">moderate</OPTION>
						<OPTION value="severe">severe</OPTION>
					</SELECT>
				</TD>
				<TD>
					<SELECT id="tdra">
						<OPTION value="-">...</OPTION>
						<OPTION value="will resolve after">will resolve after</OPTION>
						<OPTION value="resolved">resolved</OPTION>
					</SELECT>
					<INPUT type="text" size="3" id="tdrra" />
					<SELECT name="" id="tddra">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
					<br>
					<SELECT id="tdrd">
						<OPTION value="-">...</OPTION>
						<OPTION value="will resolve after">will resolve after</OPTION>
						<OPTION value="resolved">resolved</OPTION>
					</SELECT>
					<INPUT type="text" size="3" id="tdrrd" />
					<SELECT name="" id="tddrd">
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
				</TD>
				</TR>
				</table>
			</div>
		</TD>
	</TR>
	<TR><TD colspan="3" align="center"><INPUT id="addd" onClick="adddrve(('<? echo $n;?>'));" type="button" value="Add" /></TD></TR>
</TABLE>

<TEXTAREA cols="100" id="tdrv" name="tdrv"><?php $sh="select * from travel where id='$id' and org='$org' limit 1,1"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg']; ?></TEXTAREA>


<CENTER><b>While Travelling as a passenger</b></CENTER><br />
<TABLE border="1">
	<TR>
		<TD>
			<SELECT name="twp" id="twp" onclick="ttwp1(('<? echo $g;?>'));">
				<OPTION value="none">none</OPTION>
				<OPTION value="anxiety">anxiety</OPTION>
				<OPTION value="physical discomfort">physical discomfort</OPTION>
				<OPTION value="anxiety and physical discomfort">anxiety and physical discomfort</OPTION>
			</SELECT>
			<div id="difp" style="visibility:hidden;">
				<input type="checkbox" id="diffp" value="d" onClick="ttwp2(('<? echo $g;?>'));"/> Different Anxiety and Physical Discomfort
			</div>
		</TD>
		<TD>
			<div id="p1xyz" style="visibility:visible;">
				<table>
				<tr>
				<td>
				currently
				<SELECT id="twpc">
					<Option value="mild">mild</Option>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
			</TD>
			<TD>
				<SELECT id="tpr">
					<OPTION value="-">...</OPTION>
					<OPTION value="will resolve after">will resolve after</OPTION>
					<OPTION value="resolved">resolved</OPTION>
				</SELECT>
				<INPUT type="text" size="3" id="tprr" />
				<SELECT name="" id="tppr">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
			</TD>
			</TR>
			</table>
		</div>
		<div id="p2xyz" style="position:relative; top:-25px; visibility:hidden;">
			<table>
				<tr>
				<td>
				current anxiety
				<SELECT id="twpca">
					<Option value="mild">mild</Option>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
				<br>
				current physical discomfort
				<SELECT id="twpcd">
					<Option value="mild">mild</Option>
					<OPTION value="moderate">moderate</OPTION>
					<OPTION value="severe">severe</OPTION>
				</SELECT>
			</TD>
			<TD>
				<SELECT id="tpra">
					<OPTION value="-">...</OPTION>
					<OPTION value="will resolve after">will resolve after</OPTION>
					<OPTION value="resolved">resolved</OPTION>
				</SELECT>
				<INPUT type="text" size="3" id="tprra" />
				<SELECT name="" id="tppra">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
				<br>
				<SELECT id="tprd">
					<OPTION value="-">...</OPTION>
					<OPTION value="will resolve after">will resolve after</OPTION>
					<OPTION value="resolved">resolved</OPTION>
				</SELECT>
				<INPUT type="text" size="3" id="tprrd" />
				<SELECT name="" id="tpprd">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
			</TD>
			</TR>
			</table>
		</div>
		</TD>
		</TR>
	<TR><TD colspan="3" align="center"><INPUT id="addp" onClick="addpass(('<? echo $g;?>'));" type="button" value="Add" /></TD></TR>
</TABLE>

<TEXTAREA cols="100" id="tpass" name="tpass"><?php $sh="select * from travel where id='$id' and org='$org'"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg']; ?></TEXTAREA>


<H3>Daily Living</H3>
<TABLE border="1">
	<TR>
		<TD>
			<SELECT name="dlp" id="dlp">
				<OPTION value="lift heavy items">Lifting Heavy Items</OPTION>
				<OPTION value="do house work">House Work</OPTION>
				<OPTION value="go for sports">Sports</OPTION>
				<OPTION value="go to the gym">Gym</OPTION>
				<OPTION value="play musical instrument">Musical Instrument</OPTION>
				<OPTION value="go for a walk">Walk</OPTION>
				<OPTION value="go swimming">Swimming</OPTION>
				<OPTION value="go fishing">Fishing</OPTION>
				<OPTION value="play football">Football</OPTION>
				<OPTION value="play rugby">Rugby</OPTION>
				<OPTION value="play cricket">Cricket</OPTION>
				<OPTION value="sleep">Sleep</OPTION>
				<OPTION value="do gardening">Gardening</OPTION>
				<OPTION value="hoover">Hoovering</OPTION>
				<OPTION value="child care">Child Care</OPTION>
				<OPTION value="children care">Children Care</OPTION>
				<OPTION value="go to School PE">School PE</OPTION>
				<OPTION value="socialize">Socializing</OPTION>
				<OPTION value="have sex">Sex Life</OPTION>
			</SELECT>
		</TD>
		<td>
			initially
			<SELECT id="dlsi">
				<Option value="">...</Option>
				<Option value="mildly">mild</Option>
				<OPTION value="moderately">moderate</OPTION>
				<OPTION value="severely">severe</OPTION>
				<OPTION value="unable">unable</OPTION>
			</SELECT>
		</td>
		<TD>
			currently
			<SELECT id="dls" onclick="fut(); prres();">
				<Option value="">...</Option>
				<Option value="mild">mild</Option>
				<OPTION value="moderate">moderate</OPTION>
				<OPTION value="severe">severe</OPTION>
				<OPTION value="unable">unable</OPTION>
				<OPTION value="resolved">resolved</OPTION>
				<OPTION value="resolved after">resolved after</OPTION>
			</SELECT>
			<div id="prres" style="visibility:hidden;">
				<INPUT type="text" size="3" id="pr1" />
				<SELECT name="" id="pr2">
					<OPTION value="day">days</OPTION>
					<OPTION value="week">weeks</OPTION>
					<OPTION value="month">months</OPTION>
					<OPTION value="year">years</OPTION>
				</SELECT>
			</div>
		</TD>
		<TD>
			<div id='fut' style="visibility:hidden;">
			future
			<SELECT id="dlr" onclick="fut2();">
				<OPTION value="">...</OPTION>
				<OPTION value="will resolve after">will resolve after</OPTION>
				<OPTION value="will resolve">will resolve</OPTION>
				<OPTION value="will never resolve">will never resolve</OPTION>
				<OPTION value="will improve but not resolve">will improve but not resolve</OPTION>
				<OPTION value="will persist">will remain the same</OPTION>
				<OPTION value="will worsen">will worsen</OPTION>
			</SELECT>
			<div id="fut2" style="visibility:hidden;">
			<INPUT type="text" size="3" id="dlrr" />
			<SELECT name="" id="dllr">
				<OPTION value="day">days</OPTION>
				<OPTION value="week">weeks</OPTION>
				<OPTION value="month">months</OPTION>
				<OPTION value="year">years</OPTION>
			</SELECT>
			<div>
			</div>
		</TD>
	</TR>
	<TR><TD colspan="4" align="center"><INPUT onClick="adddl('<?echo $gg;?>');" type="button" value="Add" /></TD></TR>
</TABLE>

<?php 

$i=1;
//echo 'x';
while ($rr1=mysql_fetch_array($q1))
{
	echo "<textarea name=t[$i] id=t[$i] rows=2 cols=100>".$rr1['msg']."</textarea>";
	echo "<input type=hidden value=Block name=te[$i] id=te[$i] />";
	echo "<input type=button value=Block onclick=\"ignoreit('$i');\" id=b[$i] style='background-color:#AA2222; color:#FFF;' />";
}
?>

<DIV id="x"></DIV>

<INPUT type="submit" value="Submit">

</DIV>

</FORM>
</BODY>
</HTML>

<?
}
?>