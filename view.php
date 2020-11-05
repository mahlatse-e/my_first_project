<?php 

include "admin/includes/db.php";
include "admin/includes/functions.php";

?>
<?php include "includes/header.php" ?>


 <header class="header_area">
  <!--====================================== the menu bar side =================-->
	<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
	 <div class="container" >
	    <a class="navbar-brand logo_h" href="index.html">
	      <img src="" alt="" /><!--insert logo -->
		</a>
	 <button class="navbar-toggler" type="button" data-toggle="collapse"
		 data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent"
		aria-expanded="false"
              aria-label="Toggle navigation">
       <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
	      <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

		<ul class="nav navbar-nav menu_nav ml-auto">
		  <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
		
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="admin/index.php"
                        >Staff Login</a>
                    </li>
		 <li class="nav-item">
                  <a class="nav-link" href="contacts/contacts.php">Contact</a>
                </li>
		 <li class="nav-item">
                  <a class="nav-link" href="postednews.php">News & updates</a>
                </li>
	      </div>
	</nav>
	</div>
  </header>
<br>
<br>
<br>
         <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2 class="text-uppercase">
		  SCHOOL  NEWS AND UPDATES
		  </h2>
		 <p>updates</p>
            </div>
        </div>
    </section>
  

 <?php 
 
 if (isset($_GET['post']))
 {
	 $p_id=$_GET['post'];
	 
	 $query="SELECT * FROM posts WHERE post_id=$p_id";
	 $results=mysqli_query($connection,$query);
	 
	 while ($row=mysqli_fetch_assoc($results))
{
	$post_id=$row['post_id'];
		$post_title=$row['post_title'];
		$post_author=$row['post_author'];
		$post_category=$row['post_category'];
		$post_category_id=$row['post_category_id'];
		$post_content=$row['post_content'];
		$post_status=$row['post_status'];
		$post_image=$row['post_image'];
		$post_date=$row['post_date'];
		
}
	 
 }
 else
 {
	 header("location: postednews.php");
 }
 
 
 ?>
 
<?php 
  
  include 'includes/article.php'

?>
		
	</div>
</div>
</body>
</html>