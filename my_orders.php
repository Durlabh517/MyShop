<?php


include("includes/db.php");

//getting the customer ID
$c 	=$_SESSION['customer_email'];
$get_c="select * from customers where customer_email='$c'";
$run_c=mysqli_query($db,$get_c);
$row_c=mysqli_fetch_array($run_c);
$customer_id=$row_c['customer_id'];


?>
<center><h3>All Order Details:</h3></center>
<table width="100" align="center">
<tr>
	<th>Order no</th>
	<th>Due Amount</th>
	<th>Invoice no</th>
	<th>Total Products </th>
	<th>Order Date</th>
	<th>Paid/Unpaid</th>
	<th>Status</th>
	<th></th>
</tr>
 </table>