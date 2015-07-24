<?php
		
	  require_once 'DB.php';

		$dsn = array(
    'phptype'  => 'mysql',
    'username' => 'root',
    'password' => '',
    'hostspec' => 'localhost',
    'database' => 'expertlist'
);

/*
		$dsn = array(
    'phptype'  => 'mysql',
    'username' => 'root',
    'password' => 'bismillah',
    'hostspec' => 'localhost',
    'database' => 'expertlist'
);
	*/	
		
		$options = array(
  		  'debug'       => 2
		);
		
		$db =& DB::connect($dsn,$options);
		
		
		//$mdb2 =& MDB2::singleton($dsn);
			
			if (PEAR::isError($db)) {
    			die($db->getMessage());
			}

		
		
      // $conn=mysql_connect("localhost", "root", "") or die(mysql_error());
	// $conn=mysql_connect("localhost", "mlhelpli_empire", "BismiLlah_786") or die(mysql_error());
	  // mysql_select_db("dashboardtbl") or die(mysql_error());
     //mysql_select_db("mlhelpli_buyerempire");
?>