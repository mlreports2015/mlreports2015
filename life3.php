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


$empl = "select occupation from occupations order by occupation asc";
$emp1Res = mysql_query($empl);


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



<FORM method="POST" action="Process/life.php?typo=emp" name="frm" id="frm">



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



<div align="center">



<H3>Employment</H3>

<TABLE border="1" rules="all" cellpadding="5px" width="80%" style="font-family:Arial, Helvetica, sans-serif;">

	<TR>

		<TD>Works as 

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



			<select  name=wjob id="wjob" onChange="wchange();" >

				<option value="" selected="selected">Please Select...</option>

			<?php while($occuRec = mysql_fetch_array($emp1Res)){
				
					echo "<option value='".$occuRec[0]."'>".$occuRec[0]."</option>";				
			
				}
                ?>
                <!--
				<option value="Accountant" >Accountant</option>

				<option value="Acting Professional" >Acting Professional</option>

				<option value="Actor" >Actor</option>

				<option value="Administrator" >Administrator</option>

				<option value="Administration Professional" >Administration Professional</option>

				<option value="Advertising Professional" >Advertising Professional</option>

				<option value="Air Hostess" >Air Hostess</option>

				<option value="Author">Author</option>
				
				<option value="Architect" >Architect</option>

				<option value="Armed Forces" >Armed Forces</option>

				<option value="Artisan" >Artisan</option>

				<option value="Audiologist" >Audiologist</option>



				<OPTION value="Baker">Baker</OPTION>

				<option value="Banker" >Banker</option>

				<option value="Barber" >Barber</option>

				<option value="Beautician" >Beautician</option>

				<option value="Biologist" >Biologist / Botanist</option>

				<option value="Builder">Builder</option>

				<option value="Business Person" >Business Person</option>





				<option value="Caterer" >Caterer</option>

				<option value="Carpenter">Carpenter</option>
				
				<option value="Charity Worker" >Charity Worker</option>

				<option value="Chartered Accountant" >Chartered Accountant</option>
				
				<OPTION value="Child">Child</OPTION>

				<OPTION value="Chef">Chef</OPTION>

				<option value="Civil Engineer" >Civil Engineer</option>

				<option value="Civil Servant" >Civil Servant</option>

				<OPTION value="Cleaner">Cleaner</OPTION>

				<option value="Clerical Official" >Clerical Official</option>

				<option value="Commercial Pilot" >Commercial Pilot</option>
				
				<option value="Community Officer">Community Support Officer</option>

				<option value="Company Secretary" >Company Secretary</option>

				<option value="Computer Professional" >Computer Professional</option>

				<OPTION value="Computer-Programmer">Computer-Programmer</OPTION>

				<option value="Computing/IT Professional" >Computing/IT</option>

				<option value="Construction Worker" >Construction Worker</option>

				<option value="Consultant" >Consultant</option>

				<option value="Consultant" >Contractor</option>

				<option value="Cost Accountant" >Cost Accountant</option>

				<option value="Creative Person" >Creative Person</option>

				<option value="Customer Support Professional" >Customer Support Professional</option>

			

				<option value="Defense Employee" >Defense Employee</option>

				<OPTION value="Delivery-Driver">Delivery-Driver</OPTION>

				<option value="Dentist" >Dentist</option>

				<option value="Designer">Designer </option>

				<option value="Designer(Fasion)" >Designer (Fashion) </option>
				
				<option value="Designer(Graphics)">Desiginer (Graphics)</option>

				<option value="Doctor" >Doctor</option>

				<OPTION value="Door-Man">Door-Man</OPTION>

				<OPTION value="Driver">Driver</OPTION>

				<OPTION value="Driving-Instructor">Driving-Instructor</OPTION>



				<option value="Economist" >Economist</option>

				<option value="Educator" >Educator</option>

				<OPTION value="Electrician">Electrician</OPTION>

				<option value="Engineer" >Engineer</option>

				<option value="Engineer (Aeronautical)" >Engineer (Aeronautical)</option>

				<option value="Engineer (Aviation)" >Engineer (Aviation)</option>

				<option value="Engineer (Civil)" >Engineer (Civil)</option>

				<option value="Engineer (Construction)" >Engineer (Construction)</option>

				<option value="Engineer (Electical)" >Engineer (Electical)</option>

				<option value="Engineer (Marine)" >Engineer (Marine)</option>

				<option value="Engineer (Mechanical)" >Engineer (Mechanical)</option>

				<option value="Engineer (Project)" >Engineer (Project)</option>

				<option value="Engineer (Software)" >Engineer (Software)</option>

				<option value="Engineer (Telecom)" >Engineer (Telecom)</option>

				<option value="Entertainment Professional" >Entertainment Professional</option>

				<option value="Entrepreneur" >Entrepreneur</option>

				<option value="Event Manager" >Event Manager</option>

				<option value="Executive" >Executive</option>



				<option value="Factory Worker" >Factory Worker</option>

				<option value="Farmer" >Farmer</option>

				<option value="Fashion Designer" >Fashion Designer</option>

				<option value="Finance Professional" >Finance Professional</option>

				<option value="Fire Man" >Fire Man</option>

				<option value="Flight Attendant" >Flight Attendant</option>

			

				<option value="Government Employee" >Government Employee</option>

				<option value="Health Care Professional" >Health Care Professional</option>

				<option value="Home Maker" >Home Maker</option>
				
				<option value="House Wife">House Wife</option>

				<option value="Hotel & Restaurant Professional" >Hotel & Restaurant Professional</option>

				<option value="Human Resources Professional" >Human Resources Professional</option>



				<option value="Interior Designer" >Interior Designer</option>

				<option value="Investment Professional" >Investment Professional</option>

				<option value="IT / Telecom Professional" >IT / Telecom Professional</option>



				<option value="Journalist" >Journalist</option>



				<OPTION value="Labourer">Labourer</OPTION>

				<option value="Lawyer" >Lawyer</option>

				<option value="Lecturer" >Lecturer</option>

				<option value="Legal" >Legal</option>

				<option value="Legal Professional" >Legal Professional</option>

				<option value="Long Term Disabled" >Long Term Disabled</option>

             	<option value="Long Term Ill" >Long Term Ill</option>



				<option value="Manager" >Manager</option>

				<option value="Marketing Professional" >Marketing Professional</option>

				<option value="Media Professional" >Media Professional</option>

				<option value="Medical Professional" >Medical Professional</option>

				<option value="Medical Transcriptionist" >Medical Transcriptionist</option>

				<option value="Merchant Naval Officer" >Merchant Naval Officer</option>

				<option value="Musician" >Musician</option>



				<option value="Navy Officer" >Navy Officer</option>

				<option value="Nurse" >Nurse</option>



				<option value="Occupational Therapist" >Occupational Therapist</option>

				<option value="Operator" >Operator</option>

				<option value="Optician" >Optician</option>

				<option value="o" >Other</option>



				<option value="Painter" >Painter</option>

				<option value="Pharmacist" >Pharmacist</option>

				<option value="Physician Assistant" >Physician Assistant</option>

				<option value="Physicist" >Physicist</option>

				<option value="Physiotherapist" >Physiotherapist</option>

				<option value="Pilot" >Pilot</option>

				<option value="Plasterer" >Plasterer</option>

				<option value="Plumber" >Plumber</option>

				<option value="Police Officer" >Police Officer</option>

				<option value="Politician" >Politician</option>

				<option value="Production professional" >Production professional</option>

				<option value="Professor" >Professor</option>

				<option value="Property-Dealer" >Property-Dealer</option>

				<option value="Psychologist" >Psychologist</option>

				<option value="Public Relations Professional" >Public Relations Professional</option>



				<OPTION value="Receptionist">Receptionist</OPTION>

				<option value="Real Estate Professional" >Real Estate Professional</option>

				<option value="Research Scholar" >Research Scholar</option>

				<option value="Retail Professional" >Retail Professional</option>

				<option value="Retired" >Retired</option>



				<option value="Sales Professional" >Sales Professional</option>

				<option value="Scientist" >Scientist</option>

				<option value="School Teacher" >School Teacher</option>

				<option value="Secretary" >Secretary</option>

				<option value="Security Guard" >Security Guard</option>

				<option value="Self-employed Person" >Self-employed Person</option>

				<option value="Shop Assistant" >Shop Assistant</option>

				<option value="Social Worker" >Social Worker</option>

				<option value="Software Consultant" >Software Consultant</option>

				<option value="Sports Professional" >Sports Professional</option>

				<option value="Student" >Student</option>

				<option value="Surgeon" >Surgeon</option>



				<option value="Taxi Driver" >Taxi Driver</option>

				<option value="Teacher" >Teacher</option>

				<option value="Technician (Lab)" >Technician (Lab)</option>
				
				<option value="Technician (Electical)">Technician (Electrical)</option>
				
				<option value="Technician (Audio)">Technician (Sound) </option>	

				<option value="Training Professional" >Training Professional</option>

				<option value="Transportation Professional" >Transportation Professional</option>



				<OPTION value="University-Professor">university-professor</OPTION>

				<option value="Unemployed" >Unemployed</option>



				<option value="Veterinary Doctor" >Veterinary Doctor</option>
				
				<option value="Veterinary Nurse">Veterinary Nurse </option>

				<option value="Volunteer" >Volunteer</option>



				<OPTION value="Waiter">Waiter</OPTION>

				<option value="Writer" >Writer</option>

			
				-->
				<option value="Zoologist" >Zoologist</option>

			</select>

			<INPUT type="text" name="wjob1" id="wjob1" size="8" style="visibility:hidden;width:0px;" />

            

            <br>

            

