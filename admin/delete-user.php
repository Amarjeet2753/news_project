<?php 
   
   include 'config.php'; 
  if($_SESSION["user_role"]=='0'){

 header('Location://localhost/news_project/admin/post.php');

 }

  include "header.php"; 
  include "config.php";
  
  $userid=$_GET['id'];

  $sql="delete from user where user_id={$userid}";

   if(mysqli_query($conn,$sql)){
      header('Location://localhost/news_project/admin/users.php');
     
      echo "<div class='container text-center text-success'>
            <h3>Deleted successfully please check at users table</h3>
            </div>";
    }
    else{
      echo "<div class='container text-center text-danger'>
            <h3>something went wrong </h3>
            </div>";
     }

   mysqli_close($conn);
 ?>