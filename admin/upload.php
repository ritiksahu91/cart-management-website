<?php

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$fileobj=$_FILES['imname'];

print_r($fileobj);

$ext=".jpg";
date_default_timezone_set('Asia/kolkata');
$mydate='..//images//'.date('Y_m_d_h_i_s').$ext;

move_uploaded_file($fileobj['tmp_name'],$mydate);

$conn=new mysqli('localhost','root','','doom');

$cmd="insert into products(name,price,details,impath) 
     values('$name',$price,'$details','$mydate')";

echo "<br> $cmd <br>";

$sql_res=mysqli_query($conn,$cmd);
if($sql_res)
{
        echo "Product Uploaded Succefully!!";
}
else
{
    echo "Upload Failed";
}




?>*/