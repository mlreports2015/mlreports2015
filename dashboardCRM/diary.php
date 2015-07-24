<?php

session_start();

include 'includes/dcon.php';
include 'includes/inc.php';

include 'process/databaseClass.php';	

$clinicdte = array();


// select diary information

$statement = "SELECT diary_id ,expert_id, clinic_id, clinic_date as date1, clinic_date2 as date2, FROM_UNIXTIME(created_on) FROM `clinic_date`";

//echo $statement;

$results = $db->query($statement);

// jsonise diary information;

while($record = $results->fetchRow(DB_FETCHMODE_ASSOC)){
	
	
   $clinicdte[] = array('title'=>$record['clinic_id'] ,'start'=>date('c',$record['date1']), 'end'=>date('c',$record['date2']));


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
				right: 'month,agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
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
					 
					 $('#calendar').fullCalendar( 'gotoDate', date )
					 $('#calendar').fullCalendar('changeView', 'agendaDay');
         
		 			  $('#creationDiv').show();
					 
			},
			eventClick: function(calEvent, jsEvent, view) {

        		clinicData = new Array();
				
				eventnme = calEvent.title;
				datecal = new Date(calEvent.start);
        	
				clinicData = {
					
					title: eventnme,
					date1: datecal.getTime(),
					eid: $('#eid').val()
				};
// document.location="addAppointment.php?appointments=1&clinic="+eventnme+"&cdate="+datecal.getTime()+"&eid="+$('#eid').val();
				
				
				if(confirm("Cancel the "+eventnme+" event/clinic now")){
				
                
				  if(confirm("contine cancelling")){
				  
				      $.post("http://localhost/dashboardCRM/process/diaryRem.php", clinicData , function(data, status){
				
			   //	$.post("http://mlhelpline.com/process/diaryRem.php", clinicData , function(data, status){
       				  alert("Data: " + data + "\nStatus: " + status);
					  location.reload();
   				 
				    });
				  }
				 

				}
        		// change the border color just for fun
        		//$(this).css('border-color', 'red');

            },
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo $jsonised; ?>
			
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
				
				
				  //alert(clinicData);
				 /*
				   $.ajax({url: "http://localhost/dashboardCRM/process/diaryAddP.php", data:clinicDate, type:"POST", success: function(result){
            alert("An error occured: " + result);
        }});
				*/
				
				
				   $.post("http://britanniamedicare.co.uk/booker/process/diaryAddP.php", clinicData , function(data, status){
			   //$.post("http://localhost/dashboardCRM/process/diaryAddP.php", clinicData , function(data, status){
       		   //	$.post("http://mlhelpline.com/process/diaryAddP.php", clinicData, function(data, status){
				     alert("Data: " + data + "\nStatus: " + status);
					 location.reload();
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
<body>
<?php 

$dbquery = new DatabaseClass;

$dbtble = "clinic";

$selectQuery = $dbquery->selectALL($dbtble,array('exp_id'=>$_SESSION['org']));

$dbRes = $db->query($selectQuery);

?>

<!--<div class="navbar navbar-default" style="width:100%;background-color:rgba(255,0,0,0.8);margin:0px;height:30px;">-->
<div class="navbar navbar-default" style="width:100%;background-color:rgba(8,82,126,0.8);margin:0px;height:30px;">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="text-decoration:none;color:#FFF;font-style:italic;font-family:'Times New Roman', Times, serif">Britannia Medicare</a>
    </div>
    
   <div>
      <ul class="nav navbar-nav" style="width:60%">
        <li><a href="exprtIndex.php">HOME</a></li>
        <li><a href="process/listGens.php" target="_blank">GEN LISTS</a></li>
        <li><a href="diary.php" >DIARIES</a></li>
        <li><a href="venueAdd.php" >VENUES</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right" style="width:20%;">
         <li style="width:48%"><a href="expertSave.php">Accounts</a></li>
        <li style="width:40%"><a href="logout.php">Logout</a></li>
     </ul>
    </div>
  
  
  </div>
</div>
    <div class="breadcrumb" style="text-align:right;font-family:'Times New Roman', Times, serif;font-size:larger;font-style:normal;background-color:#a616c5;"><a href="expertSave.php" style="text-decoration:underline"><?php if($_SESSION['usr']){ echo $_SESSION['usr']; } else { echo 'no-one'; } ;?></a> currently logged in</div>




<div id='calendar'></div>

<div id="creationDiv" name="creationDiv" style="position:absolute;display:none;top:140px;text-align:center;border:1px solid #CCC;height:260px;width:220px;border-radius:6px;padding:8px;color:#368ccc;">
    <h4>Create Event</h4>
    <form id="frmevent" name="frmevent" style="width:95%;padding:5px;color:#368ccc;">
    <input type="hidden" name="eid" id="eid" value="<?php echo $_SESSION['org']; ?>" />
    <label for="strt" style="text-align:left" >Start Date/Time</label><br/>
    <input type="text" id="strt" name="strt" style="width:90%" />
    <br/>
    <label for="end" style="text-align:left" >End Date/Time</label><br/>
    <input type="text" id="end" name="end" style="width:90%" />
    <br/>
    <label for="venue" style="text-align:left">Venue</label><br/>
    <select id="venue" name="venue"  style="width:90%">
    <option>...select...</option>
    <?php 
    while($record = $dbRes->fetchRow(DB_FETCHMODE_ASSOC))
	{
	
	echo "<option>".$record['clinic_name']."</option>";
    
	
	}
	?>
	</select>
    <br/><br/>
    <input type="button" id="button" name="button" class="btn btn-info" value="Submit" align="center"/>
	</form>
	

</div>

</body>
</html>
