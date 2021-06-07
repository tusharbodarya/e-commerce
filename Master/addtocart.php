<?php
if(isset($_POST['add_cart'])){
	$cart = unserialize($_COOKIE['CartProduct']);
	$product_price = $cart['sub_total'];
	$user_id = $_SESSION['login'];
	$p_id = $_GET['productid'];
	$check_product = "select * from cart where user_id='$user_id' AND product_id='$p_id'";
	$run_check = mysqli_query($conn,$check_product);
	if(mysqli_num_rows($run_check)>0){
		echo "<script>alert('This Product is already added in cart')</script>";
		echo "<script>window.open('home.php','_self')</script>";
	}
	else {
		for($i=0;$i<sizeof($cart)-1;$i++)
		{
			$product_size = "ML";
			$product_qty = $cart[$i]['qty'];
		}
		$query = "insert into cart (p_id,user_id,qty,p_price,size) values ('$p_id','$user_id','$product_qty','$product_price','$product_size')";
		$run_query = mysqli_query($conn,$query);
		echo "<script>window.open('home.php','_self')</script>";
	}
}else{
	echo "<script>alert('This Product is Not added in cart')</script>";
		echo "<script>window.open('home.php','_self')</script>";
}

if(isset($_POST['checkout'])){
	if(!isset($_SESSION['login'])){
		echo "<script>alert('You Must Login To Add Product In checkout')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}else{
		if(isset($_SESSION['login']) && isset($_COOKIE['CartProduct'])){

			$user_session = $_SESSION['login'];
			$row_user = mysqli_fetch_array( mysqli_query($conn,"select * from users where email = '".$user_session."' OR phone = '".$user_session."'"));
			$user_id = $row_user['id'];
			$insert_checkout = "insert into cart (p_id,user_id,qty,p_price,size) values ";
			for($i=0;$i<sizeof($arr)-1;$i++){
				$pro_id = $arr[$i]['id'];
				$product_qty = $arr[$i]['qty'];
				$product_price = $arr[$i]['cur_price'];
				$product_size = "ML";
				$insert_checkout .="('".$pro_id."','".$user_session."','".$product_qty."','".$product_price."','".$product_size."'),";
			}

			$insert_checkout = rtrim($insert_checkout,',');
			
			$run_checkout = mysqli_query($conn,$insert_checkout);
			if($run_checkout){
				echo "<script>alert('Product Is added in cart')</script>";
			}
			echo "<script>window.open('home.php','_self')</script>";

		}else{
			echo "<script>alert('Product Is Empty')</script>";
		}
	}
}
?>