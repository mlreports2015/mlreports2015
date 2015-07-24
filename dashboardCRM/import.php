<?php 

//session_start();
include './includes/dcon.php';
include './includes/inc.php';
include './process/databaseClass.php';

$dbclss = new DatabaseClass;
$tbl = "import_dte";
$criters = array('import_coID'=>$_GET['comp_id']);

$dbQuery=$dbclss->selectALL($tbl,$criters);

$resquery = mysql_query($dbQuery);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Doc</title>
</head>
<body>

<div style="width:98%;">
	<div align="center" style="height:80px;border-bottom:1px solid #ccc">
    <?php if($_GET['comp_id']=='1'){
	   echo "<form id=\"frmimp\" name=\"frmimp\"  enctype=\"multipart/form-data\" action=\"process/importGroupP.php\" method=\"POST\">";	
	}else if($_GET['comp_id']=='5'){
	   echo "<form id=\"frmimp\" name=\"frmimp\"  enctype=\"multipart/form-data\" action=\"process/importkgdealP.php\" method=\"POST\">";	
	}else{
       echo "<form id=\"frmimp\" name=\"frmimp\"  enctype=\"multipart/form-data\" action=\"process/importP.php\" method=\"POST\">";
	}
	?>
	    <input type="hidden" name="compID" id="compID" value="<?php echo $_GET['comp_id']; ?>" />
    	<font style="font-family:Arial, Helvetica, sans-serif;font-size:16px;" >Please select the file you wish to import</font><br/><input type="file" id='fimport' name='fimport'  />(CSV files only)
        <input type="submit" id="subimprt" name="subimprt" value="Upload Now" />
      </form>  
    </div>
    <div style="width:90%;height:200px;text-align:center;">
    	<u>List of imported dates</u>
    	
        <?php 
		 while($imprts = mysql_fetch_array($resquery)){
			echo "<div>-".date('d-m-Y',$imprts['import_dt'])." uploaded ".$imprts['import_no']." records </div>";
		 }
		?>        
        
    
    </div>

</div>
</body>
</html>