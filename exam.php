<?php

include 'template.php';

head('Accident', '<link href="CSS/pmh.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/exam.js"></script>', '', '', '');
?>

<BODY background="images/back.png" onLoad="doeF();" >


<?php

include 'template2.php';

$id=$_GET['cid'];

$org=$_SESSION['o'];

bTop('Accident Exam', $org, $id);

?>


<?php 
$sn="select * from neck where id='$id' and org='".$_SESSION['o']."'";
$qn=mysql_query($sn);
$rn=mysql_num_rows($qn);

$su="select * from upper where id='$id' and org='".$_SESSION['o']."'";
$qu=mysql_query($su);
$ru=mysql_num_rows($qu);

$sb="select * from back where id='$id' and org='".$_SESSION['o']."'";
$qb=mysql_query($sb);
$rb=mysql_num_rows($qb);

$st="select * from thorax where id='$id' and org='".$_SESSION['o']."'";
$qt=mysql_query($st);
$rt=mysql_num_rows($qt);

$sl="select * from lower where id='$id' and org='".$_SESSION['o']."'";
$ql=mysql_query($sl);
$rl=mysql_num_rows($ql);
?>

<FORM method="POST" action="Process/exam.php">
	
<input type="hidden" value="<?php echo $rn; ?>" name="cn" id="cn" />
<input type="hidden" value="<?php echo $ru; ?>" name="cu" id="cu" />
<input type="hidden" value="<?php echo $rb; ?>" name="cb" id="cb" />
<input type="hidden" value="<?php echo $rt; ?>" name="ct" id="ct" />
<input type="hidden" value="<?php echo $rl; ?>" name="cl" id="cl" />

<input type="hidden" value="<? echo $id;?>" name="id" />

<?
$org=$_SESSION['o'];
  $q=mysql_query("select * from claimant where cid=$id and org='$org'");
  $r=mysql_fetch_array($q);
  $g=$r['gen'];
  
  if ($g=='m')
  {
  $g1='His';
  $g='He';
  }
  else
  {
  $g1='Her';
  $g='She';
  }
  
  $n=$r['ct']." ".trim($r['cln']);
  
  
?>

<DIV align="center">

<H2>Examination 1</H2>

<TABLE align="center" border="1" width="900px" rules="all" cellpadding="5px" style="font-family:Verdana, Geneva, sans-serif;">

<TR>
	<TD>Dominant Hand</TD>
	<TD><SELECT name="dh"><OPTION value="<?echo $g;?> is ambidextrous.">ambidextrous</OPTION><OPTION value="<?echo $g;?> is right handed." selected="selected">Right</OPTION><OPTION value="<?echo $g;?> is left handed.">Left</OPTION></SELECT></TD>
</TR>
<TR>
	<TD>
    Measurements <SELECT id='msredType' name='msredType' onChange='mrsedChnged(this.value);' >
    					<OPTION value=''>-----</OPTION>
                        <OPTION value='metric'>Metric</OPTION>
   						<OPTION value='non-metric'>Non-Metric</OPTION>                     
                       </SELECT>
    </TD>
    <TD>
    <div id='non-metDiv' style='display:none;'>
    Height (feet)
    <select name='ft' id='ft'>
    <?php for($cnt = 0; $cnt <= 12;$cnt++){
		
			echo "<option value='".$cnt."'>".$cnt."</option>";
		}
    ?>
    </select>
    (inches) 
    <select name='inch' id='inch'>
   <?php for($cnt = 0; $cnt <= 12;$cnt++){
		
			echo "<option value='".$cnt."'>".$cnt."</option>";
		}
    ?>
    </select>
    </div>
    <div id='metricDiv'>
    Height (cm)
    <input type='text' id='cms' name='cms' /><br/>
    </div>
    <div id='non-metDiv2' style='display:none'>
    Weight (stones) 
    <select name='stne' id='stne' >
    <?php for($cnt = 0; $cnt <= 45;$cnt++){
		
			echo "<option value='".$cnt."'>".$cnt."</option>";
		}
    ?>
    </select> 
    (pounds)
    <select name='pnds' id='pnds'>
    <?php for($cnt = 0; $cnt < 15;$cnt++){
		
			echo "<option value='".$cnt."'>".$cnt."</option>";
		}
    ?>
    </select>
    </div>
    <div id='metricDiv2'>
    Weight (kgs)
    <input type='text' id='kgs' name='kgs' >
    </div>
    
    
    </TD>
