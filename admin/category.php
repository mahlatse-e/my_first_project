<?php include"includes/header.php"?>
<?php include "includes/panel.php";?>
<?php include "includes/menus.php"; ?>

	  
	  
	<section id="main">
  <div class="container">
    <div class="row">
	
	
	
      <div class="col-md-10">
          <div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Category</h2>
  </div>
  <div class="panel-body">
   <div class="container-fluid">
	       <!-- page heading -->
		   <div class="row">
			
			<div class="col-md-9">
		   <div class="row">
		        <div class="col-lg-12">
				  <div class="col-lg-6">
				     <form action="includes/functions.php" method="POST">
					 <div class="form-group">
					   <input type="text" name="cat_title" placeholder="Category Title" class="form-control">
					 </div>
					 <div class="form-group">
					 <input type="submit" name="category" value="Add Category" class="btn btn-primary">
					 </div>
					 </form>
				  </div>
				  <table class="table table-bordered table-striped">
				   <thead>
				      <th>category Id</th>
					  <th>category title</th>
					  <th>delete</th>
                   </thead>	
                       <tbody> 
					   <?php show_category(); ?>
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
    </div>
  </div>
</section>
	  
	  

</body>
</html>