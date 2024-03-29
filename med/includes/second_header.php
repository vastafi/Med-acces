<header class="ec-header">

    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Top phone Start -->
                <div class="col header-top-left">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>

                        <ul class="mb-0">
                            <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100088809137038"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.instagram.com/valentinaastafi/"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.linkedin.com/in/valentina-astafi-a65a041a4/"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top phone End -->

                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-right-inner d-flex justify-content-end">
                        <!-- Language Start -->
                        <div class="header-top-lan-curr header-top-lan dropdown">
                            <img src="assets/images/icons/translate.svg" alt="translate" style="height: 20px; width: auto; margin-top: 16px; margin-right: 10px;">
                            <div id="google_translate_element"></div>
                        </div>
                        <!-- Language End -->
                    </div>
                </div>
                <!-- Header Top Language Currency -->

                 <!-- Header Top responsive Action -->
				<div class="col d-lg-none ">
					<div class="ec-header-bottons">
						<!-- Header User Start -->
						<div class="ec-header-user dropdown">
							<button class="dropdown-toggle" data-bs-toggle="dropdown">
								<img src="assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
							</button>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item" href="user-profile.php">My account</a></li>
								<li><a class="dropdown-item" href="register.php">Register</a></li>
								<li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
								<?php if(strlen($_SESSION['login'])==0)
								{   ?>
									<li><a class="dropdown-item" href="login.php">Login</a></li>
								<?php }
								else{ ?>
									<li><a class="dropdown-item" href="logout.php">Logout</a></li>
									<?php

								} ?>
							</ul>
						</div>
						<!-- Header User End -->

						<!-- Header Cart Start -->
						<a href="wishlist.php" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon">
                                    <img src="assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                                </div>
							<?php
							if(strlen($_SESSION['login'])==0)
							{   
								?>
								<span class="ec-header-count">0</span>
								<?php
							}
							else{
								$ret=mysqli_query($con,"select count(userId) as total  from wishlist where userId='".$_SESSION['id']."'");
								$num=mysqli_fetch_array($ret);
								$count=$num['total'];
								?>
								<span class="ec-header-count"><?php echo $count?></span>
								<?php
							}?>

						</a>
						<!-- Header Cart End -->

						<!-- Header Cart Start -->
						<a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
							<div class="header-icon">
                                <img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
							</div>
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
								<span class="ec-header-count cart-count-lable"><?php echo $_SESSION['qnty'];?></span>
								<?php
							}else{?>
								<span class="ec-header-count cart-count-lable">0</span>
								<?php
							}
							?>

						</a>
						<!-- Header Cart End -->

						<!-- Header menu Start -->
						<a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
							<img src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
						</a>
						<!-- Header menu End -->
					</div>
				</div>
				<!-- Header Top responsive Action -->
			</div>
		</div>
	</div>
	<!-- Ec Header Top  End -->
	<!-- Ec Header Bottom  Start -->
	<div class="ec-header-bottom d-none d-lg-block">
		<div class="container position-relative">
			<div class="row">
				<div class="ec-flex">
					<!-- Ec Header Logo Start -->
					<div class="align-self-center">
						<div class="header-logo">
							<a href="index.php"><img src="assets/images/logo/medacces_logo.jpg" alt="Site Logo" /><img
								class="dark-logo" src="assets/images/logo/medacces_logo.jpg" alt="Site Logo"
								style="display: none;" />
							</a>
						</div>
					</div>
					<!-- Ec Header Logo End -->

					<!-- Ec Header Search Start -->
					<div class="align-self-center">
						<div class="header-search">
							<form class="ec-btn-group-form" action="#">
								<input class="form-control" placeholder="Enter Your Product Name..." type="text">
								<button class="submit" type="submit"><img src="assets/images/icons/search.svg"
									class="svg_img header_svg" alt="" />
								</button>
							</form>
						</div>
					</div>
					<!-- Ec Header Search End -->

					<!-- Ec Header Button Start -->
					<div class="align-self-center">
						<div class="ec-header-bottons">

							<!-- Header User Start -->
							<div class="ec-header-user dropdown">
								<button class="dropdown-toggle" data-bs-toggle="dropdown"><img
									src="assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
								</button>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a class="dropdown-item" href="user-profile.php">My account</a></li>
									<li><a class="dropdown-item" href="register.php">Register</a></li>
									<li><a class="dropdown-item" href="checkout.php">Checkout</a></li>
									<?php if(strlen($_SESSION['login'])==0)
									{   ?>
										<li><a class="dropdown-item" href="login.php">Login</a></li>
									<?php }
									else{ ?>
										<li><a class="dropdown-item" href="logout.php">Logout</a></li>
										<?php

									} ?> 
								</ul>
							</div>
							<!-- Header User End -->

							<!-- Header wishlist Start -->
							<a href="wishlist.php" class="ec-header-btn ec-header-wishlist">
								<div class="header-icon"><img src="assets/images/icons/wishlist.svg"
									class="svg_img header_svg" alt="" />
								</div>
								<?php
								if(strlen($_SESSION['login'])==0)
								{   
									?>
									<span class="ec-header-count">0</span>
									<?php
								}
								else{
									$ret=mysqli_query($con,"select count(userId) as total  from wishlist where userId='".$_SESSION['id']."'");
									$num=mysqli_fetch_array($ret);
									$count=$num['total'];
									?>
									<span class="ec-header-count"><?php echo $count?></span>
									<?php
								}?>
							</a>
							<!-- Header wishlist End -->
							<!-- Header Cart Start -->
							<a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
								<div class="header-icon"><img src="assets/images/icons/cart.svg"
									class="svg_img header_svg" alt="" />
								</div>
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
									<span class="ec-header-count cart-count-lable"><?php echo $_SESSION['qnty'];?></span>
									<?php
								}else{?>
									<span class="ec-header-count cart-count-lable">0</span>
									<?php
								}
								?>

							</a>
							<!-- Header Cart End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Ec Header Button End -->

	<!-- Header responsive Bottom  Start -->
	<div class="ec-header-bottom d-lg-none">
		<div class="container position-relative">
			<div class="row ">

				<!-- Ec Header Logo Start -->
				<div class="col">
					<div class="header-logo">
						<a href="index.html"><img src="assets/images/logo/medacces_logo.jpg" alt="Site Logo" /><img
							class="dark-logo" src="assets/images/logo/medacces_logo.jpg" alt="Site Logo"
							style="display: none;" />
						</a>
					</div>
				</div>
				<!-- Ec Header Logo End -->
				<!-- Ec Header Search Start -->
				<div class="col">
					<div class="header-search">
						<form class="ec-btn-group-form" action="#">
							<input class="form-control" placeholder="Enter Your Product Name..." type="text">
							<button class="submit" type="submit"><img src="assets/images/icons/search.svg"
								class="svg_img header_svg" alt="icon" />
							</button>
						</form>
					</div>
				</div>
				<!-- Ec Header Search End -->
			</div>
		</div>
	</div>
	<!-- Header responsive Bottom  End -->

	<!-- EC Main Menu Start -->
	<div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
		<div class="container position-relative">
			<div class="row">
				<div class="col-md-12 align-self-center">
					<div class="ec-main-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="dropdown"><a href="javascript:void(0)">Categories</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=59">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Cardiovascular
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=61">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Respiratory
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=57">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Digestion
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=71">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Dermatological
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=72">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Musculoskeletal
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=73">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Hematopoietic
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=74">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Hormone
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=14">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Hygiene
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=60">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Cosmetics
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=75">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Vitamins
                                        </a>
                                    </li>
                                    <li>
                                        <a title="" class="ec-cat-menu-link" href="categories.php?cid=14">
                                            <img src="assets/images/icons/pills.png" class="svg_img pro_svg" alt="" />Immunity
                                        </a>
                                    </li>
								</ul>
							</li>
							<li class="dropdown"><a href="javascript:void(0)">Products</a>
								<ul class="sub-menu">
									<?php
									$ret=mysqli_query($con,"select * from tblproducts order by rand() limit 12");
									while ($row=mysqli_fetch_array($ret)) 
									{
										?>
										<li><a href="product.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo substr($row['productName'],0,30);?></a></li>
										<?php
									}?>

								</ul>
							</li>
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Ec Main Menu End -->

	<!-- shop Mobile Menu Start -->
	<div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
		<div class="ec-menu-title">
			<span class="menu_title">Menu</span>
			<button class="ec-close">×</button>
		</div>
		<div class="ec-menu-inner">
			<div class="ec-menu-content">
				<ul>
					<li><a href="index.php">Home</a></li>

                        <li>
                        <a href="categories.php?cid=60">Cosmetics</a>
						<ul class="sub-menu">
							<?php
							$ret6=mysqli_query($con,"select * from tblproducts where categoryName='60' order by rand() limit 5");
							while ($row6=mysqli_fetch_array($ret6)) 
							{
								?>
								<li><a href="product.php?pid=<?php echo htmlentities($row6['id']);?>"><?php echo substr($row6['productName'],0,25);?></a>
								</li>
								<?php
							}?>
                            </ul>
                    </li>
							<li>
								<a href="categories.php?cid=17">Hygiene</a></a>
								<ul class="sub-menu">
									<?php
									$ret7=mysqli_query($con,"select * from tblproducts where categoryName='17' order by rand() limit 5");
									while ($row7=mysqli_fetch_array($ret7)) 
									{
										?>
										<li><a href="product.php?pid=<?php echo htmlentities($row7['id']);?>"><?php echo substr($row7['productName'],0,25);?></a></li>
										<?php
									}?>
								</ul>
							</li>
							<li>
								<a href="categories.php?cid=71">Dermatological</a>
								<ul class="sub-menu">
									<?php
									$ret8=mysqli_query($con,"select * from tblproducts where categoryName='71' order by rand() limit 5");
									while ($row8=mysqli_fetch_array($ret8)) 
									{
										?>
										<li><a href="product.php?pid=<?php echo htmlentities($row8['id']);?>"><?php echo substr($row8['productName'],0,25);?></a></li>
										<?php
									}?>
								</ul>
							</li>
							<li>
								<a href="categories.php?cid=75">Vitamins</a>
								<ul class="sub-menu">
									<?php
									$ret9=mysqli_query($con,"select * from tblproducts where categoryName='75'  order by rand() limit 5");
									while ($row9=mysqli_fetch_array($ret9)) 
									{
										?>
										<li><a href="product.php?pid=<?php echo htmlentities($row9['id']);?>"><?php echo substr($row9['productName'],0,25);?></a></li>
										<?php
									}?>
								</ul>
							</li>
                    <li>
                        <a href="categories.php?cid=59">Cardiovascular</a>
                        <ul class="sub-menu">
                            <?php
                            $ret10=mysqli_query($con,"select * from tblproducts where categoryName='75'  order by rand() limit 5");
                            while ($row10=mysqli_fetch_array($ret10))
                            {
                                ?>
                                <li><a href="product.php?pid=<?php echo htmlentities($row10['id']);?>"><?php echo substr($row10['productName'],0,25);?></a></li>
                                <?php
                            }?>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php?cid=72">Musculoskeletal</a>
                        <ul class="sub-menu">
                            <?php
                            $ret11=mysqli_query($con,"select * from tblproducts where categoryName='72'  order by rand() limit 5");
                            while ($row11=mysqli_fetch_array($ret11))
                            {
                                ?>
                                <li><a href="product.php?pid=<?php echo htmlentities($row11['id']);?>"><?php echo substr($row11['productName'],0,25);?></a></li>
                                <?php
                            }?>
                        </ul>
                    </li>
                    <li>
                        <a href="categories.php?cid=14">Immunomodulatory</a>
                        <ul class="sub-menu">
                            <?php
                            $ret12=mysqli_query($con,"select * from tblproducts where categoryName='14'  order by rand() limit 4");
                            while ($row12=mysqli_fetch_array($ret12))
                            {
                                ?>
                                <li><a href="product.php?pid=<?php echo htmlentities($row12['id']);?>"><?php echo substr($row12['productName'],0,25);?></a></li>
                                <?php
                            }?>
                        </ul>
                    </li>

						</ul>
					</li>
				</ul>
			</div>
			<div class="header-res-lan-curr">
				<div class="header-top-lan-curr">
					<!-- Language Start -->
					<div class="header-top-lan dropdown">
                            <img src="assets/images/icons/translate.svg" alt="translate" style="height: 20px; width: auto; margin-top: 16px; margin-right: 10px;">
                            <div id="google_translate_element"></div>
                    </div>
					<!-- Language End -->

				</div>
				<!-- Social Start -->
				<div class="header-res-social">
					<div class="header-top-social">
						<ul class="mb-0">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=100088809137038"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/valentinaastafi/"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.linkedin.com/in/valentina-astafi-a65a041a4/"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
						</ul>
					</div>
				</div>
				<!-- Social End -->
			</div>
		</div>
	</div>
	<!-- shop mobile Menu End -->
</header>