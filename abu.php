<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$show = "select * from tblpage where PageType='about us'";
           $get=mysqli_query($conn,$show);
           if(mysqli_num_rows($get)==1){
            $row=mysqli_fetch_array($get);
            $pt=$row['PageTitle'];
            $pd = $row['PageDescription'];
           }
           if(isset($_POST['submit'])){
            $pgtl = $_POST['pt'];
            $pgdes = $_POST['pd'];
            $up="update tblpage set PageTitle='$pgtl',PageDescription='$pgdes' where PageType='about us'";
            if(mysqli_query($conn,$up)){
             echo "<script>window.alert('updated sucessfully')</script>";
             header("location:abu.php");
            }
         }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    <div class="d-flex justify-content-between px-2 pt-5 pb-2">
            <p class="h4">Update About Us</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage Public Notice</p>
        </div>
        <form action="" method="post" class="bg-white p-5 px-3">
        <h4 class="text-center">Update About Us</h4>
           <label for="" class="form-label">Page Title:</label>
           <input type="text" class="form-control" name="pt" value="<?php echo $pt; ?>">
           <label for="" class="form-label">Page Description:</label>
           <textarea type="text" class="form-control mb-2" name="pd"><?php echo $pd; ?></textarea>
           <button type="submit" name="submit" class="btn btn-info">Update</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>
