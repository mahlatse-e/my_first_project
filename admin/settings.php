<?php include "includes/header.php";



$email=$_SESSION['userLogged'];

if(isset($_POST['update_image']))
{
	$user_password=$_POST['conf_pwd'];
	$sql="SELECT password FROM users WHERE email='$email'";
	$query=mysqli_query($connection,$sql);
	$res=mysqli_fetch_array($query);
	$strpwd=md5($user_password);
	$pwdfromdb=$res['password'];
	if($pwdfromdb===$strpwd)
	{
		if(isset($_FILES['image_file']) && $_FILES['image_file']['name']!=="")
		{
			 $dir="users/profile_pics/";
			 $fileName=$_FILES['image_file']['name'];
			 $fileTmpName=$_FILES['image_file']['tmp_name'];
			 $fileExt=explode('.',$fileName);
			 $fileActExt=strtolower(end($fileExt));//incase the name of the image is shoe.test.png
				 $newImage=uniqid("newGene",true).".".$fileActExt;//image should have a uniq id "newgene" is a prefix of myimage
				 $target=$dir.basename($newImage);
				 if(move_uploaded_file($fileTmpName,$target))
				 {
					 $sql="UPDATE users SET profile_pic='$target' WHERE email='$email'";
					 $query=mysqli_query($connection,$sql);
					 if($query)
					 {
						 header("Location: settings.php");
					 }
					
				 }
			 
			 
		}
	}else{
		
		die("password is incorrect");
	}
}


$email=$_SESSION['userLogged'];
$sql="SELECT * FROM users WHERE email='$email'";
$query=mysqli_query($connection,$sql);
$res=mysqli_fetch_array($query);

?>


 <?php include 'includes/menus.php'; ?>

<div class="col-md-12">
          <div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">change profile picture</strong></a></h2>
  </div>
  <div class="panel-body">
<div class="col-md-8">
   <form action="" method="post" enctype="multipart/form-data">
       <div class="col-md-6"> 
     <div class="form-group">
	  <label for="username">picture to upload</label>
	  <input type="file" name="image_file" class="form-control">
	 </div>
	 
	 
     <div class="form-group">
	  <label for="username">password</label>
	  <input type="password" name="conf_pwd" class="form-control">
	 </div>
   
   
    <div class="form-group">
	<input type="submit" name="update_image" class="btn btn-default" value="update pic">
	</div>
	 
   </div>
   
     <div class="col-md-6"> 
     <div class="form-group">
	  <label >Current Profile pic </label>
	   <img src="<?php echo $res['profile_pic']; ?>" alt="" style="width: 250px; height: 250px; border-radius: 100%;">
	  
	 </div>
	 
	 
     
   
    
	 
   </div>
   
   </form>
  
      </div>
</div>


      </div>
    </div>
  </div>
   
   
   
   
   <script>
   $(document).ready(function(){
	   $("#oldpwd").keyup(function(){
		   let text= document.getElementByid("oldpwd").value;
		   $("#check").load('check.php',{text:text});
	   });
   });
   </script>
   
   
</div>
</body>
</html>






