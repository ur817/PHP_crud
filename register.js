function registerUsers() {
	var _email = $('#email').val();
	var _password = $('#pwd').val();
	var _username = $('#username').val();
	var _address = $('#streetaddress').val();
	var _city = $('#city').val();
	alert(_email+" "+_password+" "+_username+" "+_address);
	
	
	
	
	$.ajax({
		type:"POST",
		url :"signup.php",
		data:  "{'email': +_email+ 'password': +_password+ 'username': +_username+ 'address': + _address+ 'city': +_city}",
		contentType: "application/json",
		dataType: "json",
		success: function (response) {
			var res = response.d;
			
		}
	})
}