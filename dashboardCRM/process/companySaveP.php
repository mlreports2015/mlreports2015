<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Save Process</title>
</head>
<body>
<?php

include "../includes/dcon.php";
include 'databaseClass.php';



$dbquery = new DatabaseClass();

$dbfields=array("org_name"=>$_POST['orgn1'], "org_contact"=>$_POST['cn1'], "org_address2"=>$_POST['cty'] ,"org_pcode"=>$_POST['cpc'], "org_email"=>$_POST['eml'], "org_telephone"=>$_POST['cotel']);
$dbcriteria=array("org_id"=>$_POST['oid']);
$dbtbl = "organisation";

$updatestate = $dbquery->updatequery($dbfields,$dbcriteria,$dbtbl);

$res = $db->query($updatestate);


?>
<script>


//parent.addCompany('<?php echo $_POST['cn1']; ?>', '<?php echo $resID ?>');
 document.location = '../companySave.php'; 


</script>

</body>
</html>