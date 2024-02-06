<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <script>
    window.alert("deleted sucessfully");
</script> -->
    <?php
$conn=mysqli_connect('localhost','root','','sschool');
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];
}
$del="delete from tblnotice where ID='$sno'";
if(mysqli_query($conn,$del)){
    header("location:mngntc.php");
}
?>

</body>
</html>