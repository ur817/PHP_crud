$(document).ready(function(){
	$("#submit").click(function(){
		var image_name = $("#img").val();
		if(image_name== '') {
			alert("Please select an image");
			return false;
		}
		else {
			var extension = $("#img").val().split(".").pop().toLowerCase();
			if(jQuery.inArray(extension, ['jpg'])==-1) {
				alert("PLease select an image with jpg extension!");
				$("#img").val('');
				return false;
			}
		}
	});
});