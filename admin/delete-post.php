<?php 

include "config.php";

$post_id=$_GET['id'];

$cat_id=$_GET['catid'];


$sql1="select * from  post where post_id={$post_id};";
$result=mysqli_query($conn,$sql1) or die("Query failed :select");

$row=mysqli_fetch_assoc($result);

unlink("upload/".$row[post_img]);

$sql="delete from post where post_id={$post_id};";

$sql.="update category set post=post-1 where category_id={$cat_id}";

 if(mysqli_multi_query($conn,$sql)){
 	header('Location://localhost/news_project/admin/post.php');

 }else{
 	echo "Query failed";
 }

 ?>