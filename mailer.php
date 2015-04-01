<?php
include 'emailer.php';

//expmail('Ali Kazmi', 'alikazmi.2040@gmail.com');

function expMail($to_name, $to_email)
{
	$str=file_get_contents("expert.txt", 1);
	
	$str=str_replace('|exp|', $to_name, $str);
	$str=str_replace('|un|', $to_name, $str);
	
	sendmail ("no-reply", "no-reply@mlreports.com", $to_name, $to_email, "Thankyou for Signing Up", '', $str, "");
}


function exp_s_Mail()
{
	
}


function solMail()
{
	
}


function sol_s_Mail()
{
	
}


function ageMail()
{
	
}


function age_s_Mail()
{
	
}


?>
	

