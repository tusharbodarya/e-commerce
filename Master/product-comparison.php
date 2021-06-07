<?php require 'header.php'?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>Compare</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="product-comparison">
			<div>
				<h1 class="page-title text-center heading-title">Product Comparison</h1>
				<div class="table-responsive">
					<table class="table compare-table inner-top-vs">
						<tr>
							<th>Products</th>
							<?php
							$user_session = $_SESSION['login'];
							$get_user = "select * from users where email = '".$user_session."' OR phone = '".$user_session."'";
							$run_user = mysqli_query($conn,$get_user);
							$row_user = mysqli_fetch_array($run_user);
							$user_id = $row_user['id'];
							$i = 0;
							$get_compare = "select * from tbl_product_comparison where user_id='$user_id' AND is_deleted='0'";
							$run_compare = mysqli_query($conn,$get_compare)or die("SQL Query Failed.");
							while($row_compare = mysqli_fetch_array($run_compare)){
								$product_id = $row_compare['product_id'];
								$get_products = "select * from tbl_product where id='$product_id'";
								$run_products = mysqli_query($conn,$get_products);
								$row_products = mysqli_fetch_array($run_products);
								$productid = $row_products['id'];
								$product_name = $row_products['name'];
								$product_image = $row_products['image'];
								$product_curr_price = $row_products['curr_price'];
								$product_prev_price = $row_products['prev_price'];
								$i++;

								?>
								<td>
									<div class="product">
										<div class="product-image">
											<div class="image">
												<a href="detail.php?id=<?php echo $productid; ?>">
													<img alt="" src="../Master/img/<?php echo $product_image; ?>">
												</a>
											</div>

											<div class="product-info text-left">
												<h3 class="name"><a href="detail.php?id=<?php echo $productid; ?>"><?php echo $product_name; ?></a></h3>
												<div class="action">
													<a class="lnk btn btn-primary" href="home.php?id=<?php echo $productid; ?>">Add To Cart</a>
												</div>

											</div>
										</div>
									</div>
								</td>
							<?php } ?>
						</tr>

						<tr>
							<th>Price</th>
							<?php
							$i = 0;
							$get_compare = "select * from tbl_product_comparison where user_id='$user_id' AND is_deleted='0'";

							$run_compare = mysqli_query($conn,$get_compare)or die("SQL Query Failed.");

							while($row_compare = mysqli_fetch_array($run_compare)){
								$product_id = $row_compare['product_id'];
								$get_products = "select * from tbl_product where id='$product_id'";
								$run_products = mysqli_query($conn,$get_products);
								$row_products = mysqli_fetch_array($run_products);
								$product_curr_price = $row_products['curr_price'];
								$product_prev_price = $row_products['prev_price'];
								$i++;
								?>
								<td>
									<div class="product-price">
										<span class="price"> <?php echo $product_curr_price; ?> </span>
										<span class="price-before-discount"><?php echo $product_prev_price; ?></span>
									</div>
								</td>
							<?php } ?>
						</tr>

						<tr>
							<th>Description</th>
							<?php
							$i = 0;
							$get_compare = "select * from tbl_product_comparison where user_id='$user_id' AND is_deleted='0'";

							$run_compare = mysqli_query($conn,$get_compare)or die("SQL Query Failed.");

							while($row_compare = mysqli_fetch_array($run_compare)){
								$product_id = $row_compare['product_id'];
								$get_products = "select * from tbl_product where id='$product_id'";
								$run_products = mysqli_query($conn,$get_products);
								$row_products = mysqli_fetch_array($run_products);
								$product_description = $row_products['description'];
								$i++;
								?>
								<td><p class="text"><?php echo $product_description; ?><p></td>
								<?php } ?>
							</tr>

							<tr>
								<th>Availability</th>
								<?php
								$i = 0;
								$get_compare = "select * from tbl_product_comparison where user_id='$user_id' AND is_deleted='0'";

								$run_compare = mysqli_query($conn,$get_compare)or die("SQL Query Failed.");

								while($row_compare = mysqli_fetch_array($run_compare)){
									$product_id = $row_compare['product_id'];
									$get_products = "select * from tbl_product where id='$product_id'";
									$run_products = mysqli_query($conn,$get_products);
									$row_products = mysqli_fetch_array($run_products);
									$product_stock_status = $row_products['stock_status'];
									$i++;
									?>
									<td><p class="in-stock"><?php echo $product_stock_status; ?></p></td>
								<?php } ?>
							</tr>

							<tr >
								<th>Remove</th>
								<?php
								$i = 0;
								$get_compare = "select * from tbl_product_comparison where user_id='$user_id' AND is_deleted='0'";

								$run_compare = mysqli_query($conn,$get_compare)or die("SQL Query Failed.");

								while($row_compare = mysqli_fetch_array($run_compare)){
									$compare_id = $row_compare['id'];
									$product_id = $row_compare['product_id'];
									$get_products = "select * from tbl_product where id='$product_id'";
									$run_products = mysqli_query($conn,$get_products);
									$row_products = mysqli_fetch_array($run_products);
									$product_description = $row_products['description'];
									$i++;
									?>
									<td class='text-center'><a href="delete.php?tbl=tbl_product_comparison&id=<?php echo $compare_id; ?>" class="remove-icon"><i class="fa fa-times"></i></a></td>
								<?php } ?>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================= FOOTER ============================================================= -->
	<?php require 'footer.php'?>
