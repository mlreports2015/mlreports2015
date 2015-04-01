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



<FORM method="POST" action="Process/life.php" name="frm" id="frm">



<input value="<?php echo $g; ?>" type="hidden" name="gend" />

	

<input type="hidden" value="<?php echo $r1; ?>" name="tv" id="theValue" />

<input type="hidden" value="<?php echo $r2; ?>" name="vDrv" id="vDrv" />

<input type="hidden" value="<?php echo $r3; ?>" name="vPas" id="vPas" />



<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />



<DIV align="center" style="visibility:hidden">



<SELECT name=inves>

	<OPTION value="<?echo $g;?> did not have any investigations.">There was no Investigation</OPTION>

	<OPTION value="<?echo $g;?> had an investigation.">There was an investigation</OPTION>

</SELECT>



</DIV>

<DIV align='center'>



<H3>Home Circumstances</H3>

<TABLE border="1" rules="all" cellpadding="5px" style="font-family:Arial, Helvetica, sans-serif;">

	<TR>

		<TD>

			Lives 

			<select name='lw' id="lw">

				<OPTION value=alone>alone</OPTION>

<?php

	if ($gg=='m')

	{

?>

				<OPTION value=wife>Wife</OPTION>

<?php

	}

	if ($gg=='f')

	{

?>

				<OPTION value=husband>Husband</OPTION>

<?php

	}

?>



				<OPTION value='civil partner'>Civil Partner</OPTION>

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

	</TR>

	<TR><TD colspan="3" align="center"><INPUT onClick="addhc('<? echo $g;?>');" type="button" value="Add" style="width:60px;height:25px;border-radius:6px" /></TD></TR>

</TABLE>



<TEXTAREA cols="100" id="daily" name="daily" style="border:none;background-color:#cfe2ee;border-radius:6px;margin-top:6px;"><?php $sh="select * from hcirc where id='$id' and org='$org'"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg'] ?></TEXTAREA>








<input type="hidden" value="" name="nD" id="nD">

<input type="hidden" value="" name="dD" id="dD">

<input type="hidden" value="" name="aD" id="aD">

<input type="hidden" value="" name="pD" id="pD">




<H3>Daily Living</H3>

