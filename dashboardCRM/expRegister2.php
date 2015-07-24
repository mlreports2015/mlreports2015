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
<title>ML DOCTORS PORTAL - REGISTER</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="skins/red-blue/blue.css" id="colors" />

    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.color.js"></script>
    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="js/jquery-easing-1.3.js" type="text/javascript"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg);background-size:cover;">

<style>

    .form-control {
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-control:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
    }
    .form-control::-moz-placeholder {
        color: #999;
        opacity: 1;
    }
    .form-control:-ms-input-placeholder {
        color: #999;
    }
    .form-control::-webkit-input-placeholder {
        color: #999;
    }
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: not-allowed;
        background-color: #eee;
        opacity: 1;
    }
    textarea.form-control {
        height: auto;
    }
    input[type="search"] {
        -webkit-appearance: none;
    }

    select[multiple].input-sm {
        height: auto;
    }
    .form-group-sm .form-control {
        height: 30px;
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }
    select.form-group-sm .form-control {
        height: 30px;
        line-height: 30px;
    }



    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .btn:focus,
    .btn:active:focus,
    .btn.active:focus,
    .btn.focus,
    .btn:active.focus,
    .btn.active.focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;
    }
    .btn:hover,
    .btn:focus,
    .btn.focus {
        color: #333;
        text-decoration: none;
    }
    .btn:active,
    .btn.active {
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    }
    .btn.disabled,
    .btn[disabled],
    fieldset[disabled] .btn {
        pointer-events: none;
        cursor: not-allowed;
        filter: alpha(opacity=65);
        -webkit-box-shadow: none;
        box-shadow: none;
        opacity: .65;
    }



    }
    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-success:hover,
    .btn-success:focus,
    .btn-success.focus,
    .btn-success:active,
    .btn-success.active,
    .open > .dropdown-toggle.btn-success {
        color: #fff;
        background-color: #449d44;
        border-color: #398439;
    }
    .btn-success:active,
    .btn-success.active,
    .open > .dropdown-toggle.btn-success {
        background-image: none;
    }

    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
        padding:10px;
    }
    .btn-info:hover,
    .btn-info:focus,
    .btn-info.focus,
    .btn-info:active,
    .btn-info.active,
    .open > .dropdown-toggle.btn-info {
        color: #fff;
        background-color: #31b0d5;
        border-color: #269abc;
    }
    .btn-info:active,
    .btn-info.active,
    .open > .dropdown-toggle.btn-info {
        background-image: none;
    }
    .btn-info.disabled,
    .btn-info[disabled],
    fieldset[disabled] .btn-info,
    .btn-info.disabled:hover,
    .btn-info[disabled]:hover,
    fieldset[disabled] .btn-info:hover,
    .btn-info.disabled:focus,
    .btn-info[disabled]:focus,
    fieldset[disabled] .btn-info:focus,
    .btn-info.disabled.focus,
    .btn-info[disabled].focus,
    fieldset[disabled] .btn-info.focus,
    .btn-info.disabled:active,
    .btn-info[disabled]:active,
    fieldset[disabled] .btn-info:active,
    .btn-info.disabled.active,
    .btn-info[disabled].active,
    fieldset[disabled] .btn-info.active {
        background-color: #5bc0de;
        border-color: #46b8da;
    }




</style>


<script language="javascript">

$(document).ready(function(){
						   
						   
						   
			$("#sub1").click(function(){



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

				
				if($("#orgmail").val()==""){
				
				
				 	$("#message").html('extra information required');
				
				
				}else{
				
					$("#regfrm").submit();
					
				}
				
			})
		

			$("#orgtyp").change(function(){
										 
				if($("#orgtyp").val()=='exprt'){
					
				
				$("#exprttyp").show();
                $("#orgnm").addClass("form-control");
                $("#orgnmtr").hide();
				
				}else if($("#orgtyp").val()=='solic'){

                 $("#exprttyp").hide();

                }else if($("#orgtyp").val()=='refers'){

                    $("#exprttyp").hide();

                }
				
			});


    $("#pass2").blur(function(){

            var passvalid = true;
            if($("#pass2").val()!=$("#pass1").val()){

                   passvalid=false;

            }

        alert(passvalid);

    });




});



