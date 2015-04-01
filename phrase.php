<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Suggestion</title>

</head>
<body>
<script language="javascript">
function cpyto(txt,elem)
{
	//alert(elem);
	alert(parent.document.getElementById(elem).innerHTML);
	parent.document.getElementById(elem).innerHTML = parent.document.getElementById(elem).innerHTML + txt; 
}
</script>

<?php

include 'dcon.php';

if($_POST['txtwrd']!=''){

// add phrase
$sqlinsert = "insert into suggestion set suggestion ='".$_POST['txtwrd']."',org ='thornton', dte ='".time()."'";
$sqinsres = mysql_query($sqlinsert);

}

$sql = "select suggestion from suggestion";
$sqlres = mysql_query($sql);
?>

<form id='frmwrd' name='frmwrd' action="phrase.php" method="post">
<div style="background-color:#77a9c9;height:80px;width:280px;padding:7px;border-radius:5px;color:#FFF;font-family:Verdana, Geneva, sans-serif;border-top:1px solid #FFF;">
Add a phrase or suggestion:
<input type="text" id="txtwrd" name="txtwrd" maxlength="110" style="border-radius:6px;height:20px;margin-top:10px;width:180px;" />
<input type="submit" value="ADD" style="border-radius:6px;height:26px;width:66px;" />

</div>
</form>
<?php

echo "<table width='270px' cellpadding='5px' style='font-family:sans-serif;'>";
echo "<th style='border-bottom:1px solid #FFF;' >Suggestion List</th>";

while($sqlrec = mysql_fetch_array($sqlres)){
	
	echo "<tr><td style='border-bottom:1px solid #FFF;cursor:pointer;' onclick=\"cpyto('".$sqlrec['suggestion']."','".$_GET['elem']."')\" >".$sqlrec['suggestion']."</td></tr>";

}

echo "</table>";

?>
</body>
</html>
