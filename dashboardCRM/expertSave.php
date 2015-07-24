<?php
session_start();
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
    $criteria = array('exp_id'=>$_SESSION['org']);
    $tbl = 'expert';
  
  $statement = $dbQueryNum->selectAll($tbl,$criteria);
 // echo $statement;
  
  $selEditRes=mysql_query($statement);
  $selEditPrint = mysql_fetch_array($selEditRes);
  
  //print_r($selEditPrint);

	
?>
</head>

<body style="height:100%;overflow:hidden;background-image:url(Images/background-test1b.png);">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1200px;">

    <script language="javascript">

  $(document).ready(function() {


      $("#frmexp").submit(function () {

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

		 
		 
		 if($(':file').val()!=''){
							 
          if($(':file').val().indexOf('.pdf')<=0){

             isFormValid = false;
              $("#flemsg").html(' pdf file only');
          }

		}
		
          return isFormValid;

      });

  });


    </script>

<style>

    .navbar-default .navbar-nav>li>a{color:#FFF}
    .navbar-default .navbar-nav>li>a:hover{color:#FFF}
    .navbar-nav li {

        width:18%;
        text-align:center;
        color:#FFF;

    }

    .navbar-nav li:hover {

       // background-color:rgba(218,6,6,0.5);
        background-color:rgba(40,150,215,0.5);
		font-weight:bold;
        color:#FFF;

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


<!--<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">-->
<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="exprtIndex.php" style="text-decoration:none;color:#FFF;font-style:italic;font-family:'Times New Roman', Times, serif">Britannia Medicare</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:60%">
         <li><a href="exprtIndex.php">HOME</a></li>
        <li><a href="process/listGens.php" target="_blank">GEN LISTS</a></li>
        <li><a href="diary.php" >DIARIES</a></li>
        <li><a href="venueAdd.php" >VENUES</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:300px;">
        <li style="width:48%"><a href="expertSave.php">My Account</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>

    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#a616c5;"><a href="expertSave.php" ><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>

<div style="width:100%" align="center">

<div style="width:90%">

<div style="float:left;width:45%;color:#386ccc;">
<h3> ACCOUNT DETAILS </h3>


</div>

<div style="float:left;width:45%;color:#386ccc">

<h3>EXPERT INFORMATION</h3>

<div style="width:94%;text-align:left;font-family:Arial, Helvetica, sans-serif;color:#a616c5;">
<form action="process/expertSaveP.php" method="POST" enctype="multipart/form-data" name="frmexp" id="frmexp">
<input type="hidden" id="eid" name="eid" value="<?php echo $selEditPrint['exp_id']; ?>" />
<table  align="left" width='89%'>
 <TR>
     <TD>Expert Name:</TD><TD style="padding:5px;"><INPUT type='text' id="orgnm" name='orgnm' value='<?php echo $selEditPrint['exp_name'];?>' class="required form-control" style="width:100%" ></TD
 ></TR>
    <TR>
<TD>Expert Type:</TD><TD style="padding:5px;"><INPUT type='text' id="orgtyp" name='orgtyp' value='<?php echo $selEditPrint['exp_typ']; ?>' class="required form-control" style="width:100%" ></TD>
    </TR>
    <TR>
    <TD>GMC No.</TD><TD><INPUT type="text" id="gmcno" name="gmcno" class="form-control" value='<?php echo $selEditPrint['exp_gmcno'];?>' /></TD>
    </TR>
    <TR>
  <TD>Expert Interest:</TD><TD style="padding:5px;"><INPUT type='text' id="orginter" name='orginter' value='<?php echo $selEditPrint['exp_insterest']; ?>' class="form-control" style="width:100%" ></TD>
    </TR>
<tr>
<TD>Postcode</TD><TD style="padding:5px;"><input style="width:50%;" type="text" name="cpc" id="cpc" value='<?php echo $selEditPrint['exp_pcode']; ?>'  class="required form-control"/></TD>
</tr>
<tr>
<TD>Address Line 1</TD><TD style="padding:5px;"><INPUT type='text' id="ca1" name='ca1' value="<?php echo $selEditPrint['exp_address1']; ?>" class="required form-control"></TD>
</tr>
<tr>
<TD>Address Line 2</TD><TD style="padding:5px;"><input type="text" id="ca2" name="ca2" value='<?php echo $selEditPrint['exp_address2']; ?>' class="form-control" /></td>
</tr>
<tr>
<td>City</td><td style="padding:5px;" ><input type="text" id="cty" name="cty" class="form-control" value="<?php echo $selEditPrint['exp_address2']; ?>"/></td>
</tr>
<tr>
<td>Email</td><td style="padding:5px;" ><input type="text" id="eml" name="eml" value='<?php echo $selEditPrint['exp_email']; ?>' class="form-control" /></td>
</tr>
<tr>
<td>Contact No.</td><td style="padding:5px;" ><input type="text" id="cotel" name="cotel" value="<?php echo $selEditPrint['exp_number']; ?>" class="form-control" /></td>
</tr>
<td>Appointments/Hour</td><td style="padding:5px;"><select id="appsperhr" name="appsperhr" ><option value="0" >0</option><option value='2' <?php if($selEditPrint['exp_AppHours']=='2'){echo "selected"; } ?> >2</option><option value='4' <?php if($selEditPrint['exp_AppHours']=='4'){echo "selected"; } ?> >4</option><option <?php if($selEditPrint['exp_AppHours']=='6'){echo "selected"; } ?> >6</option></select></td>
<tr>
  <?php if($selEditPrint['exp_cv']!='') {
    echo "<td>CV Details:<td>Uploaded/Available</td>";
    } ?>
</tr>
<tr>
  <td>CV Details:<span id="flemsg" name="flemsg"></span></td><td><input type="file" id="cvfile" name="cvfile" accept="application/msword, application/pdf" /></td>
</tr>
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