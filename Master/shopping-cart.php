<?php
require 'header.php';
if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"]))
{
	$arr = unserialize($_COOKIE["CartProduct"]);
}
else
{
	$arr=array();
}
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<div class="cart-list1">
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
								<tfoot>
									<tr>
										<td colspan="7">
											<div class="shopping-cart-btn">
												<span class="">
													<a href="home.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
													<a onClick="window.location.reload();" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
												</span>
											</div>
										</td>
									</tr>
								</tfoot>
								<tbody>
									<?php
									foreach ($arr as $key => $num) {
										if($key != 'sub_total'){


											?>
											<tr>
												<td class="romove-item"><a  title="cancel" class="icon" onclick="delete_product('<?php echo $key; ?>')"><i class="fa fa-trash-o"></i></a></td>
												<td class="cart-image">
													<a class="entry-thumbnail" href="detail.php?id=<?php echo $num['id']; ?>">
														<img src="../Master/img/<?php echo $num['image']; ?>" alt="">
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
				<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Estimate shipping and tax</span>
									<p>Enter your destination to get shipping and tax.</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<label class="info-title control-label">Country <span>*</span></label>
										<select class="form-control unicase-form-control selectpicker">
											<option>--Select options--</option>
											<option>India</option>
											<option>SriLanka</option>
											<option>united kingdom</option>
											<option>saudi arabia</option>
											<option>united arab emirates</option>
										</select>
									</div>
									<div class="form-group">
										<label class="info-title control-label">State/Province <span>*</span></label>
										<select class="form-control unicase-form-control selectpicker">
											<option>--Select options--</option>
											<option>TamilNadu</option>
											<option>Kerala</option>
											<option>Andhra Pradesh</option>
											<option>Karnataka</option>
											<option>Madhya Pradesh</option>
										</select>
									</div>
									<div class="form-group">
										<label class="info-title control-label">Zip/Postal Code</label>
										<input type="text" class="form-control unicase-form-control text-input" placeholder="">
									</div>
									<div class="pull-right">
										<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Discount Code</span>
									<p>Enter your coupon code if you have one..</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
									</div>
									<div class="clearfix pull-right">
										<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div><

				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<div id="cart-list2">
						<table class="table">
							<thead >
								<tr>
									<th>
										<div class="cart-sub-total">
											Subtotal<span class="inner-left-md"><?php echo $arr ?  $arr['sub_total'] : 0; ?></span>
										</div>
										<div class="cart-grand-total">
											Grand Total<span class="inner-left-md"><?php echo $arr ?  $arr['sub_total'] : 0; ?></span>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
											<?php
											if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
												?>
												<a href="login.php" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
												<?php
											}else{
												?>
												<form method="POST"><button type="submit" name="checkout" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></form>
												<?php
											} 
											?>
											<span class="">Checkout with multiples address!</span>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>		
			</div>
		</div> 
		<?php require 'brand.php'?>
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 	</div>
	</div>
	<!-- ============================================================= FOOTER ============================================================= -->
	<?php require 'footer.php'?>