</script>


    <div style="height:1000px;">
        <header id="header" class="container-fluid main" style="padding:0px;height:1000px;">
            <div class="header-bg">
                <div class="container" style="">
                    <div class="decoration dec-left visible-desktop"></div>
                    <div class="decoration dec-right visible-desktop"></div>
                    <div>
                        <div id="logo" style="width:420px;float:left;"><a href="index.html" class="logo" alt="ML Doctors HTML"></a><!-- <ul style="float:right;list-style:none;width:260px;padding:5px;font-size:16px;color:#c5bcbc;font-style:italic;"><li>A commitment to legal community</li></ul>--> </div>
                        <div class="span9" style="float:left;width:500px;">
                            <!-- Social Icons -->
                            <ul class="social-icons">
                                <li class="facebook"><a href="#">Facebook</a></li>
                                <li class="twitter"><a href="#">Twitter</a></li>
                                <li class="linkedin"><a href="#">LinkedIn</a></li>
                                <li class="googleplus"><a href="#">GooglePlus</a></li>
                                <li class="youtube"><a href="#">youtube</a></li>
                                <li class="rss"><a href="#">Rss</a></li>
                            </ul>
                            <!-- Contact Details -->
                            <div class="contact-details visible-desktop">
                                <ul style="text-align:right">
                                    <li style="display:inline;">Call us: <a href="#" class="tel">0161 839 3703</a></li>
                                    <li style="display:inline;">Mail us: <a href="mailto:your@domain.com">info@mldoctors.com</a></li>
                                </ul>
                            </div>
                            <!-- Search Form -->
                            <div class="search-form">
                                <form method="get" action="#">
                                    <input type="text" value="Search" class="search-text-box"/>
                                    <input type="submit" value="" class="search-text-submit"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span12">
                            <div class="select-menu hidden-desktop">
                                <select id="selectMenu">
                                    <option selected value="index.html">Home</option>
                                    <option value="About_us.html">About_us</option>
                                    <option value="Services.html">Services</option>
                                    <option value="EReporting.html">ML-Reports</option>
                                    <option value="">JOIN US</option>
                                    <option value="Pages_Contact.html">Contact us</option>
                                </select>
                            </div>
                            <ul id="menu" class="visible-desktop">
                                <li>
                                    <a href="../index.html">HOME</a>
                                    <ul>

                                    </ul>
                                </li>
                                <li><a href="../About_us.html">ABOUT US</a></li>
                                <li><a href="../Services.html">SERVICES</a></li>
                                <li>
                                    <a href="http://expertlist.mldoctors.com/index.php">Experts</a>
                                    <ul>

                                    </ul>
                                </li>
                                <li>
                                    <a href="../EReportingService.html">ML-Reporting</a>
                                    <ul>

                                    </ul>
                                </li>
                                <li>
                                    <a href="http://www.mldoctors.com/mlportal/register.php">JOIN US</a>
                                    <ul>

                                    </ul>
                                </li>
                                <li>
                                    <a href="http://www.mldoctors.com/mlportal">INSTRUCT US </a>
                                    <ul>

                                    </ul>
                                </li>
                                <li><a href="../Pages_Contact.html">CONTACT US</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="span12 main-slider" style="background:none;background-color:#ffffff;">

                                <div align='center' style="position:relative;width:98%;padding:10px;background-color:rgba(54,140,204,0.5);">
                                    <br/>

                                    <table align='center' width='97%' cellpadding="10px" style="font-family:Arial, Helvetica, sans-serif;font-size:15px;font-weight:bold;color:#FFF;">
                                        <form id="regfrm" name="regfrm" method="post" action="./process/registerP.php">
                                            <tr>
                                                <td colspan='2' align='center' style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:22px;font-weight:bold;color:rgba(218,6,6,0.7);">PORTAL REGISTRATION FORM</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2' align="center">&nbsp;<span id='message' name='message' style='color:#F00;'></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2' style="font-weight:normal;"><p>Please Register with us today, to manage appointments and cases. <br/> Help us with our commitment to the legal community.</p></td>
                                            </tr>

                                            <tr>
                                                <td>Contact Name</td>
                                                <td><input type="text" id="orgcont" name="orgcont" class="required form-control" style="width:80%;margin-top:10px;" placeholder="main contact" /></td>
                                            </tr>

                                            <tr>
                                                <td>Organisation Type</td><td>
                                                    <select id="orgtyp" name="orgtyp" class="form-control" style="padding:8px;width:80%" ><option value="solic">Solicitors</option><option value="refers">Referrer</option><option value="exprt" selected>Expert</option></select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Speciality</td>
                                                <td>

                                                    <select id="xprtype" name="xprtype" class="form-control" style="padding:8px;width:80%"><option value="">..select..</option><option value="GP" selected >General Practionier</option><option value="ortho">Orthopaedic</option><option value="psychi">Psychiatrist</option></select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td> Address 1</td><td><input type="text" id="addy1" name="addy1" class="required form-control" style="width:80%;"  /></td>
                                            </tr>
                                            <tr>
                                                <td> Address 2</td><td><input type="text" id="addy2" name="addy2" class="form-control" style="width:80%;" placeholder = "city"/></td>
                                            </tr>
                                            <tr>
                                                <td> Postcode</td><td><input type="text" id="orgpcode" name="orgpcode" class="required form-control" style="width:80%;" placeholder="postcode" /></td>
                                            </tr>
                                            <tr>
                                                <td> Contact Telephone</td><td><input type="text" id="orgtele" name="orgtele" class="required form-control" style="width:80%" placeholder="primary telephone no" /></td>
                                            </tr>
                                            <tr>
                                                <td>Contact Email </td><td><input type="text" id="orgmail" name="orgmail" class="required form-control"  style="width:80%" placeholder="primary email" /></td>
                                            </tr>
                                            <tr>
                                                <td>Password</td><td><input type="text" id="pass1" name="pass1" class="form-control" style="width:80%" /></td>
                                            </tr>
                                            <tr>
                                                <td>Confirm Password</td><td><input type="text" id="pass2" name="pass2" class="form-control" style="width:80%" placeholder="password confirmation" /></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2' align='center'><input type="button" id="sub1" name="sub1" value="REGISTER NOW" class="btn btn-info" style="border-radius:6px;font-weight:bold" /></td>
                                            </tr>

                                        </form>
                                    </table>
                                </div>



                        </div>

                    </div>
                </div>
            </div>
    </div>
    </header>
    <section id="content" class="container-fluid">

    </section>
