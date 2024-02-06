<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$show="select * from ad_class";
$show1="select * from ad_class inner join ad_stu on ad_class.sno=ad_stu.StudentClass";
$show2="select * from tblnotice";
$show3="select * from tblpublicnotice";
$get=mysqli_query($conn,$show);
$get1=mysqli_query($conn,$show1);
$get2=mysqli_query($conn,$show2);
$get3=mysqli_query($conn,$show3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
    <style>
      .one{
        background-color:aqua;
      }
      p a{
        text-decoration:none;
      }
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

      <div class="row m-4 mb-0 bg-white">
        <div class="col-sm-12 mb-4">
          <div class="d-flex justify-content-between px-3 pt-5">
            <p class="h4">Report Summary</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Updated Summary</p>
        </div><hr class="mx-3">
        </div>
      
        <div class="row bg-white p-0 m-0 mt-2  mb-5">
        <div class="col-sm-3 border-end border-1  m-0 px-4  py-2 text-center">
            <span class="m-0 p-0 pe-2 ">Total class</span><i class="bi bi-rocket-takeoff-fill p-3 m-0 bg-success h3"></i>
            <p class="m-0 p-0 ps-3 text-start h5"><?php echo mysqli_num_rows($get); ?></p>
            <p class="m-0 p-0 ps-3 text-start"><a href="mc.php">view classes</a></p>
              
          </div>
          <div class="col-sm-3 border-end border-1 m-0 px-4  py-2 text-center">
           <span class="m-0 p-0 pe-2">Total Students</span><i class="bi bi-person bg-danger p-3 m-0 p-0 h3"></i>
            <p class="m-0 p-0 ps-1 text-start h5"><?php echo mysqli_num_rows($get1); ?></p>
            <p class="m-0 p-0 ps-1 text-start"><a href="manstu.php">view Students</a></p>
        </div>
        <div class="col-sm-3 border-end border-1 m-0 px-2  py-2 text-center">
          <span class="m-0 p-0 pe-2">Total Class Notice</span><i class="bi bi-file-earmark p-3 bg-info h3"></i>
            <p class="m-0 p-0 ps-1 text-start h5"><?php echo mysqli_num_rows($get2); ?></p>
            <p class="m-0 p-0 ps-1 text-start"><a href="mngntc.php">view Class Notice</a></p>
              
        </div>
        <div class="col-sm-3 m-0 p-0 p-2 m-0 px-2  py-2 text-center">
          <span class="m-0 p-0 pe-2">Total Public Notice</span><i class="bi bi-file-earmark p-3 bg-info h3"></i>
            <p class="m-0 p-0 ps-1 text-start h5"><?php echo mysqli_num_rows($get3); ?></p>
            <p class="m-0 p-0 ps-1 text-start"><a href="mcpntc.php">view Public Notice</a></p>
        </div>
      </div>
    
      
    
    </div>
    <!-- <div class="col-sm-9 one">
    
           -->
        <div class="row">
          <div class="col-sm-6"></div>
          <div class="col-sm-6"></div>
        </div>
      </div>
    </div>
    </div>
  </div>
</body>
</html>