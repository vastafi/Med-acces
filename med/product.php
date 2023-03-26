<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="x-ua-compatible" content="ie=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Medicines and Pharmaceuticals - Shopping Portal</title>
    <meta name="keywords" content="catalog, drugs, pharmaceutical products, management" />
    <meta name="description" content="The best management of drugs and pharmaceutical products with multiple suppliers.">
    <meta name="author" content="V.A.">

    <!-- site Favicon -->
    <link rel="icon" href="assets/images/logo/medacces_logo.jpg" sizes="32x32" />
    <link rel="apple-touch-icon" href="assets/images/logo/medacces_logo.jpg" />
    <meta name="msapplication-TileImage" content="assets/images/logo/medacces_logo.jpg"/>

 <!-- css Icon Font -->
 <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

 <!-- css All Plugins Files -->
 <link rel="stylesheet" href="assets/css/plugins/animate.css" />
 <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
 <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
 <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css" />
 <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
 <link rel="stylesheet" href="assets/css/plugins/nouislider.css" />
 <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

 <!-- Main Style -->
 <link rel="stylesheet" href="assets2/css/style.css" />
 <link rel="stylesheet" href="assets2/css/responsive.css" />

 <!-- Background css -->
 <link rel="stylesheet" id="bg-switcher-css" href="assets2/css/backgrounds/bg-4.css">
 <!-- Toastr -->
 <link rel="stylesheet" href="assets/toastr/toastr.min.css">
 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.css">
 <script src="assets/sweetalert2/sweetalert2.min.js"></script>
 <!-- Toastr -->
 <script src="assets/toastr/toastr.min.js"></script>

