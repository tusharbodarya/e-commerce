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
echo "<script>window.location='category.php?catid=0'</script>";
}
require 'header.php';
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
 $page_no = $_GET['page_no'];
} else {
 $page_no = 1;
}

$total_records_per_page = 12;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

if(isset($_GET['catid'])){
 $getid = $_GET['catid'];
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_product` WHERE is_deleted='0' AND category_id='".$getid."'");
}elseif(isset($_GET['subcatid'])){
 $getid = $_GET['subcatid']; 
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_product` WHERE is_deleted='0' AND sub_category_id='".$getid."'");
}elseif(isset($_GET['childcatid'])){
 $getid = $_GET['childcatid']; 
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_product` WHERE is_deleted='0' AND child_category_id='".$getid."'");
}else{
 $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_product`");
}
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
 <div class="container">
  <div class="breadcrumb-inner">
   <ul class="list-inline list-unstyled">
    <li><a href="home.php">Home</a></li>
    <li class='active'>Handbags</li>
  </ul>
</div>
</div>
</div>
<div class="body-content outer-top-xs">
 <div class='container'>
  <div class='row'>
   <div class='col-md-3 sidebar'> 
    <!-- ================================== TOP NAVIGATION ================================== -->
    <?php require 'topnavigation.php'?>
    <!-- ================================== TOP NAVIGATION : END  ================================== -->
    <div class="sidebar-module-container">
     <div class="sidebar-filter"> 
      <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
      <div class="sidebar-widget wow fadeInUp">
       <h3 class="section-title">shop by</h3>
       <div class="widget-header">
        <h4 class="widget-title">Category</h4>
      </div>
      <div class="sidebar-widget-body">
        <div id="accordion" class="accordion">
         <?php
         $result = mysqli_query($conn,"select * from category WHERE is_deleted='0'");
         while($row = mysqli_fetch_array($result)) {
          ?>
          <div class="accordion-group">
           <div class="accordion-heading"> <a  data-toggle="collapse" onclick="categoryfilter('<?php echo $row['id'];?>')" id="category-<?php echo $row['id'];?>"  class="accordion-toggle collapsed"> <?php echo $row['name'];?> </a> </div>
           <div class="accordion-body collapse" id="cid-<?php echo $row['id'];?>" style="height: 0px;">
            <?php
            $category_id = $row['id'];
            $subresult = mysqli_query($conn,"select * from sub_category WHERE is_deleted='0' AND category_id = '".$category_id."'");
            while($subrow = mysqli_fetch_array($subresult)) {
             ?>
             <div class="accordion-inner">
              <ul>
               <li><a href="category.php?catid=0?subcatid=<?php echo $subrow['id'];?>"><?php echo $subrow['name'];?></a></li>
             </ul>
           </div>
         <?php } ?>
       </div>
     </div>
   <?php } ?>
 </div>
</div> 
</div>
<!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
<script>
 function categoryfilter(id){
  if($('#category-'+id).hasClass('collapsed')){
   $('#category-'+id).removeClass('collapsed');
   $('#cid-'+id).addClass('in');
   $('#cid-'+id).css("height", 'auto');
 }else{
  $('#accordion').load(location.href + " #accordion");
}
}
</script>
<!-- ============================================== PRICE SILDER============================================== -->
<div class="sidebar-widget wow fadeInUp">
 <div class="widget-header">
  <h4 class="widget-title">Price Slider</h4>
</div>
<div class="sidebar-widget-body m-t-10">
  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
   <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
   <input type="text" class="price-slider" value="" >
 </div>
 <a  class="lnk btn btn-primary">Show Now</a> </div>
</div>
<!-- ============================================== PRICE SILDER : END ============================================== --> 
<!-- ============================================== MANUFACTURES============================================== -->
<div class="sidebar-widget wow fadeInUp">
  <div class="widget-header">
   <h4 class="widget-title">Manufactures</h4>
 </div>
 <div class="sidebar-widget-body">
   <ul class="list">
    <li><a >Forever 18</a></li>
    <li><a >Nike</a></li>
    <li><a >Dolce & Gabbana</a></li>
    <li><a >Alluare</a></li>
    <li><a >Chanel</a></li>
    <li><a >Other Brand</a></li>
  </ul>
  <!--<a  class="lnk btn btn-primary">Show Now</a>--> 
