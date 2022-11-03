<html>

<head>
    <style>
        body{
            text-align:center;
            background-image: url("https://wallpapercave.com/wp/wp2252568.jpg");
        }
        img
        {
            width:300px;
            height:400px;
        }
        .parent
        {
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
        h1{
            color:gold;
            font-size:50px;
            
        }
        a{
         color:white;
         font-size:30px;
        }
    </style>
</head>

<body>
    <h1 >products</h1>

    <div style="text-align:left">
        <a href="viewcart.php">View Cart</a>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>


<?php

session_start();
if($_SESSION['login']==false)
{
    echo "invalid Access";
    die;
}
$username=$_SESSION['username'];
echo "<h1>$username</h1>";


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
                <a href='addtocart.php?id=$pid'>  
                <button class='delete'>Add Cart</button>
                </a>
             </div>
        
        <div class='name'>$name</div>
        <div class='price'>$price</div>
        <img src='$impath'>
        <p class='details'>$details</p>
  
    </div>";
}

?>
