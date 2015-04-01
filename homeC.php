<?php

include 'template.php';

head('Home','','','','', '');
?>



<?php

include "dcon.php";

$s="select * from claimant where org='".$_SESSION['o']."' and stat=''";
$q=mysql_query($s);
$n=mysql_num_rows($q);

$num=$n/35;

$c=$_GET['l']*35;



//echo "<div style='font-family:Arial, Helvetica, sans-serif;'>";

echo "<div align='center' style='width:100%;background-color:#FFF;'>";

echo "<div style='float:right;font-family:sans-serif;margin-right:20px;'>Viewable Rows: ";
echo "<select id='row' name='row' onChange='rwSelect(this.value);' style=\"border-radius:7px;background-color:#cfe2ee;\">";
echo  "<option value=''></option><option value='50'>50</option><option value='25'>25</option><option value='10'>10</option>";
echo "</select>";
echo "</div>";
echo "<div style='float:left;width:320px;margin-left:10px;font-family:sans-serif;'>";
echo "Select Page: ";
echo "<select id='pageNo' name='pageNo' onChange='pgeSelect(this.value)' style=\"border-radius:7px;background-color:#cfe2ee\">";
for ($i=1; $i<=$num; $i++)
{
	echo "<option value='".$i."'>".$i."</option>";
	
}
echo "</select>  ";
echo " Actions: ";
echo "<select id='actionon' name='actionon' style=\"border:none;\">";
echo "<option value=''>...select action...</option>";
echo "<option value='send'>Send</option>";
echo "<option value='upload'>Upload</option>";
echo "</select>";
echo "</div><br/>";
echo "<div align='center' style='style='width:98%;height:20px'>";
echo "<ul class='pagination' >";
if($_GET['l'] >5){
  $n=$_GET['l'];
  echo "<a class='lr' href='homeC.php?l=".($n-5)."'><<&nbsp;</a>";	

}else{
	$n =0;
}
$count = 0;

for ($i=$n; $i<=$num; $i++)
{
	echo "<li><a class='lr' href='homeC.php?l=$i' title='Last ".($i*32). ' to '.(($i*32)+32)."'>".($i+1)." </a></li>";
    $count = $count + 1;
	if($count >7){
		echo "<li><a class='lr' href='homeC.php?l=".($i+1)."'>&nbsp;&gt;&gt;&gt;</a></li>";
		break;
	}
}
echo "</div>";

echo "<div align='center' style='float:left;width:98%;height:20px'>";
if($_GET['l'] >5){
  $n=$_GET['l'];
  echo "<a class='lr' href='homeC.php?l=".($n-5)."'><<&nbsp;</a>";	

}else{
	$n =0;
}

/*
$count = 0;

for ($i=$n; $i<=$num; $i++)

{

	
     
   
	echo "<a class='lr' href='homeC.php?l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
    $count = $count + 1;
	if($count >7){
		echo "<a class='lr' href='homeC.php?l=".($i+1)."'>&nbsp;&gt;&gt;&gt;</a>";
		break;
	}
}
*/
echo "</ul>";
echo "</div><br/><br/>";
/*
echo "<div style='float:right;width:300px;height:30px;'>";
echo "Go to Page #";
echo "<input type='text' id='txtpge' name='txtpge' size='6' onKeyDown='displayKey(event, this.value)'/>";
echo "</div>";


if ($c!=0){
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif;'>On this Page, Displaying Last ".$c." to ".($c+35)." Incomplete Cases</div>";
}else{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif;'>On this Page, Displaying Last 35 Incomplete Cases";
echo '</div>';
}
*/

?>

<DIV style="width:100%;background-color:#FFF;">


<TABLE width="95%" height="98%" cellpadding="5" class="table table-hover" cellspacing="1" align="center" rules="all" style="border-style:none; font-family:Arial, Helvetica, sans-serif;">

<TR>
<TD style="border-style:solid; border-width:1px; border-color:#000;font-weight:bold;">ID</Th>
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

$s="select * from claimant where org='".$_SESSION['o']."' and stat='' ORDER BY cid DESC limit $c, 35";
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

if ($i%2==0)
{
	//$s="class='lr'";
}
else
{
	//$s="class='lb'";
}
?>
<TR>
<TD style="border-bottom:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?echo $r['cid'];?></A></TD>
<TD style="border-bottom:solid; border-width:1px; border-color:#A61515;"><A title="<?php echo 'DOB : '; if (strcmp(date('d-m-Y',strtotime($r['cdb'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cdb']));} else { echo '&nbsp;'; }?>" <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cfn']); ?> <?php chkr($r['cln']);?></A></TD>
<TD style="border-bottom:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cda'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cda']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-bottom:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime($r['cde'])),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cde']));} else { echo '&nbsp;'; } ?></A></TD>
<TD style="border-bottom:solid; border-width:1px; border-color:#A61515;"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['ca1']);?> <br /> <?php chkr($r['ca2']);?>, <?php chkr($r['cp']);?></A></TD>
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

<br />

<?php
/*
echo "<div align='center'>";
$count = 0;
for ($i=$n; $i<=$num; $i++)
{

echo "<a class='lr' href='homeC.php?l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
$count ++;
if($count >=6){
break;
}


}

echo '</div>';
*/
?>


<div align="left" id="rem" style="position:absolute; right:1px; bottom:1px; height:20px; width:400px; overflow:hidden; background-color:#FFC; font-family:Arial, Helvetica, sans-serif; opacity:0.9; filter:alpha(opacity=90); border-color:#333; border-style:inset; border-width:1px; z-index:2;">
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




<script language="javascript" type="text/javascript">


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


function pgeSelect(x)
{

	document.location='homeC.php?l='+x;
}

function displayKey(e,num){
   
  var keycde = e.keyCode;
  
  if(keycde=='13'){
   document.location='homeC.php?l='+num;
  }

}


</script>


</div>
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