<?php require 'header.php'; ?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th colspan="4" class="heading-title">My Wishlist</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$user_session = $_SESSION['login'];

								$get_user = "select * from users where email = '".$user_session."' OR phone = '".$user_session."'";

								$run_user = mysqli_query($conn,$get_user);

								$row_user = mysqli_fetch_array($run_user);

								$user_id = $row_user['id'];

								$i = 0;


								$get_wishlist = "select * from tbl_wishlist where user_id='$user_id' AND is_deleted='0'";

								$run_wishlist = mysqli_query($conn,$get_wishlist)or die("SQL Query Failed.");

								while($row_wishlist = mysqli_fetch_array($run_wishlist)){

									$wishlist_id = $row_wishlist['id'];

									$product_id = $row_wishlist['product_id'];

									$get_products = "select * from tbl_product where id='$product_id'";

									$run_products = mysqli_query($conn,$get_products);

									$row_products = mysqli_fetch_array($run_products);

									$product_name = $row_products['name'];
									$product_image = $row_products['image'];

									$product_curr_price = $row_products['curr_price'];

									$product_prev_price = $row_products['prev_price'];

									$i++;

									?>
									<tr>
										<td class="col-md-2"><img src="../Master/img/<?php echo $product_image; ?>" alt="image"></td>
										<td class="col-md-7">
											<div class="product-name"><a href="#"><?php echo $product_name; ?></a></div>
											<div class="price">
												<?php echo $product_curr_price; ?>.00
												<span><?php echo $product_prev_price; ?>.00</span>
											</div>
										</td>
										<td class="col-md-2">
											<a href="home.php?id=<?php echo $product_id; ?>" class="btn-upper btn btn-primary">Add to cart</a>
										</td>
										<td class="col-md-1 close-btn">
											<a href="delete.php?tbl=tbl_wishlist&id=<?php echo $wishlist_id; ?>"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>			
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<?php require 'brand.php'; ?>
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
	</div>
</div>
<?php require 'footer.php'; ?>
