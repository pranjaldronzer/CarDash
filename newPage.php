<?php

/**
 * 
 */
class NewPage 
{
	
	function newPage()
	{
		$query=$_SERVER['QUERY_STRING'];
		echo "hello from newPage";
		echo $query;
	}
}


?>
