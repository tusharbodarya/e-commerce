<?php
include 'dbconnect.php';
$product_id=$_GET['id'];
$product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tbl_product  WHERE is_deleted='0' and id='".$product_id."'"));
$id = $product["id"];
$productname =$product["name"];
$cur_price =$product["curr_price"];
$prev_price =$product["prev_price"];
$image = $product["image"];
$tag = $product["tag"];
$stock_status = $product["stock_status"];
$description = $product["description"];
$multi_img = $product["multi_img"];
if(isset($_POST['add-to-cart'])){
	$qty = $_POST['qty'];
	if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"]))
	{
		$cart_arr = unserialize($_COOKIE["CartProduct"]);
	}
	else
	{
		$cart_arr=array();
	}
	$cart_arr[]=array("id"=>$id,"image"=>$image,"productname"=>$productname,"qty"=>$qty,"cur_price"=>$cur_price);
	$cart_arr['sub_total'] = $cart_arr['sub_total'] ? $cart_arr['sub_total'] : 0;
	$total = $qty * $cur_price;
	$sub_total = $cart_arr['sub_total'] + $total;
	$cart_arr['sub_total'] = $sub_total ;
setcookie("CartProduct",serialize($cart_arr),time() + (43200), "/"); // 86400 = 1 day
echo "<script> alert('Product Has Inserted Into Cart') </script>";
echo "<script>window.location='shopping-cart.php'</script>";
}
include 'header.php';
?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div>
	</div>
