<?php

include 'template.php';

head('Details', '<link href="CSS/det.css" rel="stylesheet" type="text/css">', '<script language="javaScript" type="text/javascript" src="Scripts/calender_date_picker.js"></script>', '', '', 'doeF();');

include 'template2.php';



$id=$_GET['cid'];



$org=$_SESSION['o'];



bTop('Details', $org, $id);

$_SESSION['chkrer']=1;

?>

<?php
        include 'dcon.php';
		
		
		if($_POST['org']!=""){
		
			$params = " org like '%".$_POST['org']."' "; 
		
		}
		
		if($_POST['cln']!='' and $_POST['cfn']!=''){
		
			$params .=" and cfn like '%".$_POST['cfn']."%' and cln like '%".$_POST['cln']."%' ";
		
		}else if($_POST['cln']!=''){
		
			$params .=" and cln like '%".$_POST['cln']."%' ";
		
		}
		
		if(($_POST['cdb']!='') and ($_POST['cdb']!='dd-mm-yyyy')){
		
				$pattern = "#^\d{2}-\d{2}-\d{4}#";
				
				if(preg_match($pattern,$_POST['cdb'])){
				
						//echo 'correct format';
				 $dt1 = strtotime($_POST['cdb']);
				 $dt1=date('Y-m-d',$dt1);
				 
				    $params .=" and cdb like '%".$dt1."%' ";
				
				}
				
		
		}
		
		
			if(($_POST['cda']!='') and ($_POST['cda']!='dd-mm-yyyy')){
		
				$pattern = "#^\d{2}-\d{2}-\d{4}#";
				
				if(preg_match($pattern,$_POST['cda'])){
				
						//echo 'correct format';
				 $dt2 = strtotime($_POST['cda']);
				 $dt2=date('Y-m-d',$dt2);
				 
				    $params .=" and cda like '%".$dt2."%' ";
				
				}
				
		
		}
		
		if($_POST['cageref']!=''){
		
			$params .= " and cageref like '%".$_POST['cageref']."%' "	;
			
	    }
		
		if($_POST['csolref']){
		
			$params .=" and csolref like '%".$_POST['csolref']."%' ";
		
		}
		
		$s="select * from claimant where".$params;
		
        //$s="select * from claimant where cid like '%".$_POST['cid']."%' and org like '%".$_POST['org']."%' and ct like '%".$_POST['ct']."%' and cfn like '%".$_POST['cfn']."%' and cln like '%".$_POST['cln']."%' and cdb like '%".$_POST['cdb']."%' and emp like '%".$_POST['emp']."%' and cda like '%".$_POST['cda']."%' and cde like '%".$_POST['cde']."%' and ca1 like '%".$_POST['ca1']."%' and ca2 like '%".$_POST['ca2']."%' and cp like '%".$_POST['cp']."%' and cc1 like '%".$_POST['cc1']."%' and cc2 like '%".$_POST['cc2']."%' and cageref like '%".$_POST['cageref']."%' and csolref like '%".$_POST['csolref']."%' and gen like '%".$_POST['gen']."%'";
    $q=mysql_query($s);
    echo mysql_error();

    echo '<table width="100%" border="1">';
?>

<tr>
    <th align="left">ID</th>
    <th align="left">Organisation</th>
    <th align="left">Title</th>
    <th align="left">First Name</th>
    <th align="left">Last Name</th>
    <th align="left">DoB</th>
    <th align="left">Job</th>
    <th align="left">DoA</th>
    <th align="left">DoE</th>
    <th align="center" colspan="2">Address Details</th>
    <th align="left">Post Code</th>
    <th align="center" colspan="2">Contact Details</th>
    <th align="left">Agency Ref</th>
    <th align="left">Solicitor Ref</th>
    <th align="left">Gender</th>
</tr>

<?php
    while($claimantOP=mysql_fetch_array($q))
    {
        echo '<tr>';
        
            echo "<td><a href='detNewer.php?cid=".$claimantOP['cid']."'>".$claimantOP['cid']."</a></td>";
            echo '<td>'.$claimantOP['org'].'</td>';
            echo '<td>'.$claimantOP['ct'].'</td>';
            echo '<td>'.$claimantOP['cfn'].'</td>';
            echo '<td>'.$claimantOP['cln'].'</td>';
            echo '<td>'.$claimantOP['cdb'].'</td>';
            echo '<td>'.$claimantOP['emp'].'&nbsp;</td>';
            echo '<td>'.$claimantOP['cda'].'</td>';
            echo '<td>'.$claimantOP['cde'].'</td>';
            echo '<td>'.$claimantOP['ca1'].'</td>';
            echo '<td>'.$claimantOP['ca2'].'</td>';
            echo '<td>'.$claimantOP['cp'].'&nbsp;</td>';
            echo '<td>'.$claimantOP['cc1'].'&nbsp;</td>';
            echo '<td>'.$claimantOP['cc2'].'&nbsp;</td>';
            echo '<td>'.$claimantOP['cageref'].'</td>';
            echo '<td>'.$claimantOP['csolref'].'</td>';
            echo '<td>'.$claimantOP['gen'].'</td>';
        echo '</tr>';

    }
    echo '
    </table>';
    
?>