$(function(){
	  $(".viewmore").click(function() {
		  alert("button clicked!");
		var btnClickVal = $(this).val();
		  alert("val" + btnClickVal);
		var ajaxUrl = 'ajax.php',
		data = {'action' : btnClickVal};
		$.post(ajaxUrl,data, function(response) {
			alert('Client List loaded..');
		});
	});
});
function userData(){
	alert('rajesh ');
}