<!-- ///////////////////////////////////////// -->



<!-- Need to figure out how to do this with drop down select list -->



<!-- ///////////////////////////////////////// -->

            

            Main Job (this appears on the main page) : <br>

            <input type="text" id="work" name="work" value="<?php echo $claim['emp'];?>" />

<!--            <select name="work1" id="work1">

            </select>-->

            

		</TD>

		<td>

			<div style="overflow:hidden;" id="sataD">

				status at time of accident

				<select id="sata" onChange="sataF();">

					<option value="...">...</option>

					<option selected="selected" value="working">Working</option>

					<option value="unemployed">Unemployed</option>

					<option value="on holidays">On Holidays</option>

					<option value="on sick leave">On Sick Leave</option>

<!-- 					<option value="leaving for a holiday">Leaving for a Holiday</option> -->

				</select>

			</div>

		</td>

		<td>

			<div id="onholD" style="width:0px; overflow:hidden;">

				duration off for for holidays/sick-leave

				<INPUT type="text" id="woffHT" size="3" /> 

				<SELECT name="whh" id="whhHS" >

					<OPTION value="day">day</OPTION>

					<OPTION value="week">week</OPTION>

					<OPTION value="month">month</OPTION>

					<OPTION value="year">year</OPTION>

				</SELECT>

			</div>

		</TD>

		<TD>

			<div id="hpw" style="overflow:hidden;" >working for <INPUT type="text" id="whour" size="3" /> hours/week</div>

		</TD>

		<TD>

			<div id="toffD" style="overflow:hidden;">

				as a result of the accident, had to 

				<select id="hadtoS" onChange="hadtoF();">

					<option value=".">did not tale time off</option>

					<option value="take time off">take time off</option>

					<option selected="selected" value="take time off for">take time off for</option>

					<option value="still off">still off</option>

					<option value="will remain off">will remain off</option>

					<option value="will remain off for">will remain off for</option>

				</select>

				<div style='visibility:visible;' id="whhD">

					<INPUT type="text" id="woff" size="3" /> 

					<SELECT name="whh" id="whh" style="width:50px;" />

						<OPTION value="day">day</OPTION>

						<OPTION value="week">week</OPTION>

						<OPTION value="month">month</OPTION>

						<OPTION value="year">year</OPTION>

					</SELECT>

				</div>

			</div>

		</td>

		<td>

			<div id="tLytD" style="overflow:hidden;">

				as a result of the accident, had to 

				<select id="hadLS" onChange="hadLF();">

					<option value=".">...</option>

					<option value="remain on light duties">remain on light duties</option>

					<option value="remain on light duties for">remain on light duties for</option>

					<option value="still on light duties">still on light duties</option>

					<option value="will stay on light duties">will stay on light duties</option>

					<option value="will stay on light duties for">will stay on light duties for</option>

				</select>

				<div style='visibility:hidden;' id="whLD">

					<INPUT type="text" id="wLyt" size="3" /> 

					<SELECT name="wlLyt" id="wlLyt" style="width:50px;" />

						<OPTION value="day">day</OPTION>

						<OPTION value="week">week</OPTION>

						<OPTION value="month">month</OPTION>

						<OPTION value="year">year</OPTION>

					</SELECT>

				</div>

			</div>

		</td>

		<td>

			<div id="sStuL" style="width:0px; overflow:hidden;">

				Student At

				<select id="sSac">

					<option value="full time university">Full Time University</option>

					<option value="full time technical institute">Full Time Technical Institutions</option>

					<option value="full time college">Full Time College</option>

					<option value="part time university">Part Time University</option>

					<option value="part time technical institute">Part Time Technical Institutions</option>

					<option value="part time college">Part Time College</option>

					<option value="School">School</option>

				</select>

			</div>

		</td>

		<td>

			<div id="sStuA" style="width:0px; overflow:hidden;">

				Status at Time of Accident

				<select id="sCur">

					<option value="term time">Term Time</option>

					<option value="summer vacations">Summer Vacations</option>

					<option value="easter break">Easter Break</option>

					<option value="christmas holidays">Christmas Holidays</option>

					<option value="on sick leave">On Sick Leave</option>

				</select>

			</div>

		</td>

		<td>

			<div id="atStuA" style="width:0px; overflow:hidden;">

				Affect of Accident on Attendance:

				<select id="sWoffs" onChange="sWoff();">

					<option value="">None</option>

					<option value="sick leave">Had to Take Sick Leave</option>

					<option value="sick leave for">Had To Take Sick Leave For</option>

				</select>

				<div id="SwoffD" style="visibility:hidden;">

					<INPUT type="text" id="Swoff" size="3" /> 

					<SELECT name="Swhh" id="Swhh" >

						<OPTION value="day">day</OPTION>

						<OPTION value="week">week</OPTION>

						<OPTION value="month">month</OPTION>

						<OPTION value="year">year</OPTION>

					</SELECT>

				</div>

			</div>

		</td>

		<td>

			<div id="coStuA" style="width:0px; overflow:hidden;">

				Affect of Accident on Coursework:

				<select id="Scourse" onChange="sCourse();">

					<option value="">None</option>

					<option value="extension">Extension</option>

					<option value="extension for">Extension For</option>

					<option value="could not submit">Could Not Submit</option>

				</select>

				<div id="SEDD" style="visibility:hidden;">

					<INPUT type="text" id="SED1" size="3" /> 

					<SELECT name="Swhh" id="SED2" >

						<OPTION value="day">day</OPTION>

						<OPTION value="week">week</OPTION>

						<OPTION value="month">month</OPTION>

						<OPTION value="year">year</OPTION>

					</SELECT>

				</div>

			</div>

		</td>

	</tr>

	<TR><TD colspan="9" align="center"><INPUT onClick="addemp('<? echo $g ?>');" type="button" value="Add" style="border-radius:6px;width:60px;height:25px;" /></TD></TR>

