<?php

include 'template.php';

head('Home','','','','', 'scrolRem();');
?>

<?php

include "dcon.php";
$s="select * from claimant where org='".$_SESSION['o']."' and stat=''";
$q=mysql_query($s);
$n=mysql_num_rows($q);
$r=$_GET['row'];

if($r==0){
$num=$n/33;
}else{
$num=$n/$r;	
}


?>

<div style="background-color:#FFF;width:99%;height:130px;padding:8px;">
<!--
<input type="button" value="Download Cases" onclick="nCases();" style="width: 120px;" />
<br />
<input type="button" value="Upload Cases" onclick="window.open('uLoad.php?wName='+window.name);"  style="width: 120px;" />
<br />
-->
<?php



echo "<div style='float:right;font-family:sans-serif;margin-right:20px;'>Viewable Rows: ";
echo "<select id='row' name='row' onChange='rwSelect(this.value);' style=\"border-radius:7px;background-color:#cfe2ee;\">";
echo  "<option value=''></option><option value='50'>50</option><option value='25'>25</option><option value='10'>10</option>";
echo "</select>";
echo "</div>";
echo "<div style='float:left;margin-left:10px;font-family:sans-serif;'>";
echo "Select Page: ";
echo "<select id='pageNo' name='pageNo' onChange='pgeSelect(this.value)' style=\"border-radius:7px;background-color:#cfe2ee\">";
for ($i=1; $i<=$num; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
	
}
echo "</select>  ";
echo " Actions: ";
echo "<select id='actionon' name='actionon' style=\"border:none;\" onchange=\"chkChked()\">";
echo "<option value=''>...select action...</option>";
echo "<option value='send'>Send</option>";
echo "<option value='upload'>Upload</option>";
echo "</select>";
echo "</div><br/>";
echo "<div align='center' style='width:70%'>On this Page, Displaying Last 30 Incomplete Cases</div>";
echo "<div align='center' style='width:98%;height:43px;'>";
echo "<ul class='pagination' >";

for ($i=0; $i<=$num; $i++)
{

	echo "<li><a class='lr' href='homeC.php?l=$i' title='Last ".($i*30). ' to '.(($i*30)+30)."'>".($i+1)." </a></li>";
	if($i >=7){
		echo "<li class='next'><a class='lr' href='homeC.php?l=$i' title='next 7'>&nbsp;&gt;&gt;</a></li>";
		break;
	}

}
echo "</ul>";

echo '</div>';

?>

</div>

<DIV style="width:98%;float:left;background-color:#FFF;">

<TABLE width="95%"  class="table table-striped" cellpadding="5" cellspacing="0" align="center" rules="all" style="border-style:none; border-width:1px; border-color:#A61515; font-family:Arial, Helvetica, sans-serif;">

<TR>
<Th>&nbsp;</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">ID</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Name</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">DOA</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">DOE</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Address</Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Agency</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Solicitor</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Complete</font></Th>
<Th style="border-style:solid; border-width:1px; border-color:#000;">Report</font></Th>
</TR>
<TBODY>
<?


$i=0;
if($r==0){
$s="select * from claimant where org='".$_SESSION['o']."' ORDER BY cid DESC limit 0, 35";
}else{
$s="select * from claimant where org='".$_SESSION['o']."' ORDER BY cid DESC limit 0, $r";	
}

