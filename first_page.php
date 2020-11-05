<?php 
include 'includes/header.php';
$query=mysqli_query($connection,"SELECT * FROM users");

if (mysqli_num_rows($query)===0)
{
	include 'add_admin.php';
}
else{
	include 'login.php';
}

