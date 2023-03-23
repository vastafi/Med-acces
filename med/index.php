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
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

  <!-- Main Style -->
  <link rel="stylesheet" href="assets/css/demo.css" />
  <!-- <script src='https://www.google.com/recaptcha/api.js'></script> --> 
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/toastr/toastr.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.css">
  <script src="assets/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="assets/toastr/toastr.min.js"></script>

</head>
<body>
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
  <?php @include("includes/header.php");?>
  <!-- Header End  -->

  <!-- Ekka Cart Start -->
  <?php @include("includes/shoppingcart.php");?>
  <!-- Ekka Cart End -->

  <!-- Main Slider Start -->
  <div class="ec-main-slider section section-space-mb">
    <div class="ec-slider">
      <div class="ec-slide-item d-flex slide-1" style="background-image: url('assets/images/main-slider-banner/slide1.jpg')">
        <img src="assets/images/main-slider-banner/arrow.jpg" class="main_banner_arrow_img" alt="" />
        <div class="container align-self-center" >
          <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
              <div class="ec-slide-content slider-animation">
                <h2 class="ec-slide-stitle">Premium Multivitamin</h2>
                <h1 class="ec-slide-title">11 vitamins and minerals</h1>
                <p>Essential, perfect for those who fail to take enough vitamins normally.</p>
                <span class="ec-slide-disc">Starting at <span>90 MDL</span></span>
                <a href="product.php?pid=60" class="btn btn-lg btn-secondary">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ec-slide-item d-flex slide-2" style="background-image: url('assets/images/main-slider-banner/slide3.jpg')">
        <img src="assets/images/main-slider-banner/arrow.jpg" class="main_banner_arrow_img" alt="" />
        <div class="container align-self-center">
          <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
              <div class="ec-slide-content slider-animation">
                <h2 class="ec-slide-stitle">Gripovit</h2>
                <h1 class="ec-slide-title">Energy and vitality</h1>
                <p>Food supplement containing vitamins and minerals, which helps to strengthen the
                    immune system. Perfect for the first symptoms of cold and flu.</p>
                <span class="ec-slide-disc">Starting at <span>99 MDL </span></span>
                <a href="product.php?pid=64" class="btn btn-lg btn-secondary">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ec-slide-item d-flex slide-3" style="background-image: url('assets/images/main-slider-banner/slide2.jpg')">
        <img src="assets/images/main-slider-banner/arrow.jpg" class="main_banner_arrow_img" alt="" />
        <div class="container align-self-center">
          <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
              <div class="ec-slide-content slider-animation">
                <h2 class="ec-slide-stitle">Theraflu</h2>
                <h1 class="ec-slide-title">Cold and flu</h1>
                <p>A specialized blend of ingredients that help reduce cold and flu symptoms,
                    including headache, cough, congestion and fever.</p>
                <span class="ec-slide-disc">Starting at <span>90 MDL </span></span>
                <a href="product.php?pid=81" class="btn btn-lg btn-secondary">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Slider End -->

  <!--  category Section Start -->
  <section class="section ec-category-section section-space-p">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-title-block">
          <div class="section-title">
            <h2 class="ec-title">Browse By Categories</h2>
          </div>
          <div class="section-btn">
            <span class="ec-section-btn"><a class="btn-primary" href="categories.php?pid=60">View All Categories</a></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="ec_cat_slider">
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/cosmetics.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=60" class="btn-primary">Cosmetics</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/imonomodulatory.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=14" class="btn-primary">Immunomodulatory</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/respiratory.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=61" class="btn-primary">Respiratory system</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/digestion.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=57" class="btn-primary">Digestion,metabolism</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/antiparasitic.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=16" class="btn-primary">Antiparasitic</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/cardiovascular.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=59" class="btn-primary">Cardiovascular</a></span>
              </div>
            </div>
          </div>
          <div class="ec_cat_content">
            <div class="ec_cat_inner">
              <div class="ec-cat-image">
                <img src="assets/images/category-image/dermatological.jpg" alt="" />
              </div>
              <div class="ec-cat-desc">
                <span class="ec-section-btn"><a href="categories.php?cid=71" class="btn-primary">Dermatological</a></span>
              </div>
            </div>
          </div>
            <div class="ec_cat_content">
                <div class="ec_cat_inner">
                    <div class="ec-cat-image">
                        <img src="assets/images/category-image/musculoskeletal.jpg" alt="" />
                    </div>
                    <div class="ec-cat-desc">
                        <span class="ec-section-btn"><a href="categories.php?cid=72" class="btn-primary">Musculoskeletal</a></span>
                    </div>
                </div>
            </div>
            <div class="ec_cat_content">
                <div class="ec_cat_inner">
                    <div class="ec-cat-image">
                        <img src="assets/images/category-image/hematopoietic.jpg" alt="" />
                    </div>
                    <div class="ec-cat-desc">
                        <span class="ec-section-btn"><a href="categories.php?cid=73" class="btn-primary">Hematopoietic</a></span>
                    </div>
                </div>
            </div>
            <div class="ec_cat_content">
                <div class="ec_cat_inner">
                    <div class="ec-cat-image">
                        <img src="assets/images/category-image/hormone.jpg" alt="" />
                    </div>
                    <div class="ec-cat-desc">
                        <span class="ec-section-btn"><a href="categories.php?cid=74" class="btn-primary">Hormone</a></span>
                    </div>
                </div>
            </div>
            <div class="ec_cat_content">
                <div class="ec_cat_inner">
                    <div class="ec-cat-image">
                        <img src="assets/images/category-image/vitamins.jpg" alt="" />
                    </div>
                    <div class="ec-cat-desc">
                        <span class="ec-section-btn"><a href="categories.php?cid=75" class="btn-primary">Vitamins</a></span>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!--category Section End -->

  <!-- ec Banner Section Start -->
  <section class="ec-banner section section-space-p">
    <div class="container">
      <h2 class="d-none">Banner</h2>
      <div class="ec-banners">
        <div class="ec-banner-left col-sm-6">
          <div class="ec-banner-block ec-banner-block-1 col-sm-12">
            <div class="banner-block">
              <img src="assets/images/banner/1.png" alt="" />
              <div class="banner-content">
                <div class="banner-text">
                  <span class="ec-banner-stitle">20% Off ! Only one week</span>
                  <span class="ec-banner-title">New Vitamins</span>
                  <p>Airborne Immune Gummy <br>2 pack of 21 Count</p>
                </div>
                <span class="ec-banner-btn"><a href="product.php?pid=70" class="btn-primary">Discover Now</a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="ec-banner-right col-sm-6 ">
          <div class="ec-banner-block ec-banner-block-2 col-sm-12">
            <div class="banner-block">
              <img src="assets/images/banner/2.png" alt="" />
              <div class="banner-content">
                <div class="banner-text">
                  <span class="ec-banner-stitle">Nurofen</span>
                  <span class="ec-banner-title">Anti-Inflammmatory</span>
                </div>
                <span class="ec-banner-btn"><a href="product.php?pid=63" class="btn-primary">Discover Now</a></span>
              </div>
            </div>
          </div>
          <div class="ec-banner-block ec-banner-block-3 col-sm-6">
            <div class="banner-block">
              <a href="product.php?pid=77">
                <img src="assets/images/banner/3.png" alt="" />
                <div class="banner-content">
                  <div class="banner-text">
                    <span class="ec-banner-stitle">Exlusive</span>
                    <span class="ec-banner-title">BienDormir</span>
                    <span class="ec-banner-desc">90.00 MDL</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="ec-banner-block ec-banner-block-4 col-sm-6">
            <div class="banner-block">
              <a href="product.php?pid=79">
                <img src="assets/images/banner/4.png" alt="" />
                <div class="banner-content">
                  <div class="banner-text">
                    <span class="ec-banner-stitle">Best Vitamins</span>
                    <span class="ec-banner-title">Immunity</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ec Banner Section End -->

  <!-- Product tab Area Start -->
  <section class="section ec-product-tab section-space-p">
    <div class="container">
      <div class="row">
        <div class="col-md-12 section-title-block">
          <div class="section-title">
            <h2 class="ec-title">Exclusive</h2>
          </div>
          <div class="section-btn">
            <ul class="ec-pro-tab-nav nav">
              <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab"
                href="#tab-pro-new-arrivals">New Arrivals</a>
              </li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                href="#tab-pro-special-offer">Special Offer</a>
              </li>
              <li class="nav-item"><a class="nav-link" data-bs-toggle="tab"
                href="#tab-pro-best-sellers">Best Sellers</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="tab-content">
            <!-- 1st Product tab start -->
            <div class="tab-pane fade show active" id="tab-pro-new-arrivals">
              <div class="row">
                <div class="ec-pro-tab-slider">
                  <?php
                  $ret=mysqli_query($con,"select * from tblproducts where productStatus='New' order by rand()");
                  while ($row=mysqli_fetch_array($ret)) 
                  {
                    $discount=$row['productDiscount'];
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                      <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                          <div class="ec-pro-image">
                            <a href="product.php?pid=<?php echo htmlentities($row['id']);?>" class="image">
                              <img class="main-image"
                              src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                              alt="Product" />
                              <img class="hover-image"
                              src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>"
                              alt="Product" />
                            </a>
                            <?php
                            if (!empty($discount))
                            {
                              ?>
                              <span class="flags">
                                <span class="percentage">-<?php echo htmlentities($row['productDiscount']);?>%</span>
                              </span>
                              <?php 
                            }
                            ?>

                            <div class="ec-pro-actions">
                              <a href="addcart.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                                <button title="Add To Cart" class=" add-to-cart">
                                  <img
                                  src="assets/images/icons/cart.svg"
                                  class="svg_img pro_svg" alt="" />
                                </button>
                              </a>
                              <a href="#" class="ec-btn-group compare"
                              title="Compare"><img
                              src="assets/images/icons/compare.svg"
                              class="svg_img pro_svg" alt="" /></a>
                              <a href="index.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="ec-btn-group " title="Wishlist"><img
                                src="assets/images/icons/pro_wishlist.svg"
                                class="svg_img pro_svg" alt="" />
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="ec-pro-content">
                          <h5 class="ec-pro-title"><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                          </h5>
                          <span class="ec-price">
                            <span class="old-price">MDL <?php echo htmlentities(number_format($row['priceBefore'], 0, '.', ','));?></span>
                            <span class="new-price">MDL <?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- ec 1st Product tab end -->
            <!-- ec 2nd Product tab start -->
            <div class="tab-pane fade" id="tab-pro-special-offer">
              <div class="row">
                <div class="ec-pro-tab-slider">
                  <?php
                  $ret=mysqli_query($con,"select * from tblproducts where productStatus='Special' order by rand()");
                  while ($row=mysqli_fetch_array($ret)) 
                  {
                    $discount=$row['productDiscount'];
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                      <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                          <div class="ec-pro-image">
                            <a href="product.php?pid=<?php echo htmlentities($row['id']);?>" class="image">
                              <img class="main-image"
                              src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                              alt="Product" />
                              <img class="hover-image"
                              src="admin/productimages/<?php echo htmlentities($row['ProductImage2']);?>"
                              alt="Product" />
                            </a>
                            <?php
                            if (!empty($discount))
                            {
                              ?>
                              <span class="flags">
                                <span class="percentage">-<?php echo htmlentities($row['productDiscount']);?>%</span>
                              </span>
                              <?php 
                            }
                            ?>

                            <div class="ec-pro-actions">
                              <a href="addcart.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                                <button title="Add To Cart" class=" add-to-cart">
                                  <img
                                  src="assets/images/icons/cart.svg"
                                  class="svg_img pro_svg" alt="" />
                                </button>
                              </a>
                              <a href="#" class="ec-btn-group compare"
                              title="Compare"><img
                              src="assets/images/icons/compare.svg"
                              class="svg_img pro_svg" alt="" /></a>
                              <a href="index.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="ec-btn-group" title="Wishlist"><img
                                src="assets/images/icons/pro_wishlist.svg"
                                class="svg_img pro_svg" alt="" />
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="ec-pro-content">
                          <h5 class="ec-pro-title"><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                          </h5>
                          <span class="ec-price">
                            <span class="old-price">MDL&nbsp;<?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                            <span class="new-price">MDL&nbsp;<?php echo htmlentities(number_format($row['priceBefore'], 0, '.', ','));?></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- ec 2nd Product tab end -->
            <!-- ec 3rd Product tab start -->
            <div class="tab-pane fade" id="tab-pro-best-sellers">
              <div class="row">
                <div class="ec-pro-tab-slider">
                  <?php
                  $ret=mysqli_query($con,"select * from tblproducts where productStatus='Best' order by rand()");
                  while ($row=mysqli_fetch_array($ret)) 
                  {
                    $discount=$row['productDiscount'];
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                      <div class="ec-product-inner">
                        <div class="ec-pro-image-outer">
                          <div class="ec-pro-image">
                            <a href="product.php?pid=<?php echo htmlentities($row['id']);?>" class="image">
                              <img class="main-image"
                              src="admin/productimages/<?php echo htmlentities($row['productImage']);?>"
                              alt="Product" />
                              <img class="hover-image"
                              src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>"
                              alt="Product" />
                            </a>
                            <?php
                            if (!empty($discount))
                            {
                              ?>
                              <span class="flags">
                                <span class="percentage">-<?php echo htmlentities($row['productDiscount']);?>%</span>
                              </span>
                              <?php 
                            }
                            ?>

                            <div class="ec-pro-actions">
                              <a href="addcart.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                                <button title="Add To Cart" class=" add-to-cart">
                                  <img
                                  src="assets/images/icons/cart.svg"
                                  class="svg_img pro_svg" alt="" />
                                </button>
                              </a>
                              <a href="#" class="ec-btn-group compare"
                              title="Compare"><img
                              src="assets/images/icons/compare.svg"
                              class="svg_img pro_svg" alt="" /></a>
                              <a  href="index.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" class="ec-btn-group " title="Wishlist"><img
                                src="assets/images/icons/pro_wishlist.svg"
                                class="svg_img pro_svg" alt="" />
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="ec-pro-content">
                          <h5 class="ec-pro-title"><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                          </h5>
                          <span class="ec-price">
                            <span class="old-price">MDL&nbsp;<?php echo htmlentities(number_format($row['productPrice'], 0, '.', ','));?></span>
                            <span class="new-price">MDL&nbsp;<?php echo htmlentities(number_format($row['priceBefore'], 0, '.', ','));?></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- ec 3rd Product tab end -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ec Product tab Area End -->

  <!--  services Section Start -->
  <section class="section ec-services-section section-space-p">
    <h2 class="d-none">Services</h2>
    <div class="container">
      <div class="row mb-minus-30">

        <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-3">
          <div class="ec_ser_inner">
            <div class="ec-service-image">
              <img src="assets/images/icons/service_1.svg" class="svg_img" alt="service" />
            </div>
            <div class="ec-service-desc">
              <h2>Quick Delivery</h2>
              <p>For Order Over 100 MDL.</p>
            </div>
          </div>
        </div>
          <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-3">
              <div class="ec_ser_inner">
                  <div class="ec-service-image">
                      <img src="assets/images/icons/service_4.svg" class="svg_img" alt="service" />
                  </div>
                  <div class="ec-service-desc">
                      <h2>Secure Payment</h2>
                      <p>Refund Guaranteed.</p>
                  </div>
              </div>
          </div>

        <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-3">
          <div class="ec_ser_inner">
            <div class="ec-service-image">
              <img src="assets/images/icons/service_3.svg" class="svg_img" alt="service" />
            </div>
            <div class="ec-service-desc">
              <h2>Free Returns</h2>
              <p>Easy & Free Return.</p>
            </div>
          </div>
        </div>
        <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-3">
          <div class="ec_ser_inner">
            <div class="ec-service-image">
              <img src="assets/images/icons/service_2.svg" class="svg_img" alt="service" />
            </div>
            <div class="ec-service-desc">
              <h2>24/7 Support</h2>
              <p>Free Online Support.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--services Section End -->

  <!-- Testimonial Start -->
  <section class="section ec-test-section section-space-p">
      <div class="container">
          <div class="row">
              <div class="col-md-12 section-title-block">
                  <div class="section-title">
                      <h2 class="ec-title">Testimonials</h2>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="ec-test-outer">
                  <ul id="ec-testimonial-slider">
                      <li class="ec-test-item">
                          <div class="ec-test-inner">
                              <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                                            src="assets/images/testimonial/RudolfVirchow.jpg" />
                              </div>
                              <div class="ec-test-content">
                                  <div class="ec-test-icon"><img src="assets/images/testimonial/quote-3.svg"
                                                                 class="svg_img test_svg" alt="" />
                                  </div>
                                  <div class="ec-test-desc">Medicines may replace your doctor, but no medicine can replace a doctor.</div>
                                  <div class="ec-test-name-info">
                                      <div class="ec-test-name">Rudolf Virchow</div>
                                      <div class="ec-test-designation">German scientist </div>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li class="ec-test-item">
                          <div class="ec-test-inner">
                              <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                                            src="assets/images/testimonial/DavidAgus.jpg" />
                              </div>
                              <div class="ec-test-content">
                                  <div class="ec-test-icon"><img src="assets/images/testimonial/quote-3.svg"
                                                                 class="svg_img test_svg" alt="" />
                                  </div>
                                  <div class="ec-test-desc">In the fight with the disease, drugs are as important as operation or radiotherapy.</div>
                                  <div class="ec-test-name-info">
                                      <div class="ec-test-name">David Agus</div>
                                      <div class="ec-test-designation">Doctor, writer</div>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li class="ec-test-item">
                          <div class="ec-test-inner">
                              <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                                            src="assets/images/testimonial/AtulGawande.jpg" />
                              </div>
                              <div class="ec-test-content">
                                  <div class="ec-test-icon"><img src="assets/images/testimonial/quote-3.svg"
                                                                 class="svg_img test_svg" alt="" />
                                  </div>
                                  <div class="ec-test-desc">Good medicines are the ones that save your life, but excellent medicines are the ones that allow you to live it.</div>
                                  <div class="ec-test-name-info">
                                      <div class="ec-test-name">Atul Gawande</div>
                                      <div class="ec-test-designation">Surgeon, journalist, writer</div>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </section>
  <!-- testimonial end -->

  <!-- Brand Section Start -->
  <section class="section ec-brand-area section-space-p">
    <h2 class="d-none">Brands</h2>
    <div class="container">
      <div class="row">
        <div class="ec-brand-outer">
          <ul id="ec-brand-slider">
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/bioderma.png" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/biofarm.png" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/catena.jpg" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/dankepharm.png" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/farmex.png" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/hofical.jpg" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/labormed.png" />
                </a>
              </div>
            </li>
            <li class="ec-brand-item"  data-animation="zoomIn">
              <div class="ec-brand-img">
                <a href="#">
                  <img alt="brand" title="brand" src="assets/images/brand-image/equate.png" />
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Brand Section End -->



  <!-- Footer Start -->
  <?php @include("includes/footer.php");?>
  <!-- Footer Area End -->

  <!-- FB Chat Messenger -->
  <div class="ec-fb-style fb-right-bottom">

    <!-- Start Floating Panel Container -->
    <div class="fb-panel">
      <!-- Panel Content -->
      <div class="fb-header">
        <img src="assets/images/user/2.jpg" alt="pic" />
        <h2>Linda Michelle</h2>
        <p>Technical Manager</p>
      </div>
      <div class="fb-body">
        <p><b>Hey there &#128515;</b></p>
        <p>Need help ? just send me a message.</p>
      </div>
      <div class="fb-footer">

        <a href="contactus.php" target="_blank" class="fb-msg-button">
          <span>Send Message</span>
          <svg width="13px" height="10px" viewBox="0 0 13 10">
            <path d="M1,5 L11,5"></path>
            <polyline points="8 1 12 5 8 9"></polyline>
          </svg>
        </a>

      </div>
    </div>
    <!--/ End Floating Panel Container -->

    <!-- Start Right Floating Button -->
    <div class="fb-button fb-right-bottom">
      <img class="fa-messenger" src="assets/images/icons/chat-icon.png" alt="icon" />
    </div>
    <!--/ End Right Floating Button -->

  </div>
  <!-- FB Chat Messenger end -->

  <!-- successfully toast Start -->
  <div id="addtocart_toast" class="addtocart_toast">
    <div class="desc">You Have Add To Cart Successfully</div>
  </div>
  <div id="wishlist_toast" class="wishlist_toast">
    <div class="desc">You Have Add To Wishlist Successfully</div>
  </div>
  <!--successfully toast end -->

  <!-- Theme Custom Cursors -->
  <!-- <div class="ec-cursor"></div> -->
  <!--   <div class="ec-cursor-2"></div> -->

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
  <script src="assets/js/plugins/fb-chat.js"></script>

  <!-- <script src="assets/js/main.js"></script> -->

  <!-- Main Js -->
  <script src="assets/js/vendor/index.js"></script>
  <script src="assets/js/demo.js"></script>

</body>
</html>