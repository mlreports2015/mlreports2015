<?php

session_start();

if (isset($_SESSION['id']))
{
include 'dcon.php';

$s="select * from solicitor where sid='".$_GET['sid']."'";
$q=mysql_query($s);
$r=mysql_fetch_array($q);

$ll=explode(',', $r['latlong']);
$sa=explode('<br>', $r['sa']);
?>
<body bgcolor="#e5e5e5">

<div style="float:left; width:200px;">
<form action="solicitorEditP.php" method="post" name="frm" id="frm">
<table width="350">
<TR>
<TD>Name</TD><TD><input type="hidden" value="<?php echo $r['sid'];?>" name="cid" /><INPUT value="<?php echo $r['sn'];?>" type='text' id="cn1" name='cn1'><input type="hidden" name="org" value="<?php echo $_SESSION['o'];?>" /><input type="hidden" name="lnm" value="<?php echo $_SESSION['n'];?>" /></TD>
</TR>
<tr>
<TD>Post Code</TD><TD><input value="<?php echo $r['sp']; ?>" type="text" name="cpc" id="cpc" onBlur="javascript:usePointFromPostcode(document.getElementById('cpc').value, showPointLatLng); addressFind();" onChange="clearest();" /><input type="hidden" value="<?php echo $ll[0];?>" name="lat" id="lat" /><input type="hidden" value="<?php echo $ll[1];?>" name="long" id="long" /></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD><INPUT type='text' id="ca1" name='ca1' value="<?php echo $sa[0];?>"></TD>
</tr>
<tr>
<TD>Address Line 2</TD><TD><INPUT type='text' id="ca2" name='ca2' value="<?php echo $sa[1];?>"></TD>
</tr>
<tr>
<td>City</td><td><input type="text" id="cty" name="cct" value='<?php echo $r['st'];?>' /></td>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' id="cc" name='cc' value='<?php echo $r['sc'];?>'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT type='text' id="cf" name='cf' value='<?php echo $r['sf'];?>'></TD>
</tr>
<tr>
<td>Email</td><td><input type="text" id="eml" name="ce" value='<?php echo $r['se'];?>'/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="button" onClick="saver();" value="Save" />
</td>
</tr>
</TABLE>
</form>
</div>

<div id="livesearch2" style="float:left; position:absolute; left:300px; top:50px; overflow:auto; height:100px; width:100px;">
</div>
<div id="lsclose">
</div>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAA0jNoc89uwkdl4LgfM9KldRRiKve6JGS7u_Ryr84nOMdV8_I6oxT2bBrU1PUkF3dX7EBzDf0LW8QFBw" type="text/javascript"></script>
<script src="gmap2.js" type="text/javascript"></script>
<script src="cas.js" type="text/javascript" language="javascript"></script>
<script src="cas2.js" type="text/javascript" language="javascript"></script>
<script src="casAddress.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" language="javascript">

function saver()
{
	if (document.getElementById('cpc').value=='')
	{
		alert('Please Enter Clinic Post Code');
	}
	else if (document.getElementById('cn1').value=='')
	{
		alert('Please Enter Clinic Name');
	}
	else if (document.getElementById('cty').value=='')
	{
		alert('Please Enter Clinic City');
	}
	else if (document.getElementById('eml').value=='')
	{
		alert('Please Enter Email Address');
	}
	else if (document.getElementById('cc').value=='')
	{
		alert('Please Enter Clinic Phone Number');
	}
	else
	{
		submitter();
	}
}


function submitter()
{	
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		document.frm.submit();
	}
	else
	{
		setTimeout('submitter()', 750);
	}
}


function addressFind()
{
	if (document.getElementById('lat').value!='' && document.getElementById('long').value!='')
	{
		showResult4(document.getElementById('lat').value+','+document.getElementById('long').value);
	}
	else
	{
		setTimeout('addressFind()', 500);
	}
}


function clearest()
{
	document.getElementById('lat').value='';
	document.getElementById('long').value='';
	
	document.getElementById('ca1').value='';
	document.getElementById('ca2').value='';
	document.getElementById('cty').value='';
}

</script>

</form>

</body>
<?php
}
?>