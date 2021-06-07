
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <?php
          $sql = "SELECT * FROM orginzation  WHERE id='1'";
          $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
          $row = mysqli_fetch_assoc($result);
          $fname = $row["orginzationname"];
          $faddress = $row["address"];
          $femail = $row["email"];
          $fphone1 = $row["phone1"];
          $fphone2 = $row["phone2"];

          ?>
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?php echo $faddress ?></p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?php echo $fphone1 ?><br>
                    <?php echo $fphone2 ?></p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body"> <span><a href="#"><?php echo $femail ?></a></span> </div>
                </li>
              </ul>
            </div> 
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">ABOUT</h4>
            </div>
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a href="contact-us.html" title="Contact us">Contact Us</a></li>
                <li><a href="#" title="About us">About Us</a></li>
                <li><a href="#" title="Careers">Careers</a></li>
                <li><a href="#" title="Flipkart Stories">Flipkart Stories</a></li>
                <li class="last"><a href="#" title="Press">Press</a></li>
                <li class="last"><a href="#" title="Careers">Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">HELP</h4>
            </div>
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a title="Payments" href="#">Payments</a></li>
                <li><a title="Shipping" href="#">Shipping</a></li>
                <li><a title="Cancellation & Returns" href="#">Cancellation & Returns</a></li>
                <li><a title="FAQ" href="#">FAQ</a></li>
                <li class="last"><a title="Report Infringement" href="#">Report Infringement</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">POLICY</h4>
            </div>
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a href="#" title="About us">Return Policy</a></li>
                <li><a href="terms-conditions.php" title="Terms Of Use">Terms Of Use</a></li>
                <li><a href="#" title="Security">Security</a></li>
                <li><a href="#" title="Privacy">Privacy</a></li>
                <li><a href="#" title="Sitemap">Sitemap</a></li>
                <li><a href="#" title="EPR Compliance">EPR Compliance</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    $lsql = "SELECT * FROM sociallinks  WHERE id='1'";
    $lresult = mysqli_query($conn,$lsql) or die("SQL Query Failed.");
    $lrow = mysqli_fetch_assoc($lresult);
    $facebook = $lrow["facebook"];
    $instagram = $lrow["instagram"];
    $youtube = $lrow["youtube"];
    $google = $lrow["google"];
    $pinterest = $lrow["pinterest"];
    ?> 
    <div class="copyright-bar">
      <div class="container">
        <div class="col-xs-12 col-sm-6 no-padding social">
          <ul class="link">
            <a class="fa socialicon fa-facebook" href="<?php echo $facebook ?>" ></a>
            <a class="fa socialicon fa-google" href="<?php echo $google ?>" ></a>
            <a class="fa socialicon fa-pinterest" href="<?php echo $pinterest ?>" ></a>
            <a class="fa socialicon fa-youtube" href="<?php echo $youtube ?>" ></a>
            <a class="fa socialicon fa-instagram" href="<?php echo $instagram ?>" ></a>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-6 no-padding">
          <div class="clearfix payment-methods">
            <ul>
              <li><img src="assets/images/payments/1.png" alt=""></li>
              <li><img src="assets/images/payments/2.png" alt=""></li>
              <li><img src="assets/images/payments/3.png" alt=""></li>
              <li><img src="assets/images/payments/4.png" alt=""></li>
              <li><img src="assets/images/payments/5.png" alt=""></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ============================================================= FOOTER : END============================================================= -->

  <script type="text/javascript">
    function delete_product(key){
      $.ajax({
        type:'POST',
        url:'cart_product_delete.php',
        data:{key:key},
        success:function(data){
          $('.cart-list1').load(document.URL +  ' .cart-list1');
          $('#cart-list2').load(document.URL +  ' #cart-list2');
          $('#cart-list3').load(document.URL +  ' #cart-list3');
        }
      });
    }
    function qty_update(key,qty){
      $.ajax({
        type:'POST',
        url:'cart_qty_update.php',
        data:{key:key,qty:qty},
        success:function(data){
          $('.cart-list1').load(document.URL +  ' .cart-list1');
          $('#cart-list2').load(document.URL +  ' #cart-list2');
          $('#cart-list3').load(document.URL +  ' #cart-list3');
        }
      });
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  <script src="assets/js/jquery-1.11.1.min.js"></script> 
  <script src="assets/js/bootstrap.min.js"></script> 
  <script src="assets/js/bootstrap-hover-dropdown.min.js"></script> 
  <script src="assets/js/owl.carousel.min.js"></script> 
  <script src="assets/js/echo.min.js"></script> 
  <script src="assets/js/jquery.easing-1.3.min.js"></script> 
  <script src="assets/js/bootstrap-slider.min.js"></script> 
  <script src="assets/js/jquery.rateit.min.js"></script> 
  <script type="text/javascript" src="assets/js/lightbox.min.js"></script> 
  <script src="assets/js/bootstrap-select.min.js"></script> 
  <script src="assets/js/wow.min.js"></script> 
  <script src="assets/js/scripts.js"></script>
</body>
</html>