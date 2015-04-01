<?php
mysql_connect("localhost", "ikazmico_root", "phantom") or die(mysql_error());
mysql_select_db("ikazmico_mms") or die(mysql_error());

function fgen($x)
{
	$f="";
	if (strcmp($x,"PayExp")==0)
	{
		$f="F_Templates/PaymenttoExpert.txt";
	}
	else if (strcmp($x,"InstExp")==0)
	{
		$f="F_Templates/InstructionLetter.txt";
	}
	else if (strcmp($x,"CApp"))
	{
		$f="F_Templates/A2C.txt";
	}
/*@@@@to-do@@@@@@*/
//read the contents of the file in a variable as string and then replace the line breaks with <br>
	$content = file_get_contents("$f",1);
	
	$content=str_replace("#us#","<b>1st Medical Services</b>",$content);
	
	echo "<SCRIPT language='JavaScript' type='text/javascript'>alert($content);</script>";
	
	return nl2br($content);
	//replace £" " with £amount to be paid to sol for this case
	//autoemail this doc using the email function
	//put a link to the doc on the cdetails page
}

function eml($att,$to,$sub)
{
	$from="1st Medical Services";
	@mail($to, $sub, $att, "From: $from\nContent-Type: text/html; charset=iso-8859-1");
}

?>
