<?php

session_start();

if (isset($_SESSION['id']))
{
include 'dcon.php';

?>

<link href="CSS/calender.css" rel="stylesheet" type="text/css">
<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>

<form action="aTimeAbP.php" method="POST">
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

<?php
}
?>