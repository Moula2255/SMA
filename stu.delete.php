<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$conn=mysqli_connect('localhost','root','','sschool');
$n=$_GET['sno'];
echo $n;
$del="update ad_stu set nun=0 where ID='$n'";
if(mysqli_query($conn,$del)){
header("location:manstu.php");
}




?>