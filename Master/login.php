<?php  include 'dbconnect.php'; ?>
<?php
if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
  $login = false;
  $showerror = false;
  $log = $_POST["login"];
  $password = $_POST["password"];
  $sql="SELECT * FROM customer WHERE email = '".$log."' OR phone = '".$log."'";
   $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
   $num = mysqli_num_rows($result);
   if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                 $login = true;
                   session_start();
                   $_SESSION['loggedin'] = true;
                   $_SESSION['login'] = $log;
                   header('location:home.php');
            }else{
        $showerror = "incorrect email or password";
    }
    }
    }else{
        $showerror = "incorrect email or password";
    }
 }else{
    $login = "";
    $showerror = "";
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/scss/style.css" rel="stylesheet">
    <link href="assetslg/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        html,body{
            height: 100%;
        }
    </style>
</head>
<body class="bg-light">
 <?php 
    if($login){
  echo '<div class="alert alert-success alert-dismissible margin-b-0" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Success !</strong> you are loggedin.</div>'; 
}
  if($showerror){
  echo '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 
          <strong>Error !</strong> '.$showerror.'</div>'; 
}
?>
    <div class="misc-wrapper">
        <div class="misc-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                      <div class="misc-header text-center">
                        <img alt="" src="assets/img/icon.png" class="logo-icon margin-r-10">
                        <img alt="" src="assets/img/logo-dark.png" class="toggle-none hidden-xs">
                    </div>
                    <div class="misc-box">   
                        <form method="POST">
                            <div class="form-group">                                      
                                <label  for="exampleuser1">Phone or Email</label>
                                <div class="group-icon">
                                    <input id="login" type="text" name="login" placeholder="Phone or Email" class="form-control" required="">
                                    <span class="icon-user text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <div class="group-icon">
                                    <input id="exampleInputPassword1" type="password" name="password" placeholder="Password" class="form-control">
                                    <span class="icon-lock text-muted icon-input"></span>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="float-left">
                                 <div class="checkbox checkbox-primary margin-r-5">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2"> Remember Me </label>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" name="submit" class="btn btn-block btn-primary btn-rounded box-shadow">Login</button>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Need to Signup?</p>
                        <a href="sign-in.php" class="btn btn-block btn-success btn-rounded box-shadow">Register Now</a>
                    </form>
                </div>
                <div class="text-center misc-footer">
                 <p>Copyright &copy; 2018 FixedPlus</p>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
<script src="assets/lib/jquery/dist/jquery.min.js"></script>
<script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/lib/pace/pace.min.js"></script>
<script src="assets/lib/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
<script src="assets/lib/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/lib/nano-scroll/jquery.nanoscroller.min.js"></script>
<script src="assets/lib/metisMenu/metisMenu.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
