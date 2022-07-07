<?php

include '../config.php';
$id=$_GET['id'];
$sql = "DELETE FROM adds WHERE id='$id'";
if(mysqli_query($conn,$sql) or die(mysqli_error($conn)))
header("Location:http://localhost/sample/brand/publish_add.php");

?>