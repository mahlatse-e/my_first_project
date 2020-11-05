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
                      <a class="nav-link" href="admin/index.php"
                        >Staff Login</a>
                    </li>
		
		 <li class="nav-item">
                  <a class="nav-link" href="index.php">News & updates</a>
                </li>
	      </div>
	</nav>
	</div>
  </header>
 <section id="main">
	<div class="container" class="center">
		<div class="row">	
			<div class="col-md-5">
				<div class="panel panel-default">
				 
				  <div class="panel-body">
<form action="js/login/login.php"method="post" role="form" class="form">
<br>
<br>
<h3>login</h3>
<br>

<div class="form-group">
<label >EMAIL</label>
<input type="text" name="email" placeholder="enter email" class="form-control">
</div>

<div class="form-group">
<label >PASSWORD</label>
<input type="password" name="pwd" placeholder="enter password" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="create_submit" value="continue" class="btn btn-primary" >
</div>
</form>
                     </div>
				</div>
			</div>
		 </div>
	</div>
</section>