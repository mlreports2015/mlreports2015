<?php

include 'template.php';

head('Treatment', '<link href="CSS/eff.css" rel="stylesheet" type="text/css">', '	<script language="javaScript" type="text/javascript" src="Scripts/treat.js"></script>', '', '<script language="javascript" type="text/javascript">

	function idex(chosen)
	{
		var selbox = document.frm.opttwo;
 
		selbox.options.length = 0;
		if (chosen == "continued") {
		  selbox.options[selbox.options.length] = new Option(\'Journey\',\'journey\');
		  selbox.options[selbox.options.length] = new Option(\'College\',\'to college\');
		  selbox.options[selbox.options.length] = new Option(\'University\',\'to university\');
		  selbox.options[selbox.options.length] = new Option(\'Home\',\'home\');
		  selbox.options[selbox.options.length] = new Option(\'Work\',\'work\');
		}
		else if (chosen=="waited")
		{
			selbox.options[selbox.options.length] = new Option(\'for recovery\',\'for recovery\');
			selbox.options[selbox.options.length] = new Option(\'at the scene of the accident\',\'at the scene of the accident\');
			selbox.options[selbox.options.length] = new Option(\'to be picked up\',\'to be picked up\');
		}
		else if (chosen != "continued") {
		  selbox.options[selbox.options.length] = new Option(\'Home\',\'home\');
		  selbox.options[selbox.options.length] = new Option(\'Work\',\'to work\');
		  selbox.options[selbox.options.length] = new Option(\'College\',\'to college\');
		  selbox.options[selbox.options.length] = new Option(\'Hospital\',\'to the hospital\');
		  selbox.options[selbox.options.length] = new Option(\'Casualty\',\'to casualty\');
		}
}





</script>', '');
?>

<BODY background="images/back.png" onLoad="doeF();">


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Treatment', $org, $id);


$sf="select * from treat where stat='l' and id='$id' and org='".$_SESSION['o']."'";
$qf=mysql_query($sf);
$rf=mysql_num_rows($qf);


	
	$o=$_SESSION['o'];
	  $s="select gen from claimant where cid=$id and org='$o'";
	  $q=mysql_query($s);
	  $r=mysql_fetch_array($q);
	  
	  $g='';
	  
	  if ($r['gen']=='m')
	  	$g='He';
	  else
	  	$g='She';



?>

<FORM name="frm" method="POST" action="Process/treat.php" style="font-family:Verdana, Geneva, sans-serif;">

<input type="hidden" value="<?php echo $rf; ?>" name="tv" id="theValue" />

<input type="hidden" value="<? $id=$_GET['cid']; echo $id;?>" name="id" />

<CENTER><H2>Referred</H2></CENTER>

<TABLE border="1" rules="all" align="center" width='1090px'>
<TR>

<TD rowspan="2" align="center">

			<DIV id="reff2">
			     <TABLE width='98%' align='center'>
					<TR>
						<TD align='right'>Was Referred to:</TD>
						<TD align='center'>
							<SELECT name="scoopn2" id='scoon2' onChange="referto(this.value)">
<!-- 								<OPTION value="none">None</OPTION> -->
								<OPTION value="specialist">Referred to Specialist</OPTION>
								<OPTION value="chiropractitioner">Referred to Chiropractitioner</OPTION>
								<OPTION value="osteopath">Referred to Osteopath</OPTION>
								<OPTION value="orthopaedic surgeon">Referred to Orthopaedic Surgeon</OPTION>
								<OPTION value="pain specialist">Referred to Pain Specialist</OPTION>
								<OPTION value="neurologist">Referred to Neurologist</OPTION>
								<OPTION selected='selected' value="physiotherapist">Referred to Physiotheraphist</OPTION>
							</SELECT>
						</TD>
						<TD>
							<INPUT type="checkbox" id=rstrt2 onclick='rstrtx2();' /> Started
						</TD>
					</TR>
				</TABLE>
				<DIV id='rstrtxyz2' style='visibility:hidden;'>
					<INPUT type='text' size='1' id='rstrttm2'>
					<SELECT id='rstrtaft2'>
                    	<OPTION value=" ">none</OPTION>
						<OPTION value="immediately">immadiately</OPTION>
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
					<SELECT id="refst2" onclick='refstx2();'>
							<OPTION value=".">...</OPTION>
							<OPTION value="finished">Finished</OPTION>
							<OPTION value="continuing">Continues</OPTION>
					</SELECT>
				</DIV>
				
				<DIV id='reffin2' style='visibility:hidden;'>
					Finished After<INPUT type=text id=reffas2 size=1 /> Sessions
				</DIV>
				<DIV id='refcon2' style='visibility:hidden; position:relative; top:-20px;'>
					Sessions So Far <INPUT type=text id=refssof2 size=1 />
				</DIV>
				<DIV id=refben2 style='visibility:hidden;'>
					Benefit
					<SELECT id=refcond2>
						<OPTION value='.'>...</OPTION>
						<OPTION value='worse'>Worsened</OPTION>
						<OPTION value='not been'>Not Useful</OPTION>
						<OPTION value='been slightly'>Slightly</OPTION>
						<OPTION value='been moderately'>Moderately</OPTION>
						<OPTION value='been'>Useful</OPTION>
						<OPTION value='been extremely'>Extremely</OPTION>
					</SELECT>
				</DIV>

<?php
$sref="select * from treat where stat='r' and id='$id' and org='".$_SESSION['o']."'";
$qref=mysql_query($sref);
$nref=mysql_num_rows($qref);
?>
<input type="hidden" id="reffff" name="reffff" value="<?php echo $nref; ?>"/>
			</DIV>
			<center><input type="button" onClick="referexy2('<?php echo $g;?>');" value="Add" /></center>

		<div id="nrefff"></div>

</TD></TR>
</TABLE>

<?php
$i=1;

while ($rrf=mysql_fetch_array($qf))
{
	echo "<textarea rows=2 cols=100 name=l[$i] id=l[$i]>".$rrf['msg']."</textarea>";
	echo "<input type=button value=Block name=b[$i] id=b[$i] style='background-color:#AA2222; color:#FFF;' onclick=\"ignoreit('$i');\" />";
	echo "<input type=hidden value=Block id=t[$i] name=t[$i] />";
	$i=$i+1;
}

?>


<?php
$i=1;

while ($rrf=mysql_fetch_array($qref))
{
	echo "<textarea rows=2 cols=100 name=l[$i] id=l[$i]>".$rrf['msg']."</textarea>";
	echo "<input type=button value=Block name=b[$i] id=b[$i] style='background-color:#AA2222; color:#FFF;' onclick=\"ignoreit('$i');\" />";
	echo "<input type=hidden value=Block id=t[$i] name=t[$i] />";
	$i=$i+1;
}

?>
<DIV align='center' style='top:10;'>

<INPUT type="submit" value="Submit">

</DIV>

</BODY>

</HTML>