</TR>
<TR>
	<TD>General Appearance</TD>
	<TD>
    	<select name="ga1">
        	<option value="<?echo $n;?> looked well."><?echo $n;?> looked well.</option>
            <option value="<?echo $n;?> looked ill."><?echo $n;?> looked ill.</option>
            <option value="<?echo $n;?> was suffering from pain."><?echo $n;?> was suffering from pain.</option>
            <option value="<?echo $n;?> was uncomfortable."><?echo $n;?> was uncomfortable.</option>
            <option value="<?echo $n;?> was limping."><?echo $n;?> was limping.</option>
            <option value="<?echo $n;?> had a pronounced limp."><?echo $n;?> had a pronounced limp.</option>
            <option value="<?echo $n;?> was uncomfortable."><?echo $n;?> was wearing an eye-patch.</option>
            <option value="<?echo $n;?> was wearing a collar."><?echo $n;?> was wearing a collar.</option>
            
            <option value="<?echo $n;?> was wearing a elastic wrist wrap on both wrists."><?echo $n;?> was wearing a elastic wrist wrap on both wrists.</option>
            <option value="<?echo $n;?> was wearing a elastic wrist wrap on his left wris."><?echo $n;?> was wearing a elastic wrist wrap on his left wrist.</option>
            <option value="<?echo $n;?> was wearing a elastic wrist wrap on his right wrist."><?echo $n;?> was wearing a elastic wrist wrap on his right wrist.</option>
            
            <option value="<?echo $n;?> was wearing a Velcro wrist splint on both wrists."><?echo $n;?> was wearing a Velcro wrist splint on both wrists.</option>
            <option value="<?echo $n;?> was wearing a Velcro wrist splint on his left wrist."><?echo $n;?> was wearing a Velcro wrist splint on his left wrist.</option>
            <option value="<?echo $n;?> was wearing a Velcro wrist splint on his left wrist."><?echo $n;?> was wearing a Velcro wrist splint on his right wrist.</option>
            
            <option value="<?echo $n;?> was wearing a plaster wrist splint on both wrists."><?echo $n;?> was wearing a plaster wrist splint on both wrists.</option>
            <option value="<?echo $n;?> was wearing a plaster wrist splint on his left wrist."><?echo $n;?> was wearing a plaster wrist splint on his left wrist.</option>
            <option value="<?echo $n;?> was wearing a plaster wrist splint on his right wrist."><?echo $n;?> was wearing a plaster wrist splint on his right wrist.</option>
            
            <option value="<?echo $n;?> was wearing a sling on both arms."><?echo $n;?> was wearing a sling on both arms.</option>
            <option value="<?echo $n;?> was wearing a sling on his left arm."><?echo $n;?> was wearing a sling on his left arm.</option>
            <option value="<?echo $n;?> was wearing a sling on his right arm."><?echo $n;?> was wearing a sling on his right arm.</option>
            
            <option value="<?echo $n;?> had both arms in a cast."><?echo $n;?> had both arms in a cast.</option>
            <option value="<?echo $n;?> had his left arm in a cast."><?echo $n;?> was wearing a sling on his left arm.</option>
            <option value="<?echo $n;?> had his right arm in a cast."><?echo $n;?> had his right arm in a cast.</option>
       
            <option value="<?echo $n;?> had both legs in a cast and was using crutches."><?echo $n;?> had both legs in a cast and was using crutches.</option>
            <option value="<?echo $n;?> had his left leg in a cast and was using crutches."><?echo $n;?> had his left leg in a cast and was using crutches.</option>
            <option value="<?echo $n;?> had his right leg in a cast and was using crutches."><?echo $n;?> had his right leg in a cast and was using crutches.</option>
            
            <option value="<?echo $n;?> had both legs in a cast and was in a wheel-chair."><?echo $n;?> had both legs in a cast and was in a wheel-chair.</option>
            <option value="<?echo $n;?> had his left leg in a cast and was in a wheel-chair."><?echo $n;?> had his left leg in a cast and was in a wheel-chair.</option>
            <option value="<?echo $n;?> had his right leg in a cast and was in a wheel-chair."><?echo $n;?> had his right leg in a cast and was in a wheel-chair.</option>
            
            <option value="<?echo $n;?> was using crutches."><?echo $n;?> was using crutches.</option>
            <option value="<?echo $n;?> was using crutches."><?echo $n;?> was using crutches.</option>
            <option value="<?echo $n;?> was using crutches."><?echo $n;?> was using crutches.</option>
            
            <option value="<?echo $n;?> was in a wheel-chair."><?echo $n;?> was in a wheel-chair.</option>
            <option value="<?echo $n;?> was in a wheel-chair."><?echo $n;?> was in a wheel-chair.</option>
            <option value="<?echo $n;?> was in a wheel-chair."><?echo $n;?> was in a wheel-chair.</option>
            
		</select>
        
        <select name="ga2">
		
        	<option value="<?echo $g;?> appeared to move easily during the examination."><?echo $g;?> appeared to move easily during the examination.</option>
            
           	<option value="<?echo $g;?> appeared to be restricted in moving around during the examination."><?echo $g;?> appeared to be restricted in moving around during the examination.</option>
            <option value="<?echo $g;?> was restricted in moving around during the examination."><?echo $g;?> was restricted in moving around during the examination.</option>
                        
            <option value="<?echo $g;?> appeared to be restricted in upper-body movement during the examination."><?echo $g;?> appeared to be restricted in upper-body movement during the examination.</option>
            <option value="<?echo $g;?> appeared to be restricted in lower-body movement during the examination."><?echo $g;?> appeared to be restricted in lower-body movement during the examination.</option>
            
            <option value="<?echo $g;?> was restricted in upper-body movement during the examination."><?echo $g;?> was restricted in upper-body movement during the examination.</option>
            <option value="<?echo $g;?> was restricted in lower-body movement during the examination."><?echo $g;?> was restricted in lower-body movement during the examination.</option>
            
            <option value="<?echo $g;?> appeared to have pain while moving around during the examination."><?echo $g;?> appeared to have pain while moving around during the examination.</option>
            <option value="<?echo $g;?> appeared to have upper-body pain while moving around during the examination."><?echo $g;?> appeared to have upper-body pain while moving around during the examination.</option>
            <option value="<?echo $g;?> appeared to have lower-body pain while moving around during the examination."><?echo $g;?> appeared to have lower-body pain while moving around during the examination.</option>

        </select>
	</TD>
