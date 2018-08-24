<?php 
include("includes/db.php");



if (isset($_GET['edit_cat'])) {	
	# code...
	$cat_title=$_GET['edit_cat'];
	$insert_cat="select * from  categories where cat_id='$cat_title'";	
	$run_cat=mysqli_query($con,$insert_cat);
	$row_edit=mysqli_fetch_array($run_cat);
	$cat_edit_id=$row_edit['cat_id'];
	$cat_title=$row_edit['cat_title'];

}
		


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
	
	<b>Edit This Category</b>
	<input type="text" name="cat_title1" value="<?php echo $cat_title; ?>" />
	<input type="submit" name="update_cat1" value="Update Category">
</form>

</body>
</html>
<?php
if (isset($_POST['update_cat1'])) {
	# code...
	$cat_title123=$_POST['cat_title1'];
$update_cat="update categories set cat_title='$cat_title123' where cat_id='$cat_edit_id'";
$run_update=mysqli_query($con,$update_cat);
if ($run_update) {
	# code...
	echo "<script>alert('Category has been updated')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>