<?php


session_start();


include('../dcon.php');



if($_GET['updt']=='1'){

$GPcst = $_POST['exprep1cst'];
$DNAcst = trim($_POST['expdnacst']);





$updtdets = "update aboutcst set GP_cost='".$GPcst."', DNA_cost = '".$DNAcst."' where name='".$_GET['nm']."' and org='".$_GET['org']."'";
//echo $updtdets;

mysql_query($updtdets);

}





$incs = "select GP_cost, DNA_cost from aboutcst where name='".$_GET['nm']."' and org='".$_GET['org']."'";
//echo $incs;
$incsres = mysql_query($incs);
$incsPrint = mysql_fetch_array($incsres);


?>	
	
<form id="dets_form" name="dets_form" action='./updateUserFinanceInfo.php?nm=<?php echo $_SESSION['n']; ?>&org=<?php echo $_SESSION['o']; ?>&updt=1' method='POST' style='width:450px;'>
<table width='450px'>
<tr>
<td colspan='2' align="center"><u>
<?php // echo strtoupper($_SESSION['o'])." FINANCE DETAILS"; ?>	
</u></td>
</tr>
<tr align="center"> 
<td colspan='2'>(please ensure, that all your costs are indicated here)</td>
</tr>
<tr>
<td colspan='2'>&nbsp;&nbsp;</td>
</tr>
<tr style="color:#A61515;">
<td align='right'>
GP Report Cost
</td>
<td>
<input type='text' id="exprep1cst" name="exprep1cst" title='GP Report' value='<?php echo $incsPrint['GP_cost']; ?>' />
</td>
</tr>
<tr style="color:#A61515;">
<td align="right">
DNA Cost
</td>
<td>
<input type='text' id="expdnacst" name="expdnacst" title='dna cost' value='<?php echo $incsPrint['DNA_cost']; ?>' />
</td>
<tr>
<td align='right'>
Report with Review Cost
</td>
<td>
<input type='text' id='revCst' name='revCst' title='review' value=''/>
</td>
</tr>
<tr>
<td colspan='2' align="center"><br/><input type='submit' id="goupdate" name="goupdate" value='update details' title='update details'/></td>
</tr>
</table>
</form>

