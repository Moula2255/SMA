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
    <title>Manage Public Notice</title>
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
            <p class="h4">Manage Public Notice</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage Public Notice</p>
        </div>
        <div class="d-flex justify-content-between bg-white pt-5 px-3">
            <p class="h4">Manage Public Notice</p>
            <p class="h6">View all Public Notice</p>
        </div>
        <div class="p-3 bg-white">
        <table class="table border p-5">
            <tr class="">
                <th>Sno</th>
                <th>Notice Title</th>
                <th>Notice Date</th>
                <th>Action</th>
            </tr>
            <?php
            $conn=mysqli_connect('localhost','root','','sschool');
            $show="select * from tblpublicnotice where nun='1'";
            $i=1;
            $get=mysqli_query($conn,$show);
            if(mysqli_num_rows($get)>0){
                while($row=mysqli_fetch_array($get)){
                    $sno=$row['ID'];
                    echo "<tr>";
                    echo "<td>" ."$i" ."</td>";
                    echo "<td>" .$row['NoticeTitle'] ."</td>";
                    echo "<td>" .$row['CreationDate'] ."</td>";
                    echo "<td>" ."<a href='uppntc.php?sno=$sno'><i class='bi bi-eye'></i></a> || " ."<a href='delpntc.php?sno=$sno' onclick='window.alert(\"deleted sucessfully\")'><i class='bi bi-trash'></i></a>" ."</td>";
                    echo "</tr>";
                    $i++;
                }
            }
            ?>
        </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    </body>
    </html>
