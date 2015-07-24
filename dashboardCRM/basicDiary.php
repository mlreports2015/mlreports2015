<?php 

session_start();

include 'includes/dcon.php';
include 'includes/inc.php';

include 'process/databaseClass.php';	

$clinicdte = array();

// select diary information

if(!isset($_GET['eid'])){

$statement = "SELECT diary_id ,expert_id, clinic_id, FROM_UNIXTIME(clinic_date) as date1, FROM_UNIXTIME(clinic_date2) as date2, clinic_color as color, FROM_UNIXTIME(created_on) FROM `clinic_date` WHERE clinic_date between ".time()." AND ".(time() + (60*60*24*60));

}else{

$statement = "SELECT diary_id ,expert_id, clinic_id, clinic_date as date1, clinic_date2 as date2, clinic_color as color, FROM_UNIXTIME(created_on) FROM `clinic_date` WHERE expert_id = '".$_GET['eid']."' AND clinic_id='".$_GET['clinics']."'"; // AND clinic_date between ".time()." AND ".(time() + (60*60*24*60));

$xprtstate = "SELECT exp_name FROM expert WHERE exp_id = '".$_GET['eid']."'";


$xprtfound = mysql_fetch_array(mysql_query($xprtstate));



}


//echo $statement;

$results = $db->query($statement);


// jsonise diary information;

while($record = $results->fetchRow(DB_FETCHMODE_ASSOC)){
	
	
   $clinicdte[] = array('title'=>$record['clinic_id'] ,'start'=>date('c' ,$record['date1']), 'end'=>date('c',$record['date2']), 'color'=>$record['color']);


}

$jsonised = json_encode($clinicdte);


?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='css/fullcalendar.css' rel='stylesheet' />
<link type="text/css" rel="stylesheet" rev="stylesheet" href="css/default.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/lib/moment.min.js'></script>
<script src='js/lib/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script language="javascript">
	

	

		
	$(document).ready(function() {
	
		
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
			},
			defaultDate: '<?php echo date('Y-m-d'); ?>',
			selectable: true,
			selectHelper: true,
			dayClick: function(date, jsEvent, view) {
				
       				 //alert('Clicked on: ' + date.format());
					 //alert('Current view: ' + view.name);
					//document.location="addAppointment.php?appointments=1&clinic=3";
					 
			},
			eventClick: function(calEvent, jsEvent, view) {

        		eventnme = calEvent.title;
				datecal = new Date(calEvent.start);
        	
				alert(datecal.toDateString());
			
			    document.location="addAppointment.php?appointments=1&clinic="+eventnme+"&cdate="+datecal.getTime()+"&eid="+$('#eid').val();
				
				
        		// change the border color just for fun
        		//$(this).css('border-color', 'red');

            },
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: <?php print_r($jsonised) ?>
			/*events: [
				{
					title: 'All Day Event',
					start: '2015-02-01'
				},
				{
					title: 'Long Event',
					start: '2015-02-07',
					end: '2015-02-10'
				},
				{
					title: 'Clinic Event',		
					start: '2015-05-07',
					end:   '2015-05-08'
				}
				
				
				
			]*/
			
		});
		
		
	  
		
	  
		
		
	});

</script>
<style>

	body {
		margin:0px 0px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		
		max-width: 900px;
		margin: 0 auto;
		margin-top:20px;
	}


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

   
    //background-color:rgba(218,6,6,0.5);
    background-color:rgba(40,150,215,0.5);
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
<body style="overflow:scrolls;background-image:url(Images/background-test1b.png);">
<?php 

$dbquery = new DatabaseClass;

$dbtble = "clinic";

$selectQuery = $dbquery->selectALL($dbtble,array('exp_id'=>$_SESSION['org']));

$dbRes = $db->query($selectQuery);

?>
<div style='width:100%;background-color:rgba(255,255,255,.9);height:100%;'>
<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">
<!-- <div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">-->
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="index2.php" title="" style="text-decoration:none;color:#FFF;font-size:medium;font-style:italic;font-family:'Times New Roman', Times, serif">ML Appointments</a>
    </div>
    
    <div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="index2.php">HOME</a></li>
       <!-- <li><a href="search2.php" >SEARCH</a></li> -->
        <li><a href="appointments.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:20px;font-style:normal;background-color:#C2C2"><a href="companySave.php" style="text-decoration:underline"><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>

<input type="hidden" name="eid" id="eid" value="<?php echo $_GET['eid']; ?>"/>
<p style="text-indent:20px;font-weight:bold;">Diary information for: <?php echo $xprtfound['exp_name']; ?></p>
<div id='calendar'></div>

</div>
</body>
</html>
