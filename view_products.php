<?php
	session_start();
?>

<html>
	<head>
		<title> View Products</title>
		<link rel="stylesheet" href="bootstrap.css">
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="profile_image.css">
		<script src="modal_image.js"></script>
		

	</head>
	<body style="background-image: url('bg_main.jpg');">
	<?php
	if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
	?>	
<nav class='navbar navbar-light bg-light'>
			<span class='navbar-text'>
				<h3> Purchase Products </h3>
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
	
 if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 5;
        $offset = ($pageno-1) * $no_of_records_per_page;

		$total_pages_sql = "SELECT COUNT(*) FROM product_info";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
		echo "
		<div class='col-md-8'>
		<table border='1'class='table'>	<tr>
						<th><h4><strong>Product ID<strong></h4></th>
						<th><h4><strong> Product Name</strong></h4></th> 
						<th><h4><strong> Product Desc <strong></h4></th>
						<th><h4><strong> Product Image <strong></h4></th>
						<th><h4><strong> Product Price <strong></h4></th>
						<th></th>
				</tr>";	
		$sql = "SELECT * FROM product_info LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
			$product_id =$row['product_id'];
			$product_name=$row['product_name'];
			$product_price=$row['product_price'];
			$product_desc = $row['product_desc'];
		echo "
			
				<tr>
						<td>".$product_id."</td>
						<td>".$product_name."</td> 
						<td>".$product_desc."</td>
						<td><img  id='myImg' src ='uploads/products/".$product_id.".jpg' alt='product picture'style='width =100px height=100px'></td>
						<td>".$product_price."</td>		
						<td><a class =' btn btn-primary' type='button' href='purchase_item.php?".$product_id."'>Add to cart</button>	</td>
						</tr>
		
		";	
        }
		echo"</table> <br>";
		
		
		
?>  <ul class="pagination " style="color: black background-color: red">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> ">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Previous</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
		</ul>		<br>
	<a style="margin:5px"class="btn btn-danger " href="personal_info.php" role="button">Go Back</a>
		
	</div>
	<div class="col-md-4">
		<?php 
	
	if(isset($_SESSION['cart_items'])) {
		echo "
		<h3>Your Cart:</h3>
	<table border='1'class='table' ><tr>
    <th><h4><strong>Item<strong></h4></th>
    <th><h4><strong>Quantity</strong></h4></th> 
    <th><h4><strong>Price<strong></h4></th>
  </tr>
";  
		$items_length = count($_SESSION['cart_items']);
		for($x = 0; $x < $items_length; $x++) {
			echo "<tr>
    <td>".$_SESSION['cart_items'][$x]."</td>
    <td>".$_SESSION['cart_number'][$x]."</td> 
    <td>".$_SESSION['cart_price'][$x]."</td>
  </tr>
	";
	
		}
	echo"</table> <br> <hr>";	
	
	}
	
?>

<button class="btn btn-info" type="button" id="prod_checkout" onClick="document.location.href='checkout.php'">Check Out</button>

<button class="btn btn-danger" type="button" id="view_to_login" onClick="document.location.href='logout.php'">Log out</button>
		
	</div>

		
</body>
</html>	