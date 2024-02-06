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
    <title>addclass</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"> -->
    <style>
      tr{
        width: 200% !important;
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
    <div class="d-flex justify-content-between">
            <p class="h4">Manage class</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage class</p>
        </div>
        <div class="tr w-75 overflow-x-auto">
        <table class="table table-responsive bg-white m-2" >
            <tr>
                <th>Sno</th>
                <th>Student ID</th>
                <th>Student Class</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Admission Date</th>
                <th>Action</th>
            </tr>
            <?php
            $conn=mysqli_connect('localhost','root','','sschool');
            $show="select ad_class.sno,ad_stu.ID,ad_stu.StudentClass,ad_stu.StuID,ad_class.sno,ad_stu.StudentName,ad_stu.StudentEmail,ad_stu.DatefAdmission from ad_stu inner join ad_class on ad_stu.StudentClass=ad_class.sno";
            $get=mysqli_query($conn,$show);
            if(mysqli_num_rows($get)>0){
                while($row=mysqli_fetch_array($get)){
                    $sno=$row['ID'];
                    $id=$row['StudentClass'];
                    if($id==1){
                      $c="10 A";
                    }else if($id==2){
                      $c="10 B";
                    }else if($id==3){
                      $c="10 C";
                    }else if($id==4){
                      $c="10 D";
                    }else if($id==5){
                      $c="10 E";
                    }else if($id==5){
                      $c="10 F";
                    }
                    echo "<tr>";
                    echo "<td>" .$row['ID'] ."</td>";
                    echo "<td>" .$row['StuID'] ."</td>";
                    echo "<td>" .$c ."</td>";
                    echo "<td>" .$row['StudentName'] ."</td>";
                    echo "<td>" .$row['StudentEmail'] ."</td>";
                    echo "<td>" .$row['DatefAdmission'] ."</td>";
                    echo "<td>" ."<a href='stud.up.php?sno=$sno'><i class='bi bi-eye'></i></a> || " ."<a href='stu.delete.php?sno=$sno' ><i class='bi bi-trash'></i></a>" ."</td>";
                    
                    echo "</tr>";
                }
            }
            ?>
        </table>

    </div>
    </div>
    </div>
    </div>
    </body>
    </html>