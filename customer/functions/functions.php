
<?php
$db= mysqli_connect("localhost","root","","myshop");

function getRealIPAddr(){
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
	$ip=$_SERVER['REMOTE_ADDR'];
}
return $ip;
}
//getting the total price of the items from the cart
function total_price(){
	$ip_add=getRealIPAddr();
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
			$values= array_sum($product_price);
			$total+=$values;
		}
	}
	echo '$'.$total;
}
function cart(){
	global $db;
	if (isset($_GET['add_cart'])) {
			global $db;
			$p_id=$_GET['add_cart'];
		$ip_add=getRealIPAddr();
		$p_id=$_GET['add_cart'];
		$check_pro=" select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check=mysqli_query($db,$check_pro);
		if(mysqli_num_rows($run_check)>0){
			echo "";
		}else{
			global $db;
			$q="insert into cart(p_id,ip_add) values('$p_id','$ip_add')";
$run_q=mysqli_query($db,$q);
echo "<script>
window.open('index.php','_self')</script>";
		}
		# code...
	}

}
//getting the number of items from the cart
function item(){
	global $db;
	$ip_add=getRealIPAddr();
	if(isset($_GET['add_cart'])){
		global $db;
		$ip_add=getRealIPAddr();
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);

	}else{
		$ip_add=getRealIPAddr();
		$get_items="select * from cart where ip_add='$ip_add'";
		$run_items=mysqli_query($db,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
	echo $count_items;	
}

function getPro(){
global $db;
if (!isset($_GET['cat'])) {
	# code...
if (!isset($_GET['brand'])) {
$get_products="select * from products order  by rand() LIMIT 0,6";
$run_products=mysqli_query($db,$get_products);
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
}
}}
}
function getCatPro(){
global $db;
if (isset($_GET['cat'])) {
	# code...
$cat_id=$_GET['cat'];
$get_cat_pro="select * from products where category_id='$cat_id'";
$run_cat_pro=mysqli_query($db,$get_cat_pro);
$count=mysqli_num_rows($run_cat_pro);
if($count==0){
	echo "<h2>No products found in this category</h2>";
}
while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
	$pro_id=$row_cat_pro['product_id'];
	$pro_title=$row_cat_pro['product_title'];
	$pro_cat=$row_cat_pro['category_id'];
	$pro_brand=$row_cat_pro['brand_id'];
	$pro_desc=$row_cat_pro['product_desc'];
	$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_img1'];
		echo "
		<div id='single_product' style='float:left; margin-right:40px;'>
<h3>$pro_title</h3>
<img  src='admin_area/product_images/$pro_image'style='border:2px solid #333;' width ='180' height='180'/><br>
		 <p><b>Price: $ $pro_price</b></p>
	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
	 
	<a href='index.php?add_cart=$pro_id'><button style='float:right; padding-bottom:2px;height:18px;'>Add to cart</button></a>
	</div>";
}
}
}
function getBrandPro(){
global $db;
if (isset($_GET['brand'])) {
	# code...
$cat_id=$_GET['brand'];
$get_cat_pro="select * from products where brand_id='$cat_id'";
$run_cat_pro=mysqli_query($db,$get_cat_pro);
$count=mysqli_num_rows($run_cat_pro);
if($count==0){
	echo "<h2>No products found in this category</h2>";
}
while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)) {
	$pro_id=$row_cat_pro['product_id'];
	$pro_title=$row_cat_pro['product_title'];
	$pro_cat=$row_cat_pro['category_id'];
	$pro_brand=$row_cat_pro['brand_id'];
	$pro_desc=$row_cat_pro['product_desc'];
	$pro_price=$row_cat_pro['product_price'];
		$pro_image=$row_cat_pro['product_img1'];
		echo "
		<div id='single_product' style='float:left; margin-right:40px;'>
<h3>$pro_title</h3>
<img  src='admin_area/product_images/$pro_image'style='border:2px solid #333;' width ='180' height='180'/><br>
		 <p><b>Price: $ $pro_price</b></p>
	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
	 
	<a href='index.php?add_cart=$pro_id'><button style='float:right; padding-bottom:2px;height:18px;'>Add to cart</button></a>
	</div>";
}
}
}
function getBrand(){
	global $db;
				$get_cats="select * from brands";
				$run_cats=mysqli_query($db,$get_cats);
				while ($row_cats=mysqli_fetch_array($run_cats)) {
					$brand_id=$row_cats['brand_id'];
					$brand_title=$row_cats['brand_title'];

					# code...
				
				echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
				}
				
}
function  getCat(){
global $db;

				$get_cats="select * from categories";
				$run_cats=mysqli_query($db,$get_cats);
				while($row_cats=mysqli_fetch_array($run_cats)) {
					$cat_id=$row_cats['cat_id'];
					$cat_title=$row_cats['cat_title'];
					# code...
				
				echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
			}
				
}
?>