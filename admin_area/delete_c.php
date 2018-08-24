<?php
include("includes/db.php");
if(isset($_GET['delete_c'])){
	# code...

	$delete_id=$_GET['delete_c'];
	$delete_pro="delete from customers where customer_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_pro);
	if($run_delete){
		echo "<script>alert('One Customer has been deleted!')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";
		# code...	
	}
}

?>