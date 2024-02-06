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
    <title>Search</title>
        <style>
        ul{
            display:flex;
            flex-direction:column;
        }
        
        li a{
            text-decoration:none;
            color:white;
        }
        a{
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
            <p class="h4">Search Student</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Search Student</p>
        </div>
        <form action="" method="post" class="bg-white m-3 p-4">
            <label for="" class="form-label">Search Student:</label>
            <input type="text" class="form-control p-2" name="id" required>
            <button class="btn btn-info px-4 mt-2" name="submit">Search</button><br>
            <?php
            $conn=mysqli_connect('localhost','root','','sschool');
            if(isset($_POST['submit'])){
                $id=$_POST['id'];
               $show="select * from ad_stu where StuID='$id'";
               $res=mysqli_query($conn,$show);
               if(mysqli_num_rows($res)==1){
                echo "<h4 class='pt-2 pb-2'>Result against \"$id\" keyword</h4>";
                echo "<table class='table table-border'>";
                echo "<tr>";
                echo "<th>S.No</th>";
                echo "<th>" ."Student ID" ."</th>";
                echo "<th>" ."Student Class" ."</th>";
                echo "<th>" ."Student Name" ."</th>";
                echo "<th>" ."Student Email" ."</th>";
                echo "<th>" ."Admission Date" ."</th>";
                echo "<th colspan='2'>" ."Action" ."</th>";
                echo "</tr>";
                while($row=mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>" .$row['ID'] ."</td>";
                    echo "<td>" .$row['StuID'] ."</td>";
                    echo "<td>" .$row['StudentClass'] ."</td>";
                    echo "<td>" .$row['StudentName'] ."</td>";
                    echo "<td>" .$row['StudentEmail'] ."</td>";
                    echo "<td>" .$row['DatefAdmission'] ."</td>";
                    echo "<td>" ."<a href=''><i class='bi bi-eye'></i></a> || <a href=''><i class='bi bi-trash'></i></a>" ."</td>";
                    echo "</tr>";
                }
               }
            }
            
            ?>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
