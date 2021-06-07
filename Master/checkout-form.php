	<?php
	$conn1 = mysqli_connect("localhost","root","","city") or die("Connection Failed");
	?>
	<div class="main">
		<div class="container">
			<div class="col-md-6 col-sm-6 create-new-account">
				<form method="POST" action="payment.php" class="register-form" id="register-form">
					<h2>Delivery Address</h2>
					<div class="form-group">
						<label for="name">Name :</label>
						<input type="text" name="name" placeholder="Enter Your Name" class="form-control unicase-form-control text-input"  id="name" required/>
					</div>
					<div class="form-group">
						<label for="address">Address :</label>
						<input type="text" name="address" placeholder="Enter Your Address" class="form-control unicase-form-control text-input"  id="address" required/>
					</div>
					<div class="form-row">
						<div class="form-group">
							<label for="state">State :</label>
							<div class="form-select form-select-lg mb-3">
								<select name="state" class="form-control unicase-form-control text-input"  id="state">
									<option value="">Select State</option>
									<?php
									$result = mysqli_query($conn1,"select * from state_list");
									while($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row['state'];?>"><?php echo $row['state'];?></option>
										<?php
									}
									?>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
						<div class="form-group">
							<label for="city">City :</label>
							<div class="form-select">
								<select name="city" class="form-control unicase-form-control text-input"  id="city">
									<option value="">Select City</option>
								</select>
								<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="pincode">Pincode :</label>
						<input type="text" name="pincode" placeholder="Pincode"  class="form-control unicase-form-control text-input" id="pincode">
					</div>
					<div class="form-group">
						<label for="email">Email ID :</label>
						<input type="email" name="email" placeholder="Email ID" class="form-control unicase-form-control text-input"  id="email" />
					</div>
					<div class="form-group">
						<label for="phone">Phone No :</label>
						<input type="tel" name="phone" class="form-control unicase-form-control text-input"  placeholder="888 888 8888" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="12" required/>   
						<label style="font-size:10px;margin: 3px;"> Eg : 081 222 2224  </label> 
					</div>
					<div class="form-group">
						<input type="radio" value="1" id="ONLINE" name="payment" onchange="selectpayment(this.value)" checked>
						<label for="ONLINE">ONLINE</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" value="0" id="COD" name="payment" onchange="selectpayment(this.value)"> 
						<label for="COD">COD</label>
					</div>
					<div class="form-submit">
						<input type="button" value="Reset All" class="btn btn-danger" name="reset" id="reset" />
						<input type="submit" value="Confirm" class="btn btn-primary" name="submit" id="submit" />
					</div>
				</form>
			</div>
		</div>

	</div>
	<script>
		(function($) {

			$('#reset').on('click', function(){
				$('#register-form').reset();
			});

		});
		$(document).ready(function() {

			$('#state').on('change', function() {
				var state = this.value;
// console.log(state);
$.ajax({
	url: "fetch-city.php",
	type: "POST",
	data: {
		state: state
	},
	cache: false,
	success: function(result){
  // console.log(result);
  $("#city").html(result);
}
});
});
		});
		function selectpayment(p_type){
			if(p_type==0){
				$('#register-form').attr('action', 'orderoffline.php');
			}else if(p_type==1){
				$('#register-form').attr('action', 'payment.php');
			}else{
				$('#register-form').attr('action', 'payment.php');
			}
		}
	</script>
