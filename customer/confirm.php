<?php
session_start();
include("includes/db.php");
if (isset($_GET['order_id'])) {
	$order_id=$_GET['order_id'];
	$due_amount=$_GET['due_amount'];
	$invoice_no=$_GET['invoice_no'];

	
?>
      <?php } ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#000000">
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
	<table width="500" align="center" border="2" bgcolor="#CCCCCC">
		<tr align="center">
			<td colspan="5"><h2> Please confirm your Payment</h2></td>
		</tr>
		<tr>
			<td>Invoice No:</td>
			<td> <input type=" text" name="invoice_no" value="<?php echo "$order_id";?>"></td>
		</tr>
			<tr>
			<td>Amount Sent:</td>
			<td> <input type=" text" name="amount" value="<?php echo "$due_amount";?>"></td>
		</tr>
		<tr>
			<td>Select Payment Mode:
			</td>
			<td>
				<select name="payment_method">
					<option>Select Payment</option>
						<option>Bank Transfer</option>
						<!-- <option>Paypal</option> -->
						<option>Payment on Delivery</option>
				</select>
			</td>
			
		</tr>
			<tr><td>Transaction ID:</td>
			<td> <input type=" text" name="trd"></td>
		</tr>
		<!-- <tr><td>Paypal code:</td>
			<td> <input type=" text" name="codee"></td>
		</tr> -->
		<tr>
			<td>	Payment Date:</td>
			<td><input type="text" name="date"></td>
		</tr>
			<tr align="center">
			<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>
			
		</tr>
	</table>
</form>
</body>
</html>
<?php  

if(isset($_POST['confirm'])){
	$update_id=$_GET['update_id'];
	$invoice=$_POST['invoice_no'];
	$amount=$_POST['amount'];
	$payment_method=$_POST['payment_method'];
	$ref_no=$_POST['trd'];
	$code=$_POST['codee'];
	$date=$_POST['date'];
	$complete='Complete';
	$insert_payment="insert into payments(invoice_no,amount,payment_method,ref_no,code,payment_date) values ('$invoice','$amount','$payment_method','$ref_no','$code','$date')";
	$run_payment=mysqli_query($con,$insert_payment);
	

	$update_order="update customer_orders set 	order_status='Complete' where order_id ='$update_id'";
	$run_order=mysqli_query($con,$update_order);
	$update_pending_orders="update pending_orders set order_status=	'$complete' where order_id='$update_id'";
	$run_pending_orders=mysqli_query($con,$update_pending_orders);
	if ($run_payment) {
		echo "<script><h2 style='color:white;'>Payment received ,your order will be completed within 24 hours</h2><script>";
	}
	

}
?>