<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php

include "../dcon.php";

$section = $_GET['section'];
$cid = $_GET['cid'];
?>

<script language="javascript">
function XMLQuery(typ,comms,cid)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
     alert(xmlhttp.responseText);
    }
  }
xmlhttp.open("POST","previewUpdate.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("typ="+typ+"&comm="+comms+"&cid="+cid);

}

function checkinput(){


	alert("checkinput");
	var chkInp = document.getElementsByTagName('input');
	var chkInpNo = chkInp.length;
	
	for(var i=0; i < chkInpNo; i++){
	
	
		if(chkInp.item(i).getAttribute('edited') == 'true'){
	
		 alert(chkInp.item(i).value + ' '+chkInp.item(i).getAttribute('id'));
		 // if(checks.item(i).getAttribute('id')=='inj'){
		    alert(chkInp.item(i).getAttribute('id'));
		// AJAX each edited volume/section to a previewEditUpdate
				XMLQuery(chkInp.item(i).getAttribute('id'),chkInp.item(i).value,document.getElementById('cid').value); 
    		//}
	
     	}
		
		
	}
	
	
	

	
}

function checkit(){

  
  checkinput();
  
  var checks = document.getElementsByTagName('div')
  var checksNo = checks.length;
  
  //alert(checksNo);
  
  //alert(document.getElementById('progno').getAttribute('edited'));
  
  for(var i=0; i < checksNo; i++){
	
	if(checks.item(i).getAttribute('edited') == 'true'){
	
		alert(checks.item(i).innerHTML + ' '+checks.item(i).getAttribute('id'));
		 // if(checks.item(i).getAttribute('id')=='inj'){
		    alert(checks.item(i).getAttribute('id'));
		// AJAX each edited volume/section to a previewEditUpdate
				XMLQuery(checks.item(i).getAttribute('id'),checks.item(i).innerHTML); 
    		//}
	
	}
	
	
  }

}

function  nextsect(no,cid){
		
	var no = (parseInt(no) + 1);
	if(no <=5){
  	window.location = "./previewTest.php?section="+no+"&cid="+cid;
	}else{
	parent.document.location ="../repgen2.php";	
	}
}

function  prevsect(no,cid){
		
	var no = (parseInt(no) - 1);
	if(no >= 1){
  	window.location = "./previewTest.php?section="+no+"&cid="+cid;
	}
	
}


function finished(){

parent.document.location ="../repgen2.php?cid=<? echo $cid; ?>&id=<? echo rand(0,1000); ?>";	
	
}

</script>


<div style="width:100%;height:25px;">
<?php 
echo "<input type='hidden' id='cid' name='cid' value='".$cid."'/>";
if($_GET['section'] >1){ 
?>
	<input type="button" id="prev" value="<< previous" style="border-radius:6px;border:none;float:left;font-size:15px;" onclick="prevsect('<?php echo $_GET['section']; ?>','<?php echo $cid; ?>')"/>

<?php } ?>
<input type="button" id="nxt" value="next >>" style="border-radius:6px;border:none;float:right;font-size:15px;" onclick="nextsect('<?php echo $_GET['section']; ?>','<?php echo $cid; ?>')"/>
</div>

<?php 

$sqlclaimant = "select * from claimant where cid='1702'";
$sqlclaimantRes = mysql_query($sqlclaimant);
$sqlClaimantPrint = mysql_fetch_array($sqlclaimantRes);


$sqlacc="select accid from `accid` where id='$cid'";
$sqlaccRes = mysql_query($sqlacc);
$sqlaccPrint=mysql_fetch_array($sqlaccRes);


$sqleff = "select prob, msg from eff where cid='$cid'";
$sqleffRes = mysql_query($sqleff);

$sqlpmh = "select hist from pmh where id='$cid'";
$sqlpmhRes = mysql_query($sqlpmh);


//var_dump($sqleffRes);
$sqltreat = "select msg from treat where cid='$cid' and stat = 'i'";
$sqltreatRes = mysql_query($sqltreat);

$sqlltreat = "select msg from treat where cid='$cid' and stat = 'l'";
$sqlltreatRes = mysql_query($sqlltreat);

$sqljob="select jrest, ltef from job where id='$cid'";
$sqljobRes = mysql_query($sqljob);
$sqljobPrint = mysql_fetch_array($sqljobRes);


$sqlemp="select msg1 from `emp` where id='$cid'";
$sqlempRes = mysql_query($sqlemp);

$sqlprogno = "select prob, prog from prog where id='$cid'";
$sqlprogRes = mysql_query($sqlprogno);

$sqlfcomm = "select msg from final_comms where cid='$cid'";
$sqlfCommRes = mysql_query($sqlfcomm);

