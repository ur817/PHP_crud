<?php 
session_start();
?>

<html>
	<head>
		<title> View Products</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="profile_image.css">
		<script src="modal_image.js"></script>
		

	</head>
	<body style="background-image: url('bg_main.jpg');">
	<?php
	if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
	?>	
<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> Billing Page </h3>
			</span>
</nav>
<br>
<?php 
//setting up connection
				$host="localhost";
				$user="root";
				$password="";
				$dbname="info_gathering";
			
				$con=new mysqli($host,$user,$password,$dbname);
				// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?><?php
if(isset($_SESSION['cart_price'])){
$size= count($_SESSION['cart_price']);
$total_bill=0;
for ($x=0; $x<$size; $x++) {
	$total_bill=$total_bill+ $_SESSION['cart_price'][$x];
}
echo "<h3> Total Bill : Rs".$total_bill." </br>";

}
	else {header("Location: view_products.php");}


?>		
<?php 
	
	if(isset($_SESSION['cart_items'])) {
		echo "<div class='col-md-8'>
		<h3>Your Cart:</h3>
		<table border='1' style='width:100%';  text-align:'centre'; padding:1px ;border-collapse:collapse' >
  <tr>
    <th><h4><strong>Item<strong></h4></th>
    <th><h4><strong>Quantity</strong></h4></th> 
    <th><h4><strong>Price<strong></h4></th>
  </tr>
";  
		$items_length = count($_SESSION['cart_items']);
		for($x = 0; $x < $items_length; $x++) {
			echo "<tr>
    <td>".$_SESSION['cart_items'][$x]."</td>
    <td>".$_SESSION['cart_number'][$x]."</td> 
    <td>".$_SESSION['cart_price'][$x]."</td>
  </tr>
	";
	
		}
	echo"</table> <br> <hr> ";	
	
	}
	
?>
<form id ="billing_form" action="billing.php"  method="post">
<div class='form-group row'>
	<label  for='customername' class='col-sm-2 col-form-label'>Full Name </label>
	<div class='col-sm-6'>
		<input class='form-control' type='text' id='customername' name='customername' placeholder='enter your name' >
	</div>
</div>
<div class='form-group row'>
	<label  for='customeraddress' class='col-sm-2 col-form-label'>Shipping address </label>
	<div class='col-sm-6'>
	<input class='form-control' type='text' id='customeraddress' name='customeraddress' placeholder='enter shipping address here' >
	</div>
</div>
<div class='form-group row'>
	<label  for='customercontact' class='col-sm-2 col-form-label'>Phone Number </label>
	<div class='col-sm-6'>
	<input class='form-control' type='text' id='customercontact' name='customercontact' placeholder='enter phone number' >
	</div>
</div>
<button type="submit" class="btn btn-info" name="bill" id="bill">Purchase</button>


</form>


	
