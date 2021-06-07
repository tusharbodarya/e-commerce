<?php require 'header.php'?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>Track your orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="track-order-page">
			<div class="row">
				<div class="col-md-12">
	<h2 class="heading-title">Track your Order</h2>
	<span class="title-tag inner-top-ss">Please enter your Order ID in the box below and press Enter. This was given to you on your receipt and in the confirmation email you should have received. </span>
	<form class="register-form outer-top-xs" role="form">
		<div class="form-group">
		    <label class="info-title" for="exampleOrderId1">Order ID</label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleOrderId1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleBillingEmail1">Billing Email</label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleBillingEmail1" >
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Track</button>
	</form>	
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <?php require 'brand.php'?>
     <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<?php require 'footer.php'?>
