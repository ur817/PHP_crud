$(document).ready(function(){
	$("#load").click(function(){
		
		loadMoreClients();
	});
	});
	
function loadMoreClients() {
	var vall = $("#result_number").val();
	
	$.ajax({
		type: 'post',
		url: 'fetch.php',
		data: {
		getresult:vall
		},
		success: function (response) {
		$("#result_para").append(response);

  //  increasing the value by 5 because we limit the results by 5
      $("#result_number").val(Number(vall)+5); 
 }
})

}	