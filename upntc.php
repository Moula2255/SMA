<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
if(isset($_GET['sno'])){
    $id = $_GET['sno'];
}
$msg="";
$show="select * from tblnotice where ID='$id'";
$res=mysqli_query($conn,$show);
if(mysqli_num_rows($res)==1){
    while($row=mysqli_fetch_array($res)){
        $n1=$row['NoticeTitle'];
        $n2=$row['NoticeMsg'];
    }
}
if(isset($_POST['submit'])){
   $nt = $_POST['first'];
   $nm = $_POST['second'];
   $up = "update tblpublicnotice set NoticeTitle='$nt',NoticeMessage='$nm' where ID='$id'";
   if(mysqli_query($conn,$up)){
     header("location:mcpntc.php");
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Notice</title>
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
        <div class="d-flex flex-direction-column justify-content-between p-3 pt-5">
            <p class="h4">Update Notice</p>
            <p><a href="admind.php" class="decoration-none">Dashboard</a> / Upadet Notice</p>
        </div>
        <form action="" method="post" class="bg-white m-4">
        <h4 class="text-center pt-4">Add Notice</h4>
            <div class="px-4 pb-5">
            <label for="" class="form-label">Notice Title</label>
            <input type="text" class="form-control" name="first" value="<?php echo $n1; ?>">
            <label for="" class="form-label pt-2">Notice Message</label>
            <input type="text" class="form-control px-4 py-3" name="second" value="<?php echo $n2; ?>">
            <span><?php echo $msg; ?></span><br>
            <button type="submit" name="submit" class="btn btn-info mt-0 px-4 pt-2 pb-2">Update</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
