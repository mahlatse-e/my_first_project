<?php include"includes/header.php";

//deleting  post
include "includes/helper.php";

	if(isset($_GET['delete']) && $_GET['delete']!=='')
	{
		$dlt=$_GET['delete'];
		if(delete('posts','post_id',$dlt))
		{
			redirect('myposts.php?source=');
		}else{
			die(' request fail');
		}
	}
	
	//aproving a post
	if (isset($_GET['Approve']) && $_GET['Approve']!=='')
 {
		$p_id=$_GET['Approve'];
		if(modifystatus($p_id))
		{
			redirect('myposts.php');
		}
		else
		{
			die('request fail');
		}
		
	}
	
	if (isset($_GET['unapprove']) && $_GET['unapprove']!==' ')
 {
		$p_id=$_GET['unapprove'];
		if(modifystatus($p_id))
		{
			redirect('myposts.php?source=');
		}
		else
		{
			die('request fail');
		}
		
	}
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

<?php include "includes/panel.php";?>

<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">


					<?php
						if (isset($_GET['source'])) {
								$source = $_GET['source'];

						switch ($source) {
							case 'add_new':
								include "includes/add_post.php";
								break;
							case 'edit':
								include "includes/edit_posts.php";
								break;
							default:
								include "includes/posts.php";
								break;
						}
		} else {
						include "includes/posts.php";
		}
					 ?>
</div>
				</div>


			</div>
			
	
	<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>