<?php

include "db.php";

function add_category()
{
	global $connection;
	
	if(isset($_POST['category']))
	{
		if(empty($_POST['cat_title']))
			 {
			 header("location:../category.php?field_cannot_be_empty");//redirect to the category input file if empty
		 }
		 else
		 {
			 //storing data from category file to database
			 $cat_title=$_POST['cat_title'];
			 $query="INSERT INTO category (cat_title) VALUES('$cat_title')";
			 //CHECK FOR ERRORS
			 $results=mysqli_query($connection,$query);
			 
			 if (!$results)
			 {
				 die("could not save data ".mysqli_error($connection));
			 }
			 else 
			 {
				 header("location:../category.php?category_added");
			 }
		 }
	}
	
}
add_category();


function show_category()
{
	global $connection;
	
	$query="SELECT * FROM category";
	$results=mysqli_query($connection,$query);
	
	while($row=mysqli_fetch_assoc($results))
	{
		$cat_id=$row['cat_id'];
		$cat_title=$row['cat_title'];
		
		echo"<tr>";
		echo"<td>$cat_id</td>";
		echo"<td>$cat_title</td>";
		echo"<td><a href='category.php?delete_cat=$cat_id' class='btn btn-danger'>delete</a></td>";
		echo"<tr>";
		
		
	}

}


function delete_category()
{
	global $connection;
	if(isset($_GET['delete_cat']))
	{
		$cat_id=$_GET['delete_cat'];
		$query="DELETE FROM category WHERE cat_id=$cat_id";
		$results=mysqli_query($connection,$query);
		
		if(!$results)
		{
			die("coould not delete category ".mysqli_error($connection));
		}
		else{
			 
			 header("location: category.php?category_deleted");//redirect to the category input file if empty
		 }
		
		
	}
	
}
delete_category();



//sending and saving post to the database

function add_post(){
	global $connection;
	/*$user=$_SESSION['userLogged'];
	                                                          //change to mail
	$mysql=mysqli_query($connection,"SELECT * FROM users WHERE email='$user'");
	$ress=mysqli_fetch_array($mysql);
	$username=$ress['username'];*/
	
	//check if the form is submited
	if(isset($_POST['publish']))
	{
		$post_title=$_POST['title'];
		$post_author=$_POST['author'];
		//$post_author=$Author;
		$post_category=$_POST['category'];
		//$post_category_id=$_POST['category_id'];
		
		$sql="SELECT cat_id FROM category WHERE cat_title='$post_category'";
		$res=mysqli_query($connection,$sql);
		$row=mysqli_fetch_array($sql);
		$post_category_id=$row['cat_id']; 
		
		$post_content=mysqli_real_escape_string($connection,$_POST['content']);//to prevent sql injection
		//$post_tags=$_POST['tags'];
		$post_status=$_POST['status'];
		
		//we need the date
		//date meaning 
		//l-> for the day; d-the day; f-> for the month Y FOR THE year
		$date=date("l d F  Y");
		
		
		
		//working on an image 
		//uploading image to the server// 
		//check if the image is submitted to the server
		if (isset($_FILES['image']))
		{
			$dir="../images/"; //all the images will be stored in the images folder
			$target_file=$dir.basename($_FILES['image']['name']);
			if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
			{
			
			echo "Image uploaded successfully";
			}
			else {
				echo "something went wrong while uploading image";
			}	
		}
		$query="INSERT INTO 
		        posts(post_title,post_category,post_category_id,post_author,post_content,post_date,post_image,
					post_status)
				VALUES('$post_title','$post_category','$post_category_id','$post_author','$post_content','$date','$target_file'
				,'$post_status')";
				
				$results=mysqli_query($connection,$query);
				//check error
				
				if(!$results)
				{
					die("coud not send data ".mysqli_error($connection));
					
					header("location:../add_posts.php?add_new");
					
				}
				else{
					header("location:../myposts.php?field_cannot_be_empty");
				}
	  }
   }

