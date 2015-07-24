<?php 
session_start();


if($_SESSION['usr']==''){
																	  
  header('Location: index.php');																	  

}


include 'includes/dcon.php';
include 'includes/inc.php';

//$_SESSION['id'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ML PORTAL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script type="text/javascript">

//$("#stdte").datepicker({dateFormat: "dd-mm-yy"});			
//$( "#stdte" ).datepicker();

//$("#endte").datepicker();
//$("#endte").datepicker( "option", "dateFormat", "dd-mm-yy" );



	
			
</script>

<style>

.tab :hover {
margin-top:0px;
height:60px;
background-color:#CCC;
cursor:pointer;

	
}

.tab {

float:left;
height:60px;
width:140px;
background-color:#FFF;
margin-left:10px;
text-align:center;
	
}

#recentcse{
	
	float:left;
	width:44%;
	padding-right:3px;
	
}

#recentapps{
	
	float:left;
	width:90%;
	margin-left:5px;
	
}


@media screen and ( max-width:1100px ){
	
	#recentcse{
	
		width:90%;
		float:left;
	
	}
	
	#recentapps{
	
		width:90%;
		float:left;
	
	}

	

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
<body style="overflow:hidden;background-image:url(Images/background-texture.jpg);background-size:cover;">

<div style="background-color:rgba(255,255,255,0.8);width:100%;height:1400px;color:#368ccc;">

<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header" >
    <a class="navbar-brand" href="index2.php" title="MLPortal" style="text-decoration:none;color:#903;font-style:italic;font-family:'Times New Roman', Times, serif">ML PORTAL</a>
    </div>
 
    <div>
      <ul class="nav navbar-nav" style="width:70%">
        <li><a href="index2.php">HOME</a></li>
        <li><a href="search2.php" >SEARCH</a></li>
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:44%"><a href="companySave.php" title="<?php echo $_SESSION['usr']; ?> ">Accounts</a></li>
        <li style="width:40%"><a href="logout.php" title="<?php echo $_SESSION['usr']." log out"; ?>">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php echo $_SESSION['usr'] ;?></a> currently logged in</div>

    <div style="width:90%;padding:18px;padding-top:0px;padding-bottom:0px;" align="center">
   <h3 align="left">MONTHLY STATS</h3>
    <div style="width:100%;height:110px;">

        <?php $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=stats&akey=14414&solic=".$_SESSION['solic']);


        $jsndecde=json_decode($file);

        
        ?>

        <div style="float:left;width:30%;">

        <h2>New Cases: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;" ><?php echo $jsndecde->stats->case; ?></span></h2>
    </div>
    <div style="float:left;width:30%">
        <h2>Appointments: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;" ><?php echo $jsndecde->stats->apps; ?></span></h2>
    </div>
        <div style="float:left;width:30%;">
            <h2>Reports: <span class="badge" style="width:80px;height:40px;font-size:30px;font-weight:bold;"><?php echo $jsndecde->stats->reps; ?></span></h2>
        </div>


    </div>

        <h3 align="left" >RECENT UPDATES & CASES </h3>
<div id="latest" name="latest" class="alert alert-info" style="margin:0px;padding:0px;padding-bottom:14px;border:none;float:left;width:54%;;box-shadow:5px 5px 5px #CCC;">
<div style="background-color:rgba(255,0,0,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px"><b>TOP 10 UPDATES</b></div>
<table width="94%" align="center">
<tr><th>Solicitor Ref.</th><th>Events</th><th>Event Date</th>
<?php $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestevents&akey=14414&solic=".$_SESSION['solic']);  

	
   $jsndecde=json_decode($file); 
   
  if($jsndecde->success){
	   
	 foreach($jsndecde->note as $value){
		  echo "<tr>";
		  echo "<td><a href='indexedcase.php?cid=".$value->caseid."'>".$value->sRef."</a></td>";
		  echo "<td>".$value->note."</td>";
		  echo "<td>".$value->dt."</td>";
		  echo "</tr>";
	 }
	  

  }else{
	
	 echo "nothing found";
	  
  }
   
   
   ?>
</table>
</div>

            <div class="alert alert-info" id="recentcse" name="recentcse" style="padding:0px;padding-bottom:14px;margin:0px;border:none;margin-left:10px;box-shadow:5px 5px 5px #CCC;">
                <div style="background-color:rgba(255,0,0,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px"><b>TOP 10 NEW CASES</b></div>
                <table width="95%" cellspacing='5px' cellpadding='5px'>
                    <tr><th>Agency Ref</th><th>Solicitor Ref.</th><th>Date</th></tr>
                    <?php $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestcse&akey=14414&solic=".$_SESSION['solic']);
                    $jsndecde2=json_decode($file);

                    if($jsndecde2->success){

                        foreach($jsndecde2->cases as $value){
                            echo "<tr>";
                            echo "<td><a href='indexedcase.php?cid=".$value->caseid."'>".$value->cRef."</a></td>";
                            echo "<td>".$value->sRef."</td>";
                            echo "<td>".$value->dte."</td>";
                            echo "</tr>";
                        }

                    }else{


                        echo "nothing found";



                    }


                    ?>
                </table>
            </div>



</div>
<div style="width:100%;padding:18px;padding-top:0px;padding-bottom:0px;" align="left">

<div align='center' style="width:90%">


    <div style="float:left;width:90%" align="center">
    <h3 align="left" >10 LATEST APPOINTMENTS </h3>
<div class="alert alert-info" id="recentapps" name="recentapps" style="padding:0px;padding-bottom:14px;margin:0px;border:none;margin-left:10px;box-shadow:5px 5px 5px #CCC;" >
    <div style="background-color:rgba(255,0,0,0.5);color:#FFF;width:100%;border:1px solid #CCCCCC;height:30px;padding-top:2px"><b>TOP 10 APPOINTMENTS</b></div>
<table width="98%" cellspacing='5px' cellpadding='5px'>
<tr><th>Agency Ref.<th>Solicitor Ref.</th><th>App Date</th></tr>
<?php $file = file_get_contents("http://mldocsdemo.no-ip.info/mldoctors/API/request/index.php?request=latestapps&akey=14414&solic=".$_SESSION['solic']);
   $jsndecde2=json_decode($file);
   			
		
       
	//var_dump($jsndecde2);
	  
     if($jsndecde2->success){
	   
	  // var_dump($jsndecde2->appointment[0]);
	   
	   foreach($jsndecde2->appointment as $value){
			
			echo "<tr>";
			echo "<td><a href='indexedcase.php?cid=".$value->caseid."'>".$value->cRef."</td>";
			echo "<td>".$value->sRef."</td>";
			echo "<td>".date('d-m-Y',$value->app_date)."</td>";
			echo "<td>".$value->app_venue."</td>";
			echo "</tr>";
			
	   }
	   
   }else{
	
	
	echo "nothing found";
	
	
	   
   }
   
   
   
?>
</table>
</div>

</div>

</div>


</div>


</div>

</body>
</html>

