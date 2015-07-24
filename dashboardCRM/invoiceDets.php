<?php 
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Doc</title>
</head>
<body>

<?php 


include 'includes/dcon.php';
include 'includes/inc.php';
include 'process/databaseClass.php';


if(!$_SESSION['usr']){
	pLocation('index.php');
}

//hashed the remote address and check valid remote host

//if(crypt($_SERVER['REMOTE_ADDR'],$_SESSION['hashremote'])!=$_SESSION['hashremote']){	
	//pLocation('index.php');
//}  

$companyId = $_GET['coId'];


$dbqueryn = new DatabaseClass();

$fieldings = array(array('order'=>'order_id'),array('order'=>'deal_id'),array('order'=>'vouch_code'),array('order'=>'order_post'),array('order'=>'order_price'),array('order'=>'client_id'),array('order'=>'dated'),array('order'=>'ord_nte'),array('status'=>'stat_name'));
//print_r($fieldings);
$criteria = array(array("order","order_id","eq",$_GET['ordid']),array("order","comp_id","eq",$_GET['coId']));
//print_r($criteria);
$tbles = array('order','status');
$conds="AND";
$statements = $dbqueryn->selectqueryconds($fieldings,$criteria,$conds,$tbles);
//echo $statements;
$couriers=array("Parcel Force","Royal Mail", "My Hermes","Other");
//$sumStatement = "Select deal_id,vouch_code, COUNT(*) as Quantity, SUM(order_price) as Totals FROM `order` WHERE comp_id = '".$companyId."' GROUP BY deal_id";
//echo $sumStatement;
//$sumStatementRes = mysql_query($sumStatement);
//print_r($sumStatementRes);
//print_r($parameters);

//$statments = $dbqueryn->selectALL($tbl,$parameters);
//echo $statments;



$ordersnum = mysql_num_rows($statements);

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

//echo $statments;
$orderstateres = mysql_query($statements);

$recordStat = mysql_fetch_array($orderstateres);

//$fields=array(array("status"=>"stat_nam"));
$tbls = "status";
$criteria = array();
$statementsx = $dbqueryn->selectALL($tbls,$criteria);
//echo $statementsx;
$statsnameres = mysql_query($statementsx);


$fielders = array(array("delivery"=>"delive_id"),array("delivery"=>"courier"),array("delivery"=>"tracking_id"),array("delivery"=>"date_sent"));
	$tbl = array("delivery");
	$criteria = array("order_id" => $recordStat['order_id']);
	//print_r($criteria);
	$statementsx = $dbqueryn->selectquery($fielders,$criteria,$tbl);
	//echo $statementsx;
    $deliveryData = mysql_fetch_array(mysql_query($statementsx));


$fielders = array(array("client"=>"client_id"),array("client"=>"clientName"),array("client"=>"address1"),array("client"=>"city"),array("client"=>"pCode"));
	$tbl = array("client");
	$criteria = array("client_id" => $recordStat['client_id']);
	//print_r($criteria);
	$statementCust = $dbqueryn->selectquery($fielders,$criteria,$tbl);
	//echo $statementsx;
    $CustomData = mysql_fetch_array(mysql_query($statementCust));


?>
<div style="height:200px;">

<div style="width:250px;float:left;height:130px;border:1px solid #777;font-family:Verdana, Geneva, sans-serif;font-size:14px;border-radius:6px;padding:10px;">
Delivery Details
<form id="deliverFrm" method="POST" action="process/chngeStatP2.php?ordsId=<?php echo $recordStat['order_id']; ?>" >
<input type="hidden" name="deliveId" id="deliveId" value="<?php echo $deliveryData['delive_id'];?>" />
<table>
<tr>
<td>Courier:</td><td><select id='courier' name='courier' >
<?php 

	for($n =0; $n < count($couriers); $n++){
		if(strtolower($deliveryData['courier']) == strtolower($couriers[$n])){
		    echo "<option selected='selected'>".$couriers[$n]."</option>";
		 }else{
																		   
		    echo "<option>".$couriers[$n]."</option>";
		}
	}


?>
</select></td>
</tr>
<tr>
<td>Tracking ID:</td><td><input type="text" id="tracking" name="tracking" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $deliveryData['tracking_id']; ?>" /></td>
</tr>
<tr>
<td>Date Sent:</td><td> <input type="dispDate" id="dispDate" name="dispDate" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $deliveryData['date_sent']; ?>" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" id="butDeliver" name="butDeliver" value="Update" /></td>
</tr>
</table>
</form>
</div>

<div style="width:350px;float:left;height:180px;border:1px solid #777;font-family:Verdana, Geneva, sans-serif;font-size:14px;border-radius:6px;padding:10px;margin-left:10px;">
Customer Details
<form id="custfrm" action="process/editCustP.php?coId=<?php echo $_GET['coId'];?>&ordid=<?php echo $_GET['ordid'];?>" method="POST">
<input type="hidden" name="clientID" id="clientID" value="<?php echo $CustomData['client_id']; ?>" />
<table>
<tr>
<td>Customer Name </td><td><input type="text" name="custNm" name="custNm" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $CustomData['clientName']; ?>"  /></td>
</tr>
<tr>
<td>Address 1:</td><td><input type="text" id="addy1" name="addy1" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $CustomData['address1']; ?>" /></td>
</tr>
<tr>
<td>Address 2:</td><td> <input type="text" id="addy2" name="addy2" style="border:none;border-bottom:1px solid #ccc;" value="" /></td>
</tr>
<tr>
<td>City</td><td><input type="text" id="cty" name="cty" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $CustomData['city']; ?>" /></td>
</tr>
<tr>
<td>Post Code</td><td><input type="text" id="pcode" name="pcode" style="border:none;border-bottom:1px solid #ccc;" value="<?php echo $CustomData['pCode']; ?>" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" id="butDeliver" name="butDeliver" value="Update" /></td>
</tr>
</table>
</form>
</div>

