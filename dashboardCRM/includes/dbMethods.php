<?php

class DB_Methods
{
	var $query=array();
	
	public function __construct()
    {
    }
    
    function newSelectQ($qIndex, $tbl, $qArray, $order)
    {
    	$this->query[$qIndex]="select * from $tbl";
        
//checking for a where clause
        if (count($qArray)>0 && is_array($qArray))
        {
        	$this->query[$qIndex]=$this->query[$qIndex].' where ';

//getting the query indices
			$key=array_keys($qArray);

//generating the where clause
			$where='';
			for ($i=0; $i<count($qArray); $i++)
			{
				$where=$where.$key[$i]."='".$qArray[$key[$i]]."'";
				
				if ($i<count($qArray)-1)
				{
					$where=$where.' and ';
				}
			}
			
			$this->query[$qIndex]=$this->query[$qIndex].$where." $order";
		}
		
		return $this->query[$qIndex];
    }
	
	
	public function selectCount($qIndex, $tbl, $qArray, $order)
	{
		$query=$this->newSelectQ($qIndex, $tbl, $qArray, $order);

		$q=mysql_query($query);
		$num=mysql_num_rows($q);
		
		return $num;
	}
	
	
	public function selectValues($qIndex, $tbl, $qArray, $order)
	{
		$query=$this->newSelectQ($qIndex, $tbl, $qArray, $order);
		$return=array();
		
		$i=0;
		
		$q=mysql_query($query);
		
		$key=$this->tblKeys($tbl);
		
		while ($r=mysql_fetch_array($q))
		{
			for ($j=1; $j<count($key); $j+=2)
			{
				$return[$i][$key[$j]]=$r[$key[$j]];
			}
			
			$i=$i+1;
		}
		
		return $return;
	}
	
	private function tblKeys($tbl)
	{
		$r=mysql_fetch_array(mysql_query("select * from $tbl"));
		
		$keys=array_keys($r);
		return $keys;
	}
	
	public function newInsertQ($qIndex, $tbl, $qArray)
	{
		$this->query[$qIndex]="insert into $tbl";
		
		if (count($qArray)>0 && is_array($qArray))
        {
        	$this->query[$qIndex]=$this->query[$qIndex].' set ';

//getting the query indices
			$key=array_keys($qArray);

//generating the set clause
			$set='';
			for ($i=0; $i<count($qArray); $i++)
			{
				$set=$set.$key[$i]."='".$qArray[$key[$i]]."'";
				
				if ($i<count($qArray)-1)
				{
					$set=$set.', ';
				}
			}
			
			$this->query[$qIndex]=$this->query[$qIndex].$set;
			
			return $this->query[$qIndex];
		}
	}
	
	
	public function insertValues($qIndex, $tbl, $qArray)
	{
		$q=$this->newInsertQ($qIndex, $tbl, $qArray);
		
		return mysql_query($q);
	}
	
	
	public function newUpdateQ($qIndex, $tbl, $sArray, $wArray)
	{
		$this->query[$qIndex]="update $tbl";
		
		if (count($sArray)>0 && is_array($sArray))
        {
        	$this->query[$qIndex]=$this->query[$qIndex].' set ';

//getting the set indices
			$key=array_keys($sArray);

//generating the set clause
			$set='';
			for ($i=0; $i<count($sArray); $i++)
			{
				$set=$set.$key[$i]."='".$sArray[$key[$i]]."'";
				
				if ($i<count($sArray)-1)
				{
					$set=$set.', ';
				}
			}
			$this->query[$qIndex]=$this->query[$qIndex].$set;
		}

//clearing the keys
		$key=array();

//generating the where clause
		if (count($wArray)>0 && is_array($wArray))
        {
//getting the where indices
			$key=array_keys($wArray);
			
			$where='';
			for ($i=0; $i<count($wArray); $i++)
			{
				$where=$where.$key[$i]."='".$wArray[$key[$i]]."'";
				
				if ($i<count($wArray)-1)
				{
					$where=$where.' and ';
				}
			}
			
			$this->query[$qIndex]=$this->query[$qIndex].' where '.$where;
			
			echo $this->query[$qIndex];
			return $this->query[$qIndex];
		}
	}
	
	
	public function updateValues($qIndex, $tbl, $sArray, $wArray)
	{
		$q=$this->newUpdateQ($qIndex, $tbl, $sArray, $wArray);
		
		return mysql_query($q);
	}
}

?>