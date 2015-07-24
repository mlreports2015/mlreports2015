<?php



//define("SMTP", array("host"=>"host266.hostmonster.com","port"=>"26","auth"=>"true","username"=>"admin@mldoc.com", "password"=>"BismiLlah786"));

$smtpinfo["host"] = "ssl://smtp.123-reg.co.uk";
$smtpinfo["port"] = "465";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "admin@britanniamedicare.co.uk";
$smtpinfo["password"] = "MeLisa_W97M";

define("REGISTRATIONMAIL","danradd.2010@gmail.com");
define("CONAME","Britanniamedicare");

function encrypt($value)
{
	if ($value==""){
		
	return "";	
	}else{
	
	$b64=base64_encode($value);
	
	$rB64=strrev($b64);
	
	$len=strlen($rB64);
	
	$tF=$rB64[0];
	$tM=$rB64[$len/2];
	$tL=$rB64[$len-1];
	
	$rB64[0]=$tM;
	$rB64[$len/2]=$tL;
	$rB64[$len-1]=$tF;
	
	$RrB64=$rB64;
    
	return strrev($RrB64);
	
	}
	
}


function decrypt($value)
{
     if (strcmp($value,"")==0)
	 {	
		return "";
	 }
	 else
	 {

    $b642=strrev($value);
	
	$len=strlen($b642);
	
	$tF=$b642[0];
	$tM=$b642[$len/2];
	$tL=$b642[$len-1];
	
	$b642[$len-1]=$tM;
	$b642[$len/2]=$tF;
	$b642[0]=$tL;

	$b642=strrev($b642);
	
	$orig=base64_decode($b642);
	
	return $orig;
	 }
	
}


function red($loc)
{
	echo "<script type='text/javascript' language='javascript'>window.location='$loc';</script>";
}


function alert($msg)
{
	echo "<script type='text/javascript' language='javascript'>alert('$msg');</script>";
}

function pLocation($loc)
{
	echo "<script type='text/javascript' language='javascript'>
		window.parent.location.href='$loc';
	</script>";
}

function dateH($dt)
{
	return date('d-m-Y', strtotime($dt));
}

function dateDB($dt)
{
	return date('Y-m-d', strtotime($dt));
}


function numberToRoman($num) 
 {
     // Make sure that we only use the integer portion of the value
     $n = intval($num);
     $result = '';
 
     // Declare a lookup array that we will use to traverse the number:
     $lookup = array('m' => 1000, 'cm' => 900, 'd' => 500, 'cd' => 400,
     'c' => 100, 'xc' => 90, 'l' => 50, 'xl' => 40,
     'x' => 10, 'ix' => 9, 'v' => 5, 'iv' => 4, 'i' => 1);
 
     foreach ($lookup as $roman => $value) 
     {
         // Determine the number of matches
         $matches = intval($n / $value);
 
         // Store that many characters
         $result .= str_repeat($roman, $matches);
 
         // Substract that from the number
         $n = $n % $value;
     }
 
     // The Roman numeral should be built, return it
     return $result;
 }
?>