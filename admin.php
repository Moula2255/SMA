<?php
session_start();
$u_err=$p_err="";
$conn=mysqli_connect('localhost','root','','sschool');
$show="select * from admin";
$get=mysqli_query($conn,$show);
if(mysqli_num_rows($get)>0){
    while($row=mysqli_fetch_array($get)){
        $name=$row['UserName'];
        $em=$row['email'];
        $ui=$row['admin_id'];
        $ps=$row['pass'];
    }
}
if(isset($_POST['submit'])){
    $us=$_POST['first'];
    $pass=$_POST['pass'];
    if($ui==$us){
        if($ps==$pass){
            $_SESSION['name']=$name;
            $_SESSION['email']=$em;
            header("location:admind.php");
        }else{
            $p_err="password invalid";
        }
    }
    else{
        $u_err="user name invaild";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="w-50 bg-dark text-white m-5 p-5">
        <h2><span class="bg-warning text-white p-1">S</span>hine<span class="bg-warning text-white p-1 ms-1">S</span>chool.</h2>
        <h2 >Admin login page</h2>
        <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="" class="form-label">Enter your user id :</label>
            <input type="text" class="form-control w-75" name="first">
            <span class="error"><?php echo $u_err; ?></span><br>
            <label for="" class="form-label">Enter your password :</label>
            <input type="password" class="form-control w-75" name="pass">
            <span class="error"><?php echo $p_err; ?></span><br>
            <button  class="btn btn-primary" name="submit">Login</button>
        </form></div>
</div>
</body>
</html>