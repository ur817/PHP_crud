<?php
	session_start();
?>
<?php
			$_SESSION['registration_complete']="Registration Completed, Please sign in.";
            $redirectUrl="login.php";
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
			$email=$_POST['email'];
			$pwd=$_POST['pwd'];
			
		//inserting data into respective tables 
		    $sql= "select * from customer where email='$email' and password='$pwd' ";
			$result= $con->query($sql);
			if ($result->num_rows >0) {
			
				echo " A user with same credentials already exist, please choose another password" ;
				echo "<form action='signup.php'><button type='submit'>try again</button><form>";
				
			}else {
			
			$sql_customer= " insert into customer(user_name,street_address,city_name,email,password) values('$fullName','$address','$city','$email','$pwd')";
			
		   if($con->query($sql_customer)===TRUE) {
			   header('Location: '.$redirectUrl);
		   }
			}
	
			
		?>
		