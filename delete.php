<?php
$conn=mysqli_connect('localhost','root','','sschool');
session_start();
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$com="";
if(isset($_POST['submit'])){
   $class = $_POST['class'];
   $sec = $_POST['sec'];
   $ins="insert into ad_class (class_name,section) values('$class','$sec')";
   if(mysqli_query($conn,$ins)){
    $com="Class added sucessfully";
   }
}

    if(isset($_GET['sno'])){
            $sno=$_GET['sno'];
           $show = "delete from ad_class where sno='$sno'";
           if(mysqli_query($conn,$show)){
            header("location:mc.php");
           }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addclass</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
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
    
    </div>
    <div class="col-sm-9"> 
        <script>
       
        </script>
    </div>
    </div>
    </div>
    </body>
    </html>