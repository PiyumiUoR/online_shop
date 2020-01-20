<?php
include("db.php");
mysqli_query($conn,"  INSERT INTO `cart`( `product`, `price`, `qty`) VALUES ('$_POST['product']','$_POST['price']','$_POST['qty']')  ");
?>