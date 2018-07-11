<?php 
session_start();
?>
<html>
	<head>
		<title>Orders</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
	</head>
	<body style="background-image: url('bg_main.jpg');">
<?php 
if(isset($_SESSION['id'])){
	
}
else {
	header("Location: login.php");
}?>
	<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> Previous Order Details </h3>
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
?><div class="col-md-6">
<h2>Your Orders:</h2>
	
<?php	
$load_users = "select * from billing_info where customer_id=".$_SESSION['id']."";
$res_data = mysqli_query($con,$load_users);
if($res_data->num_rows<1){
	echo "<h1>SORRY,NO ORDERS MADE YET.</h1><br><hr>";
}
?>	
		<table border='1' style='width:100%';  text-align:'centre'; padding:1px ;border-collapse:collapse' >
					<tr>
					<th >OrderID</th>
					<th >Contact Number</th>
					<th >Billing Address</th>
					<th >Name on reciept</th>
					<th >Order Time</th>
					<th >Items Ordered</th>
					</tr>
				  
<?php
		while($row= mysqli_fetch_array($res_data)) {
					echo "
				
<tr>
							<td>".$row['billing_id']."</td>
								<td>".$row['customer_contact']."</td>
								<td>".$row['billing_address']."</td>
								<td>".$row['customer_name']."</td>
								<td>".$row['billing_time']."</td>
								<td>".$row['items']."</td>
						</tr>
	
					";
			}
		
?>

	
</table>
<br><hr>
<button type="button" class="btn btn-danger" onclick="document.location.href='personal_info.php'">Back To Portal</button>

<button type="button" class="btn btn-success" onclick="document.location.href='view_products.php'">Buy More</button>
</body>
</html>