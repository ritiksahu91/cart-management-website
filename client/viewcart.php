<?php

$total=0;

?>

<html>

<head>
    <style>
        body{
            text-align:center;
            background-image: url("https://th.bing.com/th/id/OIP.FRD-ggJxFZXlBjAeXeulZQHaEK?pid=ImgDet&rs=1")
        }
        img
        {
            width:300px;
            height:500px;
        }
        .parent
        {
            margin-top:80px;
            display:inline-block;
            width:310px;
            background-color:gray;
            margin-left:20px;
            padding:20px;
            margin-top:10px;
            margin-bottom:10px;
        }
        .name
        {
            font-size:30px;
            font-weight:italic;
            font-family:arial;
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
        .delete
        {
            width:fit-content;
            height:30px;
            border-radius:50%;            
            background-color:red;
            color:white;        
            border:none;   
            cursor:pointer; 
        }
        .order
        {
            position:absolute;
            top:10px;            
        }
        .total
        {
            font-size:34px;
        }
        .total::after
        {
            content:" Rs"
        }
        a{
         color:white;
         font-size:30px;
        }
    </style>
</head>

<body>
    <div style="text-align:right">
    <a href="see.php">View Products</a>
        <a href="viewcart.php">View Cart</a>
        <a href="logout.php">Logout</a>
    </div>

    
</body>

</html>



<?php

include '../universal/share.php';
session_start();
$local_cart=$_SESSION['cart'];

$pids=implode(",",$local_cart);

$q="select * from products where pid in ($pids)";

$sql_obj=mysqli_query($conn,$q);

while($row=mysqli_fetch_assoc($sql_obj))
{
    // Extract Product fields
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $impath=$row['impath'];

    $total+=$price;

    // Render it as a HTML
    echo "<div class='parent'>          
            <div class='delete-parent'>
                <a href='deletecart.php?id=$pid'>  
                <button class='delete'>Remove Cart</button>
                </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
  
    </div>";
}

echo "<div class='order'>        
        <button>Place order of <span class='total'>$total</span></button>
    </div>";

?>