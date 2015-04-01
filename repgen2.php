<?php

include 'template.php';

head('Generate Report', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', "<script language=\"javaScript\" type=\"text/javascript\" src=\"Scripts/summary.js\"></script>", '', '<script language=\'JavaScript\' type=\'text/javascript\'>

function chnge(a)
{
	var b=document.getElementById(a);
	if (b.checked==true)
	{
		var c=document.getElementById(a+\'x\');
		c.value=a;
	}
	else
	{
		var c=document.getElementById(a+\'x\');
		c.value=\'\';
	}
}

function hlp()
{
	document.getElementById(\'hlpp\').style.visibility=\'visible\';
}

function hlpg()
{
	document.getElementById(\'hlpp\').style.visibility=\'hidden\';
}
</script>','');
?>

<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Generate Report', $org, $id);

?>


<FORM method="POST" action="Process/repgen3.php">
<input type="hidden" value="p1" name="p1x" id="p1x"/>
<h4><center>Optional Referrances<a onMouseOver="hlp();" onMouseOut="hlpg();"><img src="images/help.png"/></a></center></h4>
<p style="background-color:#fff;"><input value="p1" type="checkbox" id="p1" name="p1" onClick="chnge('p1');" checked="checked" />Studies have shown that the rate of recovery of a soft tissue injury to the cervical, thoracic and lumbar spine resulting in a whiplash injury without nerve route compression or bony injury following a road traffic accident is variable. Whiplash injury is defined as a traumatic injury to the soft tissue structures of the cervical spine including muscles, ligaments, intervertebral discs and facet joints due to hyper flexion and hyper extension, rotational injury and transmitted impact from the seat belt.</p>
<input type="hidden" value="p2" name="p2x" id="p2x"/>
<p style="background-color:#fff;"><input checked="checked" value="p2" type="checkbox" id="p2" name="p2" onClick="chnge('p2');" />The range of recovery varies from few months of the accident to subjects being left with long term spinal symptoms. Analysis of studies shows that a significant number of subjects sustaining spinal injuries in road traffic accidents will continue to suffer cervical spine pain at 3 years post accident. There is a large body of medical literature both from the United Kingdom and other countries regarding neck injuries and road traffic accidents. Review of the medical literature reveals variation in various prognostic factors for recovery from whiplash injury.</p>

<center><h3>Report Generation Options</h3>


<div style="border-style:inset; border-color:#C30; border-width:thin; width:550px;height:470px;" >
<center><b>Report type</b></center>
<div style="border-style:inset; border-color:#C30; border-width:thin; width:500px;" >
<select id="reptyp" name="reptyp" >
		<option value="child" >Child</option>
		<option value="youth">Youth</option>
		<option value="adult" selected='selected'>Adult</option>

</select>
</div>

<center><b>Borders</b></center>
<center>
<div style="border-style:inset; border-color:#C30; border-width:thin; width:500px;" >
<table>
<tr>
<td>
<b>Front Page</b></td>
<td>
<select name='mw'>
<option value="0">No Borders</option>
<option value="1">Narrow Borders</option>
<option value="2">Wide Borders</option>
<option value="double">Double</option>
<option value="triple">Triple (use with caution, overlaps header and footer)</option>
<option value="emboss">Emboss</option>
<option value="engrave">Engrave</option>
</select></td></tr>

<tr>
<td><b>Remaining Document</b></td>
<td>
<select name="mwR">
<option value="0">No Borders</option>
<option value="1">Narrow Borders</option>
<option value="2">Wide Borders</option>
<option value="double">Double</option>
<option value="triple">Triple (use with caution, overlaps header and footer)</option>
<option value="emboss">Emboss</option>
<option value="engrave">Engrave</option>
</select></td></tr>
</table>
</div>
</center>

<br />

<center><b>Font Family</b></center>
<center>
<div style="border-style:inset; border-color:#C30; border-width:thin; width:500px;" >
<table>
<tr>
<td><b>Front Page</b></td>
<td>
<select name='fF'>
<option value="Arial">Arial</option>
<option value="Times New Roman">Times New Roman</option>
<option value="Verdana">Verdana</option>
<option value="Calibri">Calibri</option>
<option value="Arial Black">Arial Black</option>
<option value="Comic Sans MS">Comic Sans</option>
<option value="Tahoma">Tahoma</option>
</select></td>
</tr>
<tr>
<td><b>Remaining Document</b></td>
<td>
<select name='fR'>
<option value="Arial">Arial</option>
<option value="Times New Roman">Times New Roman</option>
<option value="Verdana">Verdana</option>
<option value="Calibri">Calibri</option>
<option value="Arial Black">Arial Black</option>
<option value="Comic Sans MS">Comic Sans</option>
<option value="Tahoma">Tahoma</option>
</select></td>
</tr>
</table>
</div>
</center>

<br />

<center><b>Font Color</b></center>
<center>
<div style="border-style:inset; border-color:#C30; border-width:thin; width:500px;" align="center" >
<table>
<tr>
<td><b>Front Page</b></td>
<td>
<input type="hidden" id="fFC" name="fFC" value="#000000" />
<input type="button" style="background-color:#000000; width:100%;" id="fP" /><br />
<input type="button" style="background-color:#000000" onclick="fFCfun('000000');" />
<input type="button" style="background-color:#333333" onclick="fFCfun('333333');" />
<input type="button" style="background-color:#000066" onclick="fFCfun('000066');" />
<input type="button" style="background-color:#003300" onclick="fFCfun('003300');" />
<input type="button" style="background-color:#330000" onclick="fFCfun('330000');" />
<input type="button" style="background-color:#666666" onclick="fFCfun('666666');" />
<input type="button" style="background-color:#006699" onclick="fFCfun('006699');" />
<input type="button" style="background-color:#0066CC" onclick="fFCfun('0066CC');" />
<input type="button" style="background-color:#0066FF" onclick="fFCfun('0066FF');" />
<input type="button" style="background-color:#990033" onclick="fFCfun('990033');" />
<input type="button" style="background-color:#660033" onclick="fFCfun('660033');" />
<input type="button" style="background-color:#336600" onclick="fFCfun('336600');" />
</td>
</tr>

<tr>
<td><b>Remaining Document</b></td>
<td>
<input type="hidden" id="fRC" name="fRC" value="#000000" />
<input type="button" style="background-color:#000000; width:100%;" id="rD" /><br />
<input type="button" style="background-color:#000000" onclick="fRCfun('000000');" />
<input type="button" style="background-color:#333333" onclick="fRCfun('333333');" />
<input type="button" style="background-color:#000066" onclick="fRCfun('000066');" />
<input type="button" style="background-color:#003300" onclick="fRCfun('003300');" />
<input type="button" style="background-color:#330000" onclick="fFCfun('330000');" />
<input type="button" style="background-color:#666666" onclick="fRCfun('666666');" />
<input type="button" style="background-color:#006699" onclick="fRCfun('006699');" />
<input type="button" style="background-color:#0066CC" onclick="fRCfun('0066CC');" />
<input type="button" style="background-color:#0066FF" onclick="fRCfun('0066FF');" />
<input type="button" style="background-color:#990033" onclick="fRCfun('990033');" />
<input type="button" style="background-color:#660033" onclick="fRCfun('660033');" />
<input type="button" style="background-color:#336600" onclick="fRCfun('336600');" />
</td>
</tr>
</table>
</div>
</center>

<center><b>Summary Section</b>
<br/>
<select name='soc'>
<option value='1'>Add Summary of Contents</option>
<option value='2'>Do Not Add Summary of Contents</option>
</select></center>
<br/>


<b>References</b>
<br/>
<select name='repref'>
<option value='1'>Standard RTA Reference</option>
<option value='2'>LVI Reference</option>
</select></center>

<center><b>Documents Available</b><br />
<input type="checkbox" name="medical" value="m" /> GP Records<br />
<input type="checkbox" name="medical2" value="m" /> Hospital Records<br />
<input type="checkbox" name="engineer" value="e" /> Engineering Report
</center>


<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />

<DIV align="center" style="padding-top : 50px;">
<INPUT type="submit" value="Generate Report" />
</DIV>

</FORM>

<FORM method="POST" action="Process/repinv.php">
<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="id" />

<DIV align="center" style="padding-top : 50pxpx;">
Charges &#163;<input type="text" name="chrge" size=1 />
<br />
<INPUT type="submit" value="Generate Invoice with VAT" />


<!-- <TEXTAREA id='ta' title=xyz>a  x </TEXTAREA> -->

</FORM>
</DIV>

<FORM method="POST" action="Process/repinvx.php">
<input type="hidden" value="<? $id= $_GET['cid']; echo $id;?>" name="idx" />

<DIV align="center" style="padding-top : 50pxpx;">
Charges &#163;<input type="text" name="chrgex" size=1 />
<br />
<INPUT type="submit" value="Generate Invoice with without VAT" />
</DIV>

<!-- <TEXTAREA id='ta' title=xyz>a  x </TEXTAREA> -->
</FORM>

<center>
<?php
$s="select * from claimant where cid='$id' and stat='c'";
// echo $s;
$q=mysql_query($s);
$r=mysql_num_rows($q);

if ($r>0)
{
?>

<form action="icomp.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<input type="submit" value="Mark Incomplete" />
</form>

<?php
}
else
{
?>
<form action="comp.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<input type="submit" value="Mark Complete" />
</form>
<?php
}
?>
</center>


<div style="background-color:#FFFBB4; visibility:hidden; position:absolute;top:500px;left:240px;width:500px;" id="hlpp">Optional references that can be added to the report. Click the check-box if you want to add that reference to the prognosis section of the report.</div>

<script language="javascript" type="text/javascript">

function fFCfun(col)
{
	document.getElementById('fFC').value='#'+col;
	document.getElementById('fP').style.backgroundColor='#'+col;
}

function fRCfun(col)
{
	document.getElementById('fRC').value='#'+col;
	document.getElementById('rD').style.backgroundColor='#'+col;
}

</script>

</BODY>

</HTML>