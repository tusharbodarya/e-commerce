<?php
$key=$_POST['key']; 
$qty=$_POST['qty'];
if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"]))
{
	$cart_arr = unserialize($_COOKIE["CartProduct"]);
}
else
{
	$cart_arr=array();
}
$total = $cart_arr[$key]['qty'] * $cart_arr[$key]['cur_price'];
$sub_total = $cart_arr['sub_total'] - $total;
$cart_arr['sub_total'] = $sub_total ;

$cart_arr[$key]['qty']=$qty;

$total = $qty * $cart_arr[$key]['cur_price'];
$sub_total = $cart_arr['sub_total'] + $total;
$cart_arr['sub_total'] = $sub_total ;

setcookie("CartProduct",serialize($cart_arr),time() + (43200), "/");
?>