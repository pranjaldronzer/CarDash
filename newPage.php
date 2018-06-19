<?php

/**
 * 
 */
class handleQuery 
{
	
	function handleQuery()
	{
		$query=$_SERVER['QUERY_STRING'];
		echo $query;

		echo "<br>"
		$myfile = fopen("sample.html", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("sample.html"));
		fclose($myfile);
	}
}


?>