</TR>

<TR>

	<TD>Mental Health</TD>
	<TD>
    	<select name="mh1">
        	<option value="<?echo $n;?> was not suffering from anxiety."><?echo $n;?> was not suffering from anxiety.</option>
            <option value="<?echo $n;?> was suffering from anxiety."><?echo $n;?> was suffering from anxiety.</option>
        </select>
        <select name="mh2">
        	<option value="<?echo $g;?> was not depressed."><?echo $g;?> was not depressed.</option>
            <option value="<?echo $g;?> was depressed."><?echo $g;?> was depressed.</option>
        </select>
	</TD>
</TR>

<TR>
	<TD>
		Injuries, Wounds, Scars etc.
	</TD>
	<TD>
		<select name="iws" id='iws' onChange="chkOther();">
        	<option value="No wounds or scars were seen.">No wounds or scars were seen.</option>
            <option value="No wounds or scars were seen related to the accident.">No wounds or scars were seen related to the accident.</option>
            <option value="<?echo $g;?> had a wound."><?echo $g;?> had a wound.</option>
            <option value="<?echo $g;?> had a wound from the accident."><?echo $g;?> had a wound from the accident.</option>
            <option value="<?echo $g;?> had a wound not from the accident."><?echo $g;?> had a wound not from the accident.</option>
			<option value="<?echo $g;?> had multiple wounds."><?echo $g;?> had multiple wounds.</option>
            <option value="<?echo $g;?> had multiple wounds from the accident."><?echo $g;?> had multiple wounds from the accident.</option>
            <option value="<?echo $g;?> had multiple wounds not from the accident."><?echo $g;?> had multiple wounds not from the accident.</option>
            <option value="<?echo $g;?> had a scar."><?echo $g;?> had a scar.</option>
            <option value="<?echo $g;?> had a scar from the accident."><?echo $g;?> had a scar from the accident.</option>
            <option value="<?echo $g;?> had a scar not from the accident."><?echo $g;?> had a scar not from the accident.</option>
            <option value="<?echo $g;?> had multiple scars."><?echo $g;?> had multiple scars.</option>
            <option value="<?echo $g;?> had multiple scars from the accident."><?echo $g;?> had multiple scars from the accident.</option>
            <option value="<?echo $g;?> had multiple scars not from the accident."><?echo $g;?> had multiple scars not from the accident.</option>
            <option value="<?echo $g;?> had wounds and scars."><?echo $g;?> had wounds and scars.</option>
            <option value="<?echo $g;?> had wounds and scars from the accident."><?echo $g;?> had wounds and scars from the accident.</option>
            <option value="<?echo $g;?> had wounds and scars not from the accident."><?echo $g;?> had wounds and scars not from the accident.</option>
            <option value="o">other</option>
		</select>
        <input type="text" style="visibility:hidden; width:300px; min-width:300px;" id="other" name="other" />
	</TD>
</TR>

