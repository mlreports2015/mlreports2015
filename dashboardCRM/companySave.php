<?php

session_start();

if(!session_id()){

	exit();
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<?php 

include 'includes/dcon.php';
include 'includes/inc.php';
include 'process/databaseClass.php';	


    $dbQueryNum = new DatabaseClass();
    $criteria = array('org_id'=>$_SESSION['org']);
    $tbl = 'organisation'; 
  
  $statement = $dbQueryNum->selectAll($tbl,$criteria);
 // echo $statement;
  
  $selEditRes=mysql_query($statement);
  $selEditPrint = mysql_fetch_array($selEditRes);
  
  //print_r($selEditPrint);

	
?>
</head>

<body style="height:100%;overflow:auto;background-image:url(Images/background-texture.jpg);background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1200px;">


<style>

    

@media screen and (min-width: 1024px) and (max-width: 1700px){
	
	
.navbar-nav {

		width:60%;
}
	
	
	.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:18%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}
	
	
	
	
}



@media screen and (min-width: 600px) and (max-width: 1160px){

.navbar-nav {

  width:50%;
  color:#FFF;
  font-size:88%;

}

.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:24%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}

}

    .breadcrumb {

        padding:6px;
        margin:0px;
        margin-top:0px;
        border-radius:none;
        background-color:#368ccc;
        color:#ffffff;
    }

    .breadcrumb a{

        color:#ffffff;
    }





</style>

    <script language="javascript">

        $(document).ready(function() {


            $("#frmorg").submit(function () {

                var isFormValid=true;

                $(".required").each(function () {
                    if ($.trim($(this).val()).length == 0) {
                        //$(this).addClass("highlight");
                        isFormValid = false;
                        $(this)[0].setAttribute('placeholder', 'required');


                    }
                    else {
                        ///$(this).removeClass("highlight");
                    }
                });

                return isFormValid;

            });

        });


    </script>



  <div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;"> 
  <!-- <div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;"> -->
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="text-decoration:none;color:#FFF;font-style:italic;font-weight:normal;font-size:medium;" >ML Appointments</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="index2.php">HOME</a></li>
        <!--<li><a href="search2.php" >SEARCH</a></li>-->
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>

    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#C2C2;"><a href="companySave.php" style="text-decoration:underline;" ><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>

<div style="width:100%" align="center">

<div style="width:90%">

<div style="float:left;width:45%;color:#386ccc;">
<h3> ACCOUNT DETAILS </h3>


</div>

<div style="float:left;width:45%;color:#386ccc">

<h3>ORGANISATION INFORMATION</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;color:#3648cc;">
<form action="process/companySaveP.php" method="post" name="frmorg" id="frmorg">
<input type="hidden" id="oid" name="oid" value="<?php echo $selEditPrint['org_id']; ?>" />
<table  align="left" width='89%'>
<TR>
<TD style="padding:5px;"><INPUT type='hidden' id="org1" name='org1' value='<?php echo $selEditPrint['org_typ']; ?>' class="form-control" style="width:100%" ></TD>
</TR>
<TR>
<TD>Organisation Name</TD><TD style="padding:5px;"><INPUT type='text' id="orgn1" name='orgn1' value='<?php echo $selEditPrint['org_name']; ?>' class="required form-control"></TD>
</TR>
<TR>
<TD>Organisation Contact</TD><TD style="padding:5px;"><INPUT type='text' id="cn1" name='cn1' value='<?php echo $selEditPrint['org_contact']; ?>' class="required form-control"></TD>
</TR>
<tr>
<TD>Postcode</TD><TD style="padding:5px;"><input style="width:50%;" type="text" name="cpc" id="cpc" value='<?php echo $selEditPrint['org_pcode']; ?>'  class="required form-control"/></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD style="padding:5px;"><INPUT type='text' id="ca1" name='ca1' value="<?php echo $selEditPrint['org_address1']; ?>" class="form-control"></TD>
</tr>
<tr>
<TD>Address Line 2</TD><TD style="padding:5px;"><input type="text" id="cty" name="cty" value='<?php echo $selEditPrint['org_address2']; ?>' class="form-control" /></td>
</tr>
<tr>
<td>Email</td><td style="padding:5px;" ><input type="text" id="eml" name="eml" value='<?php echo $selEditPrint['org_email']; ?>' class="required form-control" /></td>
</tr>
<tr>
<td>Contact No.</td><td style="padding:5px;" ><input type="text" id="cotel" name="cotel" class="required form-control" value='<?php echo $selEditPrint['org_telephone']; ?>' /></td>
</tr>
<tr>
<tr>
<td>&nbsp;</td>
</tr>
<td colspan="2" align="center">
<input type="submit" onClick="" value="Update Now" class="btn btn-success" />
</td>
</tr>
</TABLE>
</form>
</div> 

</div> 

</div> 

</div>



</div>

</body>

</html>