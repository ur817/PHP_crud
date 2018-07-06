<?php
	session_start();
?>
<html>
	<head>
		<title> Product Registration Page</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="profile_image.css">
		<script src="modal_image.js"></script>
	</head>
	<body>
	<?php
	if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
	?>	
<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> Products Registration </h3>
			</span>
</nav>
<br>

<form name="product_form"enctype="multipart/form-data" action="products.php" method="post" >
		<div class='form-group row'>
				<label  for='productname' class='col-sm-2 col-form-label'>Product Name </label>
				<div class='col-sm-6'>
				<input class='form-control' type='text' id='productname' name='productname' placeholder='enter product name' >
			</div>
			</div>
		<div class='form-group row'>
				<label  for='productdesc' class='col-sm-2 col-form-label'>Product Description </label>
				<div class='col-sm-6'>
				<input class='form-control' type='text' id='productdesc' name='productdesc' placeholder='enter description' >
			</div>
			</div>	
		<div class='form-group row'>
				<label  for='productprice' class='col-sm-2 col-form-label'>Product Price </label>
				<div class='col-sm-6'>
				<input class='form-control' type='text' id='productprice' name='productprice' placeholder='enter price' >
			</div>
			</div>	
		<div class='form-group row'>
				<label  for='productimg' class='col-sm-2 col-form-label'>Product Image </label>
				<div class='col-sm-6'>
				<input class='form-control' type='file' name='productimg' id='productimg' >
			</div>
			</div>		
			
	
			<input class="btn btn-success"type="submit"  id= "submit" name="submit" value="submit" > 
			<button class="btn btn-danger" type="button"  name ="goBackToPersonal" onClick="document.location.href='personal_info.php'">Cancel</button>
		</form>
	</body>
	</html>	