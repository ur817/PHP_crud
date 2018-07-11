<?php 
session_start();
?>

<html>
	<head>
		<title>Orders page</title>
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
				<h1> Orders </h1>
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
$sql ="select * from billing_info";
$result = mysqli_query($con,$sql);
?><div class="col-md-8">
<table border='1'class="table" id="user_table">
					<thead>
					 <tr>
					<th scope="col">Bill ID</th>
					<th scope="col">Billing Address</th>
					<th scope="col">Name on Reciept</th>
					<th scope="col">Billing Time</th>
					<th scope="col">Contact Number</th>
					<th scope= "col">Customer ID</th>
					</tr>
				  </thead>
				  <tbody>
<?php				  
while($row=mysqli_fetch_array($result)){
			echo "<tr>
							<th scope='row'>".$row['billing_id']."</th>
								<td>".$row['billing_address']."</td>
								<td>".$row['customer_name']."</td>
								<td>".$row['billing_time']."</td>
								<td>".$row['customer_contact']."</td>
								<td>".$row['customer_id']."</td>
						</tr>
						";
}

?></tbody></table>

<button type="button" class="btn btn-danger" onclick="document.location.href='admin_home.php'">Back</button>
</div>
</body>
</html>
