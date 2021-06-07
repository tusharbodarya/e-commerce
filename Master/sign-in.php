<?php include 'dbconnect.php';?>
<?php
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
    $showalert = false;
    $showerror = false;
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $existsql = "SELECT * FROM customer WHERE email='".$email."'";
    $result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
    $existnumrows = mysqli_num_rows($result);
    if($existnumrows > 0){
        $showerror = "customer already Exist.";
  }elseif (!isset($fullname) || !isset($email) || !isset($password) || empty($email) || empty($phone) ||  empty($fullname) ||  !isset($phone) || empty($password)){
        $showerror = "Please Enter Details";
  }else{
       if(($password == $confirm_password)){
            $has = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `customer` ( `name`,`phone`,`email`, `password`) VALUES ('$fullname','$phone','$email', '$has')";
            $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
            if($result){
                $showalert = true;
          }
    }else{
      $showerror = "Please Enter Correct Details";
}
}
}else{
    $showerror = "";
    $showalert = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign In</title>

	<!-- Common Plugins -->
	<link href="assetslg/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- Custom Css-->
	<link href="assetslg/scss/style.css" rel="stylesheet">
	<style type="text/css">
		html,body{
			height: 100%;
		}
	</style>
</head>
<body class="bg-light">
	 

	<div class="misc-wrapper">
		<div class="misc-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4">
						<div class="misc-header text-center">
							<img alt="" src="assetslg/img/icon.png" class="logo-icon margin-r-10">
							<img alt="" src="assetslg/img/logo-dark.png" class="toggle-none hidden-xs">
						</div>
						<div class="misc-box">   
							<p class="text-center"><?php 
      if($showalert){
          echo '<div class="alert alert-success alert-dismissible margin-b-0" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Success !</strong> Your Account is Created now and you can Login.</div>'; 
    }
    if($showerror){
          echo '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
          <strong>Error !</strong> '.$showerror.'</div>'; 
    }
    ?></p>
							<form  method="POST">

								<div class="form-group">
									<label for="fullname">Full Name</label>
									<div class="group-icon">
										<input  type="text" placeholder="Enter Full Name" id="fullname" name="fullname" class="form-control" >
										<span class=" icon-user text-muted icon-input"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email Id</label>
									<div class="group-icon">
										<input  type="text" placeholder="Enter Email" id="email" name="email" class="form-control" >
										<span class="icon-envelope text-muted icon-input"></span>
									</div>
								</div>
								<div class="form-group">
									<label for="phone">Phone</label>
									<div class="group-icon">
										<input  type="text" placeholder="Enter Phone" id="phone" name="phone" class="form-control" >
										<span class="icon-call-in text-muted icon-input"></span>
									</div>
								</div>
								<div class="form-group group-icon">
									<label for="password">Password</label>
									<div class="group-icon">
										<input id="password" name="password" type="password" placeholder="Password" class="form-control">
										<span class="icon-lock text-muted icon-input"></span>
									</div>
								</div>
								<div class="form-group group-icon">
									<label for="confirm_password1">Confirm password</label>
									<div class="group-icon">
										<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control">
										<span class="icon-lock text-muted icon-input"></span>
									</div>
								</div>
								<div class="clearfix">
									<div class="float-left">
										<div class="checkbox checkbox-primary margin-r-5">
											<input id="checkbox2" type="checkbox" checked="">
											<label for="checkbox2"> I Agree with Terms <a href="#">Terms</a> </label>
										</div> 
									</div>
								</div>
								<button type="submit" value="submit" name="submit" class="btn btn-block btn-primary btn-rounded box-shadow mt-10">Register Now</button>
								<hr>

								<p class=" text-center">Have an account?</p>
								<a href="login.php" class="btn btn-block btn-success btn-rounded box-shadow">Login</a>
							</form>
						</div>
						<div class="text-center">
							<p>Copyright &copy; 2021 Tushar Bodarya</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Common Plugins -->
	<script src="assetslg/lib/jquery/dist/jquery.min.js"></script>
	<script src="assetslg/lib/bootstrap/js/popper.min.js"></script>
	<script src="assetslg/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="assetslg/lib/pace/pace.min.js"></script>
	<script src="assetslg/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
	<script src="assetslg/lib/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assetslg/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
	<script src="assetslg/lib/metisMenu/metisMenu.min.js"></script>
	<script src="assetslg/js/custom.js"></script>
	</html>