</TABLE>
<div align="center" style="width:70%" >
<H2>Examination 2</H2>
<div style="width:99%;border-bottom:solid 1px #555;font-family:Verdana, Geneva, sans-serif;font-size:20px;border-radius:6px 6px 0px 0px">
<b>Neck</b>
</div>
<TABLE align="center" border="0" cellpadding="0px" rules="all" style="font-family:Verdana, Geneva, sans-serif;width:90%;border-radius:6px 6px 0px 0px;" >

<TR>
	<TD>
    
      <div id='neckBas' style="">
      <div style="height:30px; overflow:hidden;">
      <table width="100%" style="font-weight:bolder; color:#fff; background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px">
      <tr>
      <td>
      Muscular Aspects
      </td>
      <td align="right">
      <input id="nBb" type="button" value=" - " onClick="minimize('neckBas', 'nBb');" style="height:30px; position:relative; top:-3px; right:-4px; width:50px;background-color:#FFF;border:none;" />
      </td>
      </tr>
      </table>
      </div>
      	<div style="padding:5px;">
      	<br>
		<SELECT id="nck" multiple="true">
            <OPTION value="">...</OPTION>
			<OPTION value="Forward flexion">Forward flexion</OPTION>
			<OPTION value="Extension">Extension</OPTION>
			<OPTION value="Right rotation">Right rotation</OPTION>
			<OPTION value="Left rotation">Left rotation</OPTION>
			<OPTION value="Right lateral flexion">Right lateral flexion</OPTION>
			<OPTION value="Left lateral flexion">Left lateral flexion</OPTION>
			<OPTION value="all">Select All</OPTION>
		</SELECT>
		was
		<INPUT type="text" id="np" value="" size="2" />% 
		of
		<INPUT type="hidden" id="nnorm" value="full" />normal
		<SELECT id="nndp">
			<OPTION value="appeared to be painless">Appeared Painless</OPTION>
			<OPTION value="appeared to cause discomfort">Caused Discomfort</OPTION>
			<OPTION value="appeared to cause pain">Caused Pain</OPTION>
		</SELECT>
        </div>
      </div>

<br>

<div id='nAdv' style="">
<div style="height:30px; overflow:hidden;">
<table width="100%" style="font-weight:bolder; color:#fff; background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
<tr>
<td>
Tenderness
</td>
<td align="right">
<input id="nAb" type="button" value=" - " onClick="minimize('nAdv', 'nAb');" style="height:30px; position:relative; top:-3px; right:-4px; width:50px;background-color:#FFF;border:none;" />
</td>
</tr>
</table>
</div>

<br>

<table>
<tr>
<td>
Paracervical Muscle Tenderness
</td>
<td>
<select id="nPC">
	<option value="">...</option>
    <option value="There was paracervical muscle tenderness on both sides of the neck.">on both sides of the neck</option>
    <option value="There was paracervical muscle tenderness on the left side of the neck.">on the left side of the neck</option>
    <option value="There was paracervical muscle tenderness on the right side of the neck.">on the right side of the neck</option>
    <option value="There was paracervical muscle tenderness on both sides of the neck.">on both sides of the neck</option>
    <option value="There was no paracervical muscle tenderness in the neck.">no</option>
</select>
</td>
</tr>

<tr>
<td>
Bony Tenderness
</td>
<td>
<select id="nBT">
	<option value="">...</option>
    <option value="There was bony tenderness in the neck.">yes</option>
    <option value="There was no bony tenderness in the neck.">no</option>
</select>
</td>
</tr>

<tr>
<td>
Soft Tissue Tenderness
</td>
<td>
<select id="nTT">
	<option value="">...</option>
    <option value="There was soft tissue tenderness in the neck.">yes</option>
    <option value="There was no soft tissue tenderness in the neck.">no</option>
</select>
</td>
</tr>

<tr>
<td>
Muscle Spasm
</td>
<td>
<select id="nMS">
	<option value="">...</option>
    <option value="There was muscle spasm in the neck.">yes</option>
    <option value="There was no muscle spasm in the neck.">no</option>
</select>
</td>
</tr>

<tr>
<td>
Neurological Deficit
</td>
<td>
<select id="nND">
	<option value="">...</option>
    <option value="There was evidence of neurological deficit.">yes</option>
    <option value="There was no clinical evidence of any neurological deficit.">no</option>
</select>
</td>
</tr>

</table>

</td>
</tr>
<TR>
	<TD colspan="1" align="center"><INPUT value="Add" type="button" onClick="addiv('nck','np','nnorm','nndp','cn','nk','n'); neck2();" style="border-radius:6px;width:60px;height:25px;" /></TD>
</TR>

</TABLE>

