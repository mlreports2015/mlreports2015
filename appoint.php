<?php

include 'template.php';

head('Availability', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/accid.js"></script>', '', '', '');
?>

<BODY background="images/back.png" onLoad="doeF();">


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Availability', $org, $id);

?>

<DIV align="center">

<table>
<FORM action="ab2.php" method="POST">
<tr>
<th align="center">View Appointments for: </th>
</tr>
<tr>
<td><input type="text" value='<?php echo date('d-m-Y');?>' readonly="true" id="dt" size=16px name=dt id='dt' class='inp' /><a href='#' onClick="setYears(1900, 2011); showCalender(this, 'dt');"><img src='images/calender.png' border=0 /></a><input type="submit" value="GO"></td>
</tr>
</FORM>
</table>

<br>

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


<?php
include 'dcon.php';

$d=date('Y-m-d');
$s="select * from login where org='".$_SESSION['o']."' and stat='d'";
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{

$doc=$r['name'];

$s2="select * from app where dt='$d' and dr='$doc' and org='".$_SESSION['o']."'";
$q2=mysql_query($s2);
?>

<div style="float:left;">

<TABLE align="center" border="1">
<TR><th colspan="2" align='center'><?php echo $doc;?></th></TR>
<?php
while($r2=mysql_fetch_array($q2))
{
$st=strtotime($r2['stime']);
$et=strtotime($r2['etime']);
$tm=$r2['apptm'];

$sl=(($et-$st)/$tm)/60;

for ($i=0; $i<$sl;$i++)
{
$time=$st+($tm*$i*60);

$s3="select * from appoint where tm='".date('H:i',$time)."' and dt='$d' and dr='$doc' and org='".$_SESSION['o']."'";
// echo $s3;
$q3=mysql_query($s3);
$r3=mysql_fetch_array($q3);

$s4="select * from claimant where cid='".$r3['id']."' and org='".$_SESSION['o']."'";
// echo $s4;
$q4=mysql_query($s4);
$r4=mysql_fetch_array($q4);
	echo "<tr><td>".date('H:i',$time)."</td><td>";

$s5="select * from stat where tm='".date('H:i',$time)."' and dt='$d' and dr='$doc' and org='".$_SESSION['o']."'";
$q5=mysql_query($s5);
$r5=mysql_fetch_array($q5);

?>
<form action="ab4.php" method="POST">
<input type="hidden" value="<?php echo $r3['id'];?>" name="id">
<input type="hidden" value="<?php echo $d;?>" name="dt">
<input type="hidden" value="<?php echo $time;?>" name="tm">
<input type="hidden" value="<?php echo $r3['reason'];?>" name="r">
<input type="hidden" value="<?php echo $doc;?>" name="d">



<input type="submit" value="<?php echo $r4['cfn']." ".$r4['cln'];?>" size="150" style="width:150px;color:<?php if ($r5['stat']=='0') echo "#000;"; else if ($r5['stat']=='1') echo "#00F;"; else if ($r5['stat']=='2') echo "#F00;"; else if ($r5['stat']=='3') echo "#0F0;"; else if ($r5['stat']=='4') echo "#777"; ?>">
</form>


<?php

if (strtotime($d)==strtotime(date('Y-m-d')))
{

if (strlen($r3['id'])>0)
{
?>

<form action="updt.php" method="POST">
<input type="hidden" value="<?php echo $r3['id'];?>" name="id">
<input type="hidden" value="<?php echo $d;?>" name="dt">
<input type="hidden" value="<?php echo $time;?>" name="tm">
<input type="hidden" value="<?php echo $r3['reason'];?>" name="r">
<input type="hidden" value="<?php echo $doc;?>" name="d">

<select name="st">
<option value="0">...</option>
<option value="1">Arrived</option>
<option value="2">Late</option>
<option value="3">With Doctor</option>
<option value="4">Left</option>
</select>

<input type="submit" value="Update" size="150">
</form>

<?php
}
}

// echo strtotime($d)."<br>".strtotime(date('Y-m-d'));
?>


</td></tr>
<?php
}
}

?>
</TABLE>

</div>
<?php
}
?>



<table id='calenderTable'>
<tbody id='calenderTableHead'>
<tr>
<td colspan='4' align='left'>
<select onChange="showCalenderBody(createCalender(document.getElementById('selectYear').value, this.selectedIndex, false));" id='selectMonth'>
<option value='0'>January</OPTION>
<option value='1'>February</option>
<option value='2'>March</option>
<option value='3'>April</option>
<option value='4'>May</option>
<option value='5'>June</option>
<option value='6'>July</option>
<option value='7'>August</option>
<option value='8'>September</option>
<option value='9'>October</option>
<option value='10'>November</option>
<option value='11'>December</option>
</Select>
</td>
<td colspan='2' align='center'><select onChange="showCalenderBody(createCalender(this.value, document.getElementById('selectMonth').selectedIndex, false));" id='selectYear'></select></td>
<td align='right'><a href='#' onClick='closeCalender();'>X</a></td>
</tr>
</tbody>
<tbody id='calenderTableDays'>
<tr style=''>
<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Thu</td><td>Fr</td><td>Sa</td>
</tr>
</tbody>
<tbody id='calender'></tbody>
</table>