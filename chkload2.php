<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();

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
						
						$flenme=str_replace('.','',$qp['ct']).'-'.$qp['cfn'].'-'.$qp['cln'];
						echo $flenme;
						
						//$url = "http://localhost/mlr2/upload-file.php";
						  $url ="http://www.mlreports.com/mlr/upload-file.php";
// Any other field you might want to catch
//post_data['name'] = "khan";
// File you want to upload/post
$post_data['uploadfile'] = "@c:/wamp/www/mlr2/uploads/".$flenme.".rtf";
 
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
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">

function countChk(){

  var tags = parent.document.getElementsByTagName('input');
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
  
}

</script>
</head>
<body onload='countChk()'>
<form id="uploadfrm" name="uploadfrm" method="post" action='' >
<input type="text" name="uploadable" id="uploadable" />
<input type="submit" value="go" />
</form>
</body>
</html>

