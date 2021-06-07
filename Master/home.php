<?php
include 'dbconnect.php';
if(isset($_GET['id'])){
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
 $qty = 1;
 if(isset($_COOKIE["CartProduct"]) && !empty($_COOKIE["CartProduct"])){
  $cart_arr = unserialize($_COOKIE["CartProduct"]);
}else{
  $cart_arr=array();
}
$cart_arr[]=array("id"=>$id,"image"=>$image,"productname"=>$productname,"qty"=>$qty,"cur_price"=>$cur_price);
$cart_arr['sub_total'] = $cart_arr['sub_total'] ? $cart_arr['sub_total'] : 0;
$total = $qty * $cur_price;
$sub_total = $cart_arr['sub_total'] + $total;
$cart_arr['sub_total'] = $sub_total ;
setcookie("CartProduct",serialize($cart_arr),time() + (43200), "/"); // 86400 = 1 day
echo "<script> alert('Product Has Inserted Into Cart') </script>";
echo "<script>window.location='home.php'</script>";
}
$bannersql = "SELECT * FROM banners  WHERE id='1'";
$bannerresult = mysqli_query($conn,$bannersql) or die("SQL Query Failed.");
$bannerrow = mysqli_fetch_assoc($bannerresult);
$banner1 = $bannerrow["banner_1"];
$banner2 = $bannerrow["banner_2"];
$banner3 = $bannerrow["banner_3"];
$bannername = $bannerrow["name"];
$banneroffer = $bannerrow["offer"];
$bannertag = $bannerrow["tag"];


