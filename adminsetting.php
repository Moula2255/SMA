<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
if(isset($_POST['submit'])){

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addclass</title>
        <style>
        ul{
            display:flex;
            flex-direction:column;
        }
        
        li a{
            text-decoration:none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
     <?php include_once("files/nav.php"); ?>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
     <?php include_once("files/aside.php"); ?>
    </div>
    <div class="col-sm-9 bg-light">
    <div class="d-flex justify-content-between m-5 mb-2 mx-2">
            <p class="h4">Change Password</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Change Password</p>
        </div>
        <form action="" method="post" class="bg-white p-5 ms-2 px-4">
            <h4 class="text-center">Change Password</h4>
            <label for="" class="form-label">Current Password</label>
            <input type="text" class="form-control" name="currpass">
            <label for="" class="form-label">New Password</label>
            <input type="text" class="form-control" name="Np">
            <label for="" class="form-label">Confirm Password</label>
            <input type="text" class="form-control mb-2" name="cp">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