<TABLE border="1" rules="all" cellpadding="5px" style="font-family:Arial, Helvetica, sans-serif;">

	<TR>

		<TD>

			<SELECT name="dlp" id="dlp" onChange="dlivin();">

				<OPTION value=".">Please Select...</OPTION>

				<OPTION value="play american football">American Football</OPTION>

				<OPTION value="go for athletics">Athletics</OPTION>

				<OPTION value="play badminton">Badminton</OPTION>

				<OPTION value="play basketball">BasketBall</OPTION>

				<OPTION value="go for boxing">Boxing</OPTION>

				<OPTION value="child care">Child Care</OPTION>

				<OPTION value="children care">Children Care</OPTION>

				<OPTION value="play cricket">Cricket</OPTION>

				<OPTION value="go for cross-country">Cross Country</OPTION>

				<OPTION value="go for cycling">Cycling</OPTION>

				<OPTION value="go for diving">Diving</OPTION>

				<OPTION value="go fishing">Fishing</OPTION>

				<OPTION value="play football">Football</OPTION>

				<OPTION value="do gardening">Gardening</OPTION>

				<OPTION value="go for gliding">Gliding</OPTION>

				<OPTION value="go to the gym">Gym</OPTION>

				<OPTION value="go for hiking">Hiking</OPTION>

				<OPTION value="play hockey">Hockey</OPTION>

				<OPTION value="hoover">Hoovering</OPTION>

				<OPTION value="go horse riding">Horse Riding</OPTION>

				<OPTION value="do house work">House Work</OPTION>

				<OPTION value="play lawn tennis">Lawn Tennis</OPTION>

				<OPTION value="lift heavy items">Lifting Heavy Items</OPTION>

				<OPTION value="do martial arts training">Martial Arts Training</OPTION>

				<OPTION value="go for motor cross">Motor Cross</OPTION>

				<OPTION value="go mountaineering">Mountaineering</OPTION>

				<OPTION value="play musical instrument">Musical Instrument</OPTION>

				<OPTION value="play polo">Polo</OPTION>

				<OPTION value="play rugby">Rugby</OPTION>

				<OPTION value="go for running">Running</OPTION>

				<OPTION value="go for scuba diving">Scuba-Diving</OPTION>

				<OPTION value="have sex">Sex Life</OPTION>

				<OPTION value="socialize">Socializing</OPTION>

				<OPTION value="do School PE">School PE</OPTION>

				<OPTION value="play skating">Skating</OPTION>

				<OPTION value="go for sky diving">Sky Diving</OPTION>

				<OPTION value="sleep">Sleep</OPTION>

				<OPTION value="go for sports">Sports</OPTION>

				<OPTION value="play squash">Squash</OPTION>

				<OPTION value="go swimming">Swimming</OPTION>

				<OPTION value="play table tennis">Table Tennis</OPTION>

				<OPTION value="play volleyball">Volleyball</OPTION>

				<OPTION value="go for a walk">Walk</OPTION>

				<OPTION value="play water-polor">Water-Polo</OPTION>

				<OPTION value="go for wrestling">Wrestling</OPTION>

			</SELECT>

		</TD>

		<td>

			<div style="width:0px; overflow:hidden;" id="pInit">

				initially

				<SELECT id="dlsi">

					<Option value="">...</Option>

					<Option value="mildly">mild</Option>

					<OPTION value="mild to moderately">mild to moderate</OPTION>

					<OPTION value="moderately">moderate</OPTION>

					<OPTION value="severely">severe</OPTION>

					<OPTION value="unable">unable</OPTION>

				</SELECT>

			</div>

		</td>

		<TD>

			<div style="width:0px; overflow:hidden;" id="pCurr">

				currently

				<SELECT id="dls" onclick="fut();">

					<Option value="">...</Option>

					<Option value="mild">mild</Option>

					<OPTION value="mild to moderate">mild to moderate</OPTION>

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

			</div>

		</TD>

		<TD>

			<div id='fut' style="width:0px; overflow:hidden;">

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

		</tr>

		</table>



		<table border="1" rules="all" style="height:0%; line-height:0px;">

		<tbody style="height:0px;">

		<tr>

		<td>

			<div id="helpH" style="width:0px; overflow:hidden;">

				needed help

				<select id="helper" onChange="helpdF();">

					<option value="">...</option>

					<option value="No">No</option>

					<option value="relative">Yes, Relative</option>

					<option value="paid">Yes, Employee</option>

				</select>

			</div>

		</td>

		<td>

			<div id="helperR" style="width:0px; overflow:hidden;">

				Relationship

				<select id="helperRS">

					<OPTION value=wife>Wife</OPTION>

					<OPTION value=husband>Husband</OPTION>

					<OPTION value=partner>Partner</OPTION>

					<OPTION value=girlfriend>Girlfriend</OPTION>

					<OPTION value=boyfriend>Boyfriend</OPTION>

					<OPTION value=daughter>Daughter</OPTION>

					<OPTION value=son>Son</OPTION>

					<OPTION value=mother>Mother</OPTION>

					<OPTION value=father>Father</OPTION>

					<OPTION value=parents>Parents</OPTION>

					<OPTION value=sister>Sister</OPTION>

					<OPTION value=brother>Brother</OPTION>

					<OPTION value=friend>Friend</OPTION>

				</select>

			</div>

		</td>

		<td>

			<div id="helperE" style="width:0px; overflow:hidden;">

				Per Hour Wages

				<input type="text" size="2" id="helperW" />

			</div>

		</td>

		<td>

			<div id="helpD" style="width:0px; overflow:hidden;">

				Duration For Which Help Was Needed

				<input type="text" id='hdur' size="2" /> hours / 

				<SELECT name="" id="helpDU">

					<OPTION value="day">day</OPTION>

					<OPTION value="week">week</OPTION>

					<OPTION value="month">month</OPTION>

					<OPTION value="year">year</OPTION>

				</SELECT>

				for

				<input type="text" id='hdurx' size="2" />

				<SELECT name="" id="helpDUx">

					<OPTION value="day">day</OPTION>

					<OPTION value="week">week</OPTION>

					<OPTION value="month">month</OPTION>

					<OPTION value="year">year</OPTION>

					<option value="still">still needs help</option>

				</SELECT>

			</div>

		</td>



		<td>

			<div id="sportL" style="width:0px; overflow:hidden;">

				Plays

				 <select id="sportLS">

					<option value="">...</option>

					<option value="a professional">Professional</option>

					<option value="a semi professional">Semi Professional</option>

					<option value="an amature">Amature</option>

				</select>

			</div>

		</td>



		<td>

			<div id="sportT" style="width:0px; overflow:hidden;">

				Plays for a team?

				<select id="sportTS" onChange="sportTPX();">

					<option value="">...</option>

					<option value="Yes">Yes</option>

					<option value="No">No</option>

				</select>

			</div>

		</td>



		<td>

			<div id="sportTP" style="width:0px; overflow:hidden;">

				Plays

				 <select id="sportTPS">

					<option value="">...</option>

					<option value="got dropped">got dropped from the team</option>

					<option value="had to take time off from the game">had to take time off</option>

				</select>

			</div>

		</td>

	</TR>

	</tbody>

</TABLE>

<center>

	<INPUT onClick="adddl('<?echo $gg;?>');" type="button" value="Add" style="width:60px;height:26px;border-radius:6px;" />

</center>



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

