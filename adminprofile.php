<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$show="select * from admin where UserName='$name'";
$get=mysqli_query($conn,$show);
if(mysqli_num_rows($get)==1){
    $row=mysqli_fetch_array($get);
}
if(isset($_POST['submit'])){
    $aname = $_POST['an'];
    $mnum = $_POST['mb'];
    $email = $_POST['em'];
    $up="update admin set AdminName='$aname',MobileNumber='$mnum',email='$email'";
    if(mysqli_query($conn,$up)){
        echo "<script>window.alert('updated sucessfully')</script>";
        header("location:adminprofile.php");
    }
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
    <div class="col-sm-9 bg-light">
    <div class="d-flex justify-content-between m-5 mb-2 mx-2">
            <p class="h4">Admin Profile</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Admin Profile</p>
        </div>
        <form action="" method="post" class="bg-white p-5 px-4">
            <h4 class="text-center">Admin Profile</h4>
            <label for="" class="form-label">Admin Name</label>
            <input type="text" class="form-control" name="an" value="<?php echo $row['AdminName']; ?>">
            <label for="" class="form-label">User Name</label>
            <input type="text" class="form-control" name="" value="<?php echo $row['UserName']; ?>" disabled>
            <label for="" class="form-label">Conatact Number</label>
            <input type="text" class="form-control" name="mb" value="<?php echo $row['MobileNumber']; ?>">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="em" value="<?php echo $row['email']; ?>">
            <label for="" class="form-label">Admin Registration Date</label>
            <input type="text" class="form-control mb-2" name="" value="<?php echo $row['AdminRegdate']; ?>" disabled>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
