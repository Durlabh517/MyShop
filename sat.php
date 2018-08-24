
<?php
include("includes/db.php");
include_once("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/a.css" media="all">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--=========================================
</head>

<body><!-- Main contain Startss-->
	<div class="main_wrapper">
		<!-- Main contain Startss-->

			<div class="header_wrapper">
			<a href="index.php"><img src="img/my2.png" style="float: left; height: 124px;
			width: 117px;"></a>
		<img src="img/ban4.jpg" style="float:left;width: 763px; height: 124px;">
			<img src="img/bat.gif" style="float:right;height: 124px;width: 120px;">
                      </div>

		
		<div id="navbar" style="margin-top: 25px;background: #808080; 

	" >
			<ul id="menu"  >
				<li ><a href="index.php" style="margin-left: 5px;">Home</a>
					
				</li>
				<li><a href="all_products.php" style="margin-left: 20px;">All Products</a>
					
				</li>
				<li><a href="my_account.php" style="margin-left: 20px;">My Account</a>
					
				</li
				<li><a href="user_register.php" style="margin-left: 20px;">Sign Up</a>
					
				</li>
				<li><a href="cart.php" style="margin-left: 20px;">Shopping Cart</a>
					
				</li>
				<li><a href="contact.php" style="margin-left: 20px;">Contact Us</a>
					
				</li>
				
			</ul>
			<div id="rat" style="float: right;margin: 14px;">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a product"/>
					<input type="submit" name="search" value="Search" />
				</form>
			</div>
		</div>
	
		<div class="content_wrapper">
			<div id="left_sidebar">
				<div  style="background: #FFF;color: #000;padding: 10px;font-size: 22px;font-family: "Palatino Linotype","Book Antiqua",Palatino,serif;

			">Categories</div>
			<ul id="cats" >
				<?php getCat();
				?>
			</ul>
			<div  style="background: #FFF;color: #000;padding: 10px;font-size: 22px;font-family: "Palatino Linotype","Book Antiqua",Palatino,serif;

			">Brands</div>
			<ul id="cats">
				<?php getBrand();?>
			</ul>
			</div>
				
			<div id="right_content">
				<?php cart(); ?>

<div id="headline" style="
background:#333;
	color:#FFF;
	text-align: right;
	height: 35px;
	width: 800px;
	padding: 10px;"><div id="headline_content" style="float: right;">
		<b>Welcome Guest!</b>
		<b style="color: yellow;">Shopping cart</b>
		<span>- Total Items: <?php item();?>- Total Price:<?php total_price();?>- <a href="index.php" style="color:#FF0; ">Back to Shopping</a>

			&nbsp;<?php if(!isset($_SESSION['customer_email'])) {
	# code...
	echo "<a href='checkout.php' style='color:#F93;'>login</a>";
}else{
	echo "<a href='logout.php' style='color:#F93;'>logout</a>";
} ?></span>
	</div></div>
	<?php 
	$ip=getRealIPAddr();
?>

	<div class="bg-container-contact100" style="background-image: url(images/bg-01.jpg);">
		<div class="contact100-header flex-sb-m">
			<a href="#" class="contact100-header-logo">
				<img src="images/icons/logo.png" alt="LOGO">
			</a>

			<div>
				<button class="btn-show-contact100">
					Contact Us
				</button>
			</div>
		</div>
	</div>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<button class="btn-hide-contact100">
				<i class="zmdi zmdi-close"></i>
			</button>

			<div class="contact100-form-title" style="background-image: url(images/bg-02.jpg);">
				<span>Contact Us</span>
			</div>

			<form class="contact100-form validate-form">
				<!-- <div class="wrap-input100 validate-input"> -->
					 <section class="widget ">
                                <h3 class="title">Postal Address</h3>
                                <p class="adr">
                                    <span class="adr">       
                                        
                                        <span class="">Sinamangal, Kathmandu</span><br>
                                        <span class="">GPO: 10420</span><br>
                                        <span class="">Kathmandu</span>
                                    </span>
                                </p>
                            </section>
                               <section >
                                <h3 class="title"> Enquiry</h3>
                                <p class="tel"><i class="fa fa-phone"></i>Tel: +977 01-411 05 25, 411 05 90</p>
                                <p class="tel"><i class="fa fa-phone"></i>UTL: +977 01-206 23 30 </p>
                                <p class="email"><i class="fa fa-envelope"></i>Email: <a href="#">info@myshop.com</a></p>
                            </section>  


					<span class="focus-input100"></span>
					<label class="label-input100" for="name">
						<span class="lnr lnr-user m-b-2"></span>
					</label>
				</div>


				<!-- <div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
					<label class="label-input100" for="email">
						<span class="lnr lnr-envelope m-b-5"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
					<label class="label-input100" for="phone">
						<span class="lnr lnr-smartphone m-b-2"></span>
					</label>
				</div>


				<div class="wrap-input100 validate-input">
					<textarea id="message" class="input100" name="message" placeholder="Your comments..."></textarea>
					<span class="focus-input100"></span>
					<label class="label-input100 rs1" for="message">
						<span class="lnr lnr-bubble"></span>
					</label>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Send Now
					</button>
				</div>
			</form>
		</div>
	</div> -->



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
 
</div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 20px;padding-bottom:20px;text-align: center;">&copy; 2014 -By www.myshop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>