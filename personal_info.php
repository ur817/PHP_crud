<?php
	session_start();
?>
<html>	
<head>
	<title>Personal Information</title>
	<link rel="stylesheet" href="bootstrap.css">
	<script src="jquery.js"></script>
	<link rel="stylesheet" href="profile_image.css">
	<script src="modal_image.js"></script>
</head>
<body >
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
				<h3> Profile </h3>
			</span>
</nav>
<br>

 <form name='edit_form' action='update.php' method='post' >
		<div class='col-sm-6'>
		";
$imageName = $_SESSION['id'];
echo "

<img  id='myImg' src ='uploads/".$imageName.".jpg' alt='profile picture'style='width =200px height=200px'>

<div id='myModal' class='modal'>
  <span class='close'>&times;</span>
  <img class='modal-content' id='img01' src=''>
  <div id='caption'></div>
</div>

<hr>
		<table border='1' style='width:100%';  text-align:'centre'; padding:1px ;border-collapse:collapse' >
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
<hr>
<button style='padding: 10px margin: 10px'class='btn btn-primary' type='button' id='product_btn' onClick=document.location.href='products_register.php'>Add products</button>
<button style='padding: 10px margin: 10px'class='btn btn-success'  type='button' id='view_product_btn' onClick=document.location.href='view_products.php'>Purchase Products</button>
<br><hr>

</div>
</div>
<form name='update_form' method='post' action='update.php'>
		<div class='col-sm-6'>
		<h4> Enter new details here! </h4>
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

				
			<input class='btn btn-success'type='submit' name='submit' value='Update'> 
			<button class='btn btn-danger' type='button' name='back' onClick=document.location.href='home.php'>Back</button>
			
		</div>
		
	
			
		
			
		</form>
			
";
?>
</body>
</html>