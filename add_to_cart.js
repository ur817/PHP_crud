$(document).ready(function(){		
	$('#to_cart').click	(function(){
	event.preventDefault();	
	var cost = $("#total_price").val();
var item_name = $("#product_name").text();

var quant = $("#item_quantity").val();

		$.ajax({
			
			url:'new.php',
			type:'post',
			data: {'name': item_name,'cost': cost, 'quantity':quant},
			success:function(response){
				$("#succ").html("<p>Succesfully add to cart, Press Back to add more</p>");
			
		}});
				
			
			 
		});
	});



