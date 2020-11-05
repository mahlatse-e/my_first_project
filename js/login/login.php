<?php
SESSION_START();

$mysqli= new mysqli("localhost","root","newpassword","Project_cms") or die ("could not connect");



if(isset($_POST['create_submit'])){
	
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	
	$query=mysqli_query($mysqli,"SELECT * FROM users WHERE email='$email'");
	$row=mysqli_fetch_assoc($query);
	$db_email=$row['email'];
	$db_password=$row['password'];
	$profile_pic=$row['profile_pic'];
	$username=row['username'];
	
	$rehashpwd=md5($pwd);
	
	if($email===$db_email && $db_password===$rehashpwd)
	{
		$_SESSION['userLogged']=$email;
		$_SESSION['profile_pic']=$profile_pic;
		$_SESSION['username']=$username; 
		header("Location: ../../admin");
		
	}
	else{
		$_SESSION['log_email']=$email;
		//echo"<script>alert('invalid username or password entered!')</script>";
		header("Location: ../../first_page.php?wrong_entries");
		 
	}
	
}
