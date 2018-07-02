<?php
	session_start();
?>

<html> 
	<head>
		<title> Login Page </title>
		<link rel="stylesheet" href="bootstrap.css">
		
		
		<script src= "valid.js"></script>
		<script src="jquery.js"></script>
		<script src="form_validation.js""></script>
		
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
			<span class="navbar-text">
				<h3> Login Page</h3>
			</span>
		</nav>
	
	
		<form  name="login_form" action="" method="post" onSubmit = "return loginData();">
		
			<div class="form-group row">
				<label  for="email" class="col-sm-2 col-form-label">E-mail </label>
				<div class="col-sm-6">
				<input class="form-control" type="text" id="email" name="email" placeholder="enter your e-mail" >
			</div>
			</div>
		
			<div class="form-group row">
				<label  for ="pwd" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
				<input  class="form-control" type="password" id ="pwd" name="password" placeholder="enter your password">
			</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
			
			<button  class=" btn btn-success"type="submit" name="submit" value="submit">Log In</button>
			</div></div>
		</form>
		
	  
		<p><strong>If you don't have an account yet, please register first.</strong></p>
	    
		<button class ="button btn btn-primary" type="button" onClick="document.location.href='signup.php'">Sign Up</button>
		
		
		<?php
		
				if (isset($_POST['email'])) {
						$email = $_POST['email'];
						$pwd = $_POST['password'];
						$_SESSION["email"]="$email";
						$_SESSION["password"]="$pwd";
						
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


			
				$login_query= " select * from customer where email = '$email' and password ='$pwd'";
				$result_login = $con->query($login_query);
				
				if ($result_login->num_rows>0) {
	    	   
			     header("Location: home.php");
				}
				else {
					echo "<strong>Incorrect credentials.</strong>";
				}
				}
				
		?>
		</div>
		</div>
	</body>
</html>