</TABLE>



<?php

/*

<TEXTAREA rows="1" cols="100" id="work0" name="work0"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work1" name="work1"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work2" name="work2"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 2,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work3" name="work3"></TEXTAREA>

*/

?>



<div id="dEmp" style="border-radius:6px;background-color:#cfe2ee">



<?php



$sE="select * from emp where id='".$_GET['cid']."' and org='".$_SESSION['o']."' order by num";

$qE=mysql_query($sE);



$i=0;

$x=-10;

$j=0;



while ($rE=mysql_fetch_array($qE))

{

	if ($x!=$rE['ind'])

	{

		$x=$rE['ind'];

		$i=$i+1;

	}

	echo "<textarea name='tEmp".$j."' id='tEmp".$j."' cols='100' style='background-color:#cfe2ee;border:none;border-radius:6px;'>".$rE['msg1']."</textarea>";
    echo "<input type=button value=Remove onclick=\"ignoreitemp('$j');\" id=bEmp".$j." style='background-color:#AA2222; color:#FFF;' />";


	$j=$j+1;



	if ($j==4)

	{

		$j=0;

	}

}

?>

<br>



</div>





<center>

	<INPUT onClick="adddl('<?echo $gg;?>');" type="button" value="Add" />

</center>



<?php 



$i=1;

//echo 'x';

while ($rr1=mysql_fetch_array($q1))

{

	echo "<textarea name=t[$i] id=t[$i] rows=2 cols=100 style='background-color:#cfe2ee;border-radius:6px;'>".$rr1['msg']."</textarea>";

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

