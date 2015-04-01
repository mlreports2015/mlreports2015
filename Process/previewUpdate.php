<?php


include '../dcon.php';

$comments ='';
//check input


switch($_POST['typ']){
	
	case "dob":
			   $comments =strip_tags($_POST['comm'],"<br><u>");
			   $sqldob = "UPDATE `claimant` SET cdb='".date('Y-m-d',strtotime($comments))."' WHERE cid='1702'";
			   mysql_query($sqldob);
			   echo $sqldob;
			   break;
	case "job":
			  $comments = strip_tags($_POST['comm'],"<br><u>");
			  $sqljob = "UPDATE `claimant` SET emp='".trim($comments)."' WHERE cid='1702'";
			  mysql_query($sqljob);
			  echo $sqljob;
			  break;
	case "doa":
			  $comments = strip_tags($_POST['comm'],"<br><u>");
			  $sqldoa = "UPDATE `claimant` SET cda='".date('Y-m-d',strtotime($comments))."' WHERE cid='1702'";
			  mysql_query($sqldoa);
			  echo $sqldoa;
			  break;
	case "doe":
			  $comments = strip_tags($_POST['comm'],"<br><u>");
			  $sqldoe = "UPDATE `claimant` SET cde='".date('Y-m-d',strtotime($comments))."' WHERE cid='1702'";
			  echo $sqldoe;
			  break;
	case "ageRef":
				$comments = strip_tags($_POST['comm'],"<br><u>");
				$sqlageRef = "UPDATE `claimant` SET cageref ='".trim($comments)."' WHERE cid ='1702'";
				echo $sqlageRef;
				break;
			  
	case "acc":
		$comments =strip_tags($_POST['comm'],"<br><u>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			   //echo $line;
			   $sqlacc = "UPDATE `accid` SET accid='".mysql_escape_string(trim($line))."' WHERE id='1702'";
			   mysql_query($sqlacc);
			   echo $sqlacc;
			}
		}
		break;
	
	
	case "inj":
		$comments =strip_tags($_POST['comm'],"<br><u>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			   if(strpos($line, "Suffered")!==false){
				 
						 $sqleff = "UPDATE eff SET msg ='".$line."' WHERE cid='1702' AND prob='$title' LIMIT 1";
			      		 echo $sqleff;
					 	 mysql_query($sqleff);
				 
				}else{
				
				   	if(strpos($line,"<u>")!==false){
						$title = strip_tags($line);
					
					}
				}
			}
		}
		break;
	 case "treat":
	  	$comments =strip_tags($_POST['comm'],"<br>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  if(strpos($line,"Later Treatment")!==false){
				 		
						exit();
			  
			  }else if(strpos($line,"Initial Treatment")!==false){
				  
			  }else{
					
				//echo $line;	
				$sqltreat = "UPDATE treat SET msg ='".$line."' WHERE cid='1702' AND stat='i'";
				echo $sqltreat;
			  }
			 
			  
			}
		}
		break;
	  
	  case "lsymptom":
	  	$comments =strip_tags($_POST['comm'],"<br><u>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  if(strpos($line,"<u>")===false){
				//echo $line;
			  	$sqlprog = "UPDATE eff SET msg ='".trim($line)."' WHERE id ='1702' and prob='".$title."' LIMIT 1";
			    echo $sqlprog;
	   		  
			  }else{
				  
				$title = strip_tags($line);  
			  }
		
				
		
			}
		}
		break;	
	
	  case "emp":
	    $counter = 10;
	  	$comments =strip_tags($_POST['comm'],"<br>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  
					
				//echo $line;	
				$counter = $counter + 1;
				$sqltreat = "UPDATE emp SET msg1 ='".trim($line)."' WHERE id='1702' and num=".$counter;
				echo $sqltreat;
				mysql_query($sqltreat);
			  
			 
			  
			}
		}
		break;	
	 
	   case "future":
	  	$counter=0;
		$comments =strip_tags($_POST['comm'],"<br>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  
					
				//echo $line;	
				$counter = $counter + 1;
				if($counter >= 2){
				   $sqljob = "UPDATE job SET ltef ='".trim($line)."' WHERE id='1702'";
				}else{
				   $sqljob = "UPDATE job SET jrest ='".trim($line)."' WHERE id='1702'";
				}
				echo $sqljob;
			    mysql_query($sqljob); 
			 
			  
			}
		}
		break;
	 
	  case "hcirc":
	  	$comments =strip_tags($_POST['comm'],"<br>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  
					
				//echo $line;	
				$sqlhcirc = "UPDATE hcirc SET msg='".trim($line)."' WHERE id='1702' LIMIT 1";	
			 	echo $sqlhcirc;
			  
			}
		}
		break;	

	 case "pmh":
	 
	 	$comments =strip_tags($_POST['comm'],"<br><u>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
			
			if($line!=""){
			
			 
			  $sqlpmh = "UPDATE pmh SET hist='".mysql_escape_string(trim($line))."' WHERE id='1702'";
			  echo $sqlpmh;
			   mysql_query($sqlpmh);
			}
			
		}
	 
	 	break;
      
	 case "progno":
	  	$comments =strip_tags($_POST['comm'],"<br><u>");
		$lines = explode("<br>",$comments);
		foreach($lines as $line){
		
			if($line!=""){
			  if(strpos($line,"<u>")===false){
				//echo $line;
			  	$sqlprog = "UPDATE prog SET prog ='".trim($line)."' WHERE id ='1702' and prob='".$title."' LIMIT 1";
			    echo $sqlprog;
				mysql_query($sqlprog);
	   		  
			  }else{
				  
				$title = strip_tags($line);  
			  }
		
				
		
			}
		}
		break;
	default:
		echo "incorrect type request";


}



?>