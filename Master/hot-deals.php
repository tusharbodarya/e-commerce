<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">hot deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
		<?php 
		$i = 0;
		$sql = "SELECT * FROM offer  WHERE is_deleted='0'";
		$results = mysqli_query($conn,$sql) or die("SQL Query Failed.");
		while($rows = mysqli_fetch_assoc($results)){
			$offproductname =$rows["name"];
			$off = $rows["offer"];
			$offcur_price =$rows["curr_price"];
			$offimage = $rows["image"];
			$offprev_price=$rows["prev_price"];
			$date = $rows["date"];
			?>
			<div class="item">
				<div class="products">
					<div class="hot-deal-wrapper">
						<div class="image"> <img src="../Master/img/<?php echo $offimage ?>" style="height: 150px;" alt=""> </div>
						<div class="sale-offer-tag"><span><?php echo $off ?>%<br>
						off</span></div>
						<div class="timing-wrapper">
							<div class="box-wrapper">
								<div class="date box"> <span class="key day"></span> <span class="value">DAYS</span> </div>
							</div>
							<div class="box-wrapper">
								<div class="hour box"> <span class="key hours"></span> <span class="value">HRS</span> </div>
							</div>
							<div class="box-wrapper">
								<div class="minutes box"> <span class="key min" ></span> <span class="value">MINS</span> </div>
							</div>
							<div class="box-wrapper hidden-md">
								<div class="seconds box"> <span class="key sec"></span> <span class="value">SEC</span> </div>
							</div>
						</div>
					</div>
					<div class="product-info text-left m-t-20">
						<h3 class="name"><a href="detail.php?id=<?php echo $id; ?>"><?php echo $offproductname ?></a></h3>
						<div class="rating rateit-small"></div>
						<div class="product-price"> <span class="price"> $<?php echo $offcur_price ?></span> <span class="price-before-discount">$<?php echo $offprev_price ?></span> 
						</div>
					</div>
			<script>
				var countDownDate = new Date("<?php echo $date ?>").getTime();
				var x = setInterval(function() {
					var now = new Date().getTime();
					var distance = countDownDate - now;
					var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((distance % (1000 * 60)) / 1000);
					document.getElementsByClassName('day')[<?php echo $i ;?>].innerHTML = days;
					document.getElementsByClassName('hours')[<?php echo $i ;?>].innerHTML = hours;
					document.getElementsByClassName('min')[<?php echo $i ;?>].innerHTML = minutes;
					document.getElementsByClassName('sec')[<?php echo $i ;?>].innerHTML = seconds;
					if (distance < 0) {
						clearInterval(x);
					}
				}, 1000);
			</script>
					<div class="cart clearfix animate-effect">
						<div class="action">
							<div class="add-cart-button btn-group">
								<button class="btn btn-primary icon" data-toggle="dropdown" type="button" style="padding-top: 10px;padding-bottom: 10px;"> <i class="fa fa-shopping-cart"></i> </button>
								<button class="btn btn-primary cart-btn" type="button"><a href="shopping-cart.php">Add to cart</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$i++;
		} ?>
	</div>
</div>

