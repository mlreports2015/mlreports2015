<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#e5e5e5">

<?php
/*
<TD>Name</TD><TD><INPUT type='text' id="cn1" name='cn1'><input type="hidden" name="org" value="<?php echo $_GET['org'];?>" /><input type="hidden" name="lnm" value="<?php echo $_GET['lnm'];?>" /></TD>
</TR>
<tr>
<TD>Post Code</TD><TD><input type="text" name="cpc" id="cpc" onBlur="javascript:usePointFromPostcode(document.getElementById('cpc').value, showPointLatLng); addressFind();" /><input type="hidden" value="" name="lat" id="lat" /><input type="hidden" value="" name="long" id="long" /></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD><INPUT type='text' id="ca1" name='ca1'></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD><INPUT type='text' id="ca2" name='ca2'></TD>
</tr>
<tr>
<td>City</td><td><input type="text" id="cty" name="cct" /></td>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' id="cc" name='cc'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT type='text' id="cf" name='cf'></TD>
</tr>
<tr>
<td>Email</td><td><input type="text" id="eml" name="ce" /></td>

*/
?>

<?php

include 'inc.php';
include 'dcon.php';

$cid=$_POST['cid'];
$cn1=$_POST['cn1'];
$cpc=$_POST['cpc'];
$lat=$_POST['lat'];
$long=$_POST['long'];
$ca=$_POST['ca1'];
$cct=$_POST['cct'];
$cc=$_POST['cc'];
$cf=$_POST['cf'];
$eml=$_POST['ce'];

$ll=$lat.','.$long;

$s="update cclist set org='".$_SESSION['o']."', lnm='".$_SESSION['n']."', cn='$cn1', cp='$cpc', latlong='$ll', ca='$ca', ct='$cct', cc='$cc', fax='$cf', ce='$eml' where cid='$cid'";
	
	echo "<div align='center'>";
if (mysql_query($s))
{
		echo "Clinic Updated<br>";
}
else
{
		echo "Server Error Occured, Clinic Not Added";
}
//		echo "<input type='button' value='Close' onclick='parent.ifrmrClose();' />";
	echo "</div>";
?>

</body>
<?php
}
?>