<?php 

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice Summ</title>
</head>
<body>
<?php 


include 'includes/dcon.php';
include 'includes/inc.php';
include 'process/databaseClass.php';

//hashed the remote address and check valid remote host
/*
if(!($_SESSION['usr']) && !($_SESSION['remote'])){
	
		pLocation('index.php');							  

}
*/

//if(crypt($_SERVER['REMOTE_ADDR'],$_SESSION['hashremote'])!=$_SESSION['hashremote']){	
	//pLocation('index.php');
//}

$companyId = $_GET['coId'];


$dbqueryn = new DatabaseClass();

$sumStatement = "Select deal_id,vouch_code, COUNT(*) as Quantity, SUM(order_price) as Totals FROM `order` WHERE not status='4' and comp_id = '".$companyId."' GROUP BY deal_id";
//echo $sumStatement;
$sumStatementRes = mysql_query($sumStatement);
//print_r($sumStatementRes);
//print_r($parameters);

//$statments = $dbqueryn->selectALL($tbl,$parameters);
//echo $statments;

$ordersnum = mysql_num_rows($sumStatementRes);

$orderspages = ceil($ordersnum / 20);


if($_GET['pgnum']){
$currpg = $_GET['pgnum'];
}else{
$currpg = 1;
}

if($currpg >1){
//$statements = $statements." LIMIT ".($currpg*20-20).", 20";	
}else{
//$statements = $statements." LIMIT 0, 20";
}

echo $statments;
//$orderstateres = mysql_query($statements);

?>
<div style="width:98%;font-family:Arial, Helvetica, sans-serif;">

<div style=";width:200px">
<?php
if(($currpg > 1) && ($currpg > $orderspages)){ echo "<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".($currpg-1)."' style='text-decoration:none;color:#666;font-size:13px;' >&lt;&lt;PREVIOUS PAGE</a>"; }
$counter = 0;
for($num=round($currpg/6);$num <= $orderspages;$num++){
if($num>0){
  echo "&nbsp;&nbsp;<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".$num."' style='text-decoration:none;color:#666;'>".$num."</a>";	
  $counter ++ ;
  if($counter == 6){
	break;  
  }
}

}

if(($orderspages >1) && ($currpg <=$orderspages)){ echo "&nbsp;&nbsp;<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".($currpg+1)."' style='text-decoration:none;color:#666;font-size:13px;' >NEXT PAGE&gt;&gt;</a>"; } ?>
</div>

<table width="98%" cellpadding="5px" cellspacing="0px" border='1' bordercolor="#CCCCCC">
<tr style="background-color:#ccc;font-family:Arial, Helvetica, sans-serif;font-weight:lighter;font-size:13px">
<th>Deal ID</th>
<th>Deal Name</th>
<th>Voucher ID</th>
<th>Product Name</th>
<th>Quantity</th>
<th>Total</th>
</tr>
<?php 
$price=0;
while($recordStat = mysql_fetch_array($sumStatementRes)){
	//print_r($recordStat);
	$fielders = array(array("deal"=>"deal_Id"),array("deal"=>"dealName"));
	$tbl = array("deal");
	$criteria = array("deal_Id" => $recordStat['deal_id']);
	//print_r($criteria);
	$statementsx = $dbqueryn->selectquery($fielders,$criteria,$tbl);
	//echo $statementsx;
    $dealData = mysql_fetch_array(mysql_query($statementsx));
	
	$price += $recordStat['Totals'];
	
echo "<tr style=\"font-family:Arial, Helvetica, sans-serif;font-weight:lighter;font-size:12px\">";

//echo "<td>".$recordStat['order_id']."</td>";

echo "<td><a href='invoiceDisp.php?coId=".$companyId."&deal=".$recordStat['deal_id']."' >".$recordStat['deal_id']."</a></td>";
echo "<td>".$dealData['dealName']."</td>";
echo "<td><a href='invoiceDisp.php?coId=".$companyId."&deal=".$recordStat['deal_id']."' >".$recordStat['vouch_code']."</a></td>";
echo "<td>&nbsp;</td>";

/*
echo "<td>".$CustomerData['clientFirst']."</td>";
echo "<td>".$CustomerData['clientLName']."</td>";
echo "<td>".$CustomerData['address1']."</td>";
echo "<td>".$CustomerData['address2']."</td>";
echo "<td>".$CustomerData['city']."</td>";
echo "<td>".$CustomerData['pCode']."</td>";
*/

echo "<td>".$recordStat['Quantity']."</td>";
echo "<td>".$recordStat['Totals']."</td>";

/*
echo "<td>".$recordStat['stat_name']."</td>";
echo "<td>".$deliveryData['courier']."</td>";
echo "<td>".$deliveryData['tracking_id']."</td>";
echo "<td>".$recordStat['dated']."</td>";
echo "<td>".$deliveryData['date_sent']."</td>";
echo "</tr>";
*/

}
echo "<tr>";
echo "<td colspan='5' style='text-align:right;'>Total:</td>";
echo "<td colspan='2'>".number_format($price,2,'.','')."</td>";
echo "</tr>";

?>

</table>

