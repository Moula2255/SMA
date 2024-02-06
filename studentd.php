<?php
session_start();
if(isset($_REQUEST['log'])){
    session_destroy();
    header("location:student.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student dashboard</title>
</head>
<body>
    <h1>student dashboard</h1>
    <form action="" method="post">
    <button class="btn btn-primary"><a href="studentd.php?log='1'">log out</a></button></form>
</body>
</html>