<?php

include 'template.php';

head('Lists','','','','', '');
?>

<script language="javascript" type="text/javascript">

function countChk(){
  var tags = document.getElementsByTagName('input');
  count =0;
  var vals ='';
  for(var $i=0;$i < tags.length; $i++){
     if (tags[$i].type === "checkbox" && tags[$i].checked === true) {
	     var tId = new String(tags[$i].id);
		 vals = vals + tId.substring(3,tId.length)+ ',';
        count++;
    }

  }
  alert(count);
  alert(vals);
  
  document.getElementById('uploadable').value=vals;
  document.getElementById('magic').src="chkload2.php";
}

</script>

<div align="center">
<input type="text" name="dt" id="dt" value="<?php echo $_GET['dt'];?>" /><input type="button" value="Get" onclick="window.location='lists.php?dt='+document.getElementById('dt').value;" />
</div>

<DIV style="width:100%;float:right;">

<?php

include "dcon.php";

if($_POST['uploadable']!=''){
		echo $_POST['uploadable'];
	$grade =explode(',',$_POST['uploadable']);
	
					foreach($grade as $ref){
					
						$s="select  ct, cln, cfn from claimant where org='".$_SESSION['o']."' and cageref = '".$ref."'";
						 //echo $s;
						$q=mysql_query($s);
						$qp = mysql_fetch_array($q);
						//print_r($qp);
						
						$flenme=$qp['ct'].'-'.$qp['cfn'].'-'.$qp['cln'];
						
						$url = "http://localhost/mlr2/upload-file.php";
// Any other field you might want to catch
//post_data['name'] = "khan";
// File you want to upload/post
$post_data['uploadfile'] = "@c:/temp/".$flenme.".rtf";
 
// Initialize cURL
$ch = curl_init();
// Set URL on which you want to post the Form and/or data
curl_setopt($ch, CURLOPT_URL, $url);
// Data+Files to be posted
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
// Pass TRUE or 1 if you want to wait for and catch the response against the request made
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// For Debug mode; shows up any error encountered during the operation
curl_setopt($ch, CURLOPT_VERBOSE, 1);
// Execute the request
$response = curl_exec($ch);
echo $response;
						
					
					}
	
}


$s="select * from claimant where org='".$_SESSION['o']."' and cde='".date('Y-m-d', strtotime($_GET['dt']))."'";
$q=mysql_query($s);
$n=mysql_num_rows($q);

$num=$n/50;

$c=$_GET['l']*50;

echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif;'>";

for ($i=0; $i<=$num; $i++)
{
	echo "<a class='lr' href='lists.php?dt=".$_GET['dt']."&l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
}


echo '</div>';
?>
<input type="button" name="uploadBut" id="uploadBut" value='upload' onclick="countChk()"/>
<form id="uploadfrm" name="uploadfrm" method="post" action='' >
<input type="text" name="uploadable" id="uploadable" />
<input type="submit" value="go" />
</form>
<TABLE width="100%" align="center" border="1" rules="all" cellpadding="6px" style="font-family:Arial, Helvetica, sans-serif;">

<TR>
<th>S/N</th>
<Th>First Name</font></Th>
<Th>Last Name</font></Th>
<Th>DOE</font></Th>
<Th>Solicitor Reference</font></Th>
<Th>Agency Reference</font></Th>
<Th>Agency</font></Th>
<Th>Solicitor</font></Th>
<th>Report Generated</th>

</TR>
<?
$i=0;
if($c<50){
$s="select * from claimant where org='".$_SESSION['o']."' and cde='".date('Y-m-d', strtotime($_GET['dt']))."' LIMIT 0, 50";
}else{
$s="select * from claimant where org='".$_SESSION['o']."' and cde='".date('Y-m-d', strtotime($_GET['dt']))."' LIMIT $c, 50";
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

$s="select * from repGen where cid='".$r['cid']."' and org='".$_SESSION['o']."'";
$q3=mysql_query($s);
$n=mysql_num_rows($q3);

$yn='';
if ($n>0)
{
	$yn='Yes';
}
else
{
	$yn='No';
}

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
<TD><input type='checkbox' id="chk<?php chkr($r['cageref']);?>" name="chk<?php chkr($r['cageref']);?>" /></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cfn']); ?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cln']);?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><? if (strcmp(date('d-m-Y',strtotime(trim($r['cde']))),'01-01-1200')!=0) {  echo date('d-m-Y',strtotime($r['cde']));} else { echo '&nbsp;'; } ?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['csolref']);?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r['cageref']);?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r2['an']);?></A></TD>
<TD><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php chkr($r1['sn']);?></A></TD>
<td align="center"><A <?php echo $s; ?> href='detNewer.php?cid=<?echo $r['cid'];?>'><?php echo $yn; ?></A></td>
</TD>
</TR>

<?
$i=$i+1;
}
?>

</TABLE>
</DIV>

<br />
<br />

<?php
echo "<div align='center'>";

for ($i=0; $i<=$num; $i++)
{
	echo "<a class='lr' href='lists.php?dt=".$_GET['dt']."&l=$i' title='Last ".($i*50). ' to '.(($i*50)+50)."'>".($i+1)." </a>";
}

echo '</div>'


?>
<iframe id="magic" name="magic" src=''></iframe>
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