<div style="float:left;width:200px">
<?php 
if(($currpg > 1) && ($currpg > $orderspages)){ echo "<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".($currpg-1)."' style='text-decoration:none;color:#666;font-size:13px;' >&lt;&lt;PREVIOUS PAGE</a>"; }

for($num=round($currpg/6);$num <= $orderspages;$num++){

  if($num>0){
    echo "&nbsp;&nbsp;<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".$num."' style='text-decoration:none;color:#666;'>".$num."</a>";	
     $counter ++ ;
     if($counter == 6){
	   break;  
     }
   }

}

if(($orderspages >1) && ($currpg <=$orderspages)){ echo "&nbsp;&nbsp;<a href='invoiceDisp.php?coId=".$companyId."&pgnum=".($currpg+1)."' style='text-decoration:none;color:#666;font-size:13px;' >NEXT PAGE&gt;&gt;</a>"; } ?>
</div>

</div>

<div id="edOrdDiv" style="position:absolute;top:10px;left:480px;height:395px;width:360px;visibility:hidden;border:1px solid #ccc;background-color:#fff;border-radius:6px;"  >

<table style="width:340px;" >
    <tr>
    <td style="text-align:center;font-family:Arial, Helvetica, sans-serif;">
     Edit Order 
    </td>
    <td>
      <img src="images/dot.png" onClick="document.getElementById('edOrdDiv').style.visibility='hidden';"/>
    </td>
    </tr>
    <tr>
    <td>
      <iframe id='edOrdifrm' name='edOrdifrm' src ="orderSave.php" frameborder='0' style="width:300px;height:380px;overflow:hidden;">
      
   </iframe>
    <td>
    </tr>
 </table>

</div>

<div id="dispOrdDiv" style="position:absolute;top:10px;left:480px;height:150px;width:320px;visibility:hidden;border:1px solid #ccc;background-color:#fff;border-radius:6px;"  >

<table style="width:300px;" >
    <tr>
    <td style="text-align:center;font-family:Arial, Helvetica, sans-serif;">
     Dispatch Order 
    </td>
    <td>
      <img src="images/dot.png" onClick="document.getElementById('dispOrdDiv').style.visibility='hidden';"/>
    </td>
    </tr>
    <tr>
    <td>
       <form>
       <table>
       <tr>
       <td>Courier:</td><td><input type="text" id='courier' name='courier'/></td>
       </tr>
       <tr>         	
       <td>Tracking ID:</td><td><input type='text' name='trackd' id='trackd' /></td>
       </tr>
       <tr>
       <td colspan='2'><input type="button" id="subdisp" name="subdisp" value="Dispatch" onclick="chngeStat('3');" /></td>
       </tr>
       </form>
    <td>
    </tr>
 </table>

</div>



<script type="text/javascript" language="javascript">

	var xmlhttp=''
	
	
	function dispatch(){
		
	document.getElementById('dispOrdDiv').style.visibility='visible';
	
	}
	
	function chngeStat($val){
		
			
			var $elements = document.getElementsByTagName('input')
			var ordID = new Array();
			
			for(var x=0; x < $elements.length;x++){
				
				if($elements.item(x).type=='checkbox'){
					if($elements.item(x).checked){	
						$chlen=$elements.item(x).id.length-3
					
					    ordID.push($elements.item(x).id.substr(0,$chlen));
					
						
					}
				}
				
				
			}
			
		if($val=='3'){
		   deliverier = document.getElementById('courier').value;
		   trackid = document.getElementById('trackd').value;
		   
		  ajaxhttp(ordID.toString(),$val,new Array(deliverier,trackid)); 
		}else{
		  ajaxhttp(ordID.toString(),$val);
		}
	}
	
		function editOrd(){
		
		    //alert('hello');
			var $elements = document.getElementsByTagName('input')
			var ordID = new Array();
			
			for(var x=0; x < $elements.length;x++){
				
				if($elements.item(x).type=='checkbox'){
					if($elements.item(x).checked){	
						$elementlen = $elements.item(x).id.length-3;
					    ordID.push($elements.item(x).id.substr(0,$elementlen));
					
						
					}
				}
				
				
			}
		
		
		document.getElementById('edOrdDiv').style.visibility='visible';
		document.getElementById('edOrdifrm').src='editSave.php?ordids='+ordID.toString();
		
		
	}
	
	
	function ajaxhttp($valx,$stat,$optional=''){
	
	   var xmlhttp;
	   
	 
	   
	   if($optional!=''){
	   var $paramspass = "ords="+$valx+"&stat="+$stat+"&options="+$optional;
	   }else{
	   var $paramspass = "ords="+$valx+"&stat="+$stat;
	   }
	   
	  
	  	//alert($paramspass);
	
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  		  xmlhttp=new XMLHttpRequest();
        }
        else
         {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
         }
	
	//check readystate information on system
	
	xmlhttp.onreadystatechange=function()
	  {
 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
			
			alert(xmlhttp.responseText);
			document.location.reload();
			
        //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
     }
	
	
	xmlhttp.open("POST","./process/changeStatP.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send($paramspass);
		

	
	}

</script>
</body>
</html>