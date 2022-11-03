<?php

$conn=new mysqli("localhost","root","","doom");
if($conn->connect_error)
{
    echo "connection Error";
    die;
}


?>