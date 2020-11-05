<?php


function delete($table,$colName,$id)
{
	global $connection;
	$sql="DELETE FROM $table WHERE $colName=$id";
	$query=mysqli_query($connection,$sql);
	
	if($query)
	{
		return true;
	}else
	{return false;}
	
}


//redirecting
function redirect($page='index.php'){
	
	header("location:".$page."");
}