<DIV id="nk" align="center" style="border-style:solid;color:#A61515"> <H3>Neck</H3> 

<?php 
$i=1;
while ($rnn=mysql_fetch_array($qn))
{
	echo "<textarea rows=1 cols=100 name='n[$i]' id='n[$i]'>".$rnn['msg']."</textarea>";
	echo "<input type=hidden value=Block name='nt[$i]' id='nt[$i]' />";
	echo "<input type=button value=Block name='nb[$i]' id='nb[$i]' onclick=\"ignoreitn('$i');\" style='background-color:#AA3333;color:#fff;' />";
	
	$i=$i+1;
}
?>

</DIV>

<div style="width:99%;border-bottom:solid 1px #555;font-family:Verdana, Geneva, sans-serif;font-size:20px;">
<b>Upper Limbs</b>
</div>
<TABLE align="center" border="0" rules="all" style="font-family:Verdana, Geneva, sans-serif;width:90%;">
<TR>
	<TD>
      <div id='UlBas' style="">
      <div style="height:30px; overflow:hidden;">
      <table width="100%" style="font-weight:bolder; color:#fff; background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
      <tr>
      <td>
      Muscular Aspects
      </td>
      <td align="right">
      <input id="Ulb" type="button" value=" - " onClick="minimize('UlBas', 'Ulb');" style="height:30px; position:relative; top:-3px; right:-4px; width:60px;background-color:#FFF;border:none;" />
      </td>
      </tr>
      </table>
      </div>
      <div style="padding:5px;">
      <br>
		<SELECT id="ulmb" multiple="true">
			<OPTION id="x" value="Right hand on head">Right hand on head</OPTION>
			<OPTION value="Left hand on head">Left hand on head</OPTION>
			<OPTION value="Right hand between shoulders">Right hand between shoulders</OPTION>
			<OPTION value="Left hand between shoulders">Left hand between shoulders</OPTION>
			<OPTION value="Right elbow movement">Right elbow movement</OPTION>
			<OPTION value="Left elbow movement">Left elbow movement</OPTION>
			<OPTION value="Right wrist movement">Right wrist movement</OPTION>
			<OPTION value="Left wrist movement">Left wrist movement</OPTION>
			<OPTION value="Right hand grip">Right hand grip</OPTION>
			<OPTION value="Left hand grip">Left hand grip</OPTION>
			<OPTION value="all">Select All</OPTION>
		</SELECT>
		was
		<INPUT type="text" id="up" value="" size="2" />% 
		of
		<INPUT type="hidden" id="unorm" value="full" />normal
		<SELECT id="undp">
			<OPTION value="appeared to be painless">Appeared Painless</OPTION>
			<OPTION value="appeared to cause discomfort">Caused Discomfort</OPTION>
			<OPTION value="appeared to cause pain">Caused Pain</OPTION>
		</SELECT>
	   </div>
      </div>
	</TD>
</TR>
<TR>
	<TD colspan="1" align="center"><INPUT type="button" value="Add" style="border-radius:6px;width:60px;height:25px;" onClick="addiv('ulmb','up','unorm','undp','cu','ub','u')" /></TD>
</TR>
</TABLE>

<DIV id="ub" style="border-style:solid;color:#A61515"> <H3>Upper Limbs</H3> 

<?php 
$i=1;
while ($rnn=mysql_fetch_array($qu))
{
	echo "<textarea rows=1 cols=100 name='u[$i]' id='u[$i]'>".$rnn['msg']."</textarea>";
	echo "<input type=hidden value=Block name='ut[$i]' id='ut[$i]' />";
	echo "<input type=button value=Block name='ub[$i]' id='ub[$i]' onclick=\"ignoreitu('$i');\" style='background-color:#AA3333;color:#fff;' />";
	
	$i=$i+1;
}
?>
</DIV>


