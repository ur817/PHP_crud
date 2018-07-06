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
		<script src="add_to_cart.js"></script>
		
	</head>
	<body>
	<?php
	if ($_SESSION['id']) {
			
		}else {
			header("Location:login.php");
		}
		
		$product_id=$_SERVER['QUERY_STRING'];	
	?>	
	
	

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
$sql="select * from product_info where product_id=$product_id";
$res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
			$product_id =$row['product_id'];
			$product_name=$row['product_name'];
			$product_price=$row['product_price'];
		$product_desc = $row['product_desc'];}
?>
<div class="jumbotron " style="color:white; background-color: black" >
  <h1 class="display-4" id="product_name"><?php  echo $product_name; ?></h1>
  <p class="lead"><?php  echo $product_desc; ?></p>
  </div>
  
  <br> <h4> Product Images</h4>
  <img  id='myImg' src ="uploads/products/<?php echo $product_id;?>.jpg" alt='product picture'style='width =300px height=300px padding:50px left' >
  <div id='myModal' class='modal'>
  <span class='close'>&times;</span>
  <img class='modal-content' id='img01' src=''>
  <div id='caption'></div>
</div>

  <br>
  <hr>
  <form method="post" action="">
  <h4> Price:<?php echo $product_price;?></h4>
  <label for ="item_quantity">Quantity		</label><input type="text" style="color:black padding:50px left'"class="my-4" id="item_quantity">
	<button class="btn btn-primary btn-sm" type="button" onclick=" addQuantity(<?php echo $product_price;?>);"> add quantity</button>
	
	<p class="lead"style="padding:50px left">
    <label for="total_price">Total</label><input type="text" style="color:black padding:50px left'"class="my-4" id="total_price" >
	
	<button style="margin:5px"class="btn btn-info btn-lg"  type ="submit" id='to_cart' name ="submit">Add to Cart</button>
	<a style="margin:5px"class="btn btn-danger btn-lg" href="view_products.php" role="button">Cancel</a>
	
  </p>
  </form>
<script> function addQuantity(price) {
			var total =$("#item_quantity").val()* price;
			$("#total_price").val(total);
			
		}</script>
<p id="suc"></p>	
</body>
</html>
