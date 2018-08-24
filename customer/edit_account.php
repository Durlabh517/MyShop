<?php

include("includes/db.php");
if (isset($_GET['edit_account'])) {
	# code...
	$customer_email=$_SESSION['customer_email'];
	$get_customer="select * from customers where customer_email='$customer_email'";
	$run_customer=	mysqli_query($con,$get_customer);
	$row=mysqli_fetch_array($run_customer);
	$id=$row['customer_id'];
	$name=$row['customer_name'];
	$email=$row['customer_email'];

$pass=$row['customer_pass'];

$country=$row['customer_country'];

$city=$row['customer_city'];
$contact=$row['customer_contact'];
$address=$row['customer_address'];
$image=$row['customer_image'];


}
?>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="600">
		<tr>
			<td colspan="8" align="center"><h2>Update your account</h2></td>
		</tr>
		<tr>
			<td align="right"><h2>Customer Name:</h2></td>
			<td><input type="text"  name="c_name" value="<?php echo $name; ?>"></td>
		</tr>
		<tr>
			<td align="right"><h2>Customer Email:</h2></td>
			<td><input type="text"  name="c_email" value="<?php echo $email; ?>"></td>
		</tr>
		<tr>
			<td align="right"><h2>Customer Password:</h2></td>
		<td><input type="password"  name="c_pass" value="<?php echo $pass; ?>"></td>
		</tr>
		<tr>
			<td align="right"><h2>Customer Country:</h2></td>
			<td><select name="customer_country"   disabled>
				<option value="<?php echo $country; ?>"><?php echo $country;?> </option>
				<option>Afganistan</option>
			<option>Pakistan</option>
			<option>India</option>
			<option>Iran</option>
			<option>United States</option>
			<option>Saudi Arabia</option>
			<option>United Arab Emirates</option>
			<option>Japan </option>
			<option>Israel</option></select></td>
		</tr>
		<tr>
			<td align="right"><h2>Customer City:</h2></td>
			<td><input type="text"  name="c_city" value="<?php echo $city; ?>"></td>
		</tr>
			<tr>
			<td align="right"><h2>Customer Contact:</h2></td>
			<td><input type="text"  name="c_contact" value="<?php echo $contact; ?>"></td>
		</tr>
			<tr>
			<td align="right"><h2>Customer Address:</h2></td>
			<td><input type="text"  name="c_address" value="<?php echo $address; ?>"></td>
		</tr>
			<tr>
			<td align="right"><h2>Customer Image:</h2></td>
			<td><input type="file"  name="c_image" size="60"><img src="customer_photos/<?php echo $image;?>" width="60" height="60"></td>
		</tr>
			<tr>
			<td align="center" colspan="8"><h2><input type="submit"  name="update_account" value="Update Now"></td>
		</tr>
	</table>
</form>
<?php 
if (isset($_POST['update_account'])) {
	# code...
	$update_id=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
		$c_city=$_POST['c_city'];
		$c_contact=$_POST['c_city'];
		$c_address=$_POST['c_contact'];
		$c_address=$_POST['c_address'];
		$c_image=$_FILES['c_image']['name'];
		$c_image_tmp=$_FILES['c_image']['tmp_name'];
		move_uploaded_file($c_image_tmp, "customer_photos/$c_image");


		$update_c="update customers set customer_name='$c_name', customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";
		$run_c=mysqli_query($con,$update_c);
		if ($run_c) {
			# code...
			echo "<script>alert('Your account has been updated!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		}

}
?>