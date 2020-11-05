<?php include"includes/header.php";

$email=$_SESSION['userLogged'];
$sql="SELECT * FROM users WHERE email='$email'";
$query=mysqli_query($connection,$sql);
$res=mysqli_fetch_array($query);


?>

<section id="main">
	<div class="container">
		<div class="row">	
			<?php include "includes/menus.php"; ?>
			<div class="col-md-10">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Add New Post</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" action="includes/functions.php" enctype="multipart/form-data">							
						
							<div class="form-group">
							<label for=" " class="control-label">author</label>
							<input type="text" class="form-control" id="title" name="author1" placeholder="  Enter name"
							value="<?php echo $res['username'];?>" disabled>
                           						
						</div>
							
							
							
							
						<div class="form-group">
							<label for=" " class="control-label">Title</label>
							<input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">							
						</div>
	
						
						<div class="form-group">
							<label for="lastname" class="control-label">Content/Message</label>							
							<textarea class="form-control" rows="5"  name="content" placeholder="Enter your message" id="editor"></textarea>					
						</div>	

							  
							  
							  <div class="form-group">
	                        <label for=""> category </label>
	                          <select class="form-control" name="category">
	                        <?php 
	
                  	           $sql= "SELECT * FROM category";
                                 $query=mysqli_query($connection,$sql);
	
                                	while ($row=mysqli_fetch_array($query))	{	

	                             $cat_title=$row['cat_title'];
	   
	                      echo "<option value='$cat_title'>$cat_title</option>";
	                     	}
	                         ?>
	
	                         </select>
	                          </div>
							  
							  
							  <div class="form-group">
							<label for=" " class="control-label">status post</label>
							<select class="form-control" name="status">
							<?php 
							
							$role=$res['role'];
							if($role==='Admin')
							{
								echo "<option value='draft'>draft</option>";
								echo " <option value='published'>published</option>";
							}
							else
							{
								echo "<option value='draft'>draft</option>";
							}
								
							?>
	                         </select>
	                        </div>
							
							
							<div class="form-group">
	                       <label for="">Post image</label>
	                     <input type="file"  name="image" class="form control">
	                        </div>



							<div class="form-group">
							 <input type="text" name="author" value="<?php echo $res['username'];?>" style="display: none;">							
						</div>
																	
						<input type="submit" name="publish"  class="btn btn-info" value="publish post" />											
					</form>				
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>		
	
</body>
</html>