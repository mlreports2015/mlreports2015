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

?>


<?php 
$sf="select * from treat where stat='l' or stat='i' and id='$id' and org='".$_SESSION['o']."'";
$qf=mysql_query($sf);
$rf=mysql_num_rows($qf);

?>

<FORM name="frm" method="POST" action="Process/treat.php">

<input type="hidden" value="<?php echo $rf; ?>" name="tv" id="theValue" />

<input type="hidden" value="<? $id=$_GET['cid']; echo $id;?>" name="id" />

<DIV align="center">

<DIV align="center">

<H1>Intial Treatment</H1>


<TABLE border="1">
	<TR>
		<TD>Treatment</TD>
		<TD>
			<SELECT id="itr" multiple="true" onChange='itrdets(this.value)'>
				<OPTION value=".">None</OPTION>
				<OPTION value="first aid was administered">first aid</OPTION>
				<OPTION value="soft collar was provided">soft collar</OPTION>
				<OPTION value="sling was administered">sling</OPTION>
				<OPTION value="dressing was administered">dressing</OPTION>
				<OPTION value="stitches was provided">stitches</OPTION>
				<OPTION value="strapping was provided">strapping</OPTION>
				<OPTION value="the scene was attended">attended</OPTION>
				<OPTION value="removed from vehicle">removed</OPTION>
			</SELECT>
		</TD>
		<TD>
			by 
		</TD>
		<TD>
			
			<div style="width:250px;height:300px;" id='extendby' name='extendby' >
			
			
			
			
			</div>


		</TD>
		<TD>
			<SELECT id="ith" onChange="ithchk(this.value)">
				<OPTION value="exchanged details">exchanged details</OPTION>
				<OPTION value="exchanged details after police came">exchanged details after police came</OPTION>
		                <OPTION value="called recovery">called recovery</OPTION>
                		<OPTION value="exchanged details and called recovery">exchanged details and called recovery</OPTION>
		                <OPTION value="exchanged details after police came and called recovery">exchanged details after police came and called recovery</OPTION>
						<OPTION value="oth" >other details</OPTION>					
				<OPTION value="" selected='selected'>none</OPTION>
			</SELECT>
			<br/>
			<textarea style='visibility:hidden;' id='othith' name='othith' rows='10' cols='30' ></textarea>
			
		</TD>
		<TD>
			<SELECT id="iaf" name="optone" onChange="idex(document.frm.optone.options[document.frm.optone.selectedIndex].value);">
				<OPTION value="">...</OPTION>
				<OPTION value="continued">Continued</OPTION>
				<OPTION value="lift">lift</OPTION>
				<OPTION value="taxi">taxi</OPTION>
				<OPTION value="ambulance">ambulance</OPTION>
                <OPTION value="waited">waited</OPTION>
				
			</SELECT>
		</TD>
		<TD>
			<SELECT id="ide" name="opttwo">
				<OPTION value="">...</OPTION>
		        <OPTION value="journey">Journey</OPTION>
				<OPTION value="home">home</OPTION>
				<OPTION value="to work">work</OPTION>
				<OPTION value="to the hospital">hospital</OPTION>
				<OPTION value="to casualty">casualty</OPTION>
                <OPTION value="for recovery">for recovery</OPTION>
			</SELECT>
		</TD>
	</TR>
	<?
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
    
    
	<TR><TD colspan="5" align="center"><INPUT type="button" value="Add" onClick="addinit('<?echo $g?>');"></TD></TR>
</TABLE>

<TEXTAREA id="itf" name="itf" cols="100"><?php $si="select * from treat where stat='i' and cid='$id' and org='".$_SESSION['o']."'"; $qi=mysql_query($si); $ri=mysql_fetch_array($qi); echo $ri['msg']; ?></TEXTAREA>


<DIV align="center">

<H1>Later Treatment</H1>

