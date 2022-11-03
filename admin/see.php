<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        img
        {
            width:300px;
            height:500px;
        }
        .parent
        { margin-top:20px;
            display:inline-block;
            width:310px;
            background:chocolate;
            margin-left:20px;
            padding:20px;
            height:fit-content;
        }
        .name
        {
            font-size:30px;
            font-weight: 900;
            font-size:50px;
           font-family: 'Courier New', Courier, monospace;
        }
        .price
        {
            font-size:30px;
            font-weight:bold;
            font-family:arial;
        }
        .price::before
        {
            content:"Rs ";
        }
        .delete-parent
        {
            text-align:right;
        }
    
        
    </style>
</head>

</html>


<?php


$conn=new mysqli("localhost","root","","doom");

$sql_obj=mysqli_query($conn,"select * from products");


while($row=mysqli_fetch_assoc($sql_obj))
{
    
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

    
    echo "<div class='parent'>          
            <div class='delete-parent'>
                <a href='deleteproduct.php?id=$pid'>  
    
    <button  class=' fa fa-trash'></button>
                </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
  
    </div>";

}
?>