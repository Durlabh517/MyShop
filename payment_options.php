

<!DOCTYPE html>
<html>
<head>
	<title>Payment Options</title>
</head>
<body>
<?php
include("includes/db.php");
include_once("functions/functions.php");

?>
<div align="center " style="padding: 20px;">
	<h2>Payment Options	 for you </h2>
	<?php 
	$ip= getRealIpAddr();
	$get_customer="select * from customers where customer_ip ='$ip'";
	$run_customer=mysqli_query($con,$get_customer);
	$customer=mysqli_fetch_array($run_customer);
	$customer_id=$customer['customer_id'];
	$ip_add=getRealIPAddr();
	global $db;
	$total=0;
	$sel_price="select * from  cart where  ip_add='$ip_add'";
	$run_price=mysqli_query($db,$sel_price);
	$status='Pending';
	$invoice_no=mt_rand();
	$i=0;
	$count_pro=mysqli_num_rows($run_price);

	while ($record=mysqli_fetch_array($run_price)) {
		$pro_id=$record['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($db,$pro_price);
		while ($p_price=mysqli_fetch_array($run_pro_price)) {
			# code...
			$product_name=$p_price['product_title'];
			$product_price= array($p_price['product_price']);
			$values= array_sum($product_price);
			$total+=$values;
			$i++;
		}
	}



//Getting Quantity from the cart
$get_cart="select * from cart where ip_add='$ip_add'";

$run_cart=mysqli_query($con,$get_cart);
$get_qty=mysqli_fetch_array($run_cart);
$qty=$get_qty['qty'];
if ($qty==0) {
	$qty=1;
	$sub_total=$total;
}else{
$qty=$qty;
$sub_total=$total*$qty;
}

	?>
</div>
<br><div align="center">
<br><br>

	<h3>Pay with</h3>&nbsp;
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="rakeshshahi517-facilitator@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
  <input type="hidden" name="amount" value="<?php echo $sub_total;?>">
  <input type="hidden" name="currency_code" value="USD">
  <!--Return and cancel urls
  	<input type ="hidden" name ="return" value="http://www.myshop.com/paypal_success.php"> -->
  	<input type ="hidden" name="cancel_return" value="localhost/myshop">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://csceducation.com/wp-content/uploads/2017/12/PayPal-Pay-Now-Button.jpg"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">

</form></b> <br><b><b>Or<br><br>
	
	<tr></tr><a href="order.php?c_id=	<?php echo $customer_id; ?> ">Pay offline</a></b><br><br><!-- 
<b>If you selected "Pay offline" option then please check your email or account to find the Invoice No for your oder</b> -->
</div>
</body>
</html>
