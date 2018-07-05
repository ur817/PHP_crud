		$(".purchase").click(function(){
	 var id= this.id;
	 onAdd(id);
	});
	



function onAdd(id){
	var itemid=id;
	
	$.ajax({
		type:"POST",
		url:"purchase_item.php",
		data: {
			'result':'itemid'
		},
		contentType: "application/json",
		dataType: "json",
		success: function(response) {
		console.log("yes");	
		}
	})
}