add_post();


function show_posts()
{
	global $connection;
	$user=$_SESSION['userLogged'];
	                                                          //change to mail
	$mysql=mysqli_query($connection,"SELECT * FROM users WHERE email='$user'");
	$ress=mysqli_fetch_array($mysql);
	$username=$ress['username'];
	$role=$ress['role'];
	
	if($role==='Admin')
	{
		$query="SELECT * FROM posts ORDER BY post_id DESC";
	}
else{
	
	$query="SELECT * FROM posts WHERE post_author='$username' ORDER BY post_id DESC";
}
	
	$results=mysqli_query($connection,$query);
	if(!$results)
	{
		die("something went wrong ".mysqli_error($connection));
		
	}
	else{
		
		while($row=mysqli_fetch_assoc($results))
		{
		
		IF ($role==='Admin'){
		$post_id=$row['post_id'];
		$post_title=$row['post_title'];
		$post_author=$row['post_author'];
		$post_category=$row['post_category'];
		$post_category_id=substr($row['post_category_id'],0,120);
		
		$post_content=substr($row['post_content'],0,50);
		$post_date=$row['post_date'];
		$post_image=$row['post_image'];
		$post_status=$row['post_status'];
		
		echo "<tr>";
		echo "<td>$post_id</td>";
		echo "<td>$post_title</td>";
		echo "<td>$post_category</td>";
		
		echo "<td>$post_author</td>";
		echo "<td>$post_content</td>";
		echo "<td>$post_date</td>";
		echo "<td><img src='images/$post_image' width='170px'></td>";
		echo "<td>$post_status</td>";
		echo"<td><a href='myposts.php?Approve=$post_id' class='btn btn-primary'>Approve<a/></td>";
		echo"<td><a href='myposts.php?unapprove=$post_id'  class='btn btn-warning'>UnApprove<a/></td>";
		echo"<td><a href='myposts.php?delete=$post_id'  class='btn btn-danger'>Delete<a/></td>";
		echo "</tr>";
		}
		else
		{
		$post_id=$row['post_id']-1;
		$post_title=$row['post_title'];
		$post_author=$row['post_author'];
		$post_category=$row['post_category'];
		$post_category_id=substr($row['post_category_id'],0,120);
		
		$post_content=substr($row['post_content'],0,150);
		$post_date=$row['post_date'];
		$post_image=$row['post_image'];
		$post_status=$row['post_status'];
		
		echo "<tr>";
		echo "<td>$post_id</td>";
		echo "<td>$post_title</td>";
		echo "<td>$post_category</td>";
		
		echo "<td>$post_author</td>";
		echo "<td>$post_content</td>";
		echo "<td>$post_date</td>";
		echo "<td><img src='images/$post_image' width='170px'></td>";
		echo "<td>$post_status</td>";
		echo"<td><a href='myposts.php?Approve=$post_id' class='btn btn-primary' disabled >Approve<a/></td>";
		echo"<td><a href='myposts.php?unapprove=$post_id'  class='btn btn-warning' disabled >UnApprove<a/></td>";
		echo"<td><a href='myposts.php?delete=$post_id'  class='btn btn-danger'>Delete<a/></td>";
		echo "</tr>";	
		}
		}
	}
	
}

//publish post

function modifystatus($id)
{
  global $connection;
  $query = mysqli_query($connection, "SELECT post_status FROM posts WHERE post_id=$id");
  if (mysqli_num_rows($query) > 0) {
    $result = mysqli_fetch_array($query);
    $status = $result['post_status'];

    if ($status == "draft") {
      $query = mysqli_query($connection, "UPDATE posts SET post_status='published' WHERE post_id=$id");
    } else {
      $query = mysqli_query($connection, "UPDATE posts SET post_status='draft' WHERE post_id=$id");
    }
    return true;
  } else {
    return false;
  }
}



?>