
<?php
	session_start();
?>
<html>

	<head>
		<title>Registration Page</title>
			<link rel="stylesheet" href="bootstrap.css">
			<script src="jquery.js"></script>
			<script src="image_validate.js"></script>
		
	</head>
	<body style="background-image: url('bg_main.jpg');">
	<nav class="navbar navbar-light bg-light">
			<span class="navbar-text">
				<h3> REGISTRATION PAGE</h3>
			</span>
		</nav>
		<?php
		if(isset($_POST['submit'])) {
		$name = $_FILES['img']['name'];
		$typ= $_FILES['img']['type'];
		$imageData = file_get_contents($_FILES['img']['tmp_name']);
		$_SESSION['image'] = $imageData;
		}
		?>
	
	
		<form name="signup_form" enctype="multipart/form-data" action="register.php" method="post" >
		<div class="form-group row">
				<label  for="username" class="col-sm-2 col-form-label">Name </label>
				<div class="col-sm-6">
				<input class="form-control" type="text" id="username" name="username" placeholder="enter name" >
			</div>
			</div>
		<div class="form-group row">
				<label  for="streetaddress" class="col-sm-2 col-form-label">Street Address </label>
				<div class="col-sm-6">
				<input class="form-control" type="text" id="streetaddress" name="streetaddress" placeholder="enter street address" >
			</div>
			</div>	
		<div class="form-group row">
				<label  for="city" class="col-sm-2 col-form-label">City </label>
				<div class="col-sm-6">
				<input class="form-control" type="text" id="city" name="city" placeholder="enter city" >
			</div>
			</div>	
		<div class="form-group row">
				<label  for="email" class="col-sm-2 col-form-label">Email </label>
				<div class="col-sm-6">
				<input class="form-control" type="email" id="email" name="email" placeholder="enter email" >
			</div>
			</div>	
		<div class="form-group row">
				<label  for="pwd" class="col-sm-2 col-form-label">Password </label>
				<div class="col-sm-6">
				<input class="form-control" type="password" id="pwd" name="pwd" placeholder="enter password" >
			</div>
			</div>	
		<div class="form-group row">
				<label  for="img" class="col-sm-2 col-form-label">Image </label>
				<div class="col-sm-6">
				<input class="form-control " type="file" name="img"  >
			</div>
			</div>		
			
			
			<input class="btn btn-success"type="submit"  id= "submit" name="submit" value="submit" > 
			<button class="btn btn-danger"type="button" onClick="document.location.href='login.php'">Cancel</button>
		
			
		</form>
			
	
		
		
	</body>
</html>