</div>
<footer id="footer" class="container-fluid">
    <div class="container">
        <section class="row">
            <article class="span3">
                <h3 class="title">Address</h3>
                <p>Samuel House, St Chads Street<br/>
                    Manchester, M8 8QA <br/>
                    Phone: 0161 839 3703 <br/>
                    Fax: 0161 839 3704 </p>
                <div class="link">
                    <a href="http://www.mldoctors.com">www.mldoctors.com</a><br>
                    Email: <a href="mailto:info@mldoctors.com<">info@mldoctors.com</a>
                </div>
                <ul class="social-icons">
                    <li class="facebook"><a href="#">Facebook</a></li>
                    <li class="twitter"><a href="#">Twitter</a></li>
                    <li class="linkedin"><a href="#">LinkedIn</a></li>
                    <li class="googleplus"><a href="#">GooglePlus</a></li>
                    <li class="youtube"><a href="#">youtube</a></li>
                    <li class="rss"><a href="#">Rss</a></li>
                </ul>
            </article>
            <article class="span3 navblock">

            </article>
            <article class="span3 navblock">

            </article>
            <article class="span3">
                <div class="slogo"></div>
                <p>To provide the legal community with the best direct, personalized and professional Medical Legal Expert Witness services. </p>
            </article>
        </section>
        <div class="back-top up"><a href="#top"></a></div>
    </div>
</footer>
<footer class="footer-line container-fluid">
    <div class="container" align="center">
        Reg. No. 06848520, Reg. Office: Samuel House, St Chads Street, Manchester, M8 8QA, VAT No. 971 4778 79
    </div>
</footer>


</body>
</html>

