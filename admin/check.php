<?php
session_start();
include "includes/db.php";
$email=$_SESSION['userLogged'];

if(isset($_POST['text']))
{
	$pwd=md5($_POST['text']); 
	$sql="SELECT password FROM users WHERE email='$email'";
	$query=mysqli_query($connection,$sql);
	$res=mysqli_fetch_array($query);
	$pwdfromdb=$res['password'];
	if($pwdfromdb==$pwd)
	{
		echo "password match";
	}else
	{
		echo "password doesnt match";
	}
}

?>