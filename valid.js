function loginData(){
    var _email = $('#email').val();
	var _password = $('#pwd').val();
	
	$.ajax({
		type:"POST",
		url :"login.php",
		data:  "{'email': +_email+ 'password': +_password}",
		contentType: "application/json",
		dataType: "json",
		success: function (response) {
			var res = response.d;
			
		}
	})

}


	



