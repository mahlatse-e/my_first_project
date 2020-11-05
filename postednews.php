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
		 <p>school updates will be posted on this website</p>
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
					<li class="page-item">
					  <a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					  </a>
					</li>
					<li class="page-item">
					  <a class="page-link" href="#">1</a>
					</li>
					<li class="page-item">
					  <a class="page-link" href="#">2</a>
					</li>
					<li class="page-item">
					  <a class="page-link" href="#">3</a>
					</li>
					<li class="page-item">
					  <a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					  </a>
					</li>
				</ul>
			</div>

		</div>
		<!-- /.container -->
	</div>
	
	

    <!--footer starts from here-->
  </body>  
</html>