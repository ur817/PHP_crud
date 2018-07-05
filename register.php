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
			
 
         
        //    echo "Stored in: " . "uploads/" . $_FILES["img"]["name"];
          
        
      
			
					//inserting data into respective tables 
		    $sql= "select * from customer where email='$email' and password='$pwd' ";
			$result= $con->query($sql);
			if ($result->num_rows >0) {
			
				echo " A user with same credentials already exist, please choose another password" ;
				echo "<form action='signup.php'><button type='submit'>try again</button><form>";
				
			}else {
			
			$sql_customer= " insert into customer(user_name,street_address,city_name,email,password) values('$fullName','$address','$city','$email','$pwd')";
			
		   if($con->query($sql_customer)===TRUE) {
			   
			$sql2 = "select id from customer where email='$email'and password='$pwd' ";
			$result2 =  $con->query($sql2);
			if ($result2->num_rows>0) {
				while($row=$result2->fetch_assoc()) {
					$id = $row['id'];
					//$temp = explode(".", $_FILES["img"]["name"]);
					$newfilename = "".$id.".jpg";
					move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/" . $newfilename);
					
			}
			}else echo "unable to fetch the ID";
			
			   header('Location: '.$redirectUrl);
		   }
			}
	
			
		?>
		