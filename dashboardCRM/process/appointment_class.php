<?php
class Appointment
{

	public $db;
	public $sqlrecs;
	public $sqlRes;
	
    function appointment(){
			
     include 'DB.php';

		$dsn = array(
    'phptype'  => 'mysql',
    'username' => 'root',
    'password' => '',
    'hostspec' => 'localhost',
    'database' => 'dashboardtbl'
);
	
		$options = array(
  		  'debug'       => 2
		);
		
	  $this->db = DB::connect($dsn,$options);

		
	}
	

	function view_record($tbl,$parms){
	
	
	$sqlrecs = "SELECT * FROM $tbl WHERE ";
	
	foreach($parms as $key=>$value){
	
		$n = $n+1;
		if($n >1){
			if($key =='app_tme'){
			$sqlrecs .= " AND $key LIKE '".substr($value,0, -1)."%'";
			}else{
			$sqlrecs .= " AND $key = '$value' ";	
			}
		}else{
			
		     $sqlrecs .= "$key = '$value'";
		}
		
	}
	
	$this->sqlRes = $this->db->query($sqlrecs);
	
	return $this->sqlRes;
		
	}


	function add_record($tbl,$parmrec){
	
	
	$sqlrecs = "INSERT INTO $tbl SET ";
	
	foreach($parmrec as $key=>$value){
		
	    $n = $n+1;
		if($n >1){
		$sqlrecs .= ", $key = '$value' ";	
		}else{
		$sqlrecs .= "$key = '$value'";
		}
	
	}
	
		$this->db->query($sqlrecs);
	
	return $sqlrecs;
	
		
	}
	
	function modif_record($tbl,$params,$id){
		
		
	}
	
	function del_record($tbl,$id){
		
		// validate id and confirm if they wish to continue.
		
		// record with associated id
		// DELETE FROM $tbl WHERE id = $id;

		$sql = "DELETE FROM $tbl WHERE app_id = '".$id."'";
		
		$this->db->query($sql);
		//print_r($this->db);
	
		 
		 return $this->db->affectedRows();
	}
	
	
}
?>