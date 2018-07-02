<?php
 session_start();
?>


<?php
	$host="localhost";
	$user="root";
	$password="";
	$dbname="info_gathering";
			
	$con=new mysqli($host,$user,$password,$dbname);
	// Check connection
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
else {

$no=$_POST['getresult'];
$sql2 = "select * from client_info limit $no,5";
$result2= $con->query($sql2);
echo"<table class='table' >
<thead>
					 <tr>
					<th scope='col'>ID</th>
					<th scope='col'>NAME</th>
					<th scope='col'>CONTACT</th>
					<th scope='col'>MAIL</th>
					<th scope='col'>COMPANY</th>
					</tr>
				  </thead>
				  <tbody >
";
				while($row= mysqli_fetch_array($result2)) {
					echo "					
						<tr>
							<th scope='row'>".$row['client_id']."</th>
								<td>".$row['client_name']."</td>
								<td>".$row['client_contact']."</td>
								<td>".$row['client_mail']."</td>
								<td>".$row['client_company']."</td>
						</tr>
				
				"
					;
		}		
}
			?>
			