</div>
</div>
<!-- ============================================== MANUFACTURES: END ============================================== --> 
<!-- ============================================== COLOR============================================== -->
<div class="sidebar-widget wow fadeInUp">
  <div class="widget-header">
   <h4 class="widget-title">Colors</h4>
 </div>
 <div class="sidebar-widget-body">
   <ul class="list">
    <li><a >Red</a></li>
    <li><a >Blue</a></li>
    <li><a >Yellow</a></li>
    <li><a >Pink</a></li>
    <li><a >Brown</a></li>
    <li><a >Teal</a></li>
  </ul>
</div> 
</div>
<!-- ============================================== COLOR: END ============================================== --> 
</div>
</div> 
</div>
<div class='col-md-9'> 
 <!-- ========================================== SECTION – HERO ========================================= -->

 <div id="category" class="category-carousel hidden-xs">
  <div class="item">
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
              <div class=" button-holder fadeInDown-3"><button class="btn btn-primary" type="button" style="padding-top: 10px;padding-bottom: 10px;"> <a href="detail.php?id=<?php echo $carouselproduct_id; ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a></button> </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<script type="text/javascript">
 function grid(){
  if($('.list').hasClass('active')){
   $('.list').removeClass('active');
   $('.grid').addClass('active');
   $('#list-container').removeClass('active');
   $('#grid-container').addClass('active');
 }
}
function list(){
 if($('.grid').hasClass('active')){
  $('.grid').removeClass('active');
  $('.list').addClass('active');
  $('#grid-container').removeClass('active');
  $('#list-container').addClass('active');
}
}
</script>
<div class="clearfix filters-container m-t-10">
 <div class="row">
  <div class="col col-sm-6 col-md-2">
   <div class="filter-tabs">
    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
     <li class="grid active"> <a data-toggle="tab" onclick="grid()" ><i class="icon fa fa-th-large"></i>Grid</a> </li>
     <li class="list"><a data-toggle="tab" onclick="list()"><i class="icon fa fa-th-list"></i>List</a></li>
   </ul>
 </div>
</div>
<div class="col col-sm-12 col-md-6">
  <div class="col col-sm-3 col-md-6 no-padding">
   <div class="lbl-cnt"> <span class="lbl">Sort by</span>
    <div class="fld inline">
     <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
      <ul role="menu" class="dropdown-menu">
       <li role="presentation"><a >position</a></li>
       <li role="presentation"><a >Price: Lowestfirst</a></li>
       <li role="presentation"><a >Price:HIghest first</a></li>
       <li role="presentation"><a >Product Name:A to Z</a></li>
     </ul>
   </div>
 </div>