// echo "s=".$_SESSION['o'];
$q=mysql_query($s);
while ($r=mysql_fetch_array($q))
{
// 	echo $r['cid'];
$s1="select * from solicitor where sid='".$r['csol']."'";
$s2="select * from agency where aid='".$r['cage']."'";

$q1=mysql_query($s1);
$q2=mysql_query($s2);

$r1=mysql_fetch_array($q1);
$r2=mysql_fetch_array($q2);

$repsGen = "select count(*) from repGen where org = '".$_SESSION['o']."' and cid ='".$r['cid']."'";

$repsGenRes = mysql_query($repsGen);

$repsGenPrint = mysql_fetch_row($repsGenRes);

//print_r($repsGenPrint);

if ($i%2==0)
{
	$s="class='lr'";
}
else
{
	$s="class='lb'";
}
?>
<TR>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><input type="checkbox" name="chk<?php echo $r['cid'];?>" id="chk<?php echo $r['cid']; ?>" />
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#000;"><A title="<?php echo 'DOB : '; if (strcmp(date('d-m-Y',strtotime($r['cdb'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cdb']));} else { echo '&nbsp;'; }?>" <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cfn']); ?> <?php chkr($r['cln']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cda'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cda']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cde'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cde']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['ca1']);?> <br /> <?php chkr($r['ca2']);?>, <?php chkr($r['cp']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A title="<?php echo 'Agency Ref : '; chkr($r['cageref']);?>" <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r2['an']);echo "<br/>";chkr($r['cageref']); ?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><A title="<?php echo 'Solicitor Ref : '; chkr($r['csolref']);?>" <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r1['sn']);?></A></TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><?php if($r['stat']=='c'){ echo "<img src='./images/tick-greenb.png' title='yes'  />"; } ?>&nbsp;</TD>
<TD style="border-style:solid; border-width:1px; border-color:#A61515;"><?php if($repsGenPrint[0]!=0){ echo "<img src='./images/tick-greenb.png' title='yes' />"; } ?>&nbsp;</TD>
</TR>
<?
$i=$i+1;
}
?>
</TBODY>
</TABLE>
</DIV>
<?php
echo "<div align='center' style='margin-top:12px;background-color:#FFF;'><br/>";
echo "<ul class='pagination'>";
for ($i=0; $i<=$num; $i++)
{

	echo "<li><a class='lr' href='homeC.php?l=$i' title='Last ".($i*30). ' to '.(($i*30)+30)."'>".($i+1)." </a></li>";
	if($i >=7){
		echo "<li><a class='lr' href='homeC.php?l=$i' title='next 7'>&nbsp;&gt;&gt;</a></li>";
		break;
	}

}
echo "</ul>";
echo '</br></br>';
echo '</div>';
?>

<div align="left" id="rem" style="position:fixed; right:1px; bottom:1px; height:20px; width:400px; overflow:hidden; background-color:#FFC; font-family:Arial, Helvetica, sans-serif; opacity:0.9; filter:alpha(opacity=90); border-color:#333; border-style:inset; border-width:1px; z-index:2;">
<div onclick="remTgl();" id="remInner" style="padding-top:2px; padding-left:2px; cursor:pointer;">Reminders</div>

<div id="iRem" style="height:330px; position:relative; left:0px;">

<table>
<tr>

<td height="325" width="400" align="center">

<iframe frameborder="0" height="320" width="378px" id="frm"></iframe>

</td>

</tr>
</table>

</div>

<div align="center">
<a style="cursor:pointer" onclick="fRem();" title="First Reminder"><img src="images/first.png" /></a>
<a style="cursor:pointer" onclick="pRem();" title="Previous"><img src="images/bk.png" /></a>
<span id="rNum"></span> of <span id="rTot"></span> 
<a style="cursor:pointer" onclick="nRem();" title="Next"><img src="images/fw.png" /></a>
<a style="cursor:pointer" onclick="lRem();" title="Last Reminder"><img src="images/last.png" /></a>
</div>

</div>


