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
$sf="select * from treat where stat='l' and cid='$id' and org='".$_SESSION['o']."' or stat='i' and cid='$id' and org='".$_SESSION['o']."'";
//echo $sf;
$qf=mysql_query($sf);
$rf=mysql_num_rows($qf);

?>

<FORM name="frm" method="POST" action="Process/treat.php?treat=initial">

<input type="hidden" value="<?php echo $rf; ?>" name="tv" id="theValue" />

<input type="hidden" value="<? $id=$_GET['cid']; echo $id;?>" name="id" />

<DIV align="center">

<DIV align="center" style="font-family:Verdana, Geneva, sans-serif;">

<H1>Intial Treatment</H1>


<TABLE border="1" cellpadding="5px" rules="all">
	<TR>
		<TD>Treatment</TD>
		<TD> (select multiple)<br/>
        	<input type="checkbox" id="itrno" name="itr" >None</input><br/>
            <input type="checkbox" id="itrfa" name="itr" onClick="itrdets(this,1);" value="first aid was administered">first aid</input><br/>
            <input type="checkbox" id="itrat" name="itr" onClick="itrdets(this,2);"value="the scene was attended">attended</input><br/>
        	<input type="checkbox" id="itrsc" name="itr" onClick="itrdets(this,3);" value="soft collar">soft collar</input><br/>
            <input type="checkbox" id="itrsl" name="itr" onClick="itrdets(this,4);" value="sling">Sling</input><br/>
            <input type="checkbox" id="itrd" name="itr" onClick="itrdets(this,5);" value="dressing">dressing</input><br/>
            <input type="checkbox" id="itrst" name="itr" onClick="itrdets(this,6):" value="strapping">strapping</input><br/>
            <input type="text" id="itrcount" name="itrcount" />
            
            <!--
			<SELECT id="itr" multiple="true" onChange='itrdets(this.value)'>
				<OPTION value=".">None</OPTION>
				<OPTION value="first aid was administered">first aid</OPTION>
				<OPTION value="the scene was attended">attended</OPTION>
                <OPTION value="soft collar was provided">soft collar</OPTION>
				<OPTION value="sling was administered">sling</OPTION>
				<OPTION value="dressing was administered">dressing</OPTION>
				<OPTION value="stitches was provided">stitches</OPTION>
				<OPTION value="strapping was provided">strapping</OPTION>
				<OPTION value="removed from vehicle">removed</OPTION>
			</SELECT>-->
            
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
			<textarea style='visibility:hidden;background-color:#cfe2ee;border-radius:6px;' id='othith' name='othith' rows='10' cols='45' ></textarea>
			
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
    
    
	<TR><TD colspan="7" align="center"><INPUT type="button" value="Add" onClick="addinit('<?echo $g?>');" style="width:70px;height:26;border-radius:6px;"></TD></TR>
</TABLE>

<TEXTAREA id="itf" name="itf" cols="100" rows="4" style="background-color:#cfe2ee;border:0px;border-radius:6px;margin-top:5px;"><?php $si="select * from treat where stat='i' and cid='$id' and org='".$_SESSION['o']."'"; $qi=mysql_query($si); $ri=mysql_fetch_array($qi); echo $ri['msg']; ?></TEXTAREA>



<?php
$sref="select * from treat where stat='r' and id='$id' and org='".$_SESSION['o']."'";
$qref=mysql_query($sref);
$nref=mysql_num_rows($qref);
?>
<input type="hidden" id="reffff" name="reffff" value="<?php echo $nref; ?>"/>
			</DIV>
			<center><!--<input type="button" onClick="referexy2('<?php echo $g;?>');" value="Add"  style="height:26px;width:60px;border-radius:6px;"/>--><input type="button" onClick="ignoreall(document.getElementById('iino').value)" value="Remove All" style="height:26px;width:80px;border-radius:6px;" /></center>
			
		<div id="nrefff"></div>

</TD></TR>
</TABLE>

<?php
$i=1;

while ($rrf=mysql_fetch_array($qf))
{
	echo "<textarea rows=2 cols=100 name=l[$i] id=l[$i] style='border-radius:6px;border:1px solid #CCC;padding:5px;'>".$rrf['msg']."</textarea>";
	echo "<input type=button value=Remove name=b[$i] id=b[$i] style='background-color:#AA2222; color:#FFF;' onclick=\"ignoreit('$i');\" />";
	echo "<input type=hidden value=Remove id=t[$i] name=t[$i] />";
	$i=$i+1;
}
echo "<br/><input type='text' value='".$i."' id='iino' name='iino' />";

?>


<?php
$i=1;

while ($rrf=mysql_fetch_array($qref))
{
	echo "<textarea rows=2 cols=100 name=l[$i] id=l[$i] style='border-radius:6px;border:1px solid #CCC;padding:5px;'>".$rrf['msg']."</textarea>";
	echo "<input type=button value=Remove name=b[$i] id=b[$i] style='background-color:#AA2222; color:#FFF;' onclick=\"ignoreit('$i');\" />";
	echo "<input type=hidden value=Remove id=t[$i] name=t[$i] />";
	$i=$i+1;
}

?>
<br />
<INPUT type="submit" value="Submit" style="height:26px;width:76px;border-radius:6px;">

</DIV>
</DIV>
</BODY>

</HTML>
