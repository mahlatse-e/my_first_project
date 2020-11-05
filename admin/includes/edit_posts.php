<?php include"header.php";

	//updating a post
	
	if(isset($_POST['change']))
	{
		$Eid=$_POST['EditID'];
		$title=$_POST['title'];
		$author=$_POST['author'];
		$category=$_POST['category'];
		$content=$_POST['content'];
		$status=$_POST['status'];
		$image=$_POST['images'];//image from te database
		$post_image=$_FILES['image']['name'];//image from the user
		$images="";
		//getting the category id
		$sql=mysqli_query($connection,"SELECT cat_id FROM category WHERE cat_title='$category'");
		$res=mysqli_fetch_array($sql);
		$post_id=$res['cat_id'];
		
		//check if the user is aploading anew image
		if(isset($_FILES['$post_image']) && $post_image!=="")
		{
			 $dir="images/";
			 $fileName=$_FILES['post_image']['name'];
			 $fileSize=$_FILES['post_image']['size'];
			 $fileTmpName=$_FILES['post_image']['tmp_name'];
			 $allowed=['png','jpg','jpeg','gif'];
			 $fileExt=explode('.',$fileName);
			 $fileActExt=strtolower(end($fileExt));//incase the name of the image is shoe.test.png
			 //checking the image extention
			 if(!in_array($fileActExt,$allowed))
			 {
				// echo"<script>alert('file type not allowed !')</script>";
			 }else if ( $fileSize>8000000)
			 {
				 echo"<script>alert('file file is too large only max of 8mb allowed !')</script>"; 
			 }
			 else
			 {
				 $newImage=uniqid("newGene",true).".".$fileActExt;//image should have a uniq id "newgene" is a prefix of myimage
				 $target=$dir.basename($newImage);
				 if(move_uploaded_file($fileTmpName,$target))
				 {
					$images=$target; 
				 }
				 
			 }
			 
			 
			 
		}else{
			$images=$image;
		}
		
		$query=mysqli_query($connection,"UPDATE post SET post_title='$title',post_author='$author'
		,post_category='$category',post_category_id='$post_id',
		post_content='$content',post_status='$status',post_image='images' WHERE post_id='$Eid' ");
		
		if ($query)
		{
			header("location:posts.php");
		}			
	}

?>

<section id="main">
	<div class="container">
		<div class="row">	
			<?php include "includes/menus.php"; ?>
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Add New Post</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" action="includes/functions.php" enctype="multipart/form-data">							
						
							<div class="form-group">
							<label for=" " class="control-label">author</label>
							<input type="text" class="form-control" id="title" name="author" placeholder="  Enter name"
							value="<?php echo $_SESSION['username'];?>">							
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
                            	<option value="draft">draft</option>
	                          <option value="published">published</option>
	                         </select>
	                        </div>
							
							
							<div class="form-group">
	                       <label for="">Post image</label>
	                     <input type="file"  name="image" class="form control">
	                        </div>



							  
																	
						<input type="submit" name="publish"  class="btn btn-info" value="publish post" />											
					</form>				
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>		
	<script>
	CKEDITOR.replace('editor');
     </script>	
</body>
</html>