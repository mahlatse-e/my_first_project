<?php

$query="SELECT * FROM posts WHERE post_status='published' ORDER BY post_id";
$results=mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($results))
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
		
		
		
		include "post2.php";
}


?>