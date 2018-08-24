
<?php
session_start();
include("includes/db.php");
include_once("../functions/functions.php");
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
			<a href="../index.php"><img src="../img/my2.png" style="float: left; height: 124px;
			width: 117px;"></a>
		<img src="../img/ban4.jpg" style="float:left;width: 762px;border-right: 1px solid white; height: 124px;">
			<img src="../img/bat.gif" style="float:right;height: 124px;width: 120px;">
                      </div>

		
		<div id="navbar" style="margin-top: 25px;
		background: #808080; 

	" >
			<ul id="menu"  >
				<li ><a href="../index.php" style="margin-left: 5px;">Home</a>
					
				</li>
				<li><a href="../all_products.php" style="margin-left: 20px;">All Products</a>
					
				</li>
				<li><a href="../customer/my_account.php" style="margin-left: 20px;">My Account</a>
					
				</li>

				<?php 
				if (isset($_SESSION['customer_email'])) {
					# code...
				}else{


				echo "<li><a href='../customer_register.php' style='margin-left: 20px;'>Sign Up</a>";
				}	?>
				</li>
				<li><a href="../cart.php" style="margin-left: 20px;">Shopping Cart</a>
					
				</li>
				<li><a href="../cont/bant.php" style="margin-left: 20px;">Contact Us</a>
					
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
			<div id="left_sidebar" style="float: right;">
				<div  style="background: #FFF;color: #000;padding: 10px;font-size: 22px;font-family: "Palatino Linotype","Book Antiqua",Palatino,serif;

			">Manage Account</div>
			<ul id="cts"  >

				<?php
if(isset($_SESSION['customer_email'])){
	$customer_session=$_SESSION['customer_email'];
	$get_customer_pic="select * from customers where customer_email ='$customer_session'";
		$run_customer=mysqli_query($con,$get_customer_pic);
	$row_customer=mysqli_fetch_array($run_customer);
	$customer_pic=$row_customer['customer_image'];
	echo "<img src='customer_photos/$customer_pic' width='150' height='150'><br><b><a href='change_pic.php'>Change Photo</a></b>";

}	
				?>
						<li><a href="my_account.php?my_orders">My Orders</a></li>
			<li><a href="my_account.php?edit_account">Edit Account</a></li>	
					<li><a href="my_account.php?change_pass">Password</a></li>
							
									<li><a href="my_account.php?delete_account">Delete Account</a></li>
											<li><a href="logout.php">Logout</a></li>		</ul>
			
			<ul id="cats">
				
			</ul>
			</div>
				
			<div id="right_content" style="float: left;background: #ffdab9;">
				<?php cart(); ?>

<div id="headline" style="
background:#333;
	color:#FFF;
	text-align: right;
	height: 35px;
	width: 800px;
	padding: 10px;"><div id="headline_content" style="float: right;">
		<?php 

		if (isset($_SESSION['customer_email'])) {
			# code...
			echo "<b>Welcome:"."</b>"."<b style='color:yellow;'>". $_SESSION['customer_email'] ."</b>";
		}
		?>


		<?php if(!isset($_SESSION['customer_email'])) {
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
<h2  style="background: #000;color: #FC9;margin-top: 35px;padding-top: 30px; padding-bottom: 15px; text-align: center;border-top: 2px solid #FFF;">Manage Your Account Here</h2>
<?php getDefault(); ?>
<?php
if (isset($_GET['my_orders'])) {
	# code...
	include("my_orders.php");
}
if (isset($_GET['edit_account'])) {
	# code...
	include("edit_account.php");
}
if (isset($_GET['change_pass'])) {
	# code...
	include("change_pass.php");
}
if (isset($_GET['delete_account'])) {
	# code...
	include("delete_account.php");
}

?>
</div>		
	 </div>
	
		<div class="footer"> 
<h2 style="color: #000; padding-top: 20px;padding-bottom: 20px;text-align: center;">&copy; 2014 -By www.myshop.com</h2>
		</div>

	</div>
	<!-- Main container ends-->

</body>
</html>