</head>
<body class="product_page">
  <div id="ec-overlay"><span class="loader_img"></span></div>

  <?php
  $pid=intval($_GET['pid']);
  if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
    if(strlen($_SESSION['login'])==0)
    {   
      header('location:login.php');
    }
    else
    {
      $query=mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
      if($query)
      {
        ?>
        <script >
          swal.fire({
            'title': 'Thank you',
            'text': 'Added successfuly',
            'icon': 'success',
            'type': 'success'
          }).then( () => {
            location.href = 'wishlist.php'
          })
        </script>
        <?php
      }
      else{
        echo "<script>alert('Something went wrong');</script>";
      }
    }
  }
  ?>

  <!-- Header start  -->
  <?php @include("includes/second_header.php");?>
  <!-- Header End  -->

  <!-- shop Cart Start -->
  <?php @include("includes/shoppingcart.php");?>
  <!-- shop Cart End -->

  <!-- Ec breadcrumb start -->
  <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row ec_breadcrumb_inner">
            <div class="col-md-6 col-sm-12"></div>
            <div class="col-md-6 col-sm-12">
              <!-- ec-breadcrumb-list start -->
              <ul class="ec-breadcrumb-list">
                <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="ec-breadcrumb-item active">Products</li>
              </ul>
              <!-- ec-breadcrumb-list end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Ec breadcrumb end -->

  <!-- Sart Single product -->
  <section class="ec-page-content section-space-p">
    <div class="container">
      <div class="row">
        <div class="ec-pro-rightside ec-common-rightside col-lg-9 order-lg-last col-md-12 order-md-first">
          <!-- Single product content Start -->
          <?php 
          $pid=intval($_GET['pid']);
          $ret=mysqli_query($con,"select * from tblproducts where id='$pid'");
          while($row=mysqli_fetch_array($ret))
          {
            $_SESSION['pcategory']=$row['categoryName'];
            $quantity=$row['quantity'];

            ?>
            <div class="single-pro-block">
              <div class="single-pro-inner">
                <div class="row">
                  <div class="single-pro-img">
                    <div class="single-product-scroll">
                      <div class="single-product-cover">
                        <div class="single-slide zoom-image-hover">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                          alt="">
                        </div>
                        <div class="single-slide zoom-image-hover">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>"
                          alt="">
                        </div>
                        <div class="single-slide zoom-image-hover">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage3']);?>"
                          alt="">
                        </div>
                        <div class="single-slide zoom-image-hover">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage4']);?>"
                          alt="">
                        </div>
                        <div class="single-slide zoom-image-hover">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                          alt="">
                        </div>
                      </div>
                      <div class="single-nav-thumb">
                        <div class="single-slide">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                          alt="">
                        </div>
                        <div class="single-slide">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>"
                          alt="">
                        </div>
                        <div class="single-slide">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage3']);?>"
                          alt="">
                        </div>
                        <div class="single-slide">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage4']);?>"
                          alt="">
                        </div>
                        <div class="single-slide">
                          <img class="img-responsive" src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                          alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="single-pro-desc">
                    <div class="single-pro-content">
                      <h5 class="ec-single-title"><?php echo htmlentities($row['productName']);?></h5>
                      <div class="ec-single-rating-wrap">
                        <div class="ec-single-rating">
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star-o"></i>
                        </div>
                        <span class="ec-read-review"><a href="#ec-spt-nav-review">Write a review!</a></span>
                      </div>
                      <div class="ec-single-desc"><?php echo htmlentities($row['productDetails']);?>
                    </div>

                    <div class="ec-single-sales">
                      <div class="ec-single-sales-inner">
                        <div class="ec-single-sales-title">sales accelerators
                        </div>
                        <div class="ec-single-sales-visitor">real time <span>12</span> visitor
                          right now!
                        </div>
                        <div class="ec-single-sales-progress">
                          <span class="ec-single-progress-desc">Hurry up! left <?php echo htmlentities($row['quantity']);?> in
                          stock</span>
                          <span class="ec-single-progressbar"></span>
                        </div>
                        <div class="ec-single-sales-countdown">
                          <div class="ec-single-countdown"><span
                            id="ec-single-countdown"></span>
                          </div>
                          <div class="ec-single-count-desc">Time is Running Out!
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ec-single-price-stoke">
                      <div class="ec-single-price">
                        <span class="new-price">MDL <?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                      </div>
                      <div class="ec-single-stoke">
                        <?php
                        if ($quantity >=0) {?>
                          <span class="ec-single-ps-title">In stock</span>
                          <?php
                        }else{?>
                          <span class="ec-single-ps-title">Out of stock</span>
                        <?php }
                        ?>
                      </div>
                    </div>
                    <div class="ec-single-qty">
                      <div class="qty-plus-minus">
                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                      </div>
                      <div class="ec-single-cart ">
                        <a href="addcart.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                          <button class="btn btn-primary">Add To Cart</button>
                        </a>
                      </div>
                      <div class="ec-single-wishlist">
                        <a href="product.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="ec-btn-group " title="Wishlist"><img src="assets/images/icons/wishlist.svg" class="svg_img pro_svg"
                          alt="" />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Single product content End -->
          <!-- Single product tab start -->
          <div class="ec-single-pro-tab">
            <div class="ec-single-pro-tab-wrapper">
              <div class="ec-single-pro-tab-nav">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                    role="tablist">More Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                    role="tablist">Reviews</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content  ec-single-pro-tab-content">
                <div id="ec-spt-nav-details" class="tab-pane fade show active">
                  <div class="ec-single-pro-tab-desc">
                    <p><?php echo htmlentities($row['productDetails']);?>
                  </p>
                  <ul>
                      <li>Take the medicine as directed.</li>
                      <li>Follow the recommended dose of the drug.</li>
                      <li>Administer the medication at regular intervals.</li>
                      <li>Keep the medicine in the original container.</li>
                      <li>Talk to your doctor before taking this medicine.</li>
                      <li>Do not take more than directed.</li>
                      <li>Carefully follow the doctor's instructions regarding the medicine.</li>
                      <li>Talk to your doctor before changing the dose or stopping the medicine.</li>
                      <li>Please inform your doctor if you are pregnant or breastfeeding.</li>
                      <li>Talk to your doctor before taking other medicines with it.</li>
                  </ul>
                </div>
              </div>
              <div id="ec-spt-nav-info" class="tab-pane fade">
                <div class="ec-single-pro-tab-moreinfo">
                 <p><?php echo htmlentities($row['productDescription']);?>
                 <ul>
                  <li>Administration</li>
                  <li>Recommended dose</li>
                  <li>Drug interactions</li>
                  <li>Side effects</li>
                  <li>Contraindications</li>
                 </ul>
              </div>
            </div>

            <div id="ec-spt-nav-review" class="tab-pane fade">
              <div class="row">
                <div class="ec-t-review-wrapper">
                  <div class="ec-t-review-item">
                    <div class="ec-t-review-avtar">
                      <img src="assets/images/review-image/user.jpg" alt="" />
                    </div>
                    <div class="ec-t-review-content">
                      <div class="ec-t-review-top">
                        <div class="ec-t-review-name">Ambros Andrei</div>
                        <div class="ec-t-review-rating">
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star-o"></i>
                        </div>
                      </div>
                      <div class="ec-t-review-bottom">
                        <p>I saw immediate results and my symptoms disappeared in just a few days.
                            I recommend this medicine for the treatment of my condition and I am
                            sure that other people will have the same positive experience.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="ec-t-review-item">
                    <div class="ec-t-review-avtar">
                      <img src="assets/images/review-image/user.jpg" alt="" />
                    </div>
                    <div class="ec-t-review-content">
                      <div class="ec-t-review-top">
                        <div class="ec-t-review-name">Mădălina Bejanu</div>
                        <div class="ec-t-review-rating">
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star-o"></i>
                          <i class="ecicon eci-star-o"></i>
                        </div>
                      </div>
                      <div class="ec-t-review-bottom">
                        <p>It is very effective and I saw an improvement in my health in just a few weeks.
                            I recommend this medicine with confidence and I am sure that other people will
                            have the same positive experience.
                        </p>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="ec-ratting-content">
                  <h3>Add a Review</h3>
                  <div class="ec-ratting-form">
                    <form action="#">
                      <div class="ec-ratting-star">
                        <span>Your rating:</span>
                        <div class="ec-t-review-rating">
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star fill"></i>
                          <i class="ecicon eci-star-o"></i>
                          <i class="ecicon eci-star-o"></i>
                          <i class="ecicon eci-star-o"></i>
                        </div>
                      </div>
                      <div class="ec-ratting-input">
                        <input name="your-name" placeholder="Name" type="text" />
                      </div>
                      <div class="ec-ratting-input">
                        <input name="your-email" placeholder="Email*" type="email"
                        required />
                      </div>
                      <div class="ec-ratting-input form-submit">
                        <textarea name="your-commemt"
                        placeholder="Enter Your Comment"></textarea>
                        <button class="btn btn-primary" type="submit"
                        value="Submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- product details description area end -->
      <?php
    }
    ?>
  </div>
  <!-- Sidebar Area Start -->
  <div class="ec-pro-leftside ec-common-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
    <div class="ec-sidebar-wrap">
      <!-- Sidebar Category Block -->
      <div class="ec-sidebar-block">
        <div class="ec-sb-title">
          <h3 class="ec-sidebar-title">Category</h3>
        </div>
        <?php
        $ret2=mysqli_query($con,"select * from tblcategory");
        while ($row2=mysqli_fetch_array($ret2)) 
        {
          $categoryid=$row2['id'];
          ?>
          <div class="ec-sb-block-content">
            <ul>
              <li>
                <div class="ec-sidebar-block-item"><?php echo htmlentities($row2['categoryName']);?></div>
                <ul>
                  <?php
                  $ret3=mysqli_query($con,"select * from subcategory where categoryId='$categoryid'");
                  while ($row3=mysqli_fetch_array($ret3)) 
                  {
                    $subcategoryid=$row3['id'];
                    ?>
                    <li>
                      <div class="ec-sidebar-sub-item">
                        <a href="#">
                          <?php echo htmlentities($row3['subcategory']);?>
                          <?php $rt=mysqli_query($con,"select * from tblproducts where subcategory='$subcategoryid'");
                          $num=mysqli_num_rows($rt);
                          {
                            ?> 
                            <span>-<?php echo htmlentities($num);?></span>
                            <?php
                          } ?>
                        </a>
                      </div>
                    </li>
                    <?php
                  }?>

                </ul>
              </li>
            </ul>
          </div>
          <?php
        }?>
      </div>
      <!-- Sidebar Category Block -->
    </div>
    <div class="ec-sidebar-slider">
      <div class="ec-sb-slider-title">Best Sellers</div>
      <div class="ec-sb-pro-sl">
        <?php
        $ret=mysqli_query($con,"select * from tblproducts  order by rand()");
        while ($row=mysqli_fetch_array($ret)) 
        {
          ?>
          <div>
            <div class="ec-sb-pro-sl-item">
              <a href="product.php?pid=<?php echo htmlentities($row['id']);?>" class="sidekka_pro_img"><img
                src="admin/productimages/<?php echo htmlentities($row['productImage']);?>" alt="product" />
              </a>
              <div class="ec-pro-content">
                <h5 class="ec-pro-title"><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h5>
                <div class="ec-pro-rating">
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star"></i>
                </div>
                <span class="ec-price">
                  <span class="old-price">MDL <?php echo htmlentities(number_format($row['priceBefore'], 0, '.', ','));?></span>
                  <span class="new-price">MDL<?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                </span>
              </div>
            </div>
          </div>
          <?php
        }?>
      </div>
    </div>
  </div>
  <!-- Sidebar Area Start -->
