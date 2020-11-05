<?php 

include "admin/includes/db.php";
include "admin/includes/functions.php";

?>

<?php include "includes/header.php" ?>


 <header class="header_area">
  <!--====================================== the menu bar side =================-->
	<div class="main_menu">
    <nav class="navbar navbar-expand-lg">
	 
	    
	      

		<ul class="nav navbar-nav menu_nav ml-auto">
		  <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
	
                    <li class="nav-item">
                      <a class="nav-link" href="admin/index.php"
                        >Staff Login</a>
                    </li>
		
		 <li class="nav-item">
                  <a class="nav-link" href="index.php">News & updates</a>
                </li>
	      
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
		  NEWS AND UPDATES
		  </h2>
		 <p>for more infor click the name of the image</p>
            </div>
        </div>
			</div>
</div>
    </section>
      <br>
	  <br>
     


 <div class="wrapper-main">

	

    <div class="portfolio-col">
		<div class="container">
			<div class="row">
			
					   <?php include 'includes/posts.php' ?>
			</div>
		  
			<div class="pagination_bar">
				<!-- Pagination -->
				<ul class="pagination justify-content-center">
					
				</ul>
			</div>

		</div>
		<!-- /.container -->
	</div>
	
	

    <!--footer starts from here-->
	<?php include 'includes/footers.php' ?>
  </body>  
</html>