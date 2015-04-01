<?php


session_start();


include('../dcon.php');



if($_GET['updt']=='1'){

$fname = $_POST['expnme'];
$lname = trim($_POST['explstnme']);
$expQual = trim($_POST['expqual']);




$updtdets = "update about set fname='".$fname."', lname = '".$lname."', qualif='".$expQual."' where name='".$_GET['nm']."' and org='".$_GET['org']."'";
//echo $updtdets;

mysql_query($updtdets);

}





$incs = "select * from about where name='".$_GET['nm']."' and org='".$_GET['org']."'";
//echo $incs;
$incsres = mysql_query($incs);
$incsPrint = mysql_fetch_array($incsres);


?>	


<div style="width:450px;">
<form id="dets_form" name="dets_form" action='./updateUser02.php?nm=<?php echo $_SESSION['n']; ?>&org=<?php echo $_SESSION['o']; ?>&updt=1' method='POST' style='width:450px;'>
<table width='450px'>
<tr align="center"> 
<td colspan='2'>(please ensure, that all your details are correct)</td>
</tr>
<tr>
<td colspan='2'>&nbsp;&nbsp;</td>
</tr>
<tr style="color:#A61515;">
<td align='right'>
Forename
</td>
<td>
<input type='text' id="expnme" name="expnme" title='forename' value='<?php echo $incsPrint['fname']; ?>' />
</td>
</tr>
<tr style="color:#A61515;">
<td align="right">
Surname
</td>
<td>
<input type='text' id="explstnme" name="explstnme" title='surname' value='<?php echo $incsPrint['lname']; ?>' />
</td>
<tr>
<td align='right'>
Qualifications(ie. BBS, BCh)
</td>
<td>
<textarea id='expqual' name='expqual' title='qualifications'>
<?php if($incsPrint['qualif']!=''){ echo $incsPrint['qualif']; } ?>
</textarea>
</td>
</tr>
<tr style="color:#A61515;">
<td align='right'>
Speciality:
</td>
<td>
<select id="spec" name="spec" title='speciality choice'>
<option value='general practitioner' >General Practitioner</option>
<option value='orthopedic' >Orthopedic</option>
<option value='neurologist'>Neurologist</option>
<option value='psychology'>Psychology</option>
</select>
</td>

</tr>
<tr>
<td align='right'>Other Speciality(not listed):</td>
<td><input type='text' name='othspec' id='othspec'/></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td align="right">Address</td>
<td><textarea id="xprtAddy" name="xprtAddy" cols="30" rows="6"><?php if($incsPrint['address']!=''){ echo $incsPrint['address']; } ?></textarea></td>
</tr>
<tr style="color:#A61515;">
<td align='right'>
Sample Signature:
</td>
<td>
<input type="file" name='sigupload' id='sigupload' />
<td>
</tr>
<tr align='center'>
<td colspan='2'><br/><input type='submit' id="goupdate" name="goupdate" value='update details' title='update details'/></td>
</tr>
</table>
</form>
</div>
