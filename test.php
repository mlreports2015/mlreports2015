<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

include "dcon.php";
require_once('../lib/nusoap.php');



$t="select * from claimant";
$qt=mysql_query($t);
$rt=mysql_fetch_array($qt);

if (strcmp('nli', file_get_contents('http://www.mlreports.com/mlr/deload3.php?dt='.$_GET['dt'].'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p']))==0)
{
    echo '<div align="center" style="color:#f00;">Unfortunately, this session has expired and you would have to login again! Click <a href="index.html" target="_parent">here</a> to login again!</div>';
}
else if (file_get_contents('http://www.mlreports.com/mlr/deload3.php?dt='.$_GET['dt'].'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p'])===false)
{
    echo '<div align="center" style="color:#f00;">We can not seem to connect to the server at <a href="http://www.mlreports.com" target="_blank" style="color:#f00;">www.mlreports.com</a>. Please check if your internet connection is up and running...!</div>';
}
else
{
    
    
     downloadClaimant(trim($_GET['dt']));
	
	/*$sqlG= str_replace('\\\\', '|', file_get_contents('http://www.mlreports.com/mlr/deload3.php?dt='.$_GET['dt'].'&org='.$_SESSION['o'].'&lid='.$_SESSION['n'].'&pwd='.$_SESSION['p']));
    $sqlG= str_replace('\\', '', $sqlG);
    $sqlG= str_replace('|', '\\', $sqlG);
    $sqlG= strip_tags($sqlG);

    $sql=explode(';', $sqlG);

    $i=0;
    $e=0;
    foreach ($sql as $s)
    {
        $i=$i+1;
		echo $s;
        $q=  mysql_query($s);

        if (mysql_error()===false)
        {
            $e=$e+1;
        }
    }

    echo '<div align="center">Total Downloads : '.$i.'<br /><span style="color:#f00;">'.$e.' Unsuccessful Imports</span><br /><span style="color:#3f3;">'.($i-$e).' Successful Imports</span></div>';
	*/
	
}

function downloadClaimant($exmDte){
	
 $pos='1';

  //webservice url
  $url = "http://www.mlreports.com/mlr2/ws.php?wsdl"; 
  //soap client initialise
  $client = new nusoap_client($url);

 
 
   while($pos!=''){

	//set paramaters
     $argsDate = array('date'=>$exmDte, 'pos'=>($pos-1));
	//run soap;
     $claimRets = $client->call('getClaimantByDate', array($argsDate));

	 $remClaim=explode('<br>',$claimRets);
	  
	 $pos = call_backClaimDate($remClaim, $pos, $exmDte);  

   }
   
   echo "</table>";
	

   
}
   
   function call_backClaimDate($rClaims, $indexid, $xmdt){
	  
	  
	  echo "<br/>".count($rClaims);
      $i=0;
 
      echo "<table>";
      echo "<tr>";
      echo "<th>S/N</th>";
      echo "<th>NAME</th>";
	  echo "<th>DOA</th>";
      echo "<th>REF1</th>";
	  echo "<th>REF2</th>";
	  echo "<th>Statement</th>";
      echo "</tr>";

      while($rClaims[$i]){
	
	
	$rClaims[$i]=str_replace('Found:','',$rClaims[$i]);
	$claims = explode(':',$rClaims[$i]);
	
	$claimantName = explode(' ',$claims[2]);
	$claimNameCount = (count($claimantName)-2);
	$claimID = trim(str_replace('NAME','',$claims[1]));
	$claimantDOB = trim(str_replace('DOA','',$claims[3]));
	$claimantDOA = trim(str_replace('AGEID','',$claims[4]));
	$claimantAGE= trim(str_replace('AGEREF','',$claims[5]));
	$claimantAGEREF= trim(str_replace('SOLREF','',$claims[6]));
	$claimantSOLS = $claims[7];
	
	$sqlstate = "insert into claims set mlrId ='".$claimID."', org='thornton' ,ct ='".$claimantName[1]."', cfn ='".$claimantName[2]."' , cln ='".$claimantName[$claimNameCount]."', cdb='".$claimantDOB."' cda ='".$claimantDOA."', cde='".$xmdt."', cage ='".$claimantAGE."', cageref='".$claimantAGEREF."', doc='expert'";

	echo "<tr><td>".$i."</td>";
	echo "<td>".substr($claims[2],0,-3)."</td>";
	echo "<td>".$claims[3]."</td>";
	echo "<td>".$claimantAGEREF."</td>";
	echo "<td>".$claims[7]."</td>";
	echo "<td>".$sqlstate."</td>";
	echo "</tr>";
	$i = $i + 1	;
	if($i >= 50 ){
	  $indexid=($indexid + 50);
	  break;	
	}
	$indexid='';
   }

	return $indexid;

}

?>