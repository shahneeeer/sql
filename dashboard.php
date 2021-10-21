<?php
error_reporting(0);
session_start();
$sid=$_SESSION['sid'];
$nid=$_SESSION['nid'];
if(empty('sid')  ){
    header("location:index.php");
}
?>

    

<html>
    <head>
    <?php include('head.php') ?>
    <style>
      .mg{
        margin-top: 6%;
      }
    </style>
    </head>
    <body>
    <?php include('navbar.php') ?>
    <div class="container mg">
    <div class="row">
    <div class="col-sm-6">
    <div class="list-group">
  
  <a href="?con=cpassword" class="list-group-item list-group-item-action active">Change password</a>
  <a href="?con=details" class="list-group-item list-group-item-action active">Details</a>
 
 
</div>
</div>
<div class="col-sm-4">
  <?php 
  switch(@$_GET['con']){
    case "cpassword":include('cpassword.php');
    break;
    case "details":include('details.php');
    break;
    case "image":include('');
    break;
  }
  ?>
  </div>
</div>
<?php 

?>
    <?php include('foot.php') ?>
    </body>
</html>