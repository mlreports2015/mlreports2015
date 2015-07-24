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

.navbar-nav li {
	
	width:20%;
	text-align:center;

}

.navbar-nav li:hover {

 background-color:#FFF;
 font-weight:bold;
	
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
    font-weight:bold;
    color:#FFF;

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

<body style="overflow:scrolls;background-image:url(Images/background-texture.jpg); background-size:cover;">

<?php 

 include "includes/dcon2.php";


		
		
		        $postalcde = substr($_GET['pc'],0,strpos($_GET['pc']," "));
				
		    if($postalcde!=''){	
		
				$nconn = "select outcode, lat, lon from outcodepostcodes where outcode LIKE '".$postalcde."%' ";
				
		
				
				$origncde = mysql_fetch_array(mysql_query($nconn));
				
			    //print_r($origncde);
		
		
  $searchConn ="SELECT outcode ,3956 * 2 * ASIN(SQRT( POWER(SIN((".$origncde['lat']." - lat) * pi()/180 / 2),2) + COS(".$origncde['lat']." * pi()/180 ) * COS(lat *  pi()/180) * POWER(SIN((".$origncde['lon']."-lon) *  pi()/180 / 2), 2) ))as distance FROM outcodepostcodes HAVING distance < 12";
		
			     $srchconn = mysql_query($searchConn);
				 
				 //print_r($srchconn);
				 $prevstring = '';
				 
					echo '<div style="width:100%;background-color:rgba(255,255,255,0.8);height:100%;">';
			
			  }else{
				  
				  echo '<div style="width:100%;background-color:rgba(255,255,255,0.8);height:1200px;">';
				  
			  }
		
		

        ?>


<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="index2.php" title="MLPortal" style="text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif">ML PORTAL</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH</a></li>
        <li><a href="#" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:300px;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
<div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php if($_SESSION['usr']) echo $_SESSION['usr']; else echo 'no one' ;?></a> currently logged in</div>
<div class="panel panel-default" style="border-radius:0px;margin-top:0px;">
  <div class="panel-heading">
    <h3 class="panel-title" style="color:rgba(218,6,6,0.8);font-weight:bold;padding:0px;margin:0px;" align="center">SEARCH EXPERTS/APPOINTMENTS</h3>
  </div>
  <div class="panel-body" style="background-color:rgba(54,140,204,0.3);color:#386ccc;">
    <form id="frmsrch" name="frmsrch" method="get"> 
    <p>Postcode Search</p>
    &nbsp;<input type="submit" class="btn btn-default" id="srchbut" name="srchbut" value="SEARCH" />&nbsp;
    <input type="text" id='pc' name='pc' class="form-control" style="float:left;width:50%" placeholder="<?php if(!empty($_GET['pc'])){ echo $_GET['pc']; }else{ echo "postcode here";} ?>" />
    </form>
  
  </div>
</div>
<div align='center' style="width:100%;background-color:rgba(255,255,255,0.0);height:110%;">
<?php
echo "<h4 style='text-align:center;color:rgba(218,6,6,0.8);'> Please choose the expert </h4>";
		if($srchconn!=''){

				 while($recs = mysql_fetch_array($srchconn)){
					 
			
					
					$strng='';
						for($i = 0; $i< strlen($recs['outcode']); $i++){
						
							if(is_numeric(substr($recs['outcode'],$i,1))){
							//echo $strng.',';
							
							break;
							}else{
							$strng .= substr($recs['outcode'],$i,1);
							}
								
							
						}
						
						if($prevstring != $strng){
					
						$s="select distinct(city), city ,postcode from citywithpost where postcode='".$strng."'";
							echo "<br/><br/>";
						
						
       				    $q=mysql_query($s);
					
                   	
					
					 while ($city=mysql_fetch_array($q))
       				 {	
					 
					 
					 $s2testlocal="select type from experlocations where location like '%".$city['city']."%'"; 
					 $q2test= mysql_query($s2testlocal);
					 
					// expert location test required positive to continue
					  if(mysql_num_rows($q2test)>0)
					  {			
					 
					 
					echo '<div class="alert-info" style="border-radius:6px;width:70%;padding:8px;box-shadow:2px 5px 8px #CCC;">';
					//echo '<div style="width:80%;">';	
					echo '<table width="90%" class="table-hover" cellpadding="5px" cellspacing="5px" align="center">';
					 
					 
					echo '<tr><th colspan="2"> Location : '.$city['city'].'<br/><br/></th></tr>';		
				    
					echo '<tr>';
                    echo  '<th align="left" style="width:33%" >Speciality</th>';
					echo '<th align="left" style="width:25%" >Expert</th>';
					echo '<th align="left">CV</th>';
                    echo '</tr>';
				   
				   $s2="select type, location , name as typcounter, cv from experlocations where location like '%".$city['city']."%' order by type";
        		    $q2=  mysql_query($s2);
					
					while ($r=  mysql_fetch_array($q2))
                     {
					  echo '<tr style="height:40px;">';
                      echo '<td align="left">'.$r['type'].'</td>';
					  echo '<td align="left">'.$r['typcounter'].'</td>';
					  echo '<td align="left">';
					  if($r['cv']!=''){
					   echo '<a style="text-decoration:none;" href="./docs/cvs/'.$r['cv'].'" title="'.$r['cv'].'" >CV</a>';  
					  }
					  
					  echo '</td>';
					  echo '<td><a href="addAppointment.php?exp='.$r['typcounter'].'&loc='.$city['city'].'" class="btn btn-info" style="height:30px;" title="request expert">Select</a></td>';
					  echo '</tr>';
					  
					  echo '</td>';
					  echo '</tr>';
					
					  }
					
					 echo "</table>";
					 echo "</div>";
					 
					   }// no of experts found.
					
					 }
					 
					 
					   $prevstring = $strng;
					 
				    }
					 
				 }
				 
				 echo "</table>";
				 echo "</div>";
				 
				 
		}
	?>

</div>
</body>
</html>