<div style="width:99%;border-bottom:solid 1px #555;font-family:Verdana, Geneva, sans-serif;font-size:20px;">
<b>Back</b>
</div>
<TABLE align="center" border="0" rules="all" style="font-family:Verdana, Geneva, sans-serif;width:90%;">
	<TR>
		<TD>
          <div id='bMA' style="">
          <div style="height:30px; overflow:hidden;">
          <table width="100%" style="font-weight:bolder; color:#fff;  background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
          <tr>
          <td>
          Muscular Aspects
          </td>
          <td align="right">
          <input id="bMAb" type="button" value=" - " onClick="minimize('bMA', 'bMAb');" style="height:30px; position:relative; top:-3px; right:-4px; width:60px;background-color:#FFF;border:none;" />
          </td>
          </tr>
          </table>
          </div>
          <div style="padding:5px;">
          <br>
			<SELECT id="bck" multiple="true">
				<OPTION value="Back flexion">Back flexion</OPTION>
				<OPTION value="Back extension">Back extension</OPTION>
				<OPTION value="Right straight leg raise">Right straight leg raise</OPTION>
				<OPTION value="Left straight leg raise">Left straight leg raise</OPTION>
				<OPTION value="all">Select All</OPTION>
			</SELECT>
			was
			<INPUT type="text" id="bp" value="" size="2" />% 
			of
			<INPUT type="hidden" id="bnorm" value="full" />normal
			<SELECT id="bndp">
				<OPTION value="appeared to be painless">Appeared Painless</OPTION>
				<OPTION value="appeared to cause discomfort">Caused Discomfort</OPTION>
				<OPTION value="appeared to cause pain">Caused Pain</OPTION>
			</SELECT>
          </div>
          </div>

<br>

<div id='bTen' style="">
<div style="height:30px; overflow:hidden;">
<table width="100%" style="font-weight:bolder; color:#fff;  background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
<tr>
<td>
Tenderness
</td>
<td align="right">
<input id="bTb" type="button" value=" - " onClick="minimize('bTen', 'bTb');" style="height:30px; position:relative; top:-3px; right:-4px; width:60px;background-color:#FFF;border:none;" />
</td>
</tr>
</table>
</div>
<div style="padding:5px;">
<br>
<table>
<tr>
<td>
Bony Tenderness
</td>
<td>
<select id="bBT">
	<option value="">...</option>
    <option value="There was bony tenderness in the back.">yes</option>
    <option value="There was no bony tenderness in the back.">no</option>
</select>
</td>
</tr>
<tr>
<td>
Soft Tissue Tenderness
</td>
<td>
<select id="bTT">
	<option value="">...</option>
    <option value="There was soft tissue tenderness in the back.">yes</option>
    <option value="There was no soft tissue tenderness in the back.">no</option>
</select>
</td>
</tr>
<tr>
<td>
Muscle Spasm
</td>
<td>
<select id="bMS">
	<option value="">...</option>
    <option value="There was muscle spasm in the back.">yes</option>
    <option value="There was no muscle spasm in the back.">no</option>
</select>
</td>
</tr>
<tr>
<td>
Neurological Deficit
</td>
<td>
<select id="bND">
	<option value="">...</option>
    <option value="There was evidence of neurological deficit.">yes</option>
    <option value="There was no clinical evidence of any neurological deficit.">no</option>
</select>
</td>
</tr>
</table>
</div>
</div>
</td>
</tr>
<TR>
    
	<TR>
		<TD colspan="1" align="center"><INPUT type="button" value="Add" style="border-radius:6px;width:60px;height:26px;" onClick="addiv('bck','bp','bnorm','bndp','cb','bk','b'); back2();" /></TD>
	</TR>
</TABLE>

<DIV id="bk" style="border-style:solid;color:#A61515"> <H3>Back</H3> 

<?php 
$i=1;
while ($rnn=mysql_fetch_array($qb))
{
	echo "<textarea rows=1 cols=100 name='b[$i]' id='b[$i]'>".$rnn['msg']."</textarea>";
	echo "<input type=hidden value=Block name='bt[$i]' id='bt[$i]' />";
	echo "<input type=button value=Block name='bb[$i]' id='bb[$i]' onclick=\"ignoreitb('$i');\" style='background-color:#AA3333;color:#fff;' />";
	
	$i=$i+1;
}
?>

</DIV>


<div style="width:99%;border-bottom:solid 1px #555;font-family:Verdana, Geneva, sans-serif;font-size:20px;">
<b>Thorax</b>
</div>
<table align="center" border="0" rules="all" style="font-family:Verdana, Geneva, sans-serif;width:90%;">
<tr>
<td>
<div id='thorAdd' style="height:30px; overflow:hidden;">
<div style="height:30px; overflow:hidden;">
<table width="100%" style="font-weight:bolder; color:#fff; background-color:#77a9c9; height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
<tr>
<td>
Muscular Aspects (Advanced)
</td>
<td align="right">
<input id="tAb" type="button" value=" + " onClick="expand('thorAdd', 'tAb');" style="height:30px; position:relative; top:-3px; right:-3px; width:50px;background-color:#FFF;border:none;"/>
</td>
</tr>
</table>

</div>

<div style="padding:5px;" >
<br>