?>
<?php require 'header.php'; ?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        <?php require 'topnavigation.php'; ?>
        <!-- ================================== TOP NAVIGATION : END  ================================== -->
        <!-- ============================================== HOT DEALS ============================================== -->
        <?php include 'hot-deals.php'; ?>
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <?php 
              $SPECIALsql = "SELECT * FROM offer  WHERE is_deleted='0'";
              $SPECIALresults = mysqli_query($conn,$SPECIALsql) or die("SQL Query Failed.");
              while($SPECIALrows = mysqli_fetch_assoc($SPECIALresults)){
                $SPECIALproduct_id = $SPECIALrows["product_id"];
                $SPECIALproductname =$SPECIALrows["name"];
                $SPECIALoff = $SPECIALrows["offer"];
                $SPECIALcur_price =$SPECIALrows["curr_price"];
                $SPECIALimage = $SPECIALrows["image"];
                $SPECIALprev_price=$SPECIALrows["prev_price"];
                ?>
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image">
                               <a href="detail.php?id=<?php echo $SPECIALproduct_id; ?>"> <img src="../Master/img/<?php echo $SPECIALimage ?>" style="height: 65px;" alt=""> </a> </div>
                             </div> 
                           </div>
                           <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="detail.php?id=<?php echo $SPECIALproduct_id; ?>"><?php echo $SPECIALproductname ?></a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price">$<?php echo $SPECIALcur_price ?> </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->
    <!--   <div class="sidebar-widget product-tag wow fadeInUp">
        <h3 class="section-title">Product tags</h3>
        <div class="sidebar-widget-body outer-top-xs">
          <div class="tag-list">
           <a class="item" title="Phone" href="category.php">Phone</a>
           <a class="item active" title="Vest" href="category.php">Vest</a> 
           <a class="item" title="Smartphone" href="category.php">Smartphone</a> 
           <a class="item" title="Furniture" href="category.php">Furniture</a> 
           <a class="item" title="T-shirt" href="category.php">T-shirt</a> 
           <a class="item" title="Sweatpants" href="category.php">Sweatpants</a> 
           <a class="item" title="Sneaker" href="category.php">Sneaker</a>
           <a class="item" title="Toys" href="category.php">Toys</a>
           <a class="item" title="Rose" href="category.php">Rose</a> 
         </div>
       </div>
     </div> -->
     <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
     <!-- ============================================== SPECIALDEALS ============================================== -->
     <div class="sidebar-widget outer-bottom-small wow fadeInUp">
      <h3 class="section-title">Special Deals</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
         <?php 
         $SPECIALDEALSsql = "SELECT * FROM offer  WHERE is_deleted='0'";
         $SPECIALDEALSresults = mysqli_query($conn,$SPECIALDEALSsql) or die("SQL Query Failed.");
         while($SPECIALDEALSrows = mysqli_fetch_assoc($SPECIALDEALSresults)){
           $SPECIALDEALproduct_id = $SPECIALDEALSrows["product_id"];
           $SPECIALDEALSproductname =$SPECIALDEALSrows["name"];
           $SPECIALDEALSoff = $SPECIALDEALSrows["offer"];
           $SPECIALDEALScur_price =$SPECIALDEALSrows["curr_price"];
           $SPECIALDEALSimage = $SPECIALDEALSrows["image"];
           $SPECIALDEALSprev_price=$SPECIALDEALSrows["prev_price"];
           ?>
           <div class="item">
            <div class="products special-product">
              <div class="product">
                <div class="product-micro">
                  <div class="row product-micro-row">
                    <div class="col col-xs-5">
                      <div class="product-image">
                        <div class="image"> <a href="detail.php?id=<?php echo $SPECIALDEALproduct_id; ?>"> <img src="../Master/img/<?php echo $SPECIALDEALSimage ?>" style="height: 65px;" alt=""> </a> </div>
                      </div>
                    </div>
                    <div class="col col-xs-7">
                      <div class="product-info">
                        <h3 class="name">
                          <a href="detail.php?id=<?php echo $SPECIALDEALproduct_id; ?>"><?php echo $SPECIALDEALSproductname ?></a>
                        </h3>
                        <div class="rating rateit-small">
                        </div>
                        <div class="product-price"> 
                          <span class="price"> $<?php echo $SPECIALDEALScur_price ?> </span> 
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div> 
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
</div>
<!-- ============================================== SIDEBAR : END ============================================== --> 
<!-- ============================================== CONTENT ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
  <!-- ========================================== SECTION – HERO ========================================= -->
  <div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
      <?php 
      $carouselsql = "SELECT * FROM carousel  WHERE is_active='0'";
      $carouselresults = mysqli_query($conn,$carouselsql) or die("SQL Query Failed.");
      while($carouselrows = mysqli_fetch_array($carouselresults)){
        $carouselproduct_id =$carouselrows["product_id"];
        $carouseltagname =$carouselrows["tagname"];
        $carouselcarouselname =$carouselrows["name"];
        $carouseldescription = $carouselrows["description"];
        $carouselimage = $carouselrows["images"];
        ?>
        <div class="item" style="background-image: url('../Master/img/carousel/<?php echo $carouselimage; ?>');">
          <div class="container-fluid">
            <div class="caption bg-color vertical-center text-left">
              <div class="slider-header fadeInDown-1"><?php echo $carouseltagname ?></div>
              <div class="big-text fadeInDown-1"> <?php echo $carouselcarouselname ?> </div>
              <div class="excerpt fadeInDown-2 hidden-xs"> <span><?php echo $carouseldescription ?></span> </div>
              <div class="button-holder fadeInDown-3"> <a href="home.php?id=<?php echo $carouselproduct_id; ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- ========================================= SECTION – HERO : END ========================================= --> 
  <!-- ============================================== INFO BOXES ============================================== -->
  <div class="info-boxes wow fadeInUp">
    <div class="info-boxes-inner">
      <div class="row">
        <div class="col-md-6 col-sm-4 col-lg-4">
          <div class="info-box">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="info-box-heading green">money back</h4>
              </div>
            </div>
            <h6 class="text">30 Days Money Back Guarantee</h6>
          </div>
        </div>
        <div class="hidden-md col-sm-4 col-lg-4">
          <div class="info-box">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="info-box-heading green">free shipping</h4>
              </div>
            </div>
            <h6 class="text">Shipping on orders over $99</h6>
          </div>
        </div>
        <div class="col-md-6 col-sm-4 col-lg-4">
          <div class="info-box">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="info-box-heading green">Special Sale</h4>
              </div>
            </div>
            <h6 class="text">Extra $5 off on all items </h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================== INFO BOXES : END ============================================== --> 
  <!-- whishlist -->
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
<!-- End Wishlist -->
<!-- compare -->
<?php
if(isset($_POST['add_compare'])){
  if(!isset($_SESSION['login'])){
    echo "<script>alert('You Must Login To Add Product In compare')</script>";
    echo "<script>window.open('login.php','_self')</script>";
  }
}else{
 if(isset($_SESSION['login']) && isset($_GET['compare'])){
  $user_session = $_SESSION['login'];
  $pro_id = $_GET['compare'];
  $get_user = "select * from users where email = '".$user_session."' OR phone = '".$user_session."'";
  $run_user = mysqli_query($conn,$get_user);
  $row_user = mysqli_fetch_array($run_user);
  $user_id = $row_user['id'];
  $select_compare = "select * from  tbl_product_comparison where user_id='$user_id' AND product_id='$pro_id'";
  $run_compare = mysqli_query($conn,$select_compare);
  $check_compare = mysqli_num_rows($run_compare);
  if($check_compare == 1){
    echo "<script>alert('This Product Has Been already Added In compare')</script>";
    echo "<script>window.open('home.php','_self')</script>";
  }
  else{
    $insert_compare = "insert into tbl_product_comparison (user_id,product_id) values ('$user_id','$pro_id')";
    $run_compare = mysqli_query($conn,$insert_compare);
    if($run_compare){
      echo "<script> alert('Product Has Inserted Into compare') </script>";
      echo "<script>window.open('home.php','_self')</script>";
    }
  }
}
}
?>
<!-- End compare -->
<!-- ============================================== SCROLL TABS ============================================== -->
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
  <div class="more-info-tab clearfix ">
    <h3 class="new-product-title pull-left">New Products</h3>
    <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
     <?php
     $i = 0;
     $catresult = mysqli_query($conn,"select * from category WHERE is_deleted='0' ");
     while($catrow = mysqli_fetch_array($catresult)) {
      ?>
      <li class=" <?php if($i==0){ echo 'active'; }  ?>"><a data-transition-type="backSlide" href="#category-<?php echo $catrow['id'];?>" data-toggle="tab"><?php echo $catrow['name'];?></a></li>
      <?php
      $i++;
    }
    ?>
  </ul>
</div>
<div class="tab-content outer-top-xs">
  <?php
  $i = 0;
  $catresult = mysqli_query($conn,"select * from category WHERE is_deleted='0' ");
  while($catrow = mysqli_fetch_array($catresult)) {
    ?>
    <div class="tab-pane <?php if($i==0){ echo 'in active'; }  ?>" id="category-<?php echo $catrow['id'];?>">
      <div class="product-slider">
        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
         <?php 
         $sql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND category_id='".$catrow['id']."' ORDER BY RAND() LIMIT 10";
         $results = mysqli_query($conn,$sql) or die("SQL Query Failed.");
         while($rows = mysqli_fetch_array($results)){
          $id = $rows["id"];
          $productname =$rows["name"];
          $cur_price =$rows["curr_price"];
          $prev_price =$rows["prev_price"];
          $image = $rows["image"];
          $tag = $rows["tag"];
          ?>
          <div class="item item-carousel">
            <div class="products">
              <div class="product">
                <div class="product-image">
                  <div class="image"> <a href="detail.php?id=<?php echo $id; ?>"><img  src="../Master/img/<?php echo $image; ?>" style="height: 125px;" alt=""></a> 
                  </div>
                  <div class="tag <?php echo $tag; ?>"><span><?php echo $tag; ?></span></div>
                </div>
                <div class="product-info text-left">
                  <h3 class="name"><a href="detail.php?id=<?php echo $id; ?>"><?php echo $productname; ?></a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> <span class="price"> <?php echo $cur_price; ?> </span> <span class="price-before-discount"><?php echo $prev_price; ?></span>
                  </div>
                </div>
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <ul class="list-unstyled">
                      <li class="add-cart-button btn-group">
                        <button data-toggle="tooltip" class="btn btn-primary icon" type="button" name="add-to-cart" title="Add Cart" style="padding-top: 10px;padding-bottom: 10px;"><a href="home.php?id=<?php echo $id; ?>"><i class="fa fa-shopping-cart"></i></a></button>
                        <a href="home.php?id=<?php echo $id; ?>"><button class="btn btn-primary cart-btn" name="add-to-cart" type="button">Add to cart</button></a>
                      </li>
                      <li class="lnk wishlist"> <a class="add-to-cart" name="add_wishlist" href="home.php?wishlist=<?php echo $id; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                      <li class="lnk"> <a data-toggle="tooltip" name="add_compare" class="add-to-cart" href="home.php?compare=<?php echo $id; ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div> 
    </div>
  </div>
  <?php
  $i++;
}
?>
</div>
</div>
<!-- ============================================== SCROLL TABS : END ============================================== --> 
<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
  <div class="row">
    <div class="col-md-7 col-sm-7">
      <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="../Master/img/banner/<?php echo $banner1 ?>" alt=""> </div>
      </div>
    </div>
    <div class="col-md-5 col-sm-5">
      <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="../Master/img/banner/<?php echo $banner2 ?>" alt=""> </div>
      </div>
    </div>
  </div>
</div> 
<!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
<!-- ============================================== FEATUREDPRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
  <h3 class="section-title">Featured products</h3>
  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
    <?php 
    $FEATUREDPRODUCTSsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT 10";
    $FEATUREDPRODUCTSresult = mysqli_query($conn,$FEATUREDPRODUCTSsql) or die("SQL Query Failed.");
    while($FEATUREDPRODUCTSrow = mysqli_fetch_assoc($FEATUREDPRODUCTSresult)){
      $FEATUREDPRODUCTSid = $FEATUREDPRODUCTSrow["id"];
      $FEATUREDPRODUCTSproductname =$FEATUREDPRODUCTSrow["name"];
      $FEATUREDPRODUCTScur_price =$FEATUREDPRODUCTSrow["curr_price"];
      $FEATUREDPRODUCTSprev_price =$FEATUREDPRODUCTSrow["prev_price"];
      $FEATUREDPRODUCTSimage = $FEATUREDPRODUCTSrow["image"];
      ?>
      <div class="item item-carousel">
        <div class="products">
          <div class="product">
            <div class="product-image">
              <div class="image"> <a href="detail.php?id=<?php echo $FEATUREDPRODUCTSid; ?>"><img  src="../Master/img/<?php echo $FEATUREDPRODUCTSimage; ?>" style="height: 125px;" alt=""></a> </div>
              <div class="tag hot"><span>hot</span></div>
            </div>
            <div class="product-info text-left">
              <h3 class="name"><a href="detail.php?id=<?php echo $FEATUREDPRODUCTSid; ?>"><?php echo $FEATUREDPRODUCTSproductname; ?></a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>
              <div class="product-price"> <span class="price"> $<?php echo $FEATUREDPRODUCTScur_price; ?> </span> <span class="price-before-discount">$ <?php echo $FEATUREDPRODUCTSprev_price; ?></span> </div>
            </div>
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                    <button data-toggle="tooltip" class="btn btn-primary icon" type="button" name="add-to-cart" title="Add Cart" style="padding-top: 10px;padding-bottom: 10px;"><a href="home.php?id=<?php echo $FEATUREDPRODUCTSid; ?>"><i class="fa fa-shopping-cart"></i> </a></button>
                   <button class="btn btn-primary cart-btn" name="add-to-cart" type="button"><a href="home.php?id=<?php echo $FEATUREDPRODUCTSid; ?>">Add to cart</a></button>
                 </li>
                 <li class="lnk wishlist"> <a class="add-to-cart" name="add_wishlist" href="home.php?wishlist=<?php echo $FEATUREDPRODUCTSid; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                 <li class="lnk"> <a class="add-to-cart" href="detail.php?id=<?php echo $FEATUREDPRODUCTSid; ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a></li>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </div>
   <?php } ?>
 </div>
</section>
<!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
<!-- ============================================== WIDE PRODUCTS ============================================== -->
<div class="wide-banners wow fadeInUp outer-bottom-xs">
  <div class="row">
    <div class="col-md-12">
      <div class="wide-banner cnt-strip">
        <div class="image"> <img class="img-responsive" src="../Master/img/banner/<?php echo $banner3 ?>" alt=""> </div>
        <div class="strip strip-text">
          <div class="strip-inner">
            <h2 class="text-right"><?php echo $bannername ?><br>
              <span class="shopping-needs"><?php echo $banneroffer ?></span></h2>
            </div>
          </div>
          <div class="new-label">
            <div class="text"><?php echo $bannertag ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
  <!-- ============================================== BESTSELLER ============================================== -->
  <div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Best seller</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
        <?php 
        $BESTSELLERsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT 10";
        $BESTSELLERresult = mysqli_query($conn,$BESTSELLERsql) or die("SQL Query Failed.");
        while($BESTSELLERrow = mysqli_fetch_assoc($BESTSELLERresult)){
          $BESTSELLERid = $BESTSELLERrow["id"];
          $BESTSELLERproductname =$BESTSELLERrow["name"];
          $BESTSELLERcur_price =$BESTSELLERrow["curr_price"];
          $BESTSELLERprev_price =$BESTSELLERrow["prev_price"];
          $BESTSELLERimage = $BESTSELLERrow["image"];
          ?>
          <div class="item">
            <div class="products best-product">
              <div class="product">
                <div class="product-micro">
                  <div class="row product-micro-row">
                    <div class="col col-xs-5">
                      <div class="product-image">
                        <div class="image"> <a href="detail.php?id=<?php echo $BESTSELLERid; ?>"> <img src="../Master/img/<?php echo $BESTSELLERimage; ?>" style="height: 65px;" alt=""> </a> </div>
                      </div>
                    </div>
                    <div class="col2 col-xs-7">
                      <div class="product-info">
                        <h3 class="name"><a href="detail.php?id=<?php echo $BESTSELLERid; ?>"><?php echo $BESTSELLERproductname; ?></a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="product-price"> <span class="price">  $<?php echo $BESTSELLERcur_price; ?></span> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- ============================================== BEST SELLER : END ============================================== --> 
  <!-- ============================================== NEWARRIVALS ============================================== -->
  <section class="section wow fadeInUp new-arriavls">
    <h3 class="section-title">New Arrivals</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
     <?php 
     $NEWARRIVALSsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT 10";
     $NEWARRIVALSresults = mysqli_query($conn,$NEWARRIVALSsql) or die("SQL Query Failed.");
     while($NEWARRIVALSrows = mysqli_fetch_assoc($NEWARRIVALSresults)){
      $NEWARRIVALSid = $NEWARRIVALSrows["id"];
      $NEWARRIVALSproductname =$NEWARRIVALSrows["name"];
      $NEWARRIVALScur_price =$NEWARRIVALSrows["curr_price"];
      $NEWARRIVALSprev_price =$NEWARRIVALSrows["prev_price"];
      $NEWARRIVALSimage = $NEWARRIVALSrows["image"];
      $NEWARRIVALStag = $NEWARRIVALSrows["tag"];
      ?>
      <div class="item item-carousel">
        <div class="products">
          <div class="product">
            <div class="product-image">
              <div class="image"> <a href="detail.php?id=<?php echo $NEWARRIVALSid; ?>"><img  src="../Master/img/<?php echo $NEWARRIVALSimage; ?>" style="height: 125px;" alt=""></a> </div>
              <div class="tag <?php echo $NEWARRIVALStag ?>"><span><?php echo $NEWARRIVALStag ?></span></div>
            </div>
            <div class="product-info text-left">
              <h3 class="name"><a href="detail.php?id=<?php echo $NEWARRIVALSid; ?>"><?php echo $NEWARRIVALSproductname ?></a></h3>
              <div class="rating rateit-small"></div>
              <div class="description"></div>
              <div class="product-price"> <span class="price"> $<?php echo $NEWARRIVALScur_price ?> </span> <span class="price-before-discount">$<?php echo $NEWARRIVALSprev_price ?></span> </div>
            </div>
            <div class="cart clearfix animate-effect">
              <div class="action">
                <ul class="list-unstyled">
                  <li class="add-cart-button btn-group">
                   <button data-toggle="tooltip" class="btn btn-primary icon" type="button" name="add-to-cart" title="Add Cart" style="padding-top: 10px;padding-bottom: 10px;"> <a href="home.php?id=<?php echo $NEWARRIVALSid; ?>"><i class="fa fa-shopping-cart"></i> </a></button>
                   <button class="btn btn-primary cart-btn" name="add-to-cart" type="button"><a href="home.php?id=<?php echo $NEWARRIVALSid; ?>">Add to cart</a></button>
                 </li>
                 <li class="lnk wishlist"> <a class="add-to-cart" name="add_wishlist" href="home.php?wishlist=<?php echo $NEWARRIVALSid; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                 <li class="lnk"> <a class="add-to-cart" href="detail.php?id=<?php echo $NEWARRIVALSid; ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </div>
   <?php } ?>
 </div>
</section>
<!-- ============================================== NEW ARRIVALS : END ============================================== --> 
</div>
<!-- ============================================== CONTENT : END ============================================== --> 
</div>
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php include 'brand.php';?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
</div>
</div> 
<!-- ======================================================= FOOTER ========================================================= -->
<?php require 'footer.php'?>

