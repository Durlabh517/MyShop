<?php 
include("includes/db.php");


@session_start();
if (!isset($_SESSION['admin_email'])) {
	# code...

	echo "<script>window.open('login.php','_self')</script>";
}else{




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	form{
			margin:14%;
			
		}
	</style>
</head>
<body>

<form action="" method="post">
	
	<b>Insert New Brand</b>
	<input type="text" name="cat_title" />
	<input type="submit" name="insert_cat1" value="Insert Brand">
</form>

</body>
</html>
<?php

if (isset($_POST['insert_cat1'])) {	
	# code...
	$cat_title=$_POST['cat_title'];
	$insert_cat="insert into brands(brand_title) values('$cat_title')";	
	$run_cat=mysqli_query($con,$insert_cat);
	if ($run_cat) {
		# code...
		echo "<script>alert('New Brand has been inserted')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}
?>
<?php } ?>