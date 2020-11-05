<?php include"includes/header.php";

?>

<?php include "includes/panel.php";?>
<?php include "includes/menus.php"?>



<?php 

$user=$_SESSION['userLogged'];
	                                                          //change to mail
	$mysql=mysqli_query($connection,"SELECT * FROM users WHERE email='$user'");
	$ress=mysqli_fetch_array($mysql);
	$username=$ress['username'];
	$role=$ress['role'];
	
	if($role==='Admin')
	{
		include "includes/user_form.php";
	}




?>



	<!--section id="main">
  <div class="container">
    <div class="row">
	
	
	
      <div class="col-md-10">
          <div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title"><strong>Add new users</strong></a></h2>
  </div>
  <div class="panel-body">
   <div id="page-wrapper ">
	<div class="container-fluid">
	<div class="col-md-9">
		<div class="row">
			 <h4>Add users<h4>
			  <form id="form" action="user/user_infor.php" method="POST" autocomplete="off">
				<div class="form-group">
				<input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
				</div>
			  
			  <div class="form-group">
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
				</div>
			  
			  <div class="form-group">
				<input type="password" name="password" id="password" class="form-control" placeholder="password">
				</div>
				
				<div class="form-group">
				<select name="role" id="role" class="form-control">
				<option value="Admin">Admin</option>
				<option value="Editor">Editor</option>
				</select>
				</div>
			  
			  
			  <div class="form-group">
				<input type="submit" name="submit" id="submit" class="btn btn-info btn-block">
				 </div>
				<p id="msg" class="text-center"></p>
			  </form>
			 </div>
			</div>
		</div>
	</div>
</div>


      </div>
    </div>
  </div>
</section-->

<!--jquery-->
<script src="bootstrap/js/jquery.js"></script>
<!--bootstrap core javaScript-->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- ajax call-->


</body>
</html>






