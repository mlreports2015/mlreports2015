<?

session_start();

include "inc.php";


if (!isset($_SESSION['id']))
{
	rdrctr("Login Details Incorrect","index.html");
}
else
{
	include "dcon.php";
?>

<HTML>

<ITLE>

<TITLE><? echo $_SESSION['n']; ?>'s mLr Home</TITLE>
<SCRIPT language='JavaScript' type='text/javascript' src='Scripts/index.js'></SCRIPT>

<link href="templates/b1.css" type="text/css" rel="StyleSheet" rev="StyleSheet" />
<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

</HEAD>

<body style="background-color:#c7fd9c;" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0">

<?php

include "templates/template.php";

head();
menu1();
menu3();

?>

<DIV align="center" style="font-size:larger; font-weight:bolder;">Appointment Book</DIV>


<DIV align="center">

<table>
<tr>
<FORM action="ab2.php" method="POST">

<th align="center">View Appointments for: </th>
<td><input type="text" value='<?php echo date('d-m-Y');?>' readonly="true" id="dt" size=16px name=dt id='dt' class='inp' /><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'dt');"><img src='images/calender.png' border=0 /></a><input type="submit" value="GO"></td>
</tr>

</FORM>
</table>

<form action="ab3.php" method="POST">
<table>

<tr>
<th colspan="8">Create Appointment Book Entries: </th>
</tr>
<tr>
<td>
<select name="doc">
<?php
include "dcon.php";

$sd="select * from login where org='".$_SESSION['o']."' and stat='d'";
$qd=mysql_query($sd);
while($rd=mysql_fetch_array($qd))
{
	echo "<option value='".$rd['name']."'>".$rd['name']."</option>";
}

?>
</select>
</td>
<td>Date</td>
<td><input type="text" value='<?php echo date('d-m-Y');?>' readonly="true" id="dt1" size=16px name=dt1 id='dt1' class='inp' /><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'dt1');"><img src='images/calender.png' border=0 /></a></td>
<td>Appointment Time (in mins)</td>
<td><input type="text" name="tm" size="4"></td>
<td>Start Time (24 hour format)</td>
<td><input type="text" value="hh:m" name="stm" size="4"></td>
<td>End Time (24 hour format)</td>
<td><input type="text" value="hh:m" name="etm" size="4"></td>
</tr>
<tr>
<td colspan="8" align="center"><input type="submit" value="Create!"></td>
</tr>

</table>

</form>


</DIV>

<form action='del.php' method="POST">
<input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
<input type="hidden" value="<?php echo $_POST['dt'];?>" name="dt">
<input type="hidden" value="<?php echo date('H:i', $_POST['tm']);?>" name="tm">
<input type="hidden" value="<?php echo $_POST['r'];?>" name="r">
<input type="hidden" value="<?php echo $_POST['d'];?>" name="d">

<CENTER><input type="submit" value="Delete Appointment"></CENTER>
</form>

<form action="ab5.php" method="POST">

<input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
<input type="text" readonly="true" value="<?php echo $_POST['dt'];?>" name="dt">
<input type="text" readonly="true" value="<?php echo date('H:i', $_POST['tm']);?>" name="tm">
<input type="hidden" value="<?php echo $_POST['r'];?>" name="r">
<input type="text" readonly="true" value="<?php echo $_POST['d'];?>" name="d">

<table align="center">
<tr><th colspan="5" align="center">Claimant</th></tr>
<TR align="center">
<TD>First Name<br /><INPUT type="text" name="fn"></TD>
<TD>Last Name<br /><INPUT type="text" name="ln"></TD>
<TD>DOB<br /><INPUT type="text" name="dob"></TD>
<TD>Address<br /><INPUT type="text" name="add"></TD>
</TR>

<tr align="center">
<td>Solicitor<br />
<select name="sol" style="width:200px;">
<option value="">...</option>
<?php 
$s="select * from solicitor where org='".$_SESSION['o']."'";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	echo "<option value='".$r['sid']."'>".$r['sn']."</option>";
}
?>
</select></td>
<td>Agency
<br />
<select name="age" style="width:200px;">
<option value="">...</option>
<?php 
$s="select * from agency where org='".$_SESSION['o']."'";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
	echo "<option value='".$r['aid']."'>".$r['an']."</option>";
}
?>
</td>
<td>Solicitor Ref<br />
<input type="text" name="sref" />
</td>
<td>Agency Ref<br />
<input type="text" name="aref" /></td>
</tr>

<TR>
<TD colspan="5" align="center"><INPUT type="submit" value="Search"></TD>
</TR>
</table>

</form>


</body>

</html>
<?php
}
?>