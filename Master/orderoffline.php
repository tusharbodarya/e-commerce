<?php
session_start();
include 'dbconnect.php';
if(isset($_SESSION['login'])){
$user_session = $_SESSION['login'];
$row_user = mysqli_fetch_array( mysqli_query($conn,"select * from users where email = '".$user_session."' OR phone = '".$user_session."'"));
$user_id = $row_user['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
if(isset($name) && isset($address) && isset($state) && isset($city) && isset($pincode) && isset($email) && isset($phone)){
$user_order = "insert into order_info (user_id,name,address,state,city,pincode,email,phone) values ('$user_id','$name','$address','$state','$city','$pincode','$email','$phone')";
$run_customer_order = mysqli_query($conn,$user_order) or die("SQL Query Failed.");
$orderinfo_id = mysqli_insert_id($conn);
$cart = unserialize($_COOKIE['CartProduct']);
$insert_checkout = "insert into tbl_orders (order_info_id,user_id,product_id,product_name,product_qty,product_price,order_status) values ";
		for($i=0;$i<sizeof($cart)-1;$i++){
			$pro_id = $cart[$i]['id'];
			$product_name = $cart[$i]['productname'];
			$product_qty = $cart[$i]['qty'];
			$product_price = $cart[$i]['cur_price'];
			$order_status = "pending";
			$insert_checkout .="('".$orderinfo_id."','".$user_id."','".$pro_id."','".$product_name."','".$product_qty."','".$product_price."','".$order_status."'),";
		}

		$insert_checkout = rtrim($insert_checkout,',');

		$run_checkout = mysqli_query($conn,$insert_checkout);
		if($run_checkout){
			echo "<script>window.open('cookie_delete.php','_self')</script>";
		}else{
		echo "<script>alert('Product Is Empty')</script>";
	}
echo "<script>alert('Your order has been submitted,Thanks ')</script>";
}else{
	echo "<script>window.open('checkout.php','_self')</script>";
}
}
?>