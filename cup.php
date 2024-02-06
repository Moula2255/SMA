<?php
$conn=mysqli_connect('localhost','root','','sschool');
session_start();
if(isset($_SESSION['name'])){
    $sno=$_GET['sno'];
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$com="";
        if(isset($_GET)){
            $sno=$_GET['sno'];
           $show = "select * from ad_class where sno='$sno'";
           $get=mysqli_query($conn,$show);
           if(mysqli_num_rows($get)==1){
            $row=mysqli_fetch_array($get);
            $t=$row['creation_date'];
            $cn = $row['class_name'];
            $cs = $row['section'];
           }
        }
        if(isset($_POST['submit'])){
   $cn = $_POST['class'];
   $cs = $_POST['sec'];
   $ins="update ad_class set class_name='$cn',section='$cs',creation_date='$t' where sno='$sno'";
   if(mysqli_query($conn,$ins)){
    header("location:mc.php");
   }
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
        <!-- update class -->
        
         <form action="" method="post" class="bg-secondary m-4 p-5">
            <h2 class="ms-5 ps-5">Add Class</h2>
           <label for="" class="form-label">Class Name</label>
           <input type="text" class="form-control" name="class" value="<?php echo $cn; ?>" required>
           <label for="" class="form-label">Class Name</label>
           <select class="form-select" name="sec" id="" required>
            <option selected value="<?php $cs ?>"><?php echo $cs; ?></option>
            <option  value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
           </select>
            <span class="mt-2"><?php echo $com; ?></span><br>
           <button class="btn btn-info m-4 ms-0 mt-2" onclick="myfun()" name="submit">update</button>
        </form>
    </div>
    </div>
    </div>
    <script>
        function myfun(){
            window.alert("UPDATED SUCESSFULLY");
        }
    </script>
    </body>
    </html>