<?php
	session_start();
?>

<?php
	$redirectUrl="personal_info.php";
	//setting up connection
			$host="localhost";
			$user="root";
			$password="";
			$dbname="info_gathering";
			
			$con=new mysqli($host,$user,$password,$dbname);
		//data to be pushed into database
		 
			$fullName= $_POST['username'];
			$address=$_POST['streetaddress'];
			$city=$_POST['city'];
			$user_id= $_SESSION['id'];
			
		$sql = "update customer set user_name= '$fullName', street_address = '$address' ,city_name = '$city' where id= $user_id ";
		$result=$con->query($sql);
		
		if($con->query($sql)===TRUE) {
				
				
				
			header('Location: '.$redirectUrl);
		   }	
		else {
			echo "error ";
		}   
?>