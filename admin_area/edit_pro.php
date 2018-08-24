
<?php 
include("includes/db.php");
if (isset($_GET['edit_pro'])) {
	# code...
	$edit_id=$_GET['edit_pro'];
	$get_edit="select * from products where  product_id='$edit_id'";
$run_edit=mysqli_query($con, $get_edit);
$row_edit=mysqli_fetch_array($run_edit);
$update_id=$row_edit['product_id'];

$p_title=$row_edit['product_title'];
$cat_id =$row_edit['category_id'];
$brand_id=$row_edit['brand_id'];
$p_image1=$row_edit['product_img1'];
$p_image2=$row_edit['product_img2'];
$p_image3=$row_edit['product_img3'];
$product_price=$row_edit['product_price'];
$p_desc=$row_edit['product_desc'];
$product_keywords=$row_edit['product_keywords'];


}
$get_cat="select * from categories where cat_id='$cat_id'";
$run_cat=mysqli_query($con,$get_cat);
$cat_row=mysqli_fetch_array($run_cat);
$cat_edit_title=$cat_row['cat_title'];
$get_brand="select * from brands where brand_id='$brand_id'";
$run_brand=mysqli_query($con,$get_brand);
$brand_row=mysqli_fetch_array($run_brand);
$brand_edit_title=$brand_row['brand_title'];
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
<form method="post" action="" enctype="multipart/form-data">
	<table width="718" align="center"  bgcolor="#3399CC">
		<tr align="center">
			
			<td colspan="2"><h2>Update or Edit Product:</h2></td>
		</tr>
		<tr><td>Product Title</td>
		<td><input type="text" name="product_title" value="<?php echo $p_title; ?>"size="60"></td>
		</tr>
		<tr >
			<td>Product Category</td>
			<td>
				<select name="product_cat">
					<option value="<?php echo $cat_id; ?>" >
						<?php echo $cat_edit_title;?></option>
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
					<option value="<?php echo $brand; ?>"><?php echo $brand_edit_title;?></option>
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
			<td><input type="file" name="product_img1"/><img src="product_images/<?php echo $p_image1; ?>" width="60" height="60"/></td>
		</tr>
		<tr>
			<td>Product Image 2</td>
			<td><input type="file" name="product_img2"/><img src="product_images/<?php echo $p_image2;?>" width="60" height="60"/></td>
		</tr>

	<tr>
		<td>Product Image 3</td>
			<td><input type="file" name="product_img3"/><img src="product_images/<?php echo $p_image3;?>" width="60" height="60"/></td>
		</tr>
			<tr>
				<td>Product Price</td>
			<td><input type="text" name="product_price" value="<?php echo $product_price;?>"></td>
		</tr>
			<tr>
				<td>Product Description</td>
			<td><textarea name="product_desc" rows="6" cols="30"><?php echo $p_desc; ?></textarea></td>
		</tr>
			<tr>
				<td>Product Keywords</td>
			<td><input type="text" name="product_keywords" size="60" value="<?php echo $product_keywords; ?>"></td>
		</tr>
			<tr align="center" style="margin-top: 6px;">
			<td colspan="2" style="margin-top: 6px;"><input type="submit" value ="Update Product" name="update_product"></td>
		</tr>
</table></form></body>
</html>
<?php  
if(isset($_POST['update_product'])){
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
if($product_title=='' OR $product_cat=='' OR $product_brand='' OR $product_price=='' OR $product_desc==''   ){
	echo "<script> alert('please fill all the fields')</script>";
	echo "<script>window.open('index.php?insert_product','_self')</script>";
exit();
}
else{
	//uploading images to its folders
	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img1");
	move_uploaded_file($temp_name3, "product_images/$product_img1");

			$update_product="update products set category_id='$product_cat',brand_id='$product_brand',date=NOW(), product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords',status='$status' where product_id='$update_id'";
			$run_update=mysqli_query($con,$update_product);
		/*	$insert_product="insert into cart(ip_add,qty)values($	product_price,$product_keywords)";
			$run_product=mysqli_query($con,$insert_product);*/
			if($run_update){
				echo "<script> alert('product updated successfully')</script>";
				echo "<script>window.open('index.php?view_products','_self')</script>";
			}

} }

?>