</div>
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
					</div>		
					<!-- ============================================== HOT DEALS ============================================== -->
					<?php include 'hot-deals.php'; ?>
					<!-- ============================================== HOT DEALS: END ============================================== -->	
				</div>
			</div>
			<div class='col-md-9'>
				<div class="detail-block">
					<div class="row  wow fadeInUp">
						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">
								<div id="owl-single-product">
									<?php
									$mul_img=explode(",",$multi_img);
									for($i=0;$i<sizeof($mul_img);$i++)
									{
										?> 
										<div class="single-product-gallery-item" id="slide<?php echo $i?>">
											<a data-lightbox="image-<?php echo $i?>" data-title="Gallery" href="../Master/multi-img/<?php echo $mul_img[$i] ?>">
												<img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="../Master/multi-img/<?php echo $mul_img[$i] ?>" />
											</a>
										</div>
									<?php } ?>
								</div>
								<div class="single-product-gallery-thumbs gallery-thumbs">
									<div id="owl-single-product-thumbnails">
										<?php
										$mul_img=explode(",",$multi_img);
										for($i=0;$i<sizeof($mul_img);$i++)
										{
											?> 
											<div class="item">
												<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $i?>" href="#slide<?php echo $i?>">
													<img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="../Master/multi-img/<?php echo $mul_img[$i] ?>" />
												</a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $productname; ?></h1>
								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											<div class="rating rateit-small"></div>
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">(13 Reviews)</a>
											</div>
										</div>
									</div>		
								</div>
								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-2">
											<div class="stock-box">
												<span class="label">Availability :</span>
											</div>	
										</div>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value"><?php echo $stock_status; ?></span>
											</div>	
										</div>
									</div>
								</div>
								<div class="description-container m-t-20">
									<?php echo $description; ?>
								</div>
								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-6">
											<div class="price-box">
												<span class="price">$<?php echo $cur_price; ?>.00</span>
												<span class="price-strike">$<?php echo $prev_price; ?>.00</span>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
													<i class="fa fa-heart"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
													<i class="fa fa-signal"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
													<i class="fa fa-envelope"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
								<form method="POST" >
									<div class="quantity-container info-container">
										<div class="row">
											<div class="col-sm-2">
												<span class="label">Qty :</span>
											</div>
											<div class="col-sm-2">
												<div class="cart-quantity">
													<div class="quant-input">
														<div class="arrows">
														</div>
														<input type="number" value="1" min="1" name="qty">
													</div>
												</div>
											</div>
											<div class="col-sm-7">
												<button type="submit" class="btn btn-primary" name="add-to-cart"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul>
						</div>
						<div class="col-sm-9">
							<div class="tab-content">
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $description; ?></p>
									</div>	
								</div>
								<div id="review" class="tab-pane">
									<div class="product-tab">
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
												</div>
											</div>
										</div>
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="review-form">
													<div class="form-container">
														<form role="form" class="cnt-form">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																	</div>
																	<div class="form-group">
																		<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																		<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputReview">Review <span class="astk">*</span></label>
																		<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																	</div>
																</div>
															</div>
															<div class="action text-right">
																<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
															</div>
														</form>
													</div>
												</div>
											</div>									
										</div>
									</div>
									<div id="tags" class="tab-pane">
										<div class="product-tag">
											<h4 class="title">Product Tags</h4>
											<form role="form" class="form-inline form-cnt">
												<div class="form-container">
													<div class="form-group">
														<label for="exampleInputTag">Add Your Tags: </label>
														<input type="email" id="exampleInputTag" class="form-control txt">
													</div>
													<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
												</div>
											</form>
											<form role="form" class="form-inline form-cnt">
												<div class="form-group">
													<label>&nbsp;</label>
													<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					if(isset($_POST['add_wishlist'])){
						if(!isset($_SESSION['login'])){
							echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";
							echo "<script>window.open('login.php','_self')</script>";
						}
					}else{
						if(isset($_SESSION['login']) && isset($_GET['wishlist'])){
							$user_session = $_SESSION['login'];
							$pro_id = $_GET['wishlist'];
							$get_user = "select * from users where email = '".$user_session."' OR phone = '".$user_session."'";
							$run_user = mysqli_query($conn,$get_user);
							$row_user = mysqli_fetch_array($run_user);
							$user_id = $row_user['id'];
							$select_wishlist = "select * from  tbl_wishlist where user_id='$user_id' AND product_id='$pro_id'";
							$run_wishlist = mysqli_query($conn,$select_wishlist);
							$check_wishlist = mysqli_num_rows($run_wishlist);
							if($check_wishlist == 1){
								echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";
								echo "<script>window.open('home.php','_self')</script>";
							}
							else{
								$insert_wishlist = "insert into tbl_wishlist (user_id,product_id) values ('$user_id','$pro_id')";
								$run_wishlist = mysqli_query($conn,$insert_wishlist);
								if($run_wishlist){
									echo "<script> alert('Product Has Inserted Into Wishlist') </script>";
									echo "<script>window.open('home.php','_self')</script>";
								}
							}
						}
					}
					?>
					<!-- ============================================== UPSELL PRODUCTS ============================================== -->
					<section class="section featured-product wow fadeInUp">
						<h3 class="section-title">upsell products</h3>
						<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
							<?php 
							$UPSELLsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT 10";
							$UPSELLresults = mysqli_query($conn,$UPSELLsql) or die("SQL Query Failed.");
							while($UPSELLrows = mysqli_fetch_assoc($UPSELLresults)){
								$UPSELLid = $UPSELLrows["id"];
								$UPSELLproduct_name =$UPSELLrows["name"];
								$UPSELLcur_price =$UPSELLrows["curr_price"];
								$UPSELLprev_price =$UPSELLrows["prev_price"];
								$UPSELLimage = $UPSELLrows["image"];
								$UPSELLtag = $UPSELLrows["tag"];
								?>
								<div class="item item-carousel">
									<div class="products">
										<div class="product">		
											<div class="product-image">
												<div class="image">
													<a href="detail.php?id=<?php echo $UPSELLid; ?>"><img  src="../Master/img/<?php echo $UPSELLimage; ?>" style="height: 150px;" alt=""></a>
												</div>		
												<div class="tag <?php echo $UPSELLtag ?>"><span><?php echo $UPSELLtag ?></span></div>		   
											</div>
											<div class="product-info text-left">
												<h3 class="name"><a href="detail.php?id=<?php echo $UPSELLid; ?>"><?php echo $UPSELLproduct_name ?></a></h3>
												<div class="rating rateit-small"></div>
												<div class="description"></div>

												<div class="product-price">	
													<span class="price">$ <?php echo $UPSELLcur_price ?></span>
													<span class="price-before-discount">$ <?php echo $UPSELLprev_price ?></span>
												</div>
											</div>
											<div class="cart clearfix animate-effect">
												<div class="action">
													<ul class="list-unstyled">
														<li class="add-cart-button btn-group">
															<button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i>	
															</button>
															<button class="btn btn-primary cart-btn" type="button"><a href="shopping-cart.php">Add to cart</a></button>
														</li>
														<li class="lnk wishlist"> <a class="add-to-cart" name="add_wishlist" href="detail.php?wishlist=<?php echo $id; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
														<li class="lnk">
															<a class="add-to-cart" href="detail.php?id=<?php echo $UPSELLid; ?>" title="Compare">
																<i class="fa fa-signal"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</section>
					<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<?php require 'brand.php'; ?>
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 	
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
<?php require 'footer.php'; ?>