$sqlhcirc = "select msg from hcirc where id='$cid'";
$sqlhcircRes = mysql_query($sqlhcirc);




$doc = new DOMDocument(); 

if($section == "1")
{

$strSectora = file_get_contents("sectorA.html");

$strSectora = str_replace("[cdb]",date('d-m-Y',strtotime($sqlClaimantPrint['cdb'])),$strSectora);

$strSectora = str_replace("[job]", $sqlClaimantPrint['emp'], $strSectora);

$strSectora = str_replace("[cda]", date('d-m-Y', strtotime($sqlClaimantPrint['cda'])), $strSectora);

$strSectora = str_replace("[cde]", date('d-m-Y', strtotime($sqlClaimantPrint['cde'])), $strSectora);

echo $strSectora;

}
else if($section =="2")
{

//$doc->loadHTML($strSectora);

//echo $doc->saveHTML();

$strSectorb = file_get_contents("sectorB.html");


$strSectorb=str_replace("[acc]",$sqlaccPrint[0],$strSectorb);


while($sqleffResPrint=mysql_fetch_array($sqleffRes)){

$effects.= "<br/><strong><u>".ucwords($sqleffResPrint['prob'])."</u></strong>";
$effects.="<br/>".$sqleffResPrint['msg']."<br/>";

}

$strSectorb = str_replace("[inj]",$effects,$strSectorb);
$itreat='';

$strSectorb = str_replace("[lsympt]",$effects,$strSectorb);

while($sqltreatResPrint=mysql_fetch_array($sqltreatRes)){

$itreat.="<br/>".$sqltreatResPrint['msg']."<br/>";

}

//echo $treat; 

$strSectorb = str_replace("[itreat]",$itreat,$strSectorb);

$ltreat='';

while($sqlltreatResPrint=mysql_fetch_array($sqlltreatRes)){

$ltreat.="<br/>".$sqlltreatResPrint['msg']."<br/>";

}

$strSectorb = str_replace("[ltreat]",$ltreat,$strSectorb);


$doc->loadHTML($strSectorb);
					  
echo $doc->saveHTML();

echo "<br/>";

}
else if($section =="3")
{

$strSectorc = file_get_contents("sectorC.html");


while($sqlempResPrint=mysql_fetch_array($sqlempRes)){

$employ=$sqlempResPrint[0]."<br/>".$employ;

}

$strSectorc = str_replace("[emp]",$employ,$strSectorc);
//$doc->loadHTMLFile("sectorC.html");

$job = $sqljobPrint['jrest'];
$job = $job."<br>".$sqljobPrint['ltef'];

$strSectorc = str_replace("[job]",$job,$strSectorc);


while($sqlhcircPrint = mysql_fetch_array($sqlhcircRes)){

	$hcirc=$sqlhcircPrint[0]." ";

}

$strSectorc = str_replace("[hcirc]",$hcirc,$strSectorc);

$doc->loadHTML($strSectorc);

echo $doc->saveHTML();
echo "<br/>";

}
else if($section =="4")
{

$strSectord = file_get_contents("sectorD.html");

while($sqlpmhPrint = mysql_fetch_array($sqlpmhRes)){
	 
	$pmh = $sqlpmhPrint[0]." ".$pmh;
	
}

$strSectord = str_replace("[pmh]",$pmh,$strSectord);


while($sqlprognoPrint = mysql_fetch_array($sqlprogRes)){

		if($progno==""){
		
		$progno = "<b><u>".$sqlprognoPrint['prob']."</u></b>";
		$progno = $progno."<br/>".$sqlprognoPrint['prog']."<br/>";	
		
		}else{
			
		$progno = $progno."<b><u>".$sqlprognoPrint['prob']."</u></b>";
		$progno = $progno."<br/>".$sqlprognoPrint['prog']."<br/>";	
		
		}
}



if(mysql_num_rows($sqlfCommRes)>=1){


	$progno = $progno."<b><u>Final Comments</u></b>";
	while($sqlfinalprint = mysql_fetch_array($sqlfCommRes)){
	
		
		$progno = $progno."<br/>".$sqlfinalprint['msg']."";
		
	}

}
//print_r($progno);

$strSectord = str_replace("[progno]",$progno,$strSectord);

$doc->loadHTML($strSectord);

echo $doc->saveHTML();

}


?>
<div style="width:100%;height:30px;">
<input type="button" value="Save" onclick="checkit()" style="border-radius:6px;border:0px;font-size:15px;"/>
<input type="button" value="Finish" onclick="finished()" style="border-radius:6px;border:0px;font-size:15px;"/>
<input type="button" value="Next >>" onclick="nextsect('<?php echo $_GET['section']; ?>','<?php echo $cid; ?>');" style="border-radius:6px;border:0px;font-size:15px;float:right;"/>
</div>
</body>
</html>