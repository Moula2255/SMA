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
$del="update tblpublicnotice set nun=0 where ID='$id'";
if(mysqli_query($conn,$del)){
    header("location:mcpntc.php");
}
?>