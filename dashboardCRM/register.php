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
<title>Britannia Medicare - REGISTER</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg);background-size:cover;">

<script language="javascript">

$(document).ready(function(){
						   
						   
						   
			$("#sub1").click(function(){

				var isFormValid = true;
				
                $(".required").each(function(){
                    if ($.trim($(this).val()).length == 0) {
                        //$(this).addClass("highlight");
                        isFormValid = false;
                        $(this)[0].setAttribute('placeholder', 'required');


                    }
                    else
                    {
                        ///$(this).removeClass("highlight");
                    }
                });

			

				//if($("#orgmail").val()=="" || $("#orgnm").val()==""){
				if(isFormValid == false){
				
				 	$("#message").html('extra information required');
				
				
				}else{
				
					$("#regfrm").submit();
					
				}
				
			})
		

			$("#orgtyp").change(function(){
										 
				if($("#orgtyp").val()=='exprt'){
					
				
				$("#exprttyp").show();
				$("#orgnamerow").hide();
				
				
				}else if($("#orgtyp").val()=='solic'){

                 $("#exprttyp").hide();
				 $("#orgnamerow").show();

                }else if($("#orgtyp").val()=='refers'){

                    $("#exprttyp").hide();
					$("#orgnamerow").show();

                }
				
			});
						   


});

</script>

<div style="background-color:rgba(255,255,255,0.7);width:100%;height:1600px;">




<div style="width:97%;height:650px;border-radius:7px" align='center'>

	<!-- <div align='center' style="position:relative;top:120px;width:50%;padding:10px;border:1px solid #777;border-radius:6px;background-color:rgba(54,140,204,0.3);box-shadow:7px 5px 5px #888;">-->
   <div align='center' style="position:relative;top:120px;width:50%;padding:10px;border:1px solid #777;border-radius:6px;background-color:rgba(8,82,126,0.3);box-shadow:7px 5px 5px #888;">
    <br/>
    
    <table align='center' width='97%' cellpadding="10px" style="font-family:Arial, Helvetica, sans-serif;size:14px;color:#a616c5;">
    <form id="regfrm" name="regfrm" method="post" action="./process/registerP.php">
      <tr>
      <td colspan='2' align='center' style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px;font-weight:bold;color:rgba(218,6,6,0.7);"> REGISTRATION FORM</td>
      </tr>
      <tr>
      <td colspan='2' align="center">&nbsp;<span id='message' name='message' style='color:#F00;'></span></td>
      </tr>
      <tr>
      <td colspan='2'><p>Please Register with us today, to gain access to up to date information on your appointments and cases and even setup appointments</p>.</p></td>
      </tr>
      <tr>
      <td>Organisation Type</td><td><select id="orgtyp" name="orgtyp" class="form-control" ><option value="solic">Solicitors</option><option value="agent">Agency</option><option value="refers">Referrer</option><option value="exprt">Expert</option></select>
      </tr>
      <tr id='orgnamerow' name='orgnamerow' >
      <td>Organisation Name</td><td><input type="text" id="orgnm" name="orgnm" class="form-control" style="width:80%;" placeholder="company name"/></td>
      </tr>
      <tr id='exprttyp' name='exprttyp' style="display:none;">
      <td>Speciality</td><td>
      <select id="xprtype" name="xprtype" class="form-control"><option value="">..select..</option><option value="GP">General Practionier</option><option value="ortho">Orthopaedic</option><option value="psychi">Psychiatrist</option></td>
      </tr>  
      <tr>
      <td>Contact Name</td><td><input type="text" id="orgcont" name="orgcont" class="form-control" style="width:80%;" placeholder="main contact" /></td>
      </tr>
      <tr>
      <td>Organisation Address 1</td><td><input type="text" id="addy1" name="addy1" class="form-control" style="width:80%;"  /></td>
      </tr>
       <tr>
      <td>Organisation Address 2</td><td><input type="text" id="addy2" name="addy2" class="form-control" style="width:80%;" /></td>
      </tr>
      <tr>
      <td>Organisation Postcode</td><td><input type="text" id="orgpcode" name="orgpcode" class="form-control" style="width:80%;" placeholder="postcode" /></td>
      </tr>
      <tr>
      <td>Contact Telephone</td><td><input type="text" id="orgtele" name="orgtele" class="form-control" style="width:80%" placeholder="primary telephone no" /></td>
      </tr>
	  <tr>
      <td>Contact Email </td><td><input type="text" id="orgmail" name="orgmail" class="form-control" style="width:80%" placeholder="primary email" /></td>
      </tr>
      <tr>
       <td>Password</td><td><input type="password" id="pass1" name="pass1" class="form-control" style="width:80%"/></td>
      </tr>
        <tr>
            <td>Confirm Password</td><td><input type="password" id="pass2" name="pass2" class="form-control" style="width:80%" /></td>
        </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
      <tr>
      
      <td colspan='2' align='center'><input type="button" id="back" name="back" value="GO BACK" class="btn btn-info" style="border-radius:6px;font-weight:bold" onclick="document.location='index.php'" />&nbsp;&nbsp;<input type="button" id="sub1" name="sub1" value="REGISTER NOW" class="btn btn-info" style="border-radius:6px;font-weight:bold" /></td>
      </tr>
    
    </form>
    </table>
    </div>


</div>

</div>
</body>

<script language="javascript">


</script>
</body>
</html>

