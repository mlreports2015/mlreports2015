<?php 

session_start();

include "../includes/dcon.php";

include "databaseClass.php";

$dbquery = new DatabaseClass();

include "fpdf/fpdf.php";

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($data)
{
  
  		$w = array(10,40,40,40,25,25);
		
		$i=0;
		
        foreach($data as $col){
         
		   $this->Cell($w[$i],8,$col,1);
		   	$i++;
		}
        $this->Ln();
    //}
}


function BasicTable2($data,$h)
{
  
  		$w = array(10,40,40,40,25,25);
		
		$i=0;
		$x = 12;
		$prevy='';
		
        foreach($data as $col){
         
		  // $this->Cell($w[$i],8,$col,1);
		    if($prevy==''){
		    
			$y=$this->GetY();
			$this->SetXY($x,$y);
			}else{
			$this->SetXY($x,$prevy);	
			}
			
		   	$this->MultiCell($w[$i],8,$col,1,'C');
			
			$x = $x + $w[$i];
			
			$prevy = $y;
			
			$i++;
		}
        $this->Ln();
    //}
}




// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}






}
 
 	if(isset($_GET['dt'])){
	 $statementdiary = "SELECT diary_id , `clinic_id`, clinic_date as clinic_date FROM clinic_date WHERE expert_id='".$_SESSION['org']."' AND clinic_date BETWEEN ".strtotime($_GET['dt'])." AND ".(strtotime($_GET['dt'])+(60*60*24))." ";	
	}else{
 	 $statementdiary = "SELECT diary_id , `clinic_id`, clinic_date as clinic_date FROM clinic_date WHERE expert_id='".$_SESSION['org']."' AND clinic_date BETWEEN ".(time()-(60*60*24*15))." AND ".(time()+(60*60*24*10))." ";
	}
	//echo $statementdiary;
	
	$diaryclinics = $db->query($statementdiary);
	
	 $fpdf = new PDF();
	
 	while($dbrecords = $diaryclinics->fetchRow(DB_FETCHMODE_ASSOC))
	{

	$i=0;
	
	$tble = array('clinic_tmslot','`case`');

	
	$statement = "SELECT `slot-time` as tme, `client-name`, case_doa , agency_name, agency_ref, solicitor_name,solicitor_ref FROM ".$tble[0]." JOIN ".$tble[1]." ON `case-id` = `case_id` WHERE `clinic-id` ='".$dbrecords['diary_id']."' ORDER BY `slot-time`";

	//echo $statement;
	
	  $dbres = $db->query($statement);
	 
	 $recordArray = array();
	
	 $headers = array("S/N ", "Agency \n " ,"Solicitor \n " ,"Name \n ", "DOA \n ", "Time \n ");
	
	 $fpdf->SetFont('Arial','',12);
	 $fpdf->AddPage();
	 $fpdf->Cell(0,10,$dbrecords['clinic_id']."\n",0,1,'L');
	 $fpdf->Cell(0,12,date('d-m-Y @ H:i',$dbrecords['clinic_date']),0,1,'L');

	 $fpdf->BasicTable2($headers,0);
	 $curY = $fpdf->GetY();
	 $fpdf->SetY($curY-8);
	   $fpdf->SetFont('Arial','',8);
	  while($record = $dbres->fetchRow(DB_FETCHMODE_ASSOC))
	  {
		 
		  $i ++ ;
		  
		  $recordArray = array($i."\n ",$record['agency_name']."\n".$record['agency_ref'], $record['solicitor_name']."\n".substr($record['solicitor_ref'],0,15),$record['client-name'],$record['case_doa'],date('H:i',$record['tme']));
		  $fpdf->BasicTable2($recordArray,0);
		  if($i % 14 ==0){
			
			$fpdf->AddPage();
			
		  }
		 
	   }
     
	}
	
	
	  $fpdf->output();
	
?>

