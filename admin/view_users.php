<?php  include "includes/header.php"; 

function show_users()
{
	global $connection;
	$user=$_SESSION['userLogged'];
  $query="SELECT * FROM users WHERE email='$user'";
  $results=mysqli_query($connection,$query);
  $row=mysqli_fetch_array($results);
  $username=$row['username'];
  $pic=$row['profile_pic'];
  $role=$row['role']; 
  $mysql="SELECT * FROM users WHERE email!='$user' ORDER BY id DESC";
  $query1=mysqli_query($connection,$mysql);
  while($row=mysqli_fetch_assoc($query1))
  {
	  $username=$row['username'];
	  $user_id=$row['id'];
	  $user_email=$row['email'];
	  $user_role=$row['role'];
	  if($role=="Admin")
	  {
		  echo "<tr>"
		  ."<td>$username</td>"
		  ."<td>$user_email</td>"
		  ."<td>$user_role</td>"
		    ."<td><a href='?userId=$user_id' class='btn btn-danger'>delete</a></td>"
		  ."</tr>";
	  }
	  else
	  {
		  echo "<tr>"
		  ."<td>$username</td>"
		  ."<td>$user_email</td>"
		  ."</tr>";
	  }
	  
  }
	
}
if(isset($_GET['userId']))
{
	$dele_id=$_GET['userId'];
	$set="DELETE FROM users WHERE id='$dele_id'";
	$sqlquery=mysqli_query($connection,$set);
	if($sqlquery)
	{
		header("location:view_users.php");
	}
	else
	{
		die("could not delete user");
	}
	
}
?>
<?php include "includes/panel.php";?>
<?php include "includes/menus.php"; ?>
	<section id="main">
  <div class="container">
    <div class="row">
	
	
	
      <div class="col-md-10">
          <div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Users</h2>
  </div>
  <div class="panel-body">
   <div class="container-fluid">

<div class="row">

<h1></h1>
  <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped table-success">
		<thead>
		 <th>Username</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
		</thead>
		<tbody>
		   <?php show_users();?>
		</tbody>
	</table>
  </div>
</div>
</div>
  </div>
</div>


      </div>
    </div>
  </div>
</section>