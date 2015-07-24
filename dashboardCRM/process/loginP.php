<?php

include '../includes/dcon.php';
include '../includes/inc.php';



 //$res =&$db->query("SELECT * FROM login WHERE usr_nme='".$_POST['usrid']."' AND usr_pass='".$_POST['psswrd']."'");

    
	
	$statement = "SELECT * FROM login WHERE usr_nme='".$_POST['usrid']."' AND usr_pass='".$_POST['psswrd']."'";
	//echo $statement;
	$res =mysql_query("SELECT * FROM login WHERE usr_nme='".$_POST['usrid']."' AND usr_pass='".$_POST['psswrd']."'");

   //$res = mysql_query("SELECT * FROM solic_log WHERE solic_user='".$_POST['usrid']."' AND solic_pass='".$_POST['psswrd']."'");
	
//    var_dump($res);

 if(mysql_num_rows($res) == 1){
 //if($res->numRows()==1){
 
    //$row = $res->fetchRow(DB_FETCHMODE_ASSOC);
     
	 $row = mysql_fetch_array($res);
	 
	 //echo $row['usr_nme'] . "\n";

 
 
 
   $ipC=ip2long($_SERVER['REMOTE_ADDR']);
   $ipR[0]=ip2long('10.10.15.8');
   $ipR[1]=ip2long('10.10.15.254');
	
	//echo $ipC;
	
	if ($ipC>=$ipR[0] && $ipC<=$ipR[1] || $ipC==ip2long('127.0.0.1'))
	{
		session_start();
			// echo $_POST['usr_name'];
		  
		   if($row['usr_hash']==''){

				$criteria2 = array("usr_id"=>$row['usr_id']);
				$fields = array("usr_hash"=>crypt($row['usr_pass']));	

				//$criteria2 = array("usr_id"=>$row['solic_id']);
				//$fields = array("usr_hash"=>crypt($row['solic_pass']));
				
				//$dbupdate = $dbquery->updateQuery($fields,$criteria2,'login');	
		        //$dbupdateres = mysql_query($dbupdate);
			
			}
			 //echo $row['usr_nme'];
		    $_SESSION['usr']=$_POST['usrid'];
			$_SESSION['usr_id'] = $row['usr_id'];
            $_SESSION['typ']=$row['usr_typ'];
			$_SESSION['solic']=$row['caseman_id'];
            $_SESSION['org']=$row['usr_orgid'];
			$_SESSION['remote']=$_SERVER['REMOTE_ADDR'];	
			$_SESSION['hashremote']=crypt($_SERVER['REMOTE_ADDR']);
			$_SESSION['user_agent']=$_SERVER['HTTP_USER_AGENT'];
		
	}
	else
	{
		
		
			//echo $_POST['usrid'];
			session_start();

			$_SESSION['usr']=$_POST['usrid'];
			$_SESSION['usr_id']=$row['usr_id'];
            $_SESSION['typ']=$row['usr_typ'];
			$_SESSION['solic']=$row['caseman_id'];
             $_SESSION['org']=$row['usr_orgid'];
			$_SESSION['remote']=$_SERVER['REMOTE_ADDR'];	
			$_SESSION['user_agent']=$_SERVER['HTTP_USER_AGENT'];			
				
									
		/*
			mysql_close($conn);
			alert('Remote access not possible, please contact your administrator');
			red('index.html');
			*/
		
	}



    switch($row['usr_typ']) {

        case 'exprt':
            red('../diary.php?'.$row['usr_orgid']);
            break;
        case 'solic':
            red('../appointments.php');
            break;
        default:
            red('../appointments.php');
            break;
    }


}else{
	
	echo "not a valid user";
	red('http://mldoctors.com/booking/?error=1');

}


?>