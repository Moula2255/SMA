<?php
session_start();
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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
    <div class="d-flex justify-content-between pt-5 pb-2 px-3">
            <p class="h4">Between Dates Reports</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Between Dates Reports</p>
        </div>
        <form action="reportdetail.php" method="post" class="m-5 mt-2 mx-3 bg-white p-5 px-3">
            <h4 class="text-center">Between Dates Reports</h4>
            <lable class="form-label">From Date:</lable>
            <input type="date" class="form-control mb-2 mt-2" name="from" required>
            <lable class="form-label">To Date:</lable>
            <input type="date" class="form-control mt-2" name="to" required>
            <button type="submit" name="submit" class="btn btn-info mt-2">Search</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
