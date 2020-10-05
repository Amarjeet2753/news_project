<?php include "header.php"; 

 include 'config.php'; 
  if($_SESSION["user_role"]=='0'){

 header('Location://localhost/news_project/admin/post.php');

 }


 if(isset($_POST['submit'])){

include "config.php";

 $cat_id =  $_POST['cat_id'];
 $category_name=$_POST['cat_name'];
 
 echo "<h1>".$cat_id."  ".$category_name."</h1>";
 die();
 
 $sql="update category set category_name = '{$category_name}' where category_id={$cat_id}";

if(mysqli_query($conn,$sql)){
      header('Location://localhost/news_project/admin/post.php');
    }
    else{
       echo "<div class='container text-center text-danger'>
            <h3>something went wrong </h3>
            </div>";
    }

}
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                   <?php  
                   include 'config.php';
                    $cat_id=$_GET['cid'];
                    $sql="select * from category where category_id={$cat_id}";
                    $result=mysqli_query($conn,$sql) or die("Query failed");

                    if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_assoc($result)){

                  ?>

                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                     <?php 
                    }
                    }

                   ?>
                </div>
              </div>
     </div>
  </div>
<?php include "footer.php"; ?>