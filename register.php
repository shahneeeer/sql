<?php
error_reporting(0);
include('connection.php');
$error=$imgErr="";
if(isset($_POST['sub'])){//validations
    $email = $_POST['email'];
    $uname=$_POST['uname'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);//password
    $tmp=$_FILES['image']['tmp_name'];//File uploading
    $fname=$_FILES['image']['name'];
  
    if(empty($email) || empty($uname) || empty($name) || empty($age) || empty($pass)){
        $error="THIS FIELDS ARE MANDATORY";
    }
    else{
        if(mysqli_query($con,"insert into users(email,username,name,age,file,password) values
        ('$email','$uname','$name',$age,'upload/$fname','$pass')")){
          session_start();
          $_SESSION['nid']=$name;
            header("location:index.php");
    }
}
    if(!empty($tmp)){
        $dest="upload/";
        if(move_uploaded_file($tmp,$dest.$fname)){
        }
        else{
            $imgErr="Uploading error";
        }

    }
    else{
        $imgErr="plzz select the file";

    }
   
    
}

?>
<!doctype html>
<html lang="en">
  <head>
      <style>
          .mar{
              margin-top: 6%;
              background-color: lightyellow;
          }
      </style>
    <?php include("head.php") ?>
    <title>register</title>
  </head>
  <body>
      <div class="container mar">
          <h2 class="text-center">REGISTER</h2>
  <form method="post" enctype="multipart/form-data">
  <span class="text-danger"><?php echo $error ?></span>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control"name="email"  > 
  </div>
  <div class="mb-3">
    <label  class="form-label">Username</label>
    <input type="text" class="form-control" name="uname"  > 
  </div>
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name" >
  </div>
  <div class="mb-3">
    <label  class="form-label">Age</label>
    <input type="text" class="form-control" name="age" > 
  </div>
  <div class="mb-3">
      <span class="text-danger"><?php  echo $imgErr; ?></span><br>
    <label  class="form-label">Image</label>
    <input type="file" class="form-control" name="image" > 
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" >
  </div>
 
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
      </div>
   
    <?php include("foot.php") ?>
  </body>
</html>