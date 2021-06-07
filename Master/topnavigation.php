   <!-- ================================== TOP NAVIGATION ================================== -->
   <div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        <?php
        $result = mysqli_query($conn,"select * from category WHERE is_deleted='0'");
        while($row = mysqli_fetch_array($result)) {
          ?>
          <li class="dropdown menu-item"> <a href="category.php?catid=<?php echo $row['id'];?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-sliders" aria-hidden="true"></i><?php echo $row['name'];?></a>
            <ul class="dropdown-menu mega-menu">
              <li class="yamm-content">
                <div class="row">
                  <?php
                  $category_id = $row['id'];
                  $subresult = mysqli_query($conn,"select * from sub_category WHERE is_deleted='0' AND category_id = '".$category_id."'");
                  while($subrow = mysqli_fetch_array($subresult)) {
                    ?>
                    <div class="col-sm-12 col-md-3">
                      <ul class="links list-unstyled">
                        <li><h2 class="title"><a href="category.php?subcatid=<?php echo $subrow['id'];?>"><?php echo $subrow['name'];?></a></h2></li>
                      </ul>
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
                </div>
              </li>
            </ul>
          </li>
          <?php
        }
        ?>
      </ul>
    </nav> 
  </div>
  <!-- ================================== TOP NAVIGATION : END ================================== --> 