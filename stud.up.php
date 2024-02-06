<?php
session_start();
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $email=$_SESSION['email'];
}
$msg="";
$n=$_GET['sno'];
$get="select * from ad_stu where ID='$n'";
$result=mysqli_query($conn,$get);
if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result);
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
                    }else if($id==19){
                      $c="10 F";
                    }
}
else{
    echo "you have duplicate values";
}
if(isset($_POST['update'])){
    $name1 = $_POST['first'];
    $em = $_POST['email'];
    $class = $_POST['class'];
    $gen = $_POST['gen'];
    $dob = $_POST['dob'];
    $stuid = $_POST['stuid'];
    if($_FILES['img']['name']==""){
        $img=$row['Image'];
    }
    else{
 //    -------image uploading-------
    $img = $_FILES['img']['name'];
    $tmp_img=$_FILES['img']['tmp_name'];
    //$size=$_FILES['img']['size'];
    $imag="image/".$img;
    move_uploaded_file($tmp_img,$imag);
    }
     $fname = $_POST['fname'];
     $mname = $_POST['mname'];
     $num1 =  $_POST['cnum'];
     $num2 =$_POST['acnum'];
     $add = $_POST['add'];
     $us_n = $_POST['us_name'];
    $us_p = $_POST['us_pass'];

    $up="UPDATE ad_stu SET StudentName='$name1',StudentEmail='$em',StudentClass='$class',
    Gender='$gen',DOB='$dob',StuID='$stuid',FatherName='$fname',MotherName='$mname',
    ContactNumber='$num1',AltenateNumber='$num2',Address='$add',UserName='$us_n',Password='$us_p',Image='$img' WHERE ID='$n'";
     if(mysqli_query($conn,$up)){
         $msg="Student details updated sucessfully";
         header("location:manstu.php");
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addclass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
      <div class="col-sm-3 bg-dark">
     <?php include_once("files/aside.php"); ?>
    </div>
    <div class="col-sm-9 bg-light">
    <div class="d-flex justify-content-between">
            <p class="h4">Add students</p>
            <p class="h6"><a href="admind.php">Dashboard</a> / Manage students</p>
        </div>
        <form action="" method="post" class="bg-white m-2 p-5" enctype="multipart/form-data">
            <label for="" class="form-label">Student Name</label>
            <input type="text" class="form-control" value="<?php echo $row['StudentName']; ?>" name="first">
            <label for="" class="form-label">Student Email</label>
            <input type="email" class="form-control" value="<?php echo $row['StudentEmail']; ?>" name="email">
            <label for="" class="form-label">Student Class</label>
            <select id="" class="form-select"  name="class">
                <option selected value="<?php echo $c; ?>"><?php echo $c; ?></option>
                <option value="1">10 A</option>
                <option value="2">10 B</option>
                <option value="3">10 C</option>
                <option value="4">10 D</option>
                <option value="5">10 E</option>
                <option value="6">10 F</option>
            </select>
            <label for="" class="form-label">Selected your gender</label>
            <select id="" class="form-select" name="gen">
                <option selected value="<?php echo $row['Gender']; ?>" placeholder="select your class"><?php echo $row['Gender']; ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" value="<?php echo $row['DOB']; ?>" name="dob">
            <label for="" class="form-label" value="">Student ID</label>
            <input type="text" class="form-control" value="<?php echo $row['StuID']; ?>" name="stuid">
            <label for="" class="form-label">Student Photo</label>
            <input type="file" class="form-control" accept="images/*" name="img">
            <img src="image/<?php echo $row['Image']; ?>" alt="" width="20%" height="130px">
            <h2 class="text-lg">Parents/guardian's details</h2>
            <label for="" class="form-label">Father's Name</label>
            <input type="text" class="form-control" value="<?php echo $row['FatherName']; ?>" name="fname">
            <label for="" class="form-label">Mother' Name</label>
            <input type="text" class="form-control" value="<?php echo $row['MotherName']; ?>" name="mname">
            <label for="" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $row['ContactNumber']; ?>" name="cnum">
            <label for="" class="form-label">Alternate Contact Number</label>
            <input type="text" class="form-control"  value="<?php echo $row['AltenateNumber']; ?>" name="acnum">
            <label for="" class="form-label">Address</label>
            <input type="text" class="form-control" value="<?php echo $row['Address']; ?>" name="add">
            <h2>Login details</h2>
            <label for="" class="form-label">User Name</label>
            <input type="text" class="form-control" value="<?php echo $row['UserName']; ?>" name="us_name">
            <label for="" class="form-label">Password</label>
            <input type="text" class="form-control" value="<?php echo $row['Password']; ?>" name="us_pass">
            <span><?php echo $msg; ?></span><br>
            <button type="submit" name="update" class="btn btn-info">Update</button>
        </form>
    </div>
    </div>
    </div>
    </body>
    </html>