<?php
$cart_arr=array();
setcookie("CartProduct",serialize($cart_arr),time() +(43200), "/");
echo "<script> alert('Product Has Inserted Into checkout') </script>";
echo "<script>window.open('home.php','_self')</script>";
?>