<select id="mPM" multiple='true'>
	<option value="Flexion of the humerus">Flexion of the humerus</option>
    <option value="Adduction of the humerus">Adduction of the humerus</option>
    <option value="Medial rotation of the humerus">Medial rotation of the humerus</option>
    <option value="Deep inspiration">Deep inspiration</option>
    <option value="Depression of the point of the shoulder">Depression of the point of the shoulder</option>
    <option value="Lateral rotation of the scapula">Lateral rotation of the scapula</option>
    <option value="Elevation of the scapula">Elevation of the scapula</option>
    <option value="Retraction of the scapula">Retraction of the scapula</option>
    <OPTION value="all">Select All</OPTION>
</select>
    
was
<INPUT type="text" id="mPMp" value="" size="2" />% 
of
<INPUT type="hidden" id="mPMnorm" value="full" />normal
<SELECT id="mPMpp">
    <OPTION value="appeared to be painless">Appeared Painless</OPTION>
    <OPTION value="appeared to cause discomfort">Caused Discomfort</OPTION>
    <OPTION value="appeared to cause pain">Caused Pain</OPTION>
</SELECT>
</div>
</div>

<br>


<div id='thorBas' style="">
<div style="height:30px; overflow:hidden;">
<table width="100%" style="font-weight:bolder; color:#fff; background-color:#77a9c9;  height:30px;  overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px;">
<tr>
<td>
Bony Tenderness
</td>
<td align="right">
<input id="tBb" type="button" value=" - " onClick="minimize('thorBas', 'tBb');" style="height:30px; position:relative; top:-3px; right:-4px; width:50px;border:none;background-color:#FFF;" />
</td>
</tr>
</table>
</div>
<div style="padding:4px;">
<br>

<table>
<tr>
<td>
Shoulder Socket
</td>
<td>
<select id="tLSS">
	<option value="">...</option>
    <option value="There was no bony tenderness around the shoulder sockets.">None</option>
    <option value="There was bony tenderness around the left shoulder socket.">Tenderness around left soulder socket</option>
    <option value="There was bony tenderness around the right shoulder socket.">Tenderness around right soulder socket</option>
    <option value="There was bony tenderness around both the shoulder sockets.">Tenderness around both soulder sockets</option>
</select>
</td>
</tr>
<tr>
<td>
Scapula (shoulder blade)
</td>
<td>
<select id="tLS">
	<option value="">...</option>
    <option value="There was no bony tenderness around the scapula.">None</option>
    <option value="There was bony tenderness around the left scapula.">Bony tenderness around left scapula</option>
    <option value="There was bony tenderness around the right scapula.">Bony tenderness around right scapula</option>
    <option value="There was bony tenderness around the scapula.">Bony tenderness around scapula</option>
</select>
</td>
</tr>
<tr>
<Td>
Strenum (breast bone)
</Td>
<td>
<select id="tS">
	<option value="">...</option>
    <option value="There was no bony tenderness around the strenum.">No</option>
    <option value="There was bony tenderness around the strenum.">Yes</option>
</select>
</td>
</tr>
<tr>
<td>
Thoracic Vertebrae
</td>
<td>
<select id="tTV">
	<option value="">...</option>
    <option value="There was no bony tenderness around the thoracic vertebrae.">No</option>
    <option value="There was bony tenderness around the thoracic vertebrae.">yes</option>
    <option value="There was bony tenderness around the first thoracic vertebrae.">Around 1st</option>
    <option value="There was bony tenderness around the second thoracic vertebrae.">Around 2nd</option>
    <option value="There was bony tenderness around the third thoracic vertebrae.">Around 3rd</option>
    <option value="There was bony tenderness around the fourth thoracic vertebrae.">Around 4th</option>
    <option value="There was bony tenderness around the fifth thoracic vertebrae.">Around 5th</option>
    <option value="There was bony tenderness around the sixth thoracic vertebrae.">Around 6th</option>
    <option value="There was bony tenderness around the seventh thoracic vertebrae.">Around 7th</option>
    <option value="There was bony tenderness around the 8th thoracic vertebrae.">Around 8th</option>
    <option value="There was bony tenderness around the ninth thoracic vertebrae.">Around 9th</option>
    <option value="There was bony tenderness around the tenth thoracic vertebrae.">Around 10th</option>
    <option value="There was bony tenderness around the eleventh thoracic vertebrae.">Around 11th</option>
    <option value="There was bony tenderness around the twelfth thoracic vertebrae.">Around 12th</option>
</select>

</div>
</div>

</td>
</tr>
<tr>
<td>

