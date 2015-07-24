<?php
class DatabaseClass {


	function insertquery($fields,$values,$tbl){
		
		
	   if(count($fields)>1){
		   
		
		$params = "";
		$count = 0;
		
		foreach($fields as $field){
		   
		   if($params==''){
		   $params = $field."='".mysql_real_escape_string($values[$count])."'";
		   }else{
			$params .= ",".$field."='".mysql_real_escape_string($values[$count])."'";   
		   }
		   $count ++; 
			
		}
		
		return "INSERT INTO `".$tbl."` SET ".$params ;
		   
		   
	   }else{
		   
		return "INSERT INTO `".$tbl."` SET ".$fields[0]."='".$values[0]."'";
		
	   }
	   
	   
	} // end insert
	
	
	
	function insertQuery2($fieldvals,$tbl)
	{
		
		
		if(count($fieldvals)>1){
		   
		
		$params = "";
		$count = 0;
		
		foreach($fieldvals as $key=>$val){
		   
		   if($params==''){
		   $params = $key."='".mysql_real_escape_string($val)."'";
		   }else{
			$params .= ",".$key."='".mysql_real_escape_string($val)."'";   
		   }
		   $count ++; 
			
		}
		
		return "INSERT INTO `".$tbl."` SET ".$params ;
		   
		
	   }
	   
		
		
	
	}
	
	function updateQuery($fields, $criteria, $tbl){
		
	
		
	if(count($fields)>0){
			
		$params = '';
		
		foreach($fields as $key=>$value){
		   
		   if($params==''){
		   $params = $key."='".mysql_real_escape_string($value)."'";
		   }else{
		   $params .= ",".$key."='".mysql_real_escape_string($value)."'";   
		   }
		  
			
		}
		
		$where = '';
		foreach($criteria as $key=>$value){
			
			if($where==''){
			
				$where = $key."='".$value."'";
				
			}else{
			
				$where .=" AND ".$key."='".$value."'";
			
			}
			
		}
			
		
	
	}
		
		
			return "UPDATE `".$tbl."` SET ".$params." WHERE ".$where;
	
	
	}
	
	
	function deleteQuery($criteria, $tbl){
		

		
		$where = '';
		
		//print_r($criteria);
		
		foreach($criteria as $key=>$value){
			
			if($where==''){
			
				$where = $key."='".$value."'";
				
			}else{
			
				$where .=" AND ".$key."=".$value."'";
			
			}
			
		}
			
		
	
	  
		
		
			return "DELETE FROM `".$tbl."` WHERE ".$where;
	
	
	}
	
	
	
	
	function selectALL($tbl,$criteria){
		
	
		if(count($criteria)>=1){
			
			$params='';   
		  foreach($criteria as $key=>$value){
			  
			if($params==''){     
			$params = $key." = '".$value."'"; 
			}else{
			$params .= " AND ".$key." = '".$value."'"; 	
			}
			  
		  }
			
		
		return "SELECT * FROM `".$tbl."` WHERE ".$params;
		
		}else{
			
		return "SELECT * FROM `".$tbl."`";
		
		}
	
	
	
	}// end select all
	
	
	 //set select statements
	 
