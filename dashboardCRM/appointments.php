<?php

session_start();

include 'includes/dcon.php';
include 'includes/inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointments</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style>

table tr>td {

    height: 40px;

}



@media screen and (min-width: 1024px) and (max-width: 1700px){
	
	
.navbar-nav {

		width:60%;
}
	
	
.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:18%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}
	
	
	
	
}



@media screen and (min-width: 600px) and (max-width: 1160px){

.navbar-nav {

  width:50%;
  color:#FFF;
  font-size:88%;

}

.navbar-default .navbar-nav>li>a{color:#FFF}
.navbar-default .navbar-nav>li>a:hover{color:#FFF}
.navbar-nav li {

    width:24%;
    text-align:center;
    color:#FFF;

}

.navbar-nav li:hover {

    background-color:rgba(218,6,6,0.5);
    //background-color:rgba(40,150,215,0.5);
	font-weight:bold;
    color:#FFF;

}

}






.breadcrumb {

    padding:6px;
    margin:0px;
    margin-top:0px;
    border-radius:none;
    background-color:#368ccc;
    color:#ffffff;
}

.breadcrumb a{

    color:#ffffff;
}



</style>



</head>

<body style="overflow:scrolls;">

<?php 

// include "includes/dcon2.php";

		  $postalcde='';
		  $srchconn = '';
	
		if($_GET['pc']!=""){		
			
			if(strpos($_GET['pc']," ")!==false){
		
					
				$postalcde = substr($_GET['pc'],0,strpos($_GET['pc']," "));
				
				
			}else{
			
			  if(strlen($_GET['pc'])>=5){
			     $postalcde = substr(trim($_GET['pc']),0,-3);
			  }else{
				  
				  $postalcde = trim($_GET['pc']);
			  
			  }
			
				
			}
		 }
		 
		 
		// echo $postalcde;
		 
		    if($postalcde!=''){	
		
				$nconn = "select outcode, lat, lon from outcodepostcodes where outcode LIKE '".$postalcde."%' ";
				
		
				$nconnres = $db->query($nconn);
		
				
				$origncde = $nconnres->fetchRow(DB_FETCHMODE_ASSOC);		//mysql_fetch_array(mysql_query($nconn));
				
			    //print_r($origncde);
		
		
  $searchConn ="SELECT outcode ,3956 * 2 * ASIN(SQRT( POWER(SIN((".$origncde['lat']." - lat) * pi()/180 / 2),2) + COS(".$origncde['lat']." * pi()/180 ) * COS(lat *  pi()/180) * POWER(SIN((".$origncde['lon']."-lon) *  pi()/180 / 2), 2) ))as distance FROM outcodepostcodes HAVING distance < 15";
  
  			//	echo $searchConn;
		
			     $srchconn = $db->query($searchConn);
				 
				 //print_r($srchconn);
				 $prevstring = '';
				 
				echo "<div style='width:100%;background-color:rgba(255,255,255,0.9);height:1300px;'>";
			  
			  
			  }else{
				  
				echo "<div style='width:100%;background-color:rgba(255,255,255,0.9);height:1300px;'>";
				
			  }
		
 ?>

<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
<!--<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">-->
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="index2.php" title="Britannia" style="margin-top:-10px;text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif"></a>
    </div>
    
    <div>
      <div style="float:left;color:#FFF;font-family:Verdana, Geneva, sans-serif;font-style:italic;"><br/>ML Appointments</div>
      <ul class="nav navbar-nav">
        <li><a href="index2.php">HOME</a></li>
       <!-- <li><a href="search2.php" >SEARCH</a></li>-->
        <li><a href="#" >APPOINTMENTS</a></li>
        <li><a href="appointments.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
<div class="breadcrumb" style="width:100%;height:45px;font-family:'Times New Roman', Times, serif;font-size:20px;font-style:normal;background-color:#C3C3;"><p style="text-align:right"><a href="companySave.php" style="text-decoration:underline" title='username' ><?php echo $_SESSION['usr'] ;?></a> currently logged in</p></div>
<div class="panel panel-default" style="border-radius:0px;margin-top:0px;">
  <div class="panel-heading">
    <h3 style="color:rgba(218,6,6,0.8);font-weight:bold;padding:0px;margin:0px;" align="center">SEARCH EXPERT/APPOINTMENT LOCATIONS</h3>
  </div>
  <div class="panel-body" style="background-color:rgba(54,140,204,0.3);color:#386ccc">
  <!-- <div class="panel-body" style="background-color:rgba(8,82,126,0.4);color:#a616c5">-->
    <form id="frmsrch" name="frmsrch" method="get"> 
    <p style="font-size:large;">Postcode Search (Please enter the post code with spaces i.e BD1 2EF )</p>
    &nbsp;<input type="submit" class="btn btn-success" id="srchbut" name="srchbut" value="SEARCH" style="font-weight:bolder" />&nbsp;
    <input type="text" id='pc' name='pc' class="form-control" style="float:left;width:50%" placeholder="<?php if(!empty($_GET['pc'])){ echo $_GET['pc']; }else{ echo "please enter the postcode here i.e WA1 4DH";} ?>"  title="please enter the postcode here i.e WA1 4DH" />
    </form>
  
  </div>
</div>
<div align='center' style="width:100%;">
<?php

    echo "<h4 style='color:rgba(218,6,6,0.8);font-weight:bold;padding:0px;margin:0px;'>Please choose a venue/expert</h4>";

		if($srchconn!=''){

				 while($recs = $srchconn->fetchRow(DB_FETCHMODE_ASSOC)){
					
					//print_r($recs);
						
					
					$strng='';
						for($i = 0; $i< strlen($recs['outcode']); $i++){
						
							if(is_numeric(substr($recs['outcode'],$i,1))){
							//echo $strng.',';
							
							break;
							}else{
							$strng .= substr($recs['outcode'],$i,1);
							}
								
							
						}
						
						//echo $strng;
						
						
						//if($prevstring != $strng){
					
						$s="select distinct(city), city ,postcode from citywithpost where postcode='".$strng."'";
						//	echo "<br/><br/>";
						
						
       				    $q=$db->query($s);
					
                   	    $city=$q->fetchRow(DB_FETCHMODE_ASSOC);
					
					// while ($city=$q->fetchRow(DB_FETCHMODE_ASSOC))
       				// {	
					 
					 //$s2test="select type from experlocations where location like '%".$city['city']."%'"; 
					 
					 $s2test="select * from clinic where LEFT(clinic_pcode,".(strlen($recs['outcode'])+1).") like '%".$recs['outcode']." %'";
					 
					  //echo $s2test;
					 
					 $q2test= mysql_query($s2test);
					 
					 
					// expert location test required positive to continue
					
					if(mysql_num_rows($q2test)>0)
					  {					   
					   
					 echo "<br/>";
					 echo '<div class="alert-info" style="border-radius:6px;width:70%;padding:8px;box-shadow:2px 5px 8px #CCC;">';
					//echo '<div style="width:80%;">';	
					echo '<table width="90%" class="table-hover" align="center">';
					 
					echo '<tr><th colspan="3"> Location : '.$city['city'].'<br/><br/></th><th>&nbsp;</th></tr>';		
				    
					
					while($recs2 = mysql_fetch_array($q2test)){
						
					//echo '<tr><th colspan="3"> Location : '.$city['city'].'<br/><br/></th><th>Distance: '.sprintf("%.2f",$recs['distance']).'</th></tr>';	
					echo "<tr><th colspan='3' >Distance: ".sprintf("%.2f",$recs['distance'])."</th></tr>";
					echo "<tr><td>".$recs2['clinic_name']." ".$recs2['clinic_address1']."</td><td>".$recs2['clinic_city']."</td><td>".$recs2['clinic_pcode']."</td>";
					echo '<td><a href="basicDiary.php?eid='.$recs2['exp_id'].'&clinics='.$recs2['clinic_name'].'" class="btn btn-info" style="padding:0px;padding-left:5px;padding-right:5px;height:28px;" title="request expert">Request</a></td></tr>';					
						
					}
					
					
					/*
					echo '<tr>';
                    echo  '<th align="left" style="width:33%" >Speciality</th>';
					echo '<th align="left" style="width:25%" >Expert</th>';
                    echo '</tr>';
				   
				   $s2="select type, location , eid ,name, cv from experlocations where location like '%".$city['city']."%'";
        		    $q2=  mysql_query($s2);
					
					while ($r=  mysql_fetch_array($q2))
                     {
					  echo '<tr>';
                      echo '<td align="left">'.$r['type'].'</td>';
					  echo '<td align="left">'.$r['name'].'</td>';
					  echo '<td align="left">';
					  if($r['cv']!=''){
						 echo '<a href="./docs/cv/'.$r['cv'].'" title="'.$r['cv'].'" >CV</a>';
					  }
					  echo '</td>';
					 // echo '<td><a href="addAppointment.php?exp='.$r['name'].'&loc='.$city['city'].'" class="btn btn-info" style="padding:0px;padding-left:5px;padding-right:5px;height:28px;" title="request expert">Request</a></td>';
					  echo '<td><a href="basicDiary.php?eid='.$r['eid'].'" class="btn btn-info" style="padding:0px;padding-left:5px;padding-right:5px;height:28px;" title="request expert">Request</a></td>';
					  echo '</tr>';
					
					  }
					  
					  */
					  
					  
					echo "</table>";
					 echo "</div>";
					
					   }// num of experts in city check
					
					
					// }
					 
					 
					   $prevstring = $strng;
					 
				   // }
					 
				 }
				 
				 echo "</table>";
				 echo "</div>";
				 
				 
		}else{
			
			 echo '<div class="alert-info" style="border-radius:6px;width:70%;padding:8px;box-shadow:2px 5px 8px #CCC;">';
					//echo '<div style="width:80%;">';	
			echo '<p> A list of all our venues </p>';
			
			echo '</div>';
			
		}
			
			
	?>

</div>
</body>
</html>