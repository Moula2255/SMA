<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$msg="";
if(isset($_POST['submit'])){
    $nt = $_POST['first'];
    $nm = $_POST['second'];
    $ins="insert into tblpublicnotice (NoticeTitle,NoticeMessage) values ('$nt','$nm')";
    if(mysqli_query($conn,$ins)){
     $msg="Notice Added Sucessfully";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Public Notice</title>
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
    <div class="d-flex justify-content-between pt-5 pb-3 px-3">
            <p class="h4">Add Public Notice</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Add Public Notice</p>
        </div>
        <form action="" method="post" class="bg-white m-2">
            <h4 class="text-center pt-4">Add Notice</h4>
            <div class="px-4 pb-5">
            <label for="" class="form-label">Notice Title</label>
            <input type="text" class="form-control" name="first">
            <label for="" class="form-label pt-2">Notice Message</label>
            <input type="text" class="form-control px-4 py-3" name="second">
            <span><?php echo $msg; ?></span><br>
             <button type="submit" class="btn btn-info mt-2 px-4 btn-lg text-white" name="submit">Add</button>
        </div>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
