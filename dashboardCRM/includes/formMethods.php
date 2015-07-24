<?php

class FormMethods
{
	public function __contruct()
	{
	}
	
	public function arrayReturn($kPostfix)
	{
		$key=array_keys($_POST);
		
		for ($i=0; $i<count($_POST); $i++)
		{
			if ($kName=strstr($key[$i], $kPostfix, true))
			{
				$array[$kName]=$_POST[$key[$i]];
			}
		}
		
		return $array;
	}
}

?>