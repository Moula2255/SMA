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
    <div class="col-sm-9">
    <div class="d-flex justify-content-between">
            <p class="h4">Between Dates Reports</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Between Dates Reports</p>
        </div>
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
            if(isset($_POST['submit'])){
                $start = $_POST['from'];
                $end = $_POST['to'];
                echo $start .$end;
                
            $show="select * from ad_stu where date(DatefAdmission) between '$start' and '$end' and nun=1";
            $get=mysqli_query($conn,$show);
            if(mysqli_num_rows($get)>0){
                while($row=mysqli_fetch_array($get)){
                    $sno=$row['ID'];
                    $id=$row['StudentClass'];
                    echo $id .$sno;
                    if($id==1){
                      $c="11 A";
                    }else if($id==2){
                      $c="11 B";
                    }else if($id==3){
                      $c="10 C";
                    }else if($id==4){
                      $c="11 C";
                    }else if($id==5){
                      $c="11 B";
                    }else if($id==19){
                      $c="10 B";
                    }else if($id==20){
                      $c="11 F";
                    }
                    echo "<tr>";
                    echo "<td>" .$row['ID'] ."</td>";
                    echo "<td>" .$row['StuID'] ."</td>";
                    echo "<td>" .$row['StudentClass'] ."</td>";
                    echo "<td>" .$row['StudentName'] ."</td>";
                    echo "<td>" .$row['StudentEmail'] ."</td>";
                    echo "<td>" .$row['DatefAdmission'] ."</td>";
                    echo "<td>" ."<a href='stud.up.php?sno=$sno'><i class='bi bi-eye'></i></a> || " ."<a href='stu.delete.php?sno=$sno' ><i class='bi bi-trash'></i></a>" ."</td>";
                    
                    echo "</tr>";
                }
            }
        }
            ?>
        </table>
    </div>
    </div>
    </div>
    </body>
    </html>