</div>

<div style="width:98%;font-family:Arial, Helvetica, sans-serif;margin-top:10px">
<div style="float:left;width:200px">
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
<form id="revfrm" name="revfrm" action="./process/ordUpdateP.php?coId=<?php echo $_GET['coId'];?>&ordId=<?php echo $_GET['ordid']; ?>" method="POST" >
<table width="98%" cellpadding="5px" cellspacing="0px" border='1' bordercolor="#CCCCCC">
<tr style="background-color:#ccc;font-family:Arial, Helvetica, sans-serif;font-weight:lighter;font-size:13px">
<th>Deal ID</th>
<th>Deal Name</th>
<th>Voucher ID</th>
<th>Product Name</th>
<th>Price</th>
<th>Postage</th>
<th>Status</th>
<th>Date</th>
</tr>
<?php 
$price=0;
	//print_r($recordStat);
	$fielders = array(array("deal"=>"deal_Id"),array("deal"=>"dealName"));
	$tbl = array("deal");
	$criteria = array("deal_Id" => $recordStat['deal_id']);
	//print_r($criteria);
	$statementsx = $dbqueryn->selectquery($fielders,$criteria,$tbl);
	//echo $statementsx;
    $dealData = mysql_fetch_array(mysql_query($statementsx));
	
	$price = $recordStat['order_price'];
	
	
	
echo "<tr style=\"font-family:Arial, Helvetica, sans-serif;font-weight:lighter;font-size:12px\">";
//echo "<td>".$recordStat['order_id']."</td>";
echo "<td><a href='invoiceDisp.php?coId=".$companyId."&deal=".$recordStat['deal_id']."' >".$recordStat['deal_id']."</a></td>";
echo "<td>".$dealData['dealName']."</td>";
echo "<td>".$recordStat['vouch_code']."</td>";
echo "<td>&nbsp;</td>";

/*
echo "<td>".$CustomerData['clientFirst']."</td>";
echo "<td>".$CustomerData['clientLName']."</td>";
echo "<td>".$CustomerData['address1']."</td>";
echo "<td>".$CustomerData['address2']."</td>";
echo "<td>".$CustomerData['city']."</td>";
echo "<td>".$CustomerData['pCode']."</td>";
*/

echo "<td id='ordPrce' onclick=\"chkPrce();\">".$recordStat['order_price']."</td>";
echo "<td>".$recordStat['order_post']."</td>";
echo "<td><select id='stat' name='stat' onChange='sveChnge(this.value)'>";
while($statename = mysql_fetch_array($statsnameres)){
	 if($statename['stat_name']!=$recordStat['stat_name']){
		echo "<option value='".$statename['stat_id']."'>".$statename['stat_name']."</option>";
	 }else{
		echo "<option value='".$statename['stat_id']."' selected='selected'>".$statename['stat_name']."</option>"; 
	 }
}
echo "</select></td>";
//echo "<td>".$recordStat['stat_name']."</td>";


//echo "<td>".$deliveryData['courier']."</td>";
//echo "<td>".$deliveryData['tracking_id']."</td>";
echo "<td>".$recordStat['dated']."</td>";
//echo "<td>".$deliveryData['date_sent']."</td>";
echo "</tr>";


echo "<tr>";
echo "<td colspan='4' style='text-align:right;'>Total:</td>";
echo "<td colspan='2'>".number_format($price,2,'.','')."</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='9'>&nbsp;Comments:<textarea id='ordcomment' name='ordcomment' cols='100' style='border:1px solid #ccc;'>".$recordStat['ord_nte']."</textarea></td>";
echo "</tr>";
?>

</table>
</form>

<input type="button" id="btsave" name="btsave" value="save" onclick="sveDets();"/>
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
       </table>
       </form>
    <td>
    </tr>
 </table>

</div>



<script type="text/javascript" language="javascript">

	var xmlhttp=''
	
	
	function dispatch($vals){
		
	document.getElementById('dispOrdDiv').style.visibility='visible';
	
	}
	
	function sveChnge(statChng){
	
		//alert(statChng);
		if(confirm('do you wish to continue changing the status')){
			
			if(statChng=='4'){
				$refunded = prompt("Please enter amount refunded.",0.00);
				document.location="./process/chngeStatP2.php?coId=<?php echo $_GET['coId']; ?>&ordsId=<?php echo $_GET['ordid']; ?>&stat="+statChng+"&refund="+encodeURIComponent($refunded);
			}else{
			  document.location="./process/chngeStatP2.php?coId=<?php echo $_GET['coId']; ?>&ordsId=<?php echo $_GET['ordid']; ?>&stat="+statChng;
			}
		
		}
	
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
	
	function chkPrce(){
		
		if(confirm('Do you wish to change the price indicated')){
		  
		  document.getElementById('ordPrce').innerHTML="<input type='text' id='nwordprce' name='nwordprce' size='8' />";
		  document.getElementById('ordPrce').setAttribute('onClick'," ");
		  
		}
			
	}
	
	function sveDets(){
	
	  document.getElementById('revfrm').submit();
	
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
			
			//alert(xmlhttp.responseText);
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