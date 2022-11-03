<?php

$id=$_GET['id'];

$conn=new mysqli('localhost','root','','doom');
mysqli_query($conn,"DELETE FROM products WHERE pid=$id");
header('location:see.php');
?>