</div>
</div>
</div>
<div class="col col-sm-6 col-md-4 text-right">
  <div class="pagination-container">
    <ul class="list-inline list-unstyled pagin" id="">
      <?php if($page_no > 1){
        if(isset($getid)){
         echo "<li><a href='?catid=$getid&page_no=1'>First Page</a></li>";
       }else{
         echo "<li><a href=''>First Page</a></li>";
       }
     } ?>

     <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
       <a <?php if($page_no > 1){
        if(isset($getid)){
          echo "href='?catid=$getid&page_no=$previous_page'";
        }else{
          echo "href=''";
        }
      } ?>>Previous</a>
    </li>
    <?php
    if ($total_no_of_pages <= 10){   
     for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>"; 
     }elseif(isset($getid) && isset($counter)){
       echo "<li><a href='?catid=$getid&page_no=$counter'>$counter</a></li>";
     }else{
      echo "<li><a href=''>2</a></li>";
    }
  }
}
?> 
<li <?php if($page_no >= $total_no_of_pages){
  echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
  if(isset($getid)){
    echo "href='?catid=$getid&page_no=$next_page'";
  }else{
    echo "href=''";
  }
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
  if(isset($getid) && isset($total_no_of_pages)){
    echo "<li><a href='?catid=$getid&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
  }else{
    echo "<li><a href=''>Last &rsaquo;&rsaquo;</a></li>";
  }
} ?>
</ul>
</div>
</div> 
</div>
</div>
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
    echo "<script>window.open('category.php?catid=0','_self')</script>";
  }
  else{
    $insert_wishlist = "insert into tbl_wishlist (user_id,product_id) values ('$user_id','$pro_id')";
    $run_wishlist = mysqli_query($conn,$insert_wishlist);
    if($run_wishlist){
      echo "<script> alert('Product Has Inserted Into Wishlist') </script>";
      echo "<script>window.open('category.php?catid=0','_self')</script>";
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
    echo "<script>window.open('category.php?catid=0','_self')</script>";
  }
  else{
    $insert_compare = "insert into tbl_product_comparison (user_id,product_id) values ('$user_id','$pro_id')";
    $run_compare = mysqli_query($conn,$insert_compare);
    if($run_compare){
      echo "<script> alert('Product Has Inserted Into compare') </script>";
      echo "<script>window.open('category.php?catid=0','_self')</script>";
    }
  }
}
}
?>
<!-- End compare -->
<div class="search-result-container ">
  <div id="myTabContent" class="tab-content category-list">
   <div class="tab-pane active " id="grid-container">
    <div class="category-product">
     <div class="row">
      <?php 
      if(isset($_GET['catid'])){
       $id = $_GET['catid'];
       $gridsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND category_id='".$id."'   ORDER BY RAND() LIMIT ".$offset.", ".$total_records_per_page;

     }elseif(isset($_GET['subcatid'])){
       $id = $_GET['subcatid'];
       $gridsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND sub_category_id='".$id."'  ORDER BY RAND() LIMIT ".$offset.", ".$total_records_per_page."";
     }elseif(isset($_GET['childcatid'])){
       $id = $_GET['childcatid'];
       $gridsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND child_category_id='".$id."'  ORDER BY RAND() LIMIT ".$offset.", ".$total_records_per_page."";
     }else{
       $gridsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT ".$offset.", ".$total_records_per_page."";
     }
     $gridresults = mysqli_query($conn,$gridsql) or die("SQL Query Failed.");
     while($gridrows = mysqli_fetch_array($gridresults)){
       $gridid = $gridrows["id"];
       $gridproductname =$gridrows["name"];
       $gridcur_price =$gridrows["curr_price"];
       $gridprev_price =$gridrows["prev_price"];
       $gridimage = $gridrows["image"];
       $gridtag = $gridrows["tag"];
       ?>
       <div class="col-sm-6 col-md-4 wow fadeInUp line-content" style=" min-height: 285px;max-height: 285px; overflow: hidden;">
         <div class="products">
           <div class="product">
             <div class="product-image">
               <div class="image"  >
                 <a href="detail.php?id=<?php echo $gridid; ?>">
                   <img  src="../Master/img/<?php echo $gridimage; ?>" style="height: 150px;" alt="">
                 </a> 
               </div>
               <div class="tag new"><span><?php echo $gridtag; ?></span></div>
             </div>
             <div class="product-info text-left">
              <h3 class="name"><a href="detail.php?id=<?php echo $gridid; ?>"><?php echo $gridproductname; ?></a></h3>
              <div class="product-price"> <span class="price"> $ <?php echo $gridcur_price; ?> </span> <span class="price-before-discount">$ <?php echo $gridprev_price; ?></span> </div>
            </div>
            <div class="cart clearfix animate-effect">
              <div class="action">
               <ul class="list-unstyled">
                <li class="add-cart-button btn-group">
                  <button data-toggle="tooltip" class="btn btn-primary icon" type="button" name="add-to-cart" title="Add Cart" style="padding-top: 10px;padding-bottom: 10px;"> <a href="category.php?catid=0?id=<?php echo $gridid; ?>"><i class="fa fa-shopping-cart"></i> </a></button>
                  <button class="btn btn-primary cart-btn" name="add-to-cart" type="button"><a href="category.php?catid=0?id=<?php echo $gridid; ?>">Add to cart</a></button>
                </li>
                <li class="lnk wishlist"> <a class="add-to-cart" name="add_wishlist" href="category.php?catid=0?wishlist=<?php echo $gridid; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                <li class="lnk"> <a data-toggle="tooltip" name="add_compare" class="add-to-cart" href="category.php?catid=0?compare=<?php echo $gridid; ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php  } ?>
