<?php
session_start();
include 'dbconnect.php';
if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"]))
{
  $arr = unserialize($_COOKIE["CartProduct"]);
}
else
{
  $arr=array();
}
$sql = "SELECT * FROM orginzation  WHERE id='1'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$row = mysqli_fetch_assoc($result);
$logo = $row["logo"];
$onamename = $row["orginzationname"];
$icon = $row["icon"];
?>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">
  <title><?php echo $onamename ?></title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="icon" href="../Master/img/logo/<?php echo $icon ?>"  type="image/x-icon">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/blue.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/rateit.css">
  <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
  <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <style type="text/css">
    .socialicon {
      padding: 0px;
      font-size: 24px;
      width: 35px;
      text-align: center;
      text-decoration: none;
      margin: 0px 0px;
    }

    .socialicon:hover {
      opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }
    .fa-google {
      background: #dd4b39;
      color: white;
    }
    .fa-youtube {
      background: #bb0000;
      color: white;
    }

    .fa-instagram {
      background: #125688;
      color: white;
    }

    .fa-pinterest {
      background: #cb2027;
      color: white;
    }
  </style>
</head>
<body class="cnt-home">
  <header class="header-style-1"> 
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
              <li><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
              <li><a href="product-comparison.php"><i class="icon fa fa-signal"></i>Compare</a></li>
              <li><a href="shopping-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
              <li><a href="checkout.php"><i class="icon fa fa-check"></i>Checkout</a></li>
              <?php 
              if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
              {
                ?>
              <li><a href="login.php"><i class="icon fa fa-lock"></i>Login</a></li>
              <?php
            }else{
              ?>
              <li><a href="logout.php"><i class="icon fa fa-lock"></i>Logout</a></li>
              <?php
            }
            ?>
            </ul>
          </div>
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">English</a></li>
                  <li><a href="#">French</a></li>
                  <li><a href="#">German</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="home.php"> <img src="../Master/img/logo/<?php echo $logo ?>" alt="logo"> </a> </div>
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
            <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
              <!-- ============================================================= SEARCH AREA ============================================================= -->
              <div class="search-area">
                <form>
                  <div class="control-group">
                    <ul class="categories-filter animate-dropdown">
                      <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.php">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" >
                         <?php
                         $catresult = mysqli_query($conn,"select * from category WHERE is_deleted='0'");
                         while($catrow = mysqli_fetch_array($catresult)) {
                          ?>
                          <li role="presentation"><a role="menuitem" value="<?php echo $catrow['id']; ?>" href="<?php echo $catrow['name'];?>.php">- <?php echo $catrow['name'];?></a></li>
                          <?php
                        }
                        ?>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="category.php?catname=<?php echo $catrow['name'];?>.php" ></a> </div>
                </form>
              </div>
              <!-- ============================================================= SEARCH AREA : END ============================================================= --> 
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
              <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

              <div id="cart-list3">
                <div class="dropdown dropdown-cart" > <a href="checkout.php" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                  <div class="items-cart-inner">
                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                    <div class="basket-item-count"><span class="count"><?php echo $arr ? sizeof($arr)-1 : 0; ?></span></div>
                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="value"><?php  echo $arr ? $arr['sub_total'] : 0; ?></span> </span> </div>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <?php
                  foreach ($arr as $key => $num) {
                    if($key != 'sub_total'){
                      ?>
                      <li>
                        <div class="cart-item product-summary">
                          <div class="row">
                            <div class="col-xs-4">
                              <div class="image"> <a href="detail.php"><img src="../Master/img/<?php echo $num['image']; ?>" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                              <h3 class="name"><a href="index8a95.php?page-detail"><?php echo $num['productname']; ?></a></h3>
                              <div class="price"><?php echo $num['cur_price']; ?></div>
                            </div>
                            <div class="col-xs-1 action"> <a onclick="delete_product('<?php echo $key; ?>')"><i class="fa fa-trash"></i></a> </div>
                          </div>
                        </div>
                        <?php
                      }
                    } ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="clearfix cart-total">
                      <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'><?php echo $arr ?  $arr['sub_total'] : 0; ?></span> </div>
                      <div class="clearfix"></div>
                      <a href="checkout.php" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
            </div>
          </div>
        </div>
        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
          <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
              <div class="navbar-header">
               <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                 <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
               </div>
               <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                  <div class="nav-outer">
                    <ul class="nav navbar-nav">
                      <li class="dropdown yamm-fw"> <a href="home.php" >Home</a> </li>
                      <?php
                      $result = mysqli_query($conn,"select * from category WHERE is_deleted='0'");
                      while($row = mysqli_fetch_array($result)) {
                        ?>
                        <li class="dropdown yamm mega-menu"> <a href="category.php?catid=<?php echo $row['id'];?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['name'];?></a>

                          <ul class="dropdown-menu container">
                            <li>
                              <div class="yamm-content ">
                                <div class="row">
                                 <?php
                                 $category_id = $row['id'];
                                 $subresult = mysqli_query($conn,"select * from sub_category WHERE is_deleted='0' AND category_id = '".$category_id."'");
                                 while($subrow = mysqli_fetch_array($subresult)) {
                                  ?>
                                  <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                    <h2 class="title"><a href="category.php?subcatid=<?php echo $subrow['id'];?>"><?php echo $subrow['name'];?></a></h2>

                                    <ul class="links">
                                      <?php
                                      $subcategory_id = $subrow['id'];
                                      $childresult = mysqli_query($conn,"select * from child_category WHERE is_deleted='0' AND sub_category_id = '".$subcategory_id."'");
                                      while($childrow = mysqli_fetch_array($childresult)) {
                                        ?>
                                        <li><a href="category.php?childcatid=<?php echo $childrow['id'];?>"><?php echo $childrow['name'];?></a></li>
                                        <?php
                                      }
                                      ?>
                                    </ul>
                                  </div>
                                  <?php
                                }
                                ?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <?php
                    }
                    ?>
                  </ul>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================== NAVBAR : END ============================================== --> 
     
    </header>