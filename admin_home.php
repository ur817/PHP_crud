<?php 
session_start();
?>
<html>
	<head>
		<title>Welcome admin</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
	</head>
	<body style="background-image: url('bg_main.jpg');">
<?php 
if(isset($_SESSION['admin'])){
	
}
else {
	header("Location: login.php");
}?>
	<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> Welcome Admin! </h3>
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
<h2>Users registered:</h2>
<table border='1'class="table" >
			 <tr>
					<th >ID</th>
					<th >Name</th>
					<th >Street Address</th>
					<th >City</th>
					<th >Registration@</th>
					<th scope= "col">Email</th>
					</tr>
				  
	
<?php	
$load_users = "select * from customer";
$res_data = mysqli_query($con,$load_users);
		while($row= mysqli_fetch_array($res_data)) {
					echo "<tr>
							<td>".$row['id']."</td>
								<td scope='col'>".$row['user_name']."</td>
								<td>".$row['street_address']."</td>
								<td>".$row['city_name']."</td>
								<td>".$row['reg_time']."</td>
								<td>".$row['email']."</td>
						</tr>
						";
			}
		
?>

</table><hr><br>
<button class="btn btn-info" type="button" onClick="document.location.href='orders.php'">See Orders</button>
<button class="btn btn-danger" type="button" id="view_to_login" onClick="document.location.href='logout.php'">Log out</button>
		
</div>
<div class="col-md-6">

<h2>Products Available:</h2>

		<table border='1'class="table" >
					 <tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					</tr>
				  

<?php 
	$load_products = "select * from product_info";
	$res_prods = mysqli_query($con,$load_products);
	while ($row = mysqli_fetch_array($res_prods)) {
					echo "<tr>
							<td>".$row['product_id']."</td>
								<td>".$row['product_name']."</td>
								<td>".$row['product_desc']."</td>
								<td>".$row['product_price']."</td>
								
							</tr>
						";
		
	}
?>

</table>
<hr> <br>
<button style='padding: 10px margin: 10px'class='btn btn-primary' type='button' id='product_btn' onClick=document.location.href='products_register.php'>Add products</button>

</div>



	</body>
</html>