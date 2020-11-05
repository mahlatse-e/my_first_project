<?php

include 'db.php';

$error=[];

if(isset($_POST['create_submit']))
{
	$username=clean($_POST['username']);
	$email=clean($_POST['email']);
	$pwd=$_POST['pwd'];
	
	if(empty($username))
	{
		array_push($error,"<p class='alert alert-danger'>please enter username</p>");
		header("location:../../first_page.php?error=username_is_required");
		
	}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		array_push($error,"<p class='alert alert-danger'>email is invalid</p>");
		header("location:../../first_page.php?error=email_is_invalid");
		
	}
	elseif(empty($email))
	{
		array_push($error,"<p class='alert alert-danger'>email is  required</p>");
		header("location:../../first_page.php?error=email_is_required");
		
	}
	elseif(strlen($pwd)<=8)
	{
			array_push($error,"<p class='alert alert-danger'>passwword is  short</p>");
		header("location:../../first_page.php?error=passwword_is_short");
		
	}
	else{
		
		if (empty($error))
		{
			
			//$rand=rand( 1,4);
			
			/*switch($rand)
			{
				case "1":
				$profile_pic="users/profile_pics/defaults/pic_1.jpg";
				break;
				
				case "2":
				$profile_pic="users/profile_pics/defaults/pic_2.jpg";
				break;
				
				case "3":
				$profile_pic="users/profile_pics/defaults/pic_3.jpg";
				break;
				
				case "4":
				$profile_pic="users/profile_pics/defaults/pic_4.jpg";
				break;
			}*/
			$profile_pic="users/profile_pics/defaults/pic_".rand(1,4).".jpg";
			$hashedpwd=md5($pwd);
			$query=mysqli_query($connection,"INSERT INTO USERS
			VALUES('','$username','$email','$hashedpwd','$profile_pic','yes','0','Admin')");
			header("location: ../../first_page.php?admin_created");
			
		}
	}
	
	
}

//prevent html injection
function clean($data){
	global $connection;
	$data=htmlspecialchars($data);
	$data=mysqli_real_escape_string($connection,$data);
	$data=stripslashes($data);
	$data=strip_tags($data);
	
	return $data;
}