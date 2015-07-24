<?php

include 'includes/dcon.php';

$statements = "SELECT clinic_name, clinic_address1, clinic_address2, clinic_pcode FROM clinic WHERE clinic_name = '".$_GET['clinicid']."'";

$clinicnme = $db->query($statements);

$clinicPrint = $clinicnme->fetchRow(DB_FETCHMODE_ASSOC);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<center>
<br/>
<table  align="center" width='87%' style="color:#368ccc;" >
<TR>
<TD colspan='2' align="center"><b>VENUE DETAILS</b></TD>
</TR>
<TR>
<TD>Venue Name :</TD><TD><INPUT type='text' id="venName" name='venName' class="form-control" value="<?php echo $clinicPrint['clinic_name'] ; ?>" /></TD>
</TR>
<TR>
<TD>Venue Address 1 :</TD><TD style="padding:5px;"><INPUT type="text" id="venAddy" name="venAddy" class="form-control" value="<?php echo $clinicPrint['clinic_address1']; ?>"/></TD>
</TR>
<TR>
<TD>Venue Address 2 :</TD><TD style="padding:5px;"><INPUT type='text' id="venAddy2" name="venAddy2" value='<?php echo $clinicPrint['clinic_address2']; ?>' class="form-control"></TD>
</TR>
<TR>
<TD>Venue Post Code :</TD><TD style="padding:5px;"><INPUT type='text' id="venAddpcde" name='venAddpcde' value='<?php echo $clinicPrint['clinic_pcode']; ?>' class="form-control"></TD>
</TR>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="button" id="venueBut" name="venueBut" value="OK" onclick="parent.document.getElementById('divclinic').style.display='none'" class="btn btn-info" style="width:30%"/>
</td>
</tr>
</TABLE>
</center>
</body>
</html>