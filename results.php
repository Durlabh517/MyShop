
<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/a.css" media="all">
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
		<!-- 	<div id="rat" style="float: right;margin: 14px;">
				<form method="get" action="results.php enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a product"/>
					<input type="submit" name="search" value="Search" />
				</form>
			</div> -->
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
				
			<div id="right_content" style="background: #ffdab9;">

<div id="headline" style="
background:#333;
	color:#FFF;
	text-align: right;
	height: 35px;
	width: 800px;
	padding: 10px;"><div id="headline_content" style="float: right;">
		<b>Welcome Guest!</b>
		<b style="color: yellow;">Shopping cart</b>
		<span>- Items: - Price</span>
	</div></div>
	

 <div id="products_box" style="width: 780px;
	 padding: 10px;
	 margin-left: 30px;
	 margin-top: 10px;
	 margin-bottom: 10px;
	 text-align: center;">


<?php 
if(isset($_GET['search'])){

	$user_keyword=$_GET['user_query'];


$get_products="select * from products where product_keywords like '%$user_keyword%'";
$run_products=mysqli_query($con,$get_products);
while ($row_products=mysqli_fetch_array($run_products)) {
	$pro_id=$row_products['product_id'];
	$pro_title=$row_products['product_title'];
	$pro_cat=$row_products['category_id'];
	$pro_brand=$row_products['brand_id'];
	$pro_desc=$row_products['product_desc'];
	$pro_price=$row_products['product_price'];
		$pro_image=$row_products['product_img1'];
		echo "
		<div id='single_product' style='float:left; margin-right:40px;'>
<h3>$pro_title</h3>
<img  src='admin_area/product_images/$pro_image'style='border:2px solid #333;' width ='180' height='180'/><br>
		 <p><b>Price: $ $pro_price</b></p>
	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
	 
	<a href='index.php?add_cart=$pro_id'><button style='float:right; padding-bottom:2px;height:18px;'>Add to cart</button></a>
	</div>";
}}
	?></div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 30px;text-align: center;">&copy; 2014 -By www.OnlineShop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>