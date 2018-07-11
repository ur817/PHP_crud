<?php
session_start();
?>
<?php 
	//echo "<pre>"; print_r($_POST); die;
	if (isset($_POST['name'])) {
		
		$_SESSION['cart_items'][] = $_POST['name'];
		$_SESSION['cart_price'][] = $_POST['cost'];
		$_SESSION['cart_number'][] = $_POST['quantity'];
	}
 
	
?>