</div>
</div>
</div>
<div class="tab-pane "  id="list-container">
 <div class="category-product">
  <div class="category-product-inner wow fadeInUp">
   <?php 
   if(isset($_GET['catid'])){
    $id = $_GET['catid'];
    $listsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND category_id='".$id."'   ORDER BY RAND() LIMIT $offset, $total_records_per_page";
  }elseif(isset($_GET['subcatid'])){
    $id = $_GET['subcatid'];
    $listsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND sub_category_id='".$id."'  ORDER BY RAND() LIMIT $offset, $total_records_per_page";
  }elseif(isset($_GET['childcatid'])){
    $id = $_GET['childcatid'];
    $listsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' AND child_category_id='".$id."'  ORDER BY RAND() LIMIT $offset, $total_records_per_page";
  }else{
    $listsql = "SELECT * FROM tbl_product  WHERE is_deleted='0' ORDER BY RAND() LIMIT $offset, $total_records_per_page";
  }
  $listresults = mysqli_query($conn,$listsql) or die("SQL Query Failed.");
  while($listrows = mysqli_fetch_array($listresults)){
    $listid = $listrows["id"];
    $listproductname =$listrows["name"];
    $listcur_price =$listrows["curr_price"];
    $listprev_price =$listrows["prev_price"];
    $listimage = $listrows["image"];
    $listtag = $listrows["tag"];
    $listdescription = $listrows["description"];
    ?>
    <div class="products">
     <div class="product-list product  line-content">
      <div class="row product-list-row">
       <div class="col col-sm-4 col-lg-4">
        <div class="product-image">
         <div class="image" > <img src="../Master/img/<?php echo $listimage; ?>" style="height: 150px;"  alt=""> </div>
       </div>
     </div>
     <div class="col col-sm-8 col-lg-8">
       <div class="product-info">
        <h3 class="name"><a href="detail.php?id=<?php echo $listid; ?>"><?php echo $listproductname; ?></a></h3>
        <div class="rating rateit-small"></div>
        <div class="product-price"> <span class="price"> $<?php echo $listcur_price; ?> </span> <span class="price-before-discount">$ <?php echo $listprev_price; ?></span> </div>
        <div class="description m-t-10"><?php echo $listdescription; ?></div>
        <div class="cart clearfix animate-effect">
         <div class="action">
          <ul class="list-unstyled">
           <li class="add-cart-button btn-group">
            <button class="btn btn-primary icon" data-toggle="dropdown" type="button" style="padding-top: 10px;padding-bottom: 10px;"> <i class="fa fa-shopping-cart"></i> </button>
            <button class="btn btn-primary cart-btn" type="button"><a href="shopping-cart.php?id=<?php echo $listid; ?>">Add to cart</a></button>
          </li>
          <li class="lnk wishlist"> <a class="add-to-cart" href="detail.php?id=<?php echo $listid; ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
          <li class="lnk"> <a class="add-to-cart" href="detail.php?id=<?php echo $listid; ?>" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<div class="tag <?php echo $listtag; ?>"><span><?php echo $listtag; ?></span></div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
<div class="clearfix filters-container">
 <div class="text-right">
  <div class="pagination-container">
   <ul class="list-inline list-unstyled pagin" id="">
     <?php if($page_no > 1){
      if(isset($getid)){
       echo "<li><a href='?catid=$getid&page_no=1'>First Page</a></li>";
     }else{
       echo "<li><a href=''>First Page</a></li>";
     }
   } ?>

   <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
     <a <?php if($page_no > 1){
      if(isset($getid)){
        echo "href='?catid=$getid&page_no=$previous_page'";
      }else{
        echo "href=''";
      }
    } ?>>Previous</a>
  </li>
  <?php
  if ($total_no_of_pages <= 10){   
   for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
    if ($counter == $page_no) {
     echo "<li class='active'><a>$counter</a></li>"; 
   }elseif(isset($getid) && isset($counter)){
     echo "<li><a href='?catid=$getid&page_no=$counter'>$counter</a></li>";
   }else{
    echo "<li><a href=''>2</a></li>";
  }
}
}
?> 
<li <?php if($page_no >= $total_no_of_pages){
  echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
  if(isset($getid)){
    echo "href='?catid=$getid&page_no=$next_page'";
  }else{
    echo "href=''";
  }
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
  if(isset($getid) && isset($total_no_of_pages)){
    echo "<li><a href='?catid=$getid&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
  }else{
    echo "<li><a href=''>Last &rsaquo;&rsaquo;</a></li>";
  }
} ?>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php include 'brand.php';?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->  
</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
<?php include 'footer.php';?>
