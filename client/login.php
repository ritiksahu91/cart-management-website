<?php

include '../universal/share.php';

$uname=$_POST['uname'];
$password=$_POST['password'];

session_start();
$_SESSION['login']=false;

$query="select * from user where name='$uname' and password='$password'";

$sql_obj=mysqli_query($conn,$query);

$count=mysqli_num_rows($sql_obj);

if($count==0)
{
    echo "Invalid credentials";
    die;
}
else
{

    $row=mysqli_fetch_assoc($sql_obj);

    $userid=$row['userid'];
    $username=$row['username'];

    echo "Login Success";
    $_SESSION['login']=true;
    $_SESSION['userid']=$userid;
    $_SESSION['username']=$username;
    $_SESSION['cart']=array();
    header('location:see.php');
}


?>