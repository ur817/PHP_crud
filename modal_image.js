$(document).ready(function(){

$("#myImg").click(function(){
    $("#myModal").css("display","block");
	var newsrc = this.src;
    $('#img01[src=""]').attr('src',newsrc);
    $("#caption").innerHTML = this.alt;
});


 $(".close").click(function() { 
 
    $("#myModal").css("display","none");
});

$("#productclose").click(function() { 
 
    $("#addProduct").css("display","none");
});
$("#product_btn").click(function(){
	$("#addProduct").css("display","block");
});
$("#bill").click(function(){
	$("#myModal").css("display","block");
});

});
