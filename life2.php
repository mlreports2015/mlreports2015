<?php



include 'template.php';



head('Accident', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/life.js"></script>', '', '', '');

?>



<BODY background="images/back.png" onLoad="doeF();">





<?php



include 'template2.php';



$id=$_GET['cid'];



$org=$_SESSION['o'];



bTop('Life', $org, $id);



?>



<?

$id= $_GET['cid'];



$org=$_SESSION['o'];

  $q=mysql_query("select * from claimant where cid=$id and org='$org'");

  $r=mysql_fetch_array($q);

  $g=$r['gen'];

  $gg=$g;



  $claim=$r['ct'].' '.$r['cfn'].' '.$r['cln'];



  if ($gg=='m')

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



<?php 



$s1="select * from dlive where id='$id' and org='".$_SESSION['o']."'";

//echo $s1;

$q1=mysql_query($s1);

$r1=mysql_num_rows($q1);





$s2="select * from travel where id='$id' and org='".$_SESSION['o']."' and msg like '%driv%'";

// echo $s2;

$q2=mysql_query($s2);

$r2=mysql_num_rows($q2);





$s3="select * from travel where id='$id' and org='".$_SESSION['o']."' and msg like '%passenger%'";

// echo $s3;

$q3=mysql_query($s3);

$r3=mysql_num_rows($q3);



$s4="select ind from emp where id='$id' and org='".$_SESSION['o']."'";

// echo $s3;

$q4=mysql_query($s4);

$r4=mysql_fetch_array($q4);



$s5="select * from claimant where cid='$id' and org='".$_SESSION['o']."'";

// echo $s5;

$q5=mysql_query($s5);

$claim=mysql_fetch_array($q5);

?>



<FORM method="POST" action="Process/life.php?typo=travel" name="frm" id="frm">



<input value="<?php echo $g; ?>" type="hidden" name="gend" />

	

<input type="hidden" value="<?php echo $r1; ?>" name="tv" id="theValue" />

<input type="hidden" value="<?php echo $r2; ?>" name="vDrv" id="vDrv" />

<input type="hidden" value="<?php echo $r3; ?>" name="vPas" id="vPas" />

<input type="hidden" value="<?php echo $r4['ind']; ?>" name="vEmp" id="vEmp" />



<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />



<DIV align="center" style="visibility:hidden">



<SELECT name=inves>

	<OPTION value="<?echo $g;?> did not have any investigations.">There was no Investigation</OPTION>

	<OPTION value="<?echo $g;?> had an investigation.">There was an investigation</OPTION>

</SELECT>



</DIV>



<div align="center" style="font-family:Verdana, Geneva, sans-serif">



<!--			<SELECT name=wjob id="wjob">

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



				<OPTION value="Nurse">nurse</OPTION>

				<OPTION value="Operator">operator</OPTION>

				<OPTION value="Plumber">plumber</OPTION>

				<OPTION value="Police-Officer">police-officer</OPTION>

				<OPTION value="Community Warden">Community Support Warden<OPTION>
				
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

			</SELECT>-->



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

<H3>Travel</H3>



<CENTER><b>While Driving </b></CENTER><br />

<TABLE border="1" rules="all">

	<TR>

		<TD>
			Suffering&nbsp;
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

						<OPTION value="month" selected >months</OPTION>

						<OPTION value="year">years</OPTION>

					</SELECT>

				</td>

			</tr>

			</table>

			</div>

			<div id="d2xyz" style="position:relative; top:-25px; visibility:hidden;">

				<table rules="all">

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

						<OPTION value="month" selected>months</OPTION>

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



<input type="hidden" value="" name="nD" id="nD">

<input type="hidden" value="" name="dD" id="dD">

<input type="hidden" value="" name="aD" id="aD">

<input type="hidden" value="" name="pD" id="pD">



<div id='dDrv'>

<?php

/*

<TEXTAREA cols="100" id="tdrv" name="tdrv"><?php $sh="select * from travel where id='$id' and org='$org' limit 1,1"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg']; ?></TEXTAREA>

*/



$sd="select * from travel where id='$id' and org='".$_SESSION['o']."' and msg like '%driv%'";

// echo $sd;

$qd=mysql_query($sd);



$i=1;

while ($rd=mysql_fetch_array($qd))

{

	echo "<input type='hidden' value='Block' name='hDrv$i' id='hDrv$i'>";

	echo "<textarea name='tDrv[$i]' rows='2' cols='100' id='tDrv[$i]'>".$rd['msg']."</textarea>";

	echo "<input type='button' value='Block' onclick=\"ignoreitD('$i');\" id=bDrv$i style='background-color:#AA2222; color:#FFF;'>";

	echo "<br>";

	$i=$i+1;

}



?>



</div>



<br/><br/>

<CENTER><b>While Travelling as a passenger</b></CENTER><br />

<TABLE border="1" rules="all">

	<TR>

		<TD>
			Suffering&nbsp;
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

					<OPTION value="month" selected>months</OPTION>

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

					<OPTION value="month" selected >months</OPTION>

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

					<OPTION value="month" selected >months</OPTION>

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



<input type="hidden" value="" name="dP" id="dP">

<input type="hidden" value="" name="aP" id="aP">

<input type="hidden" value="" name="pP" id="pP">



<div id="dPas">



<?php

/*

<TEXTAREA cols="100" id="tdrv" name="tdrv"><?php $sh="select * from travel where id='$id' and org='$org' limit 1,1"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg']; ?></TEXTAREA>

*/



$sd="select * from travel where id='$id' and org='".$_SESSION['o']."' and msg like '%passenger%'";

// echo $sd;

$qd=mysql_query($sd);



$i=1;

while ($rd=mysql_fetch_array($qd))

{

	echo "<input type='hidden' value='Block' name='hPas$i' id='hPas$i'>";

	echo "<textarea name='tPas[$i]' rows='2' cols='100' id='tPas[$i]'>".$rd['msg']."</textarea>";

	echo "<input type='button' value='Block' onclick=\"ignoreitP('$i');\" id=bPas$i style='background-color:#AA2222; color:#FFF;'>";

	echo "<br>";

	$i=$i+1;

}



?>



</div>




<DIV id="x"></DIV>



<INPUT type="submit" value="Submit">



</DIV>



</FORM>

</BODY>

</HTML>

