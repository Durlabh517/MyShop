
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
<!-- 	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> -->
  <script type="text/javascript">
  	
  </script>
  <style type="text/css">
  	table{
  		border: 1px  ;
  	}
  </style>
</head>
<body bgcolor="#999999">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
	<table width="718" align="center"  bgcolor="#3399CC">
		<tr align="center">
			
			<td colspan="2"><h2>Insert new Product:</h2></td>
		</tr>
		<tr><td>Product Title</td>
			<td><input type="text" name="product_title" size="60"></td>
		</tr>
		<tr >
			<td>Product Category</td>
			<td>
				<select name="product_cat">
					<option>Select a Category</option>
					<?php
				$get_cats="select * from categories";
				$run_cats=mysqli_query($con,$get_cats);
				while($row_cats=mysqli_fetch_array($run_cats)) {
					$cat_id=$row_cats['cat_id'];
					$cat_title=$row_cats['cat_title'];
					# code...
				
				echo "<option value='$cat_id'>$cat_title</option>";
			}
				?>
				</select>
			</td>
		</tr>

<tr>
	<td>Product Brand</td>
			<td>
				<select name="product_brand">
					<option>Select a Brand</option>
					<?php
				$get_cats="select * from brands";
				$run_cats=mysqli_query($con,$get_cats);
				while ($row_cats=mysqli_fetch_array($run_cats)) {
					$brand_id=$row_cats['brand_id'];
					$brand_title=$row_cats['brand_title'];

					# code...
				
				echo "<option value='$brand_id'>$brand_title</a></li>";
				}
				?>
				</select></td>
		</tr>
		<tr><td>Product Image 1</td>
			<td><input type="file" name="product_img1"></td>
		</tr>
		<tr>
			<td>Product Image 2</td>
			<td><input type="file" name="product_img2"></td>
		</tr>

	<tr>
		<td>Product Image 3</td>
			<td><input type="file" name="product_img3"></td>
		</tr>
			<tr>
				<td>Product Price</td>
			<td><input type="text" name="product_price"></td>
		</tr>
			<tr>
				<td>Product Description</td>
			<td><textarea name="product_desc" rows="15" cols="30"></textarea></td>
		</tr>
			<tr>
				<td>Product Keywords</td>
			<td><input type="text" name="product_keywords" size="60"></td>
		</tr>
			<tr align="center" style="margin-top: 6px;">
			<td colspan="2" style="margin-top: 6px;"><input type="submit" value ="Insert Product" name="insert_product"></td>
		</tr>
</table></form></body>
</html>
<?php  
if(isset($_POST['insert_product'])){
	//text data variable
	
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_title=$_POST['product_title'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	$status='on';
	
	//image names
	$product_img1=$_FILES['product_img1']['name'];
		$product_img2=$_FILES['product_img2']['name'];
			$product_img3=$_FILES['product_img3']['name'];
			// image temp names
			$temp_name1=$_FILES['product_img1']['tmp_name'];
	$temp_name2=$_FILES['product_img2']['tmp_name'];
			$temp_name3=$_FILES['product_img3']['tmp_name'];
if($product_title=='' OR $product_cat=='' OR $product_brand='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1==''  ){
	echo "<script> alert('please fill all the fields')</script>";
	echo "<script>window.open('index.php?insert_product','_self')</script>";
exit();
}
else{
	//uploading images to its folders
	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img1");
	move_uploaded_file($temp_name3, "product_images/$product_img1");

			$insert_product="insert into products(date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values(NOW(),'$product_title','$product_img1','$product_img2','$product_img3',$product_price,'$product_desc','$status')";
			$run_product=mysqli_query($con,$insert_product);
		/*	$insert_product="insert into cart(ip_add,qty)values($	product_price,$product_keywords)";
			$run_product=mysqli_query($con,$insert_product);*/
			if($run_product){
				echo "<script> alert('product inserted successfully')</script>";
				echo "<script>window.open('index.php?insert_product','_self')</script>";
			}

} }

?>  
<?php } ?>