	 function selectquery($fields, $criteria, $tbl){
		 
		// print_r($fields);
		// print_r($tbl);
		 
		 if(count($tbl)>=1){
			 
					
				$selectionFields = '';
				foreach($fields as $field){
					
					foreach($field as $key=>$value){
						
					   if($selectionFields ==''){
					     $selectionFields = $key.".".$value;
					   }else{
					     $selectionFields .=" , ".$key.".".$value;	
					   }
					
					
					}
					
				}
		
		
				$tbleselect = '';
			    foreach($tbl as $valtbl){
					
				    if($tbleselect==''){
					$tbleselect = "`".$valtbl."`" ;
					}else{
						
				     	if($valtbl =="company"){	
				    	$tbleselect .= " JOIN `".$valtbl."` ON order.comp_id = company.comp_id";	
						}else if($valtbl=="status"){
						$tbleselect .= " JOIN `".$valtbl."` ON order.status = status.stat_id";	
						}else{
						$tbleselect .=" JOIN `".$valtbl."`";	
						}
					
					}
				}
		
		         if(count($criteria)>=1){
				
						$where = '';
					
					foreach($criteria as $key=>$value){
					   if($where==''){
						  $where =$key."='".$value."'";
					   }else{
						  $where .=" AND ".$key."='".$value."'";  
					   }
					
					}
					
				
			    return "SELECT ".$selectionFields." FROM ".$tbleselect." WHERE ".$where;
				 }else{
				return "SELECT ".$selectionFields." FROM ".$tbleselect;
				 }
				
			//select * from order where company_id = x "
		
			 
		 }
		 
		 	 
		 
		 
	 }//end select
	 
	 
	 
	
		 function selectqueryconds($fields, $criteria,$conds,$tbl){
		 
		// print_r($fields);
		// print_r($tbl);
		 
		 if(count($tbl)>=1){
			 
					
				$selectionFields = '';
				foreach($fields as $field){
					
					foreach($field as $key=>$value){
						
					   if($selectionFields ==''){
					     $selectionFields = $key.".".$value;
					   }else{
					     $selectionFields .=" , ".$key.".".$value;	
					   }
					
					
					}
					
				}
		
		
				$tbleselect = '';
			    foreach($tbl as $valtbl){
					
				    if($tbleselect==''){
					$tbleselect = "`".$valtbl."`" ;
					}else{
						
				     	if($valtbl =="company"){	
				    	$tbleselect .= " JOIN `".$valtbl."` ON order.comp_id = company.comp_id";	
						}else if($valtbl=="status"){
						$tbleselect .= " JOIN `".$valtbl."` ON order.status = status.stat_id";	
						}else if($valtbl=="delivery"){
						$tbleselect .= " JOIN `".$valtbl."` ON order.order_id = delivery.order_id";		
						}else{
						$tbleselect .=" JOIN `".$valtbl."`";	
						}
					
					}
				}
		
		      if(count($criteria)>=1){
				
						$where = '';
					
				
				  foreach($criteria as $Items){
					
					   if($where==''){
						
						   if($Items[2]=='eq'){
						    $where =$Items[1]."='".$Items[3]."'";
						   }else if($Items[2]=='like'){
							 $where = $Items[1]." LIKE '%".$Items[3]."%'";   
						   }else if($Items[2]=='between'){
							  
							  $where = "UNIX_TIMESTAMP(".$Items[1].") BETWEEN ".strtotime($Items[3])." AND ".strtotime($Items[4]);   
						   		
						   }
					   
					   }else{
						   
						   if($conds=='OR'){
						     if($Items[2]=='eq'){
						       $where .="  OR ".$Items[1]."='".$Items[3]."'";
						     }else if($Items[2]=='like'){
							   $where .= " OR ".$Items[1]." LIKE '%".$Items[3]."%'";   
						     }else if($Items[2]=='between'){
							  
							  $where .= "AND UNIX_TIMESTAMP(".$Items[1].") BETWEEN ".strtotime($Items[3])." AND ".strtotime($Items[4]);   
						   		
						   }
						   
						   }else if($conds=='AND'){
							  
							  if($Items[2]=='eq'){
						       $where .="  AND ".$Items[1]."='".$Items[3]."'";
						     }else if($Items[2]=='like'){
							   $where .= " AND ".$Items[1]." LIKE '%".$Items[3]."%'";   
						     }else if($Items[2]=='between'){
							  
							  $where .= "AND UNIX_TIMESTAMP(".$Items[1].") BETWEEN ".strtotime($Items[3])." AND ".strtotime($Items[4]);   
						   		
						     }
							   
						   }
					   
					   }//where
					 
					
					
					}//each
					
				
			    return "SELECT ".$selectionFields." FROM ".$tbleselect." WHERE ".$where;
				 }else{
				return "SELECT ".$selectionFields." FROM ".$tbleselect;
				 }
				
			//select * from order where company_id = x "
		
			 
		 }
		 
		 	 
		 
		 
	 }//end select
	
	
	function advSearchQuery($info){
		
	$srchConst = array('dealnme'=>'deal_id','dealID'=>'deal_id','product'=>'prod_name','voucher'=>'vouch_Code','courier'=>'courier','status'=>'status','coId'=>'comp_id');
	
	$srch = explode("&",$info);
	
	$where = '';
	
	foreach($srch as $value){
		
		$items = explode('=',$value);
		
		
		  foreach($srchConst as $key=>$value){
			
			if($key == $items[0]){
			  if($where==''){
				if($key=='courier'){
				$where ="delivery.".$value." LIKE '%".$items[1]."%'";	
				}else{
  			    $where =$value." LIKE '%".$items[1]."%'";
				}
				 
				 
			  }else{
				 if($key=='courier'){ 
				   $where .=" AND delivery.".$value." LIKE '%".$items[1]."%'";  
				 }else{
					$where .=" AND ".$value." LIKE '%".$items[1]."%'";  
				 }
			  }
			  
			  
        	}
			
			
			
		  }
		  
		if($items[0]=='dtstart'){
			 if($where!=''){
			$where .= " AND UNIX_TIMESTAMP(order.dated) between ".strtotime($items[1]);
			  }else{
			$where = " UNIX_TIMESTAMP(order.dated) between ".strtotime($items[1]);	
			  }
	    }else if($items[0]=='dtend'){
				$where .= " AND ".strtotime($items[1]);
		}else{
			  //echo $where;	
		}
	
	}
	
	
	   		//echo $where;
    
	
	if(stripos($where,'courier')>=1){
		return "SELECT order.order_id , order.deal_id , order.vouch_Code, order.client_id , order.order_post , order.order_price , order.dated , status.stat_name FROM `order` JOIN delivery ON delivery.order_id = order.order_id JOIN `status` ON order.status = status.stat_id  WHERE ".$where	;
	}else{
	return "SELECT order.order_id , order.deal_id , order.vouch_Code , order.client_id, order.order_post , order.order_price , order.dated , status.stat_name FROM `order` JOIN `status` ON order.status = status.stat_id WHERE ".$where;
	}
	 
	
	 
	}
	

	
}



?>