Ribs
</td>
<td>
<select id="tR">
	<option value="">...</option>
    <option value="There was no bony tenderness around the ribs.">No</option>
    <option value="There was bony tenderness around the left side ribs.">the left side ribs.</option>
    <option value="There was bony tenderness around the right side ribs.">the right side ribs.</option>
    <option value="There was bony tenderness around both sides of the rib-cage.">both sides of the rib-cage.</option>
    <option value="There was bony tenderness around the fixed ribs.">the fixed ribs.</option>
    <option value="There was bony tenderness around the false ribs.">the false ribs.</option>
    <option value="There was bony tenderness around the floating ribs.">the floating ribs.</option>
</select>

</td>
</tr>

</table>

</div>

</td>
</tr>

<tr>
<td align="center">
<input type="button" value="Add" onClick="addiv('mPM','mPMp','mPMnorm','mPMpp','ct','tDiv','t'); thorax2();" style="border-radius:6px;height:26px;width:60px;" />
</td>
</tr>

</table>

<DIV id="tDiv" style="border-style:solid;color:#A61515"> <H3>Thorax</H3> 

<?php 
$i=1;
while ($rnn=mysql_fetch_array($qt))
{
	echo "<textarea rows=1 cols=100 name='t[$i]' id='t[$i]'>".$rnn['msg']."</textarea>";
	echo "<input type=hidden value=Block name='tt[$i]' id='tt[$i]' />";
	echo "<input type=button value=Block name='tb[$i]' id='lb[$i]' onclick=\"ignoreitt('$i');\" style='background-color:#AA3333;color:#fff;' />";
	
	$i=$i+1;
}
?>

</DIV>


<div style="width:99%;border-bottom:solid 1px #555;font-family:Verdana, Geneva, sans-serif;font-size:20px;">
<b>Lower Limbs</b>
</div>
<TABLE align="center" border="0" rules="all" style="font-family:Verdana, Geneva, sans-serif;width:90%;">
	<TR>
		<TD>
          <div id='LLd' style="">
          <div style="height:30px; overflow:hidden;">
          <table width="100%" style="font-weight:bolder; color:#fff;background-color:#77a9c9;  height:30px; overflow:hidden; padding-top:0px; margin-top:0px;border-radius:6px 6px 0px 0px">
          <tr>
          <td>
          Muscular and Bony Aspects
          </td>
          <td align="right">
          <input id="lLb" type="button" value=" - " onClick="minimize('LLd', 'lLb');" style="height:30px; position:relative; top:-3px; right:-10px; width:65px;background-color:#FFF;border:none;" />
          </td>
          </tr>
          </table>
          </div>
          <div style="padding:5px;">
          <br>
			<SELECT id="llmb" multiple="true">
				<OPTION value="Right hip movement">Right hip movement</OPTION>
				<OPTION value="Left hip movement">Left hip movement</OPTION>
				<OPTION value="Right knee movement">Right knee movement</OPTION>
				<OPTION value="Left knee movement">Left knee movement</OPTION>
				<OPTION value="Right ankle movement">Right ankle movementt</OPTION>
				<OPTION value="Left ankle movement">Left ankle movement</OPTION>
				<OPTION value="Squat and rise">Squat and rise</OPTION>
				<OPTION value="Stand on tiptoes">Stand on tiptoes</OPTION>
				<OPTION value="all">Select All</OPTION>
			</SELECT>
			was
			<INPUT type="text" id="lp" value="" size="2" />% 
			of
			<INPUT type="hidden" id="lnorm" value="full" />normal
			<SELECT id="lndp">
				<OPTION value="appeared to be painless">Appeared Painless</OPTION>
				<OPTION value="appeared to cause discomfort">Caused Discomfort</OPTION>
				<OPTION value="appeared to cause pain">Caused Pain</OPTION>
			</SELECT>
          </div>
          </div>
		</TD>
	</TR>
	<TR>
		<TD colspan="1" align="center"><INPUT type="button" value="Add" onClick="addiv('llmb','lp','lnorm','lndp','cl','ls','l')"  style="border-radius:7px;width:60px;height:26px;" /></TD>
	</TR>
</TABLE>

</DIV>

<DIV id="ls" style="border-style:solid;color:#A61515;width:70%;"> <H3>Lower Limbs</H3> 

<?php 
$i=1;
while ($rnn=mysql_fetch_array($ql))
{
	echo "<textarea rows=1 cols=100 name='l[$i]' id='l[$i]'>".$rnn['msg']."</textarea>";
	echo "<input type=hidden value=Block name='lt[$i]' id='lt[$i]' />";
	echo "<input type=button value=Block name='lb[$i]' id='lb[$i]' onclick=\"ignoreitl('$i');\" style='background-color:#AA3333;color:#fff;' />";
	
	$i=$i+1;
}
?>

</DIV>

<INPUT type="submit" value="Submit">

</DIV>
