<?php

session_start();

if (isset($_SESSION['id']))
{
?>
<body bgcolor="#FFFFFF">

<div style="float:left; width:350px;height:330px;overflow:hidden;">
<form action="agencySaveP.php" method="post" name="frm" id="frm" style="font-family:Verdana, Geneva, sans-serif;">
<table width="350" cellpadding="6px">
<TR>
<TD>Name</TD><TD><INPUT type='text' id="cn1" name='cn1'><input type="hidden" name="org" value="<?php echo $_GET['org'];?>" /><input type="hidden" name="lnm" value="<?php echo $_GET['lnm'];?>" /></TD>
</TR>
<tr>
<TD>Post Code</TD><TD><input style="width:90px;" value="" type="text" name="cpc" id="cpc" /><input type="hidden" value="" name="lat" id="lat" /><input type="hidden" value="" name="long" id="long" /><input type="button" value="Find" onClick="" /></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD><INPUT type='text' id="ca1" name='ca1' value=""></TD>
</tr>
<tr>
<TD>Address Line 2</TD><TD><input type="text" id="cty" name="cct" value='' /></td>
</tr>
<tr>
<TD>Contact</TD><TD><INPUT type='text' id="cc" name='cc'></TD>
</tr>
<tr>
<TD>Fax</TD><TD><INPUT type='text' id="cf" name='cf'></TD>
</tr>
<tr>
<td>Email</td><td><input type="text" id="eml" name="ce" /></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="button" onClick="saver();" value="SAVE" style="border-radius:7px;width:65px;height:28px;"/>
</td>
</tr>
</TABLE>
</form>
</div>

<div id="livesearch2" style="float:left; position:absolute; left:300px; top:50px; height:150px; width:100px; background-color:#FFF; visibility:hidden;">
<div id="ls2I" style="overflow:auto; height:110px;"></div>
<div id="ls2B" style="height:40px; padding-top:10px;" align="center"></div>
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
	else
	{
		submitter();
	}
}


function submitter()
{	
	
		document.frm.submit();


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
	document.getElementById('cty').value='';
}

</script>

</form>

</body>
<?php
}
?>