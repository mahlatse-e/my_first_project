<?php 
include 'includes/header.php';

$email=$_SESSION['userLogged'];
$sql="SELECT * FROM users WHERE email='$email'";
$query=mysqli_query($connection,$sql);
$res=mysqli_fetch_array($query);

//updating user information

if(isset($_POST['update']))
{
	$user_name=$_POST['username'];
	$user_email=$_POST['email'];
	//error handling
	
	if(!empty($user_name) && !empty($user_email))
	{
		$sql1="UPDATE users SET username='$user_name',email='$user_email' WHERE email='$email'";
		$query=mysqli_query($connection,$sql1);
		
		//reloading the page
		if($query)
		{ 
	//updating the session
	$_SESSION['userLogged']=$user_email;
			header("location: profile.php?profile=user_profile_updated");
		}
		
	
		
	}
}

 ?>

<div id="wrapper">

    <!-- Navigation -->
   

<?php include "includes/panel.php";?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <!--h3>Welcome to your profile page Username</h3-->
                <br>
				 <?php include 'includes/menus.php'; ?>
                
                <div class="col-md-12">
                    <img src="<?php echo $res['profile_pic']; ?>" alt="" style="width: 150px; height: 150px; border-radius: 100%;">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $res['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="<?php echo $res['email']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" value="<?php echo $res['role']; ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-success" value="Update your profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- our ajax call  -->
<script>
    $(document).ready(function() {
        $("#form").submit(function(e) {
            let name = document.querySelector("#username").value,
                email = document.querySelector("#email").value,
                pwd = document.querySelector("#password").value,
                role = document.querySelector("#role").value,
                submit = document.querySelector("#submit").value;
            $("#msg").load('validator/validate.php', {
                username: name,
                email: email,
                password: pwd,
                role: role,
                submit: submit
            });
            e.preventDefault();
        });
    });
</script>

</body>

</html>