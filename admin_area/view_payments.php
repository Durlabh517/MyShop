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
		th,tr{
			border: 3px groove #333;
		}
	</style>
</head>
<body>
<table width="715" align="center " bgcolor="#FFCC99" border="2">
	<tr align="center">
		<td colspan="6"><h2>View All Payments</h2></td>
	</tr>
	<tr align=" center">
		<th>Payment No</th>
	
		<th>Invoice No</th>
		<th>Amount Paid</th>
		<th>Payment Method</th>
		<th>Reference No</th>
		<th>Code</th>
		<th>Payment Date</th>
	</tr>
	<?php
	include("includes/db.php");
	$get_orders="select * from payments";
	$run_orders=mysqli_query($con,$get_orders);
	$i=0;
	while ($row_orders=mysqli_fetch_array($run_orders)) {
		# code...
		$order_id=$row_orders['payment_id'];
		$c_id=$row_orders['invoice_no'];
		$invoice=$row_orders['amount'];
		$p_id=$row_orders['payment_mode'];
		$qty=$row_orders['ref_no'];
		$status=$row_orders['code'];
			$rdate=$row_orders['payment_date'];
	
?>	
	<tr align="center">
		
		<td><?php echo $order_id;?></td>
		<td><?php 
		echo $c_id;
		?></td>
		<td><?php echo $invoice; ?></td>
			<td><?php echo $p_id; ?></td>
				<td><?php echo $qty; ?></td>
					
		
		<td><?php echo $status; ?></td>
		<td><?php  echo $rdate; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html><?php } ?>