<div align="left" id="nCase" style="visibility: hidden; position: absolute; left: 100px; top: 100px; width: 900px; height: 400px;">

    <table width="750" height="320" background="images/bgTAP.png" style="font-family:Arial, Helvetica, sans-serif; padding-left:10px; background-repeat:no-repeat;">

        <tr style="color:#FFF; font-size:11px;" height="27px;">
            <td colspan="5">
                <span id="titleD"></span>
            </td>
            <td align="right">
                <a onclick="document.getElementById('nCase').style.visibility='hidden';" style="cursor:pointer;">
                <img src="images/close.png" style="padding-top:0px; margin-top:0px;" border="0" />
                </a>
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2"><input type="text" value="" id="mlrD" /><input type="button" value="Get Records" onclick="dCases();" /></td>
        </tr>

        <tr>
            <td align="center" colspan="6"><iframe id="mlrF" frameborder="0" height="270" width="750px;" allowtransparency="true" src="" style="opacity:0.8; filter:alpha(opacity=80);" scrolling="auto"></iframe></td>
        </tr>

    </table>

</div>



<script language="javascript" type="text/javascript">

window.name='MLR Home';

var rId=new Array();
var rInc=0;

<?php
$sqlRem="select * from doer where org='".$_SESSION['o']."' and rD <= '".date('Y-m-d')."' and rS='0'";
//$sqlRem="select * from doer where org='".$_SESSION['o']."'";
$qRem=mysql_query($sqlRem);

$remW=0;

$rInc=0;

while ($rRem=mysql_fetch_array($qRem))
{
	echo "rId[rInc]=".$rRem['rId'].";";
	$rInc=$rInc+1;
	echo "rInc=".$rInc.";";
}
?>

var cRem=0;

var ht=20;

function remTgl()
{
	if (document.getElementById('rem').style.height=='380px')
	{
		ht=20;
		document.getElementById('rem').style.height=ht+'px';
		document.getElementById('remInner').title='Click to Maximise';
	}
	else
	{
		if (rInc>0)
		{
			ht=380;
			document.getElementById('rem').style.height=ht+'px';
		
			document.getElementById('frm').src='remH.php?rId='+rId[cRem];
			document.getElementById('rNum').innerHTML=(cRem+1);
			document.getElementById('rTot').innerHTML=(rInc);
			document.getElementById('remInner').title='Click to Minimize';
		}
		else
		{
			alert('No Reminders Found');
		}
	}
}


function chkChked(){

	input = document.getElementsByTagName('input');
	
	for(var i =0;i<input.length;i++){
		
		if(input[i].type='checkbox'){
			
			if(input[i].checked){
				alert(input[i].id);	
			}
		}
	
	}

}

function scrolRem()
{
	setInterval("sChk()", 500);
}

function sChk()
{
	var tRem=document.body.clientHeight-ht+document.body.scrollTop;
	
	document.getElementById('rem').style.top=tRem+'px';
}


function fRem()
{
	document.getElementById('frm').src='remH.php?rId='+rId[0];
	
	cRem=0;
	
	document.getElementById('rNum').innerHTML='1';
}


function pRem()
{
	if (cRem==0)
	{
		cRem=rInc-1;
	}
	else
	{
		cRem=cRem-1;
	}
	document.getElementById('frm').src='remH.php?rId='+rId[cRem];
	
	document.getElementById('rNum').innerHTML=(cRem+1);
}


function nRem()
{
	if (cRem<(rInc-1))
	{
		cRem=cRem+1;
	}
	else
	{
		cRem=0;
	}
	document.getElementById('frm').src='remH.php?rId='+rId[cRem];
	
	document.getElementById('rNum').innerHTML=(cRem+1);
}


function lRem()
{
	document.getElementById('frm').src='remH.php?rId='+rId[rInc];
	
	cRem=rInc;
	
	document.getElementById('rNum').innerHTML=rInc;
}

function dCases()
{
    document.getElementById('mlrF').src='test.php?dt='+document.getElementById('mlrD').value;
}

function nCases()
{
    document.getElementById('nCase').style.visibility='visible';
}

function pgeSelect(x)
{

	document.location='homeC.php?l='+x;
}

function rwSelect(x)
{

	document.location='home.php?row='+x;
}

</script>

</Body>
</HTML>

<?

function chkr($p)
{
	if (strlen(trim($p))>0)
	{
		echo $p;
	}
	else
	{
		echo '&nbsp;';
	}
}

?>