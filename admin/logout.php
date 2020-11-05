<?php  ob_start(); ?>
<?php  session_start(); ?>
<?php include "db.php"; ?>
<?php include "functions.php"; ?>
 <?php (isset($_SESSION['userLogged'])) ? $user = $_SESSION['userLogged'] :
  header("location: ../first_page.php");
  $query="SELECT * FROM users WHERE email='$user'";
  $results=mysqli_query($connection,$query);
  $row=mysqli_fetch_array($results);
  $username=$row['username'];
  $pic=$row['profile_pic'];
  $role=$row['role'];
  
  
  
  //log out function_exists
  if(isset($_GET['logout']))
  {
	  unset($_SESSION['userLogged']);
	  header("location : index.php");
  }
  
  ?>