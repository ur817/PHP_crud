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
if (isset($_POST['customername'])) {
$custo_name = $_POST['customername'];
$custo_address = $_POST['customeraddress'];
$custo_contact = $_POST['customercontact'];
$custo_id = $_SESSION['id'];
$item_list="";
$items_length = count($_SESSION['cart_items']);
for($i=0;$i<$items_length;$i++){
	$item_list.=$i+1;
	$item_list.=".Name->";
	$item_list.=$_SESSION['cart_items'][$i];
	$item_list.=",";
	$item_list.="Quantity->";
	$item_list.=$_SESSION['cart_number'][$i];
	$item_list.=",";
	$item_list.="Total Price:->";
	$item_list.=$_SESSION['cart_price'][$i];
	$item_list.=" .";
	
	
}
echo "$item_list";
$sql ="insert into billing_info(customer_name,billing_address,customer_contact,customer_id,items) values('$custo_name','$custo_address','$custo_contact','$custo_id','$item_list')";
if($con->query($sql) ==TRUE){
	
	$_SESSION['billmsg'] ="Billing was successfull";
	unset($_SESSION['cart_items']);
	unset($_SESSION['cart_price']);
	
	unset($_SESSION['cart_number']);
	
	header("Location: personal_info.php");
}

}






?>