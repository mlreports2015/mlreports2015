<?php 

//session_start();

include 'includes/dcon.php';
include 'includes/inc.php';

//$_SESSION['id'];




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML DOCTORS PORTAL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg);background-size:cover;">
<div style="background-color:rgba(255,255,255,0.8);width:100%;color:#368ccc;height:1600px;">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<div style="width:97%;height:650px;border-radius:7px;color:#368ccc;" align='center'>

	<!--<div align='center' style="position:relative;top:160px;width:80%;height:280px;border:1px solid #777;border-radius:6px;background-color:rgba(54,140,204,0.3);box-shadow:7px 5px 5px #888;">-->
    <div align='center' style="position:relative;top:160px;width:80%;height:280px;border:1px solid #777;border-radius:6px;background-color:rgba(8,82,126,0.3);box-shadow:7px 5px 5px #888;">
   
    <div style="float:left;width:40%;padding:10px;color:#a616c5;" align="justify">
        <h3>ML Doctors Portal</h3>

        <p> ML Doctors Portal has been setup to provide solicitors and referrers a
            quick and simple method to view up to date information on cases and to
            make appointments with medical experts.<br/><br/>

            You must be registered with ML Doctors Portal to view upto date
            information on your cases and to instruct us online.<br/><br/> Please
            <a href="register.php" title="register" style="text-decoration:none;color:rgba(218,6,6,0.7)">click here</a> to register</p>


    </div>
    <!--<table align='center' width='55%' cellpadding="10px" style="float:left;font-family:Arial, Helvetica, sans-serif;size:14px;color:#368ccc;">-->
    <table align='center' width='55%' cellpadding="10px" style="float:left;font-family:Arial, Helvetica, sans-serif;size:14px;color:#a616c5;">
    <form method="post" action="./process/loginP.php">
      <tr>
      <td colspan='2' align='center' style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px;font-weight:bold;color:rgba(218,6,6,0.7);"><h2>PORTAL LOGIN</h2></td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
     <tr>
     <td align="right"><b>USERNAME</b>&nbsp;&nbsp;</td><td><input type="text" id="usrid" name="usrid" class="form-control" title='username here' style="width:80%;" placeholder="email address"/></td>
     </tr>
     <tr>
     <td>&nbsp;</td>
     </tr>
     <tr>
     <td align="right"><b>PASSWORD</b>&nbsp;&nbsp;</td><td><input type="password" id="psswrd" name="psswrd" class="form-control" title='password here' style="width:80%" placeholder="your choosen password" /></td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
      <tr>
      <td>&nbsp;</td></td><td align="left">Not Registered; <a href="register.php" style="text-decoration:none;color:rgba(218,6,6,0.7)">Register now</a>  <a href="http://www.mldoctors.com" style="float:right;text-decoration:none;color:rgba(218,6,6,0.7)">Back To Home</a> </td>
      </tr>
      <tr>
      <td colspan='2' align='center'><input type="submit" id="sub1" name="sub1" value="LOGIN NOW" class="btn btn-info" style="border-radius:6px;font-weight:bold" /></td>
      </tr>
    
    </form>
    </table>
    </div>


</div>

</div>
</body>
<script language="javascript" src="scripts/datetimepicker.js" type="text/javascript" >

</script>

<script language="javascript">


</script>
</body>
</html>

