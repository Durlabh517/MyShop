
<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
	# code...

	echo "<script>window.open('login.php','_self')</script>";
}else{


?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="styles/jpt1.css" media="all">
</head>
<body>
	<div class="wrapper">
		<div class="header"></div>
			<div class="left">
		<h2 style="margin-bottom: 6px;">Manage Content</h2>
	<h2 style="color:yellow; font-style:italic;text-align:left; font-size: 20px; display: block; "><?php echo @$_GET['logged_in'];?></h2>
		<a href="index.php?insert_product" style=" text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">Insert New Product</div> </a>


		<a href="index.php?view_products" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View All Products</div> </a>

		<a href="index.php?insert_cat" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">Insert New Category </div></a>
				<a href="index.php?view_cats" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View All Categories</div></a>


		<a href="index.php?insert_brand" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">Insert New Brand</div></a>

		<a href="index.php?view_brands" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View All Brands </div></a>

		<a href="index.php?view_customers" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View Customers</div></a>

		<a href="index.php?view_orders" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View Orders</div></a>
		 	<a href="index.php?view_payments" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">View Payments</div></a>

		<a href="logout.php" style="text-align:left; padding:6px; margin-bottom:6px;text-decoration: none;display:block; color: #FFF;font-size: 18px;font-family:" Palatino Linotype"," Book Antiqua ", Palatino, seriff; 
		 "><div class="hover-item">Admin Logout</div></a>
	</div>
	</div>
	<div class="right">

		<?php
include("includes/db.php");
if (isset($_GET['insert_product'])) {
	# code...
	include("insert_product.php");
}
		
		if (isset($_GET['view_products'])) {
	# code...
	include("view_products.php");
}
if (isset($_GET['edit_pro'])) {
	# code...
	include("edit_pro.php");
}
		
		if (isset($_GET['delete_pro'])) {
	# code...
	include("delete_pro.php");
}
if (isset($_GET['insert_cat'])) {
	# code...
	include("insert_cat.php");
}
if (isset($_GET['view_cats'])) {
	# code...
	include("view_cats.php");
}
if (isset($_GET['edit_cat'])) {
	# code...
	include("edit_cat.php");
}
if (isset($_GET['insert_brand'])) {
	# code...
	include("insert_brand.php");
}
if (isset($_GET['view_brands'])) {
	# code...
	include("view_brands.php");
}
if (isset($_GET['delete_cat'])) {
	# code...
	include("delete_cat.php");
}
if (isset($_GET['edit_brand'])) {
	# code...
	include("edit_brand.php");
}
if (isset($_GET['delete_brand'])) {
	# code...
	include("delete_brand.php");
}
if (isset($_GET['view_customers'])) {
	# code...
	include("view_customers.php");
}
if (isset($_GET['view_orders'])) {
	# code...
	include("view_orders.php");
}if (isset($_GET['view_payments'])) {
	# code...
	include("view_payments.php");
}
		?>
	</div>

</body>
</html>	
 <?php } ?>
?>