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

<TABLE border="1" width="80%">

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

	<TR><TD colspan="9" align="center"><INPUT onClick="addemp('<? echo $g ?>');" type="button" value="Add" /></TD></TR>

</TABLE>



<?php

/*

<TEXTAREA rows="1" cols="100" id="work0" name="work0"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work1" name="work1"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 1,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work2" name="work2"><?php $se="select * from emp where id='$id' and org='".$_SESSION['o']."' limit 2,1"; $qe=mysql_query($se); $re=mysql_fetch_array($qe); echo $re['msg1']; ?></TEXTAREA>

<TEXTAREA rows="1" cols="100" id="work3" name="work3"></TEXTAREA>

*/

?>



<div id="dEmp">



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

	echo "<textarea name='tEmp".$j."[$i]' cols='100'>".$rE['msg1']."</textarea>";



	$j=$j+1;



	if ($j==4)

	{

		$j=0;

	}

}

?>

<br>



</div>



<H3>Home Circumstances</H3>

<TABLE border="1">

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

						<OPTION value="month" selected >months</OPTION>

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



<?php

/*

<TEXTAREA cols="100" id="tpass" name="tpass"><?php $sh="select * from travel where id='$id' and org='$org'"; $qh=mysql_query($sh); $rh=mysql_fetch_array($qh); echo $rh['msg']; ?></TEXTAREA>

*/

?>



<H3>Daily Living</H3>

<TABLE border="1">

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



		<table border="1" style="height:0%; line-height:0px;">

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

	<INPUT onClick="adddl('<?echo $gg;?>');" type="button" value="Add" />

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

