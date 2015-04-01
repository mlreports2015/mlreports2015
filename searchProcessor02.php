<?php

include 'template.php';

head('Home','','','','','');

//include 'template2.php';

$id=$_GET['cid'];



$org=$_SESSION['o'];



//bTop('Details', $org, $id);



$_SESSION['chkrer']=1;

?>

<center><strong><H2>Search Details</H2></strong></center>

<?php
        include 'dcon.php';
		
		
	if($_POST['srchcat']=='fore'){
	
		$s="select * from claimant where cfn like '%".$_POST['srchbx']."%'";
	
	}else if($_POST['srchcat']=='sure'){
	
		$s="select * from claimant where cln like '%".$_POST['srchbx']."%'";
	
	}else if($_POST['srchcat']=='DoE'){
	
		$s="select * from claimant where cde like '%".$_POST['srchbx']."%'";
	
	}else if($_POST['srchcat']=='solref'){
	
		$s="select * from claimant where csolref like '%".$_POST['srchbx']."%'";
	
	}else if($_POST['srchcat']=='ageref'){
	
	    $s="select * from claimant where cageref like '%".$_POST['srchBox']."%'";
	
	}else{
		$datePattern = "#(\d){2}-(\d){2}-(\d){4}$#";
		if(preg_match($datePattern, $_POST['srchBox'])){
			$strNew = strtotime($_POST['srchBox']);
			
		   $s="select * from claimant where cda LIKE '%".date('Y-m-d',$strNew)."%'"; 
	    }else{
	       $s="select * from claimant where concat(cfn,' ',cln) like '%".$_POST['srchBox']."%'";
		}
		echo $s;
		
	}	
       // $s="select * from claimant where cid like '%".$_POST['cid']."%' and org like '%".$_POST['org']."%' and ct like '%".$_POST['ct']."%' and cfn like '%".$_POST['cfn']."%' and cln like '%".$_POST['cln']."%' and cdb like '%".$_POST['cdb']."%' and emp like '%".$_POST['emp']."%' and cda like '%".$_POST['cda']."%' and cde like '%".$_POST['cde']."%' and ca1 like '%".$_POST['ca1']."%' and ca2 like '%".$_POST['ca2']."%' and cp like '%".$_POST['cp']."%' and cc1 like '%".$_POST['cc1']."%' and cc2 like '%".$_POST['cc2']."%' and cageref like '%".$_POST['cageref']."%' and csolref like '%".$_POST['csolref']."%' and gen like '%".$_POST['gen']."%'";
    
	
	
	
	$q=mysql_query($s);
    //echo mysql_error();
echo '<DIV style="width:100%;float:right;">';
    echo '<center><strong>Thank you for searching: '.$_POST['srchBox'].'</strong></center><br/>';
    echo '<table width="98%" align="center"  rules="all" border="1" cellpadding="6px" style="border-style:none; border-width:1px; border-color:#000; font-family:Arial, Helvetica, sans-serif;">';
?>

<tr>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">ID</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">Full Name</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">DOB</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">DOA</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">DOE</th>
    <th align="center" style="border-style:solid; border-width:1px; border-color:#000;" colspan="1">Address Details</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">Post Code</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">Agency Ref</th>
    <th align="left" style="border-style:solid; border-width:1px; border-color:#000;">Solicitor Ref</th>

</tr>

<?php
    while($claimantOP=mysql_fetch_array($q))
    {
  
	if ($i%2==0)
   {
	$s="class='lr'";
   }
   else
   {
	  $s="class='lb'";
   }
		
        echo '<tr>';
        
            echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['cid'].'</a></td>';
           // echo '<td>'.$claimantOP['org'].'</td>';
           // echo '<td>'.$claimantOP['ct'].'</td>';
            echo '<td  style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" title="'.$claimantOP['cfn'].' '.$claimantOP['cln'].'" >'.$claimantOP['cfn'].' '.$claimantOP['cln'].'</a></td>';
            echo '<td  style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['cdb'].'</a></td>';
            
			if($claimantOP['emp']!=''){
			//echo '<td>'.$claimantOP['emp'].'</td>';
            }else{
			//echo '<td>&nbsp;&nbsp;</td>';
			}
			
			echo '<td  style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['cda'].'</a></td>';
            echo '<td  style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['cde'].'</a></td>';
            if($claimantOP['ca1']!=''){
			echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'">'.$claimantOP['ca1'].'<br/>'.$claimantOP['ca2'].'</a></td>';
			}else{
			echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;">&nbsp;&nbsp;</td>';
			}
			if($claimantOP['cp']!=''){
            echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;">'.$claimantOP['cp'].'</td>';
			}else{
			echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;">&nbsp;&nbsp;</td>';
			}
			echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['cageref'].'</a></td>';
            echo '<td style="border-style:solid; border-width:1px; border-color:#A61515;"><a '.$s.' href="detNewer.php?cid='.$claimantOP['cid'].'" >'.$claimantOP['csolref'].'</a></td>';
        echo '</tr>';
	
	  $i+=1;

    }
    echo '</table></div>';
    
?>