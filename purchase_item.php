<?php
 session_start();
?>
<html>
	<head>
		<title> Add to cart</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="profile_image.css">
		<script src="modal_image.js"></script>
	
	</head>
	<body style="background-image: url(background.png); color: white  ">
	<?php
	if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
		if(isset($_POST['result'])) {
	    $item_id = $_POST['result'];
		echo" $item_id";
		}
		else 
			echo "not set";
		
		
	?>	
<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3>  </h3>
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
?>
	</body>
<html>