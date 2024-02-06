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
    <title>Manage Notice</title>
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
    <div class="col-sm-9 bg-light">
    <div class="d-flex justify-content-between">
            <p class="h4">Manage Notice</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage Notice</p>
        </div>
        <table class="table border p-2 m-2 me-5">
            <tr>
                <th>Sno</th>
                <th>Notice Title</th>
                <th>Class</th>
                <th>Section</th>
                <th>Notice Date</th>
                <th>Action</th>
            </tr>
            <?php
            $conn=mysqli_connect('localhost','root','','sschool');
            $show="select * from tblnotice where nun='1'";
            $i=1;
            $get=mysqli_query($conn,$show);
            if(mysqli_num_rows($get)>0){
                while($row=mysqli_fetch_array($get)){
                    $c=$row['ClassId'];
                    if($c==2 || $c==3){
                        $class=10;
                    }else{
                        $class=11;
                    }
                    if($c==2 || $c==5){
                        $sec='B';
                    }else{
                        $sec='C';
                    }
                    $sno=$row['ID'];
                    echo "<tr>";
                    echo "<td>" ."$i" ."</td>";
                    echo "<td>" .$row['NoticeTitle'] ."</td>";
                    echo "<td>" .$class ."</td>";
                    echo "<td>" .$sec ."</td>";
                    echo "<td>" .$row['CreationDate'] ."</td>";
                    echo "<td>" ."<a href='upntc.php?sno=$sno'><i class='bi bi-eye'></i></a> || " ."<a href='ntcdel.php?sno=$sno' onclick='window.alert(\"deleted sucessfully\")'><i class='bi bi-trash'></i></a>" ."</td>";
                    echo "</tr>";
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</div>
    </div>
</body>
</html>