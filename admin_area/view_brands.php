<?php
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
		tr,th{
			border:3px groove #000;
		}
	</style>
</head>
<body>
<table width="713" align="center" bgcolor="#FFCCCC" border="2">
	<tr align="center">
		<td colspan="3"><h2>View All Brands</h2></td>
	</tr>
	<tr align=" center">
		<th>Brand ID</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
		
	</tr>
	<?php
	include("includes/db.php");
	$get_cats="select * from Brands";
	$run_cats=mysqli_query($con,$get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats) ){
		# code...
		$cat_id=$row_cats['brand_id'];
        $cat_title=$row_cats['brand_title'];
	
	?>
	<tr align="center">
		<td><?php echo $cat_id; ?></td>
		<td><?php echo $cat_title; ?></td>
		<td><a href="index.php?edit_brand=<?php echo $cat_id; ?>">Edit</a></td>
		<td><a href="index.php?delete_brand=<?php echo $cat_id; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
<?php } ?>