<?php include "../includes/db.php";



//using ajax to process the request
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$role=$_POST['role'];
	//choosing a profile pic randomly
	$image="users/profile_pics/defaults/pic_".rand(1,4).".jpg";
	$msg="";
	$class="alert alert";
	
	//performig error handling
	
	if(empty($username))
	{
		$msg="<b>Username is required</b>";
		echo"<div class='$class-danger'>$msg</div>";
	}
	else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$msg="<b>invalid Email</b>";
		echo"<div class='$class-danger'>$msg</div>";
	} else if(strlen($password)<8)
	{
		$msg="<b>password is short</b>";
		echo"<div class='$class-danger'>$msg</div>";
	}
	else
	{
		$password=md5($password);
		$sql="INSERT INTO users (username,email,password,profile_pic,role)
		VALUES('$username','$email','$password','$image','$role')";
		$query=mysqli_query($connection,$sql);
		if(!$query)
		{
			$msg="<b>could no add user</b>";
		   echo"<div class='$class-success'>$msg</div>";
		}
		else{
			?>
			<script>
			
			window.location.assign("../view_users.php");
			</script>
			<?php
			
		}
	}
	
}