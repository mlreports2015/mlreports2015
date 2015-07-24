<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Expert Save Process</title>
</head>
<body>
<?php

include "../includes/dcon.php";
include 'databaseClass.php';


$target ='../upload/experts/';

/*
if(is_uploaded_file($_FILES['cvfile']['tmp_name'])) {

    echo $_FILES['cvfile']['tmp_name'];

//$csvString = file_get_contents($_FILES['fimport']['tmp_name']);

//$compId = $_POST['compID'];

    $target_path = $target . basename($_FILES['cvfile']['name']);

    if (move_uploaded_file($_FILES['cvfile']['tmp_name'], $target_path)) {


        $filename= basename( $_FILES['cvfile']['name']);

    }


}
*/




$dbquery = new DatabaseClass();
$appsperhr = $_POST['appsperhr'];
$dbfields = array("exp_name"=>$_POST['orgnm'], "exp_typ"=>$_POST['orgtyp'], "exp_interest"=>$_POST['orginter'], "exp_gmcno"=>$_POST['gmcno'], "exp_pcode"=>$_POST['cpc'],"exp_number"=>$_POST['cotel'], "exp_address1"=>$_POST['ca1'] ,"exp_address2"=>$_POST['cty'],"exp_cv"=>$filename, "exp_AppHours"=>$appsperhr, "updated_at"=>time());
//$dbvalues = array($_POST['orgnm'],$_POST['orgtyp'],$_POST['cpc'],$_POST['cotel'],$_POST['ca1'],$_POST['cty'],$filename , time());
$dbtbl = "expert";

//$dbfields=array("org_name"=>$_POST['orgn1'], "org_contact"=>$_POST['cn1'], "org_pcode"=>$_POST['cpc'], "org_email"=>$_POST['eml']);
$dbcriteria=array("exp_id"=>$_POST['eid']);
$updatestate = $dbquery->updatequery($dbfields,$dbcriteria,$dbtbl);

echo $updatestate;

//$statement = $dbquery->insertquery($dbfields, $dbvalues, $dbtbl);
//echo $statement;

$res = $db->query($updatestate) or die(mysql_error());

//$res = mysql_query($statement) or  die(mysql_error());

//$resID = mysql_insert_id();
//echo $resID;






?>
<script>


//parent.addCompany('<?php echo $_POST['cn1']; ?>', '<?php echo $resID ?>');
document.location = '../expertSave.php';


</script>

</body>
</html>