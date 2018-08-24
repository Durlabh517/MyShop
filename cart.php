
<?php
include("includes/db.php");
include_once("functions/functions.php");
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
				
			<div id="right_content" style="background: #ffdab9;">
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

 <div id="products_box" style="width: 780px;
	 padding: 10px;
	 margin-left: 30px;
	 margin-top: 10px;
	 margin-bottom: 10px;
	 text-align: center;"><hr>

<form action="cart.php" method="post" enctype="multipart/form-data">

	<table width="740" align="center" bgcolor="#0099CC">
		<tr align="center">
			<td><b>Remove<b></td>
			<td><b>Product<b></td>
			<td><b>Quantity<b></td>
			<td><b>Total Price<b></td>
		</tr>
		<?php $ip_add=getRealIPAddr();
	global $db;
	$total=0;
	$sel_price="select * from  cart where  ip_add='$ip_add'";
	$run_price=mysqli_query($db,$sel_price);
	while ($record=mysqli_fetch_array($run_price)) {
		$pro_id=$record['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($db,$pro_price);
		while ($p_price=mysqli_fetch_array($run_pro_price)) {
			# code...
			$product_price= array($p_price['product_price']);
			$only_price=$p_price['product_price'];
			$product_title=$p_price['product_title'];
					$product_image=$p_price['product_img1'];
			$values= array_sum($product_price);
			$total+=$values;
	
	?>
		<tr>
			<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
			<td><?php echo $product_title; ?><br><img src="admin_area/product_images/<?php echo $product_image;?>" height=80; width=80;></td>
			<td><input type="text" name="qty" value="" size="1" /></td>
			<?php
			if (isset($_POST['update'])) {
				$qty=$_POST['qty'];
				$insert_qty=" update cart set qty='$qty' where ip_add='$ip_add' ";
				$run_qty=mysqli_query($con,$insert_qty);
				$total=$total * $qty;

				# code...
			}
			?>
			<td><?php  echo "$" . $only_price; ?></td>
		</tr>

		<?php }} ?>
		<tr>

		 <td colspan="3" align="right"><b>Sub Total:</b></td>
			<td><b><?php echo  "$" .  $total;?></b></td>
			</tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
			<tr >

				
				<td colspan="2"><input type="submit" name="update" value="Update Cart"></td>
				<td><input type="submit" name="continue" value="Continue Shopping"></td>
				<td><button><a href="checkout.php" style="text-decoration: none; color: #000;">Checkout</a></button></td>
			</tr>
	</table>
	</form>
	<?php
	function updatecart(){
global $con;

	if (isset($_POST['update'])) {
		foreach ($_POST['remove'] as $remove_id) {
			# code...
			$delete_products="delete from cart where p_id='$remove_id'";
			$run_delete=mysqli_query($con,$delete_products);
			if($run_delete){
				echo "<script>window.open('cart.php','_self')</script>";
			}
		
		}
		}
		if (isset($_POST['continue'])) {
			echo "<script>window.open('index.php','_self')</script>";
	}}
echo @$up_cart=updatecart();
	?>
</div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 20px;padding-bottom:20px;text-align: center;">&copy; 2014 -By www.myshop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>