<TABLE border="1">
	<TR>
		<TD>
			<SELECT id="ltp" onclick="ltpotc();">
				<OPTION value="Attended casualty">casualty</OPTION>
				<OPTION value="Began taking over the counter">OTC</OPTION>
				<OPTION value="Consulted the GP">GP</OPTION>
				<OPTION value="Attended a walk in centre">Walk in Centre</OPTION>
				<OPTION value="Called NHS direct">NHS Direct</OPTION>
			</SELECT>
		</TD>
		<TD>
			<INPUT type="text" id="ltl" size="3" /> 
			<SELECT name="ld" id="ld">
				<OPTION value="">...</OPTION>
				<OPTION value="immediately">immadiately</OPTION>
				<OPTION value="shortly">shortly</OPTION>
				<OPTION value="hour">hours</OPTION>
				<OPTION value="day">days</OPTION>
				<OPTION value="week">weeks</OPTION>
				<OPTION value="month">months</OPTION>
				<OPTION value="year">years</OPTION>
			</SELECT> 
			later
		</TD>
		<TD>
			<SELECT id="lad" onclick="setvis();" multiple="true">
				<OPTION value="advised">advised</OPTION>
				<OPTION value="prescribed">prescribed</OPTION>
				<OPTION value="referred">referred</OPTION>
				<OPTION value="sick-note">sick-note</OPTION>
                <option value="investigation">investigation</option>
			</SELECT>
		</TD>
		<TD>
			<DIV id="advised" style="visibility:hidden;">
				<input type="button" value="Remove" onClick="sethidad();" />
				<TABLE>
					<TR><TH colspan="2" align="center">Advised</TH></TR>
					<TR>
						<TD width="20px"><INPUT type="button" id="pk" onClick="togglex('pk','ad[0]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[0]" />Painkillers</TD>
						<TD width="20px"><INPUT type="button" id="sa" onClick="togglex('sa','ad[1]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[1]" />Stay Active</TD>
						<TD width="20px"><INPUT type="button" id="ex" onClick="togglex('ex','ad[2]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[2]" />Exercise</TD>
					</TR>
					<TR>
						<TD width="20px"><INPUT type="button" id="re" onClick="togglex('re','ad[3]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[3]" />Rest</TD>
						<TD width="20px"><INPUT type="button" id="ns" onClick="togglex('ns','ad[4]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[4]" />NSAID</TD>
						<TD width="20px"><INPUT type="button" id="ot" onClick="togglex('ot','ad[5]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="ad[5]" />Other</TD>
					</TR>
				</TABLE>
			</DIV>

			<DIV id="presc" style="visibility:hidden;">
				<input type="button" value="Remove" onClick="sethidpr();" />
			     <TABLE>
					<TR><TH align="center" colspan="2">Prescribed</TH></TR>
					<TR>
						<TD width="20px"><INPUT type="button" id="pk1" onClick="togglex('pk1','pr[0]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[0]" />Painkillers</TD>
						<TD width="20px"><INPUT type="button" id="ns1" onClick="togglex('ns1','pr[1]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[1]" />NSAID</TD>
						<TD width="20px"><INPUT type="button" id="ad1" onClick="togglex('ad1','pr[2]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[2]" />Anti-Depressants</TD>
					</TR>
					<TR>
						<TD width="20px"><INPUT type="button" id="ge1" onClick="togglex('ge1','pr[3]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[3]" />Gel</TD>
						<TD width="20px"><INPUT type="button" id="sp1" onClick="togglex('sp1','pr[4]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[4]" />Sleeping Pills</TD>
						<TD width="20px"><INPUT type="button" id="mr1" onClick="togglex('mr1','pr[5]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[5]" />Muscle Relaxant</TD>
					</TR>
					<TR>
						<TD width="20px"><INPUT type="button" id="ot1" onClick="togglex('ot1','pr[6]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="pr[6]" />Other</TD>
					</TR>
				</TABLE>
		        </DIV>

			<DIV id="reff" style="visibility:hidden;">
				<input type="button" value="Remove" onClick="sethidre();" />
			     <TABLE>
					<TR><TH align="center" colspan="2">Referred</TH></TR>
					<TR>
						<TD>Was Referred to:</TD>
						<TD>
							<SELECT name="scoopn" id='scoon'>
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
							<INPUT type="checkbox" id=rstrt onclick='rstrtx();' /> Started
						</TD>
					</TR>
				</TABLE>
				<DIV id='rstrtxyz' style='visibility:hidden;'>
					<INPUT type='text' size='1' id='rstrttm'>
					<SELECT id='rstrtaft'>
						<OPTION value="immediately">immadiately</OPTION>
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
					<SELECT id=refst onclick='refstx();'>
							<OPTION value=".">...</OPTION>
							<OPTION value="finished">Finished</OPTION>
							<OPTION value="continuing">Continues</OPTION>
					</SELECT>
				</DIV>
				
				<DIV id='reffin' style='visibility:hidden;'>
					Finished After<INPUT type=text id=reffas size=1 /> Sessions
				</DIV>
				<DIV id='refcon' style='visibility:hidden; position:relative; top:-20px;'>
					Sessions So Far <INPUT type=text id=refssof size=1 />
				</DIV>
				<DIV id=refben style='visibility:hidden;'>
					Benefit
					<SELECT id=refcond>
						<OPTION value='.'>...</OPTION>
						<OPTION value='worse'>Worsened</OPTION>
						<OPTION value='not been'>Not Useful</OPTION>
						<OPTION value='been slightly'>Slightly</OPTION>
						<OPTION value='been moderately'>Moderately</OPTION>
						<OPTION value='been'>Useful</OPTION>
						<OPTION value='been extremely'>Extremely</OPTION>
					</SELECT>
				</DIV>
		        </DIV>

			<DIV id='snot' style='visibility:hidden;'>
				<input type="button" value="Remove" onClick="sethidsn();" />
				<Table>
					<TR>
						<TD>For <INPUT type='text' size=1 id='skdz' />
						<TD>
							<SELECT name="skdzt" id="skdzt">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD>
				</Table>
			</DIV>

			<DIV id="otcdv" style="position : relative; top : -70px; z-index : 2;visibility:hidden;">
			     <TABLE>
					<TR>
						<TD width="20px"><INPUT type="button" id="pk2" onClick="togglex('pk2','otcx[0]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="otcx[0]" />Painkillers</TD>
						<TD width="20px"><INPUT type="button" id="ns2" onClick="togglex('ns2','otcx[1]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="otcx[1]" />NSAID</TD>
						<TD width="20px"><INPUT type="button" id="ot2" onClick="togglex('ot2','otcx[2]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="otcx[2]" />Other</TD>
					</TR>
				</TABLE>
				<TABLE align="center">
					<TR align="center">
						<TD width="20px"><INPUT type="button" id="otcef" onClick="togglex('otcef','otceff');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="otceff" />Effective</TD>
					</TR>
				</TABLE>
				<TABLE align="center">
					<TR align="center">
						<TD>Took for</TD>
						<TD><INPUT size=1 type="text" id="otcdur" /></TD>
						<TD>
							<SELECT name="otcdur2" id="otcdur2">
								<OPTION value="day">days</OPTION>
								<OPTION value="week">weeks</OPTION>
								<OPTION value="month">months</OPTION>
								<OPTION value="year">years</OPTION>
							</SELECT>
						</TD>
					</TR>
				</TABLE>
		        </DIV>

            <DIV id="invest" style="position : relative; top : -70px; z-index : 2;visibility:hidden;">
	            <input type="button" value="Remove" onClick="sethidin();" />
			     <TABLE>
					<TR>
						<TD width="20px"><INPUT type="button" id="xray" onClick="togglex('xray','inve[0]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="inve[0]" />X-Ray</TD>

						<TD width="20px"><INPUT type="button" id="mri" onClick="togglex('mri','inve[1]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="inve[1]" />MRI Scan</TD>

						<TD width="20px"><INPUT type="button" id="cts" onClick="togglex('cts','inve[2]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="inve[2]" />CT Scan</TD>

						<TD width="20px"><INPUT type="button" id="uls" onClick="togglex('uls','inve[3]');" style="background-color:#BBB;" /></TD>
						<TD><INPUT type="hidden" value="0" id="inve[3]" />Ultrasound</TD>

					</TR>
					<TR>
						<TD colspan='5'>
						<select id="invesres" name="invesres" onChange="invesDet(this.value)" style="visibility:hidden;">
							<option value=''>none</option>
							<option value='Not attended'>Not attended</option>
							<option value='attended'>attended</option>
						</select>
						<select id="invesoth" name="invesoth" style="visibility:hidden;">
							<option value=''>none</option>
							<option value='unknown'>Unknown</option>
							<option value='boney injury'>boney injury</option>
							<option value='non bone injury'>non bone injury</option>
							<option value='no results'>no results</option>	
						
						</select>
						</TD>
					</TR>
					
					
				</TABLE>

		        </DIV>
                
                
            <br />
			<INPUT type="hidden" name="ltro" id="ltro" disabled="true" size="40">
		</TH>
	</TR>
	
	<TR><TD colspan="3" align="center"><INPUT type="button" value="Add" onClick="addlater2('<?php echo $g; ?>');"></TD></TR>
</TABLE>

</DIV>

<DIV id=nu> </DIV>

<CENTER><H2>Referred</H2></CENTER>
<TABLE border="1">
<TR>

<TD rowspan="2">

			<DIV id="reff2">
			     <TABLE>
					<TR>
						<TD>Was Referred to:</TD>
						<TD>
							<SELECT name="scoopn2" id='scoon2'>
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
						<OPTION value="immediately">immadiately</OPTION>
						<OPTION value="day">days</OPTION>
						<OPTION value="week">weeks</OPTION>
						<OPTION value="month">months</OPTION>
						<OPTION value="year">years</OPTION>
					</SELECT>
					<SELECT id=refst2 onclick='refstx2();'>
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
echo $sref;
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
<br />
<INPUT type="submit" value="Submit">

</BODY>

</HTML>
