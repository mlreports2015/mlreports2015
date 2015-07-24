<?php 

session_start();

include 'includes/dcon.php';
include 'includes/inc.php';

include 'process/databaseClass.php';	
$clinicdte = array();

// select diary information

if(!isset($_GET['eid'])){

$statement = "SELECT diary_id ,expert_id, clinic_id, FROM_UNIXTIME(clinic_date) as date1, FROM_UNIXTIME(clinic_date2) as date2, FROM_UNIXTIME(created_on) FROM `clinic_date` WHERE clinic_date between ".time()." AND ".(time() + (60*60*24*60));

}else{

$statement = "SELECT diary_id ,expert_id, clinic_id, FROM_UNIXTIME(clinic_date) as date1, FROM_UNIXTIME(clinic_date2) as date2, FROM_UNIXTIME(created_on) FROM `clinic_date` WHERE expert_id = '".$_GET['eid']."' AND clinic_date between ".time()." AND ".(time() + (60*60*24*60));

}


echo $statement;

$results = $db->query($statement);


// jsonise diary information;

while($record = $results->fetchRow(DB_FETCHMODE_ASSOC)){
	
	
   $clinicdte[] = array('title'=>$record['clinic_id'] ,'start'=>$record['date1'], 'end'=>$record['date2']);


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
			selectable: true,
			selectHelper: true,
			eventClick: function(calEvent, jsEvent, view) {

        		eventnme = calEvent.title;
				datecal = new Date(calEvent.start);
        	
				alert(datecal.toDateString());
			
			    document.location="addAppointment.php?appointments=1&clinic="+eventnme+"&cdate="+datecal.getTime()+"&eid="+$('#expid').val();
				
				
        		// change the border color just for fun
        		//$(this).css('border-color', 'red');

            },
			
			select: function(start, end) {
				var view = $('#calendar').fullCalendar('getView');
				if(view.title!="month"){
				
				//var title = prompt('Event Title:');
				
				$('#strt').val(start);
				$('#end').val(end);
				
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					
					
					if(eventData.title!="")
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				
				}
				$('#calendar').fullCalendar('unselect');
			},
			dayClick: function(date, jsEvent, view) {
				
       				 //alert('Clicked on: ' + date.format());
					 //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
					 //alert('Current view: ' + view.name);
					 
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
		
		
	   $("button").click(function(){
								 
				
				if($(this).text()=='month'){
					
				   
				   $('#creationDiv').hide();
				
				}
									  
		
		})
		
		
	   $("#button").click(function(){
				
			clinicData = new Array();	
								  
			 if($("#venue").val()){					  
				
				title = $("#venue").val();
				start = $("#strt").val();
				end = $("#end").val();
				exprtid = $("#eid").val();
				
					eventData = {
						title: title,
						start: start,
						end: end
					};

				
				 clinicData = {
					 
					   date1:start,
					   date2:end,
					   eid:exprtid,
					   venue:title
				 			};
				
				
				  alert(clinicData);
				 /*
				   $.ajax({url: "http://localhost/dashboardCRM/process/diaryAddP.php", data:clinicDate, type:"POST", success: function(result){
            alert("An error occured: " + result);
        }});
				*/
				
				 $.post("http://10.10.15.5/mlappointments/process/diaryAddP.php", clinicData , function(data, status){
       				 alert("Data: " + data + "\nStatus: " + status);
   				 });
				
				
				
				$('#calendar').fullCalendar('renderEvent', eventData, true);
				
				
				
				
			 }
			 
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
<body>
<?php 

$dbquery = new DatabaseClass;

$dbtble = "clinic";

$selectQuery = $dbquery->selectALL($dbtble,array('exp_id'=>$_SESSION['org']));

$dbRes = $db->query($selectQuery);

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
        <li><a href="addAppointment.php" >APPOINTMENTS</a></li>
        <li><a href="instructionAdd.php" >INSTRUCTION</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
        <li style="width:48%"><a href="companySave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-style:italic;"><a href="companySave.php" ><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>




<div id='calendar'></div>


</body>
</html>