</div>
</div>
</section>
<!-- End Single product -->

<!-- Related Product Start -->
<section class="section ec-releted-product section-space-p">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="section-title">
          <h2 class="ec-bg-title">Related products</h2>
          <h2 class="ec-title">Related products</h2>
          <p class="sub-title">Browse The Collection of Top Products</p>
        </div>
      </div>
    </div>
    <div class="row margin-minus-b-30">
      <!-- Related Product Content -->
      <?php
      $ret=mysqli_query($con,"select * from tblproducts where categoryName='".$_SESSION['pcategory']."' order by rand()");
      while ($row=mysqli_fetch_array($ret)) 
      {
        $discount=$row['productDiscount'];
        ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
          <div class="ec-product-inner">
            <div class="ec-pro-image-outer">
              <div class="ec-pro-image">
                <a href="product.php?pid=<?php echo htmlentities($row['id']);?>" class="image">
                  <img class="main-image"
                  src="admin/productimages/<?php echo htmlentities($row['productImage']);?>" alt="Product" />
                  <img class="hover-image"
                  src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>" alt="Product" />
                </a>
                <?php
                if (!empty($discount))
                {
                  ?>
                  <span class="percentage"><?php echo htmlentities($row['productDiscount']);?>%</span>
                  <?php 
                }
                ?>
                <?php
                if ($row['Status']=='New')
                  {?>
                    <span class="flags">
                      <span class="new">New</span>
                    </span>
                    <?php 
                  }
                  ?>
                  <div class="ec-pro-actions">
                    <a href="#" class="ec-btn-group compare"
                    title="Compare"><img src="assets/images/icons/compare.svg"
                    class="svg_img pro_svg" alt="" /></a>
                    <a href="addcart.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                      <button title="Add To Cart" class=" add-to-cart"><img
                        src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                        alt="" /> Add To Cart
                      </button>
                    </a>
                    <a href="product.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="ec-btn-group" title="Wishlist"><img
                      src="assets/images/icons/wishlist.svg"
                      class="svg_img pro_svg" alt="" />
                    </a>
                  </div>
                </div>
              </div>
              <div class="ec-pro-content">
                <h5 class="ec-pro-title"><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h5>
                <div class="ec-pro-rating">
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star"></i>
                </div>
                <div class="ec-pro-list-desc"></div>
                <span class="ec-price">
                  <span class="old-price">MDL <?php echo htmlentities(number_format($row['priceBefore'], 0, '.', ','));?></span>
                  <span class="new-price">MDL <?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                </span>
              </div>
            </div>
          </div>
          <?php
        }?>
      </div>
    </div>
  </section>
  <!-- Related Product end -->

  <!-- Footer Start -->
  <?php @include("includes/footer.php");?>
  <!-- Footer Area End -->
  
  <!-- Footer navigation panel for responsive display -->
  <div class="ec-nav-toolbar">
    <div class="container">
      <div class="ec-nav-panel">
        <div class="ec-nav-panel-icons">
          <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle">
            <img src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="" />
          </a>
        </div>
        <div class="ec-nav-panel-icons">
          <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle">  <img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
            <?php
            if(!empty($_SESSION['cart']))
            {

              $sql = "SELECT * FROM tblproducts WHERE id IN(";
              foreach($_SESSION['cart'] as $id => $value){
                $sql .=$id. ",";
              }
              $sql=substr($sql,0,-1) . ") ORDER BY id ASC";
              $query = mysqli_query($con,$sql);
              $totalprice=0;
              $totalqunty=0;
              if(!empty($query)){
                while($row = mysqli_fetch_array($query))
                {
                  $quantity=$_SESSION['cart'][$row['id']]['quantity'];
                  $subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice'];
                  $totalprice += $subtotal;
                  $_SESSION['qnty']=$totalqunty+=$quantity;
                }
              }
              ?>
              <span class="ec-cart-noti ec-header-count cart-count-lable"><?php echo $_SESSION['qnty'];?></span>
              <?php
            }else{?>
              <span class="ec-cart-noti ec-header-count cart-count-lable">0</span>
              <?php
            }
            ?>
          </a>
        </div>
        <div class="ec-nav-panel-icons">
          <a href="index.php" class="ec-header-btn">
            <img src="assets/images/icons/home.svg"
            class="svg_img header_svg" alt="icon" />
          </a>
        </div>
        <div class="ec-nav-panel-icons">
          <a href="wishlist.php" class="ec-header-btn">
            <img src="assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="icon" />
            <?php
            if(strlen($_SESSION['login'])==0)
            {   
              ?>
              <span class="ec-cart-noti">0</span></a>
              <?php
            }
            else{
              $ret=mysqli_query($con,"select count(userId) as total  from wishlist where userId='".$_SESSION['id']."'");
              $num=mysqli_fetch_array($ret);
              $count=$num['total'];
              ?>
              <span class="ec-cart-noti"><?php echo $count?></span>
              
              <?php
            }?>
          </a>
        </div>
        <div class="ec-nav-panel-icons">
          <a href="login.php" class="ec-header-btn">
            <img src="assets/images/icons/user.svg"
            class="svg_img header_svg" alt="icon" />
          </a>
        </div>

      </div>
    </div>
  </div>
  <!-- Footer navigation panel for responsive display end -->

  <!-- successfully toast Start -->
  <div id="addtocart_toast" class="addtocart_toast">
    <div class="desc">You Have Add To Cart Successfully</div>
  </div>
  <div id="wishlist_toast" class="wishlist_toast">
    <div class="desc">You Have Add To Wishlist Successfully</div>
  </div>
  <!--successfully toast end -->

  <!-- Vendor JS -->
  <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
  <script src="assets/js/vendor/jquery.notify.min.js"></script>
  <script src="assets/js/vendor/jquery.bundle.notify.min.js"></script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="assets/js/vendor/bootstrap.min.js"></script>
  <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
  <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

  <!--Plugins JS-->
  <script src="assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="assets/js/plugins/countdownTimer.min.js"></script>
  <script src="assets/js/plugins/scrollup.js"></script>
  <script src="assets/js/plugins/jquery.zoom.min.js"></script>
  <script src="assets/js/plugins/slick.min.js"></script>
  <script src="assets/js/plugins/infiniteslidev2.js"></script>
  <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>

  <!-- Google translate Js -->
  <script src="assets/js/vendor/google-translate.js"></script>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
  </script>
  <!-- Main Js -->
  <script src="assets2/js/vendor/index.js"></script>
  <script src="assets2/js/main.js"></script>

</body>
</html>