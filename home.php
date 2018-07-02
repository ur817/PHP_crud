<?php
	session_start();
?>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src ="jquery.js"></script>
		<script src = "load_clients.js"></script>
		<link rel="stylesheet" href="home.css">
	</head>
	
	<body>
		<nav class="navbar navbar-light bg-light">
			<span class="navbar-text">
				<h3> CLIENT INFORMATION</h3>
			</span>
		</nav>
	
	    
		<?php
		if ($_SESSION['email']) {
			
		}else {
			header("Location:login.php");
		}
			
			$userEmail= $_SESSION["email"];
			$pwd = $_SESSION["password"];
			
		
		$host="localhost";
				$user="root";
				$password="";
				$dbname="info_gathering";
			
				$con=new mysqli($host,$user,$password,$dbname);
				// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


			
				$login_query= " select * from customer where email = '$userEmail' and password ='$pwd'";
				$result_login = $con->query($login_query);
	
	//query to find the required user		
			$sql= "select * from customer where email='$userEmail' and password='$pwd' ";
			$result_auth= $con->query($sql);
			$user = $result_auth->fetch_assoc();
	//fetching user id of required user. This is used to fetch the personal information of user later		
			
			
		
				$fullName="";  // name of the user as stored in database
				$address="";
				$city="";
				$userId="";
				$time="";
	
	//query to fetch personal information			
				$sql_personal_info= "select * from customer where email='$userEmail'";
				$result_info=$con->query($sql_personal_info);
				
				
				if($result_info->num_rows>0) {
					while($row=$result_info->fetch_assoc()) {
	//getting the personal information from database					
						$fullName= $row["user_name"];
						$address=$row["street_address"];
						$city=$row["city_name"];
						$userId=$row["id"];
						$time=$row["reg_time"];
						
						$_SESSION["name"] = "$fullName";
						$_SESSION["address"] = "$address";
						$_SESSION["city"]="$city";
						$_SESSION["id"]="$userId";
						$_SESSION["timestamp"]="$time";
						
						
					}
				}else {
					echo "Login was unsuccessful";	
				}
	
		?>
		<input class="btn btn-primary"type="submit" id="load" value="Load More Clients" >
		<button class="btn btn-success" type="button" id="home_to_personal" onClick="document.location.href='personal_info.php'">Edit Personal Info</button>	
		
		<br>
		<div id="content">
			<div id="result_para">
				<table class="table" id="client_table">
					<thead>
					 <tr>
					<th scope="col">ID</th>
					<th scope="col">NAME</th>
					<th scope="col">CONTACT</th>
					<th scope="col">MAIL</th>
					<th scope="col">COMPANY</th>
					</tr>
				  </thead>
				  <tbody id="client_table_body">
		<?php
			
			$sql_client ="select * from client_info ";
			$result_client = $con->query($sql_client);
			$ro= mysqli_num_rows($result_client);
			
			$sql2 = "select * from client_info limit 0,5";
			
			$result2= $con->query($sql2);
				while($row= mysqli_fetch_array($result2)) {
					echo "<tr>
							<th scope='row'>".$row['client_id']."</th>
								<td>".$row['client_name']."</td>
								<td>".$row['client_contact']."</td>
								<td>".$row['client_mail']."</td>
								<td>".$row['client_company']."</td>
						</tr>
						";
			}
			 	
		?>
						</tbody>
</table>
			
				<input type="hidden" id="result_number" value="5">			
					
			</div>
		</div>	
		
		
		<button class="btn btn-danger" type="button" id="home_to_login" onClick="document.location.href='logout.php'">Log out</button>
		
		
	</body>
</html>