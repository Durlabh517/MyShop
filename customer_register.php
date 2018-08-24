
<?php

include("includes/db.php");
include_once("functions/functions.php");
session_start();
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
				<li><a href="user_register.php" style="margin-left: 20px;">Sign Up</a>
					
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
	<?php 
		if (!isset($_SESSION['customer_email'])){
		echo "<b>Welcome Guest!</b>"."<b style='color:yellow'> Shopping Cart </b>";
	}else{
		echo "<b>Welcome:"."<span style='color:#32CD32'>". $_SESSION['customer_email']."</span>"."</b>". 	"<b style='color:yellow'>  Shopping Cart </b>";
	}
		?>
	
		<span>- Total Items: <?php item();?>- Total Price:<?php total_price();?>- <a href="cart.php" style="color:#FF0;"> Go to Cart</a>
<?php 

if(!isset($_SESSION['customer_email'])) {
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

 <div >
	<form action="customer_register.php" method="post" enctype="multipart/form-data">
		<table width="750" align="center">

		<tr align="center">
			<td colspan="5"><h2>Create an account</h2></td>
		</tr> 
		<tr>
			<td align="right">
				Customer Name:</b></td>

			
			<td><input type="text" name="c_name" size="26" required="required"></td>
		</tr>
	<tr>
			<td align="right">
				Customer Email:</b></td>

			
			<td><input type="text" name="c_email" size="26" required="required"></td>
		</tr>
	<tr>
			<td align="right">
				Customer Password:</b></td>

			<td><input type="text" name="c_pass" size="26" required="required"></td>
		</tr>
	<tr>
			<td align="right">
				Customer Country:</b></td>

			</td>
			<td><select name="c_country"  >
<option >Select a country</option>
<option>Afganistan</option>
<option>India</option>
<option>Iran</option>
<option>Japan</option>
<option>China</option>
<option>Pakistan</option>
<option>Nepal</option>
<option>United Kingdom</option>
<option>United States</option>
			 </select></td>
		</tr>
	<tr>
			<td align="right">
				Customer City:</b></td>

			
			<td><input type="text" name="c_city" size="26" required="required"></td>
		</tr>
		<tr>
			<td align="right">
				Customer Contact:</b></td>

			
			<td><input type="text" name="c_contact" size="26" required="required"></td>
		</tr>
		<tr>
			<td align="right">
				Customer Address:</b></td>

			
			<td><input type="text" name="c_address" size="26" required="required"></td>
		</tr>
		<tr>
			<td align="right">
				Customer image:</b></td>

			<td><input type="file" name="c_image"  size="26"  required="required"></td>
		</tr>
		<tr align="center"><td colspan="5"><input type="submit" name="register" value="Submit"></td></tr>
	</table>
	</form>

</div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 30px;text-align: center;">&copy; 2014 -By www.OnlineShop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>
<?php 
if (isset($_POST['register'])) {
	# code...
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	$c_country=$_POST['c_country'];
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_tmp=$_FILES['c_image']['tmp_name'];
	$c_ip=getRealIPAddr();
	$insert_customer="insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)
	 values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
	 $run_customer=mysqli_query($con,$insert_customer);
	 move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
	 $sel_cart="select * from cart where ip_add='$c_ip'";
	 $run_cart=mysqli_query($con,$sel_cart);
	 $check_cart=mysqli_num_rows($run_cart);
 if($check_cart>0){

 	$_SESSION['customer_email']=$c_email;
 	echo "<script>alert('Account Created Successfully,Thank you!')</script>";
 	echo "<script>window.open('checkout.php','_self')</script>";

}else{
	$_SESSION['customer_email']=$c_email;
	 	echo "<script>alert('Account Created Successfully,Thank you!')</script>";
	echo "<script>window.open('index.php','_self')</script>";
}


}

 ?>