<?php include "includes/header.php";

$email=$_SESSION['userLogged'];

//update password
if (isset($_POST['npwd'])){
	
	$oldpwd=$_POST['oldpwd'];
	$newpwd=$_POST['newPwd'];
	$pwdupdate="SELECT password FROM users WHERE email='$email'";
	$query=mysqli_query($connection,$pwdupdate);
	$results=mysqli_fetch_array($query);
	$passFromdb=$results['password'];
	$strictpwd=md5($oldpwd);//hashed password
	if ($passFromdb==$strictpwd)
	{
		$newStrictedpwd=md5($newpwd);
		$Updatepwd="UPDATE users SET password='$newStrictedpwd' WHERE email='$email'";
		$query=mysqli_query($connection,$Updatepwd);
		if(!$query)
		{
			header("Location: change_password.php?password_incorrect");   
 
		}
		else
		{
		   header("Location: profile.php?password_updated");	
		}
		
	}
}

?>

<?php include "includes/panel.php";?>




<div class="col-md-12">

<h2>change your password</h2>
<p><a href="profile.php">click here go to profile</a></p>
<form action="" method="post" enctype="multipart/form-data">
     
     <div class="col-md-3"> 
     <div class="form-group">
	  <label for="username">Old password</label>
	  <input type="password" name="oldpwd" class="form-control">
	  <p id="check" style="font-size:11px" ></p>
	 </div>
	 
	 
     <div class="form-group">
	  <label for="username"> New password</label>
	  <input type="password" name="newPwd" class="form-control">
	 </div>
   
   
    <div class="form-group">
	<input type="submit" name="npwd" class="btn btn-default" value="update password">
	</div>
	 
   </div>
   
   </form>
   </div>
    <script>
   $(document).ready(function(){
	   $("#oldpwd").keyup(function(){
		   let text= document.getElementByid("oldpwd").value;
		   $("#check").load('check.php',{
			   text:text
			   });
	   });
   });
   </script>
   </body>
   </html>