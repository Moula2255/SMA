<?php
$conn=mysqli_connect('localhost','root','','sschool');
session_start();
$msg="";
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
if(isset($_POST['add'])){
   $name = $_POST['first'];
   $em = $_POST['email'];
   $class = $_POST['class'];
   $gen = $_POST['gen'];
   $dob = $_POST['dob'];
   $stuid = $_POST['stuid'];
//    -------image uploading-------
   $img = $_FILES['img']['name'];
   $tmp_img=$_FILES['img']['tmp_name'];
   $size=$_FILES['img']['size'];
   $imag="image/".$img;
   move_uploaded_file($tmp_img,$imag);

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $num1 =  $_POST['cnum'];
    $num2 =$_POST['acnum'];
    $add = $_POST['add'];
    $us_n = $_POST['us_name'];
   $us_p = $_POST['us_pass'];

   $ins="INSERT INTO `ad_stu`(`StudentName`, `StudentEmail`, `StudentClass`, `Gender`, `DOB`, `StuID`, `FatherName`, `MotherName`, `ContactNumber`, `AltenateNumber`, `Address`, `UserName`, `Password`, `Image`) VALUES
    ('$name','$em','$class','$gen','$dob','$stuid','$fname','$mname','$num1','$num2','$add','$us_n','$us_p','$img')";
    if(mysqli_query($conn,$ins)){
        $msg="Student added sucessfully";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addclass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
      <div class="col-sm-3 bg-dark">
     <?php include_once("files/aside.php"); ?>
    </div>
    <div class="col-sm-9 bg-light">
    <div class="d-flex justify-content-between">
            <p class="h4">Add students</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage students</p>
        </div>
        <form action="" method="post" class="bg-white m-2 p-5" enctype="multipart/form-data">
            <label for="" class="form-label">Student Name</label>
            <input type="text" class="form-control" name="first">
            <label for="" class="form-label">Student Email</label>
            <input type="email" class="form-control" name="email">
            <label for="" class="form-label">Student Class</label>
            <select id="" class="form-select" name="class">
                <option selected value="" placeholder="select your class">select class</option>
                <option value="1">10 A</option>
                <option value="2">10 B</option>
                <option value="3">10 C</option>
                <option value="4">10 D</option>
                <option value="5">10 E</option>
                <option value="6">10 F</option>
            </select>
            <label for="" class="form-label"></label>
            <select id="" class="form-select" name="gen">
                <option selected value="" placeholder="select your class">choose your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob">
            <label for="" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="stuid">
            <label for="" class="form-label">Student Photo</label>
            <input type="file" class="form-control" name="img">
            <h2 class="text-lg">Parents/guardian's details</h2>
            <label for="" class="form-label">Father's Name</label>
            <input type="text" class="form-control" name="fname">
            <label for="" class="form-label">Mother' Name</label>
            <input type="text" class="form-control" name="mname">
            <label for="" class="form-label">Contact Number</label>
            <input type="text" class="form-control" name="cnum">
            <label for="" class="form-label">Alternate Contact Number</label>
            <input type="text" class="form-control" name="acnum">
            <label for="" class="form-label">Address</label>
            <input type="text" class="form-control" name="add">
            <h2>Login details</h2>
            <label for="" class="form-label">User Name</label>
            <input type="text" class="form-control" name="us_name">
            <label for="" class="form-label">Password</label>
            <input type="text" class="form-control" name="us_pass">
            <span><?php echo $msg; ?></span><br>
            <button type="submit" name="submit" class="btn btn-info">Add</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>