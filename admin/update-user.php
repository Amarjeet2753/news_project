<?php include "header.php"; 

 include 'config.php'; 
  if($_SESSION["user_role"]=='0'){

 header('Location://localhost/news_project/admin/post.php');

 }


 if(isset($_POST['submit'])){

include "config.php";

$userid =  $_POST['user_id'];
$fname =  $_POST['f_name'];
$lname =$_POST['l_name'];
$username=$_POST['username'];
//$password=mysqli_real_escape_string($conn,md5($_POST['password']));
$role=$_POST['role'];

$sql="update user set first_name='{$fname}', last_name='{$lname}', username='{$username}', role='{$role}' where user_id={$userid}";

//$result=mysqli_query($conn,$sql) or die("Query Failed");

  if(mysqli_query($conn,$sql)){
      header('Location://localhost/news_project/admin/users.php');
     
      echo "<div class='container text-center text-success'>
            <h3>Updated successfully please check at users table</h3>
            </div>";
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
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php  
                   include 'config.php';
                    $user_id=$_GET['id'];
                    $sql="select * from user where user_id={$user_id}";
                    $result=mysqli_query($conn,$sql) or die("Query failed");

                    if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_assoc($result)){

                ?>

                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">

                            <?php 
                                   if( $row['role']==1){
                                  echo " <option value='0'>Normal User</option>
                                   <option value='1' selected>Admin</option>";
                              }else{
                                echo " <option value='0' selected>Normal User</option>
                                   <option value='1' >Admin</option>";
                               } 



                             ?>
                             
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                  <?php 
                  }
                }

                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
