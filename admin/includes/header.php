<?php  ob_start(); 
session_start(); 
include "db.php"; 
include "functions.php"; 
 (isset($_SESSION['userLogged'])) ? $user = $_SESSION['userLogged'] :
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
	  header("location:index.php");
  }
  
  ?>
  


<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <link rel="icon" href="img/favicon.png" type="image/png" /><!--change-->
    <title>Mahlatse Content Management System</title>
	
	
	
	
	 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
	
	

	
  </head>
  <body>