
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<a href="viewcart.php">View Cart</a>
</body>
</html>
<?php
echo " <br>";

$pid=$_GET['id'];

echo "Recieved Id=$pid";

session_start();


$local_cart=$_SESSION['cart'];

array_push($local_cart,$pid);


print_r($local_cart);

$_SESSION['cart']=$local_cart;



?>
