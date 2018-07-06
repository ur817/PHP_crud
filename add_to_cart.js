$(document).ready(function(){
	$("#to_cart").click(function(){
		alert("clicked it!");
		$.ajax({
			url:'purchase_item.php',
			
			data:{q:"set"},
			type:'POST',
			success:function(){
				alert("reached ajax");
			}
		})
	});
});
