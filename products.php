<?php
session_start();
?>
<?php
			$host="localhost";
			$user="root";
			$password="";
			$dbname="info_gathering";
			
			$con=new mysqli($host,$user,$password,$dbname);
		//data to be pushed into database
if(isset($_POST['submit'])) {
		$productName = $_POST['productname'];
$productDesc =$_POST['productdesc'];
$productPrice = $_POST['productprice'];

			
			$sql_product_insert= " insert into product_info(product_name,product_desc,product_price) values('$productName','$productDesc','$productPrice')";
			
		   if($con->query($sql_product_insert)===TRUE) {
			   
			$sql2 = "select product_id from product_info where product_name='$productName'and product_price='$productPrice' ";
			$result2 =  $con->query($sql2);
			if ($result2->num_rows>0) {
				while($row=$result2->fetch_assoc()) {
					$id = $row['product_id'];
					//$temp = explode(".", $_FILES["img"]["name"]);
					$newfilename = "".$id.".jpg";
					echo "$newfilename ";
					move_uploaded_file($_FILES["productimg"]["tmp_name"], "uploads/products/" . $newfilename);
					
					header('Location:admin_home.php');
						
			
			}
			}else echo "unable to fetch the ID";
			
		   }
		   else echo "unable to insert";
			
}
else echo "unable to connect";

?>