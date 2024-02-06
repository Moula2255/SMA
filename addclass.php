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
     <?php include_once("files/nav.php"); ?>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
     <?php include_once("files/aside.php"); ?>
    </div>
    <div class="col-sm-9 bg-light bg-1">
    <div class="d-flex justify-content-between m-5 mb-2 px-4 mx-2">
            <p class="h4">Add Class</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Add Class</p>
        </div>
        <form action="" method="post" class="bg-white  m-4 p-5">
            <h4 class="text-center">Add Class</h4>
           <label for="" class="form-label">Class Name</label>
           <input type="text" class="form-control" name="class">
           <label for="" class="form-label">Class Name</label>
           <select class="form-select mb-1" name="sec" id="">
            <option selected value="">Select Your Section</option>
            <option  value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
           </select>
            <span class=""><?php echo $com; ?></span><br>
           <button class="btn btn-info m-4 ms-0 mt-1" name="submit">Add</button>
          
        </form>
    </div>
    </div>
</body>
</html>
