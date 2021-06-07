<?php
require 'header.php';
if(isset($_POST['checkout'])){
	
	if(isset($_SESSION['login']) && isset($_COOKIE['CartProduct'])){

		$user_session = $_SESSION['login'];
		$row_user = mysqli_fetch_array( mysqli_query($conn,"select * from users where email = '".$user_session."' OR phone = '".$user_session."'"));
		$user_id = $row_user['id'];
		$insert_checkout = "insert into tbl_orders (user_id,product_id,product_name,product_qty,product_price,order_status) values ";
		for($i=0;$i<sizeof($arr)-1;$i++){
			$pro_id = $arr[$i]['id'];
			$product_name = $arr[$i]['productname'];
			$product_qty = $arr[$i]['qty'];
			$product_price = $arr[$i]['cur_price'];
			$order_status = "pending";
			$insert_checkout .="('".$user_id."','".$pro_id."','".$product_name."','".$product_qty."','".$product_price."','".$order_status."'),";
		}

		$insert_checkout = rtrim($insert_checkout,',');

		$run_checkout = mysqli_query($conn,$insert_checkout);
		if($run_checkout){
			echo "<script>window.open('cookie_delete.php','_self')</script>";
		}
		echo "<script>window.open('cookie_delete.php','_self')</script>";

	}else{
		echo "<script>alert('Product Is Empty')</script>";
	}
	
}
?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<div class="panel-body">
							<div class="cart-list1">
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th class="cart-romove item">Remove</th>
														<th class="cart-description item">Image</th>
														<th class="cart-product-name item">Product Name</th>
														<th class="cart-qty item">Quantity</th>
														<th class="cart-sub-total item">Subtotal</th>
														<th class="cart-total last-item">Grandtotal</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$user_session = $_SESSION['login'];
													if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"]))
													{
														$arr = unserialize($_COOKIE["CartProduct"]);
													}
													else
													{
														$arr=array();
													}

													foreach ($arr as $key => $num) {
														if($key != 'sub_total'){


															?>
															<tr>
																<td class="romove-item"><a  title="cancel" class="icon" onclick="delete_product('<?php echo $key; ?>')"><i class="fa fa-trash-o"></i></a></td>
																<td class="cart-image">
																	<a class="entry-thumbnail" href="detail.php?id=<?php echo $num['id']; ?>">
																		<img src="../Master/img/<?php echo $num['image']; ?>"  height="56px" width="56px" alt="">
																	</a>
																</td>
																<td class="cart-product-name-info">
																	<h4 class='cart-product-description'><a href="detail.php?id=<?php echo $num['id']; ?>"><?php echo $num['productname']; ?></a></h4>
																</td>
																<td class="cart-product-quantity">
																	<div class="quant-input">
																		<div class="arrows">
																		</div>
																		<input type="number" dir="ltr" style="width: 7em" value="<?php echo $num['qty']; ?>" onchange="qty_update('<?php echo $key; ?>',this.value)">
																	</div>
																</td>
																<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $num['cur_price']; ?></span></td>
																<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php  echo $total=$num['cur_price']*$num['qty']; ?></span></td>
															</tr>
															<?php 

														}
													}
													?>	
												</tbody>
											</table>
										</div>
									</div>			
								</div>
							</div>
						</div>
						<style type="text/css">
							.rounded {
								border-radius: 1rem
							}
							.nav-pills .nav-link {
								color: #555
							}
							.nav-pills .nav-link.active {
								color: white
							}
							input[type="radio"] {
								margin-right: 5px
							}
							.bold {
								font-weight: bold
							}
						</style>
						<script type="text/javascript">
							$(function() {
								$('[data-toggle="tooltip"]').tooltip()
							});
						</script>
						<div class="panel-body">
							<div class="my-wishlist-page">
								<div class="row">
									<div class="col-md-12 my-wishlist">
										<div class="table-responsive">
											<?php include 'checkout-form.php'; ?>
										</div>
									</div>			
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">
										<li><a href="#">Billing Address</a></li>
										<li><a href="#">Shipping Address</a></li>
										<li><a href="#">Shipping Method</a></li>
										<li><a href="#">Payment Method</a></li>
									</ul>		
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
		<?php include 'brand.php';?>
	</div>
</div>
<?php require 'footer.php';?>