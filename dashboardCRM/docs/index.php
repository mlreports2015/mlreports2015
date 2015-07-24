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
<title>ML PORTAL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg); background-size:cover;">
<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1600px;">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


<div style="width:97%;height:650px;border-radius:7px" align='center'>

	<div align='center' style="position:relative;top:160px;width:450px;height:270px;border:1px solid #777;border-radius:6px;background-color:rgba(215,215,215,0.4);box-shadow:7px 5px 5px #888;">
    <br/>
    <table align='center' width='97%' cellpadding="10px" style="font-family:Arial, Helvetica, sans-serif;size:14px;color:#000;">
    <form method="post" action="./process/loginP.php">
      <tr>
      <td colspan='2' align='center' style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px;font-weight:bold;color:#000;">PORTAL LOGIN</td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
     <tr>
     <td align="right">USERNAME&nbsp;&nbsp;</td><td><input type="text" id="usrid" name="usrid" class="form-control" title='username here' style="width:80%;"/></td>
     </tr>
     <tr>
     <td>&nbsp;</td>
     </tr>
     <tr>
     <td align="right">PASSWORD&nbsp;&nbsp;</td><td><input type="password" id="psswrd" name="psswrd" class="form-control" title='password here' style="width:80%" /></td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
      <tr>
      <td colspan='1'>Not Registered; <br/><a href="register.php" style="text-decoration:none;">Register now</a>&nbsp;&nbsp;</td>
      <td align="right"><a href="http://www.mldoctors.com" style="text-decoration:none;">Return to Home</a></td>
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

