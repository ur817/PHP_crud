<?php
	session_start();
?>
<html>	
<head>
	<title>Personal Information</title>
	<link rel="stylesheet" href="bootstrap.css">
	<script src="jquery.js"></script>
</head>
<body>
<?php
if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
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
$sql="select * from customer where id =" .$_SESSION['id'];
$result=$con->query($sql);
if($result->num_rows>0) {
	while($row = $result->fetch_assoc()) {
		$fullName= $row["user_name"];
		$address=$row["street_address"];
		$city=$row["city_name"];
		
		$_SESSION["name"] = "$fullName";
		$_SESSION["address"] = "$address";
		$_SESSION["city"]="$city";
						}
} else 

{
	echo"no result fetched";
}

echo "
<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> PERSONAL INFORMATION</h3>
			</span>
</nav>
 <form name='edit_form' action='update.php' method='post' >
		<div class='col-sm-6'>
		<table style='width:100%' border='1' >
  <tr>
    <th><h4><strong>Name<strong></h4></th>
    <th><h4><strong> Street Address </strong></h4></th> 
    <th><h4><strong> City <strong></h4></th>
  </tr>
  <tr>
    <td>".$_SESSION['name']."</td>
    <td>".$_SESSION['address']."</td> 
    <td>".$_SESSION['city']."</td>
  </tr>
</table>
		</div>
		<div class='col-sm-6'>
		<div class='form-group row '>
				<label  for='username' class='col-sm-4 col-form-label'>Name </label>
				<div class='col-sm-8'>
				<input class='form-control' type='text' id='username' name='username' >
			</div>
			</div>
			
		<div class='form-group row '>
				<label  for='streetaddress' class='col-sm-4 col-form-label'>Street Address </label>
				<div class='col-sm-8'>
				<input class='form-control' type='text' id='streetaddress' name='streetaddress'  >
			</div>
			</div>	
		<div class='form-group row'>
				<label  for='city' class='col-sm-4 col-form-label'>City </label>
				<div class='col-sm-8'>
				<input class='form-control' type='text' id='city' name='city' >
			</div>
			</div>

			
		</div>
		
	
			
			<input class='btn btn-success'type='submit' name='submit' value='Update'> 
			<button class='btn btn-danger' type='button' name='back' onClick=document.location.href='home.php'>Back</button>
			
		
			
		</form>
			
";
?>
</body>
</html>