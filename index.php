
<?php
session_start();
include("includes/db.php");
include_once("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/a.css" media="all">
	<style type="text/css">
		.main_wrapper{
			border: 1px solid;
		}
	</style>
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
				<li><a href="customer/my_account.php" style="margin-left: 20px;">My Account</a>
					
				</li>
				<li><a href="customer_register.php" style="margin-left: 20px;">Sign Up</a>
					
				</li>
				<li><a href="cart.php" style="margin-left: 20px;">Shopping Cart</a>
					
				</li>
				<li><a href="cont/bant.php" style="margin-left: 20px;">Contact Us</a>
					
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
			<div id="left_sidebar" style="height: 587px;width: 180px;">
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
				
			<div id="right_content" style="height: auto; background: #ffdab9;">
				<?php cart(); ?>

<div id="headline" style="
background:#333;
	color:#FFF;
	text-align: right;
	height: 35px;
	width: 800px;
	padding: 10px;"><div id="headline_content" style="float: right;">
		<?php 
		if (!isset($_SESSION['customer_email'])){
		echo "<b>Welcome Guest!</b>"."<b style='color:yellow'> Shopping Cart </b>";
	}else{
		echo "<b>Welcome:"."<span style='color:#32CD32'>". $_SESSION['customer_email']."</span>"."</b>". 	"<b style='color:yellow'>  Shopping Cart </b>";
	}
		?>
	
		<span>- Total Items: <?php item();?>- Total Price:<?php total_price();?>- <a href="cart.php" style="color:#FF0;"> Go to Cart</a>

&nbsp;<?php if(!isset($_SESSION['customer_email'])) {
	# code...
	echo "<a href='checkout.php' style='color:#F93;'>login</a>";
}else{
	echo "<a href='logout.php' style='color:#F93;'>logout</a>";
} 
?>
		</span>
	</div></div>
	<?php 
	$ip=getRealIPAddr();
?>

 <div id="products_box" style="width: 780px;
	 padding: 10px;
	 margin-left: 30px;
	 margin-top: 10px;
	 margin-bottom: 10px;
	 text-align: center;">


<?php getPro(); 
getCatPro();
getBrandPro();?></div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 20px;padding-bottom:20px;text-align: center;">&copy; 2014 -By www.myshop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>