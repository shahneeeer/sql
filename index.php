<?php
error_reporting(0);
include('connection.php');
$sel=mysqli_query($con,"select * from users;");
$error="";
if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    if(empty($email) || empty($pass)){
        $error="Enter valid email and password";
    }
        else{
            if(mysqli_num_rows($sel)>0){
                while($arr=mysqli_fetch_assoc($sel)){
                    if( password_verify($pass,$arr['password'])){
                      $email=$arr['email'];
                       session_start();
                       $_SESSION['sid']=$email;
                       
                        header("location:dashboard.php");
                        break;
                    }

                }
            }
           

        }
    
}


?>
<!doctype html>
<html lang="en">
  <head>
      <style>
          .mar{
              margin-top: 6%;
              background-color: lightsteelblue;
          }
      </style>
    <?php include("head.php") ?>
    <title>register</title>
  </head>
  <body>
   <?php include('navbar.php') ?>
      <div class="container mar"><br>
         
  <form method="post">
    
  
  <div class="mb-3">
      <span class="text-danger"><?php echo $error;?></span><br>
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control"name="email"  > 
  </div>
 
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" >
  </div>
 
  <button type="submit" class="btn btn-success" name="sub">Submit</button>
  <button type="submit" class="btn btn-primary" name="sub"><a href="register.php" class="text-info">NEW USER</a></button>
</form>
<br>
      </div>
   
    <?php include("foot.php") ?>
  </body>
</html>