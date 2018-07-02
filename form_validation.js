$(function() {
	 jQuery.validator.addMethod("validateEmailFormat", function(value, element) {
     if (/(@[^\d]+.(com|in))/.test(value)) {
        return true; 
	 } else {
        return false;  
    };
	 }, 'Please enter a valid email address.');
	
	 jQuery.validator.addMethod("validateFormat2", function(value, element) {
     if  (/\d/.test(value)) {
        return true; 
	 } else {
        return false;  
    };
	 }, 'Please enter valid value');
	
	jQuery.validator.addMethod("validateFormat3", function(value, element) {
     if  (/\s/.test(value)) {
        return false; 
	 } else {
        return true;  
    };
	 }, 'Please enter valid value');
   
  $("form[name='login_form']").validate({
       rules: {
      email: {
        validateEmailFormat:  true,
	    validateFormat2: true
      },
      password: {
        required: true,
        minlength: 5,
		validateFormat2:true,
		validateFormat3:true
      }
    },
    
    messages: {
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
		validateFormat2:"Password should contain atleast one number between 0-9",
		validateFormat3: "Password should not contain whitespaces"
      },
      email: {
		validateEmailFormat: "Please use valid email format ",
	    validateFormat2: "Email should contain atleast one number 0-9"
	  }    },
	submitHandler: function(form) {
      form.submit();
    }
  });
	  $("form[name='signup']").validate({
       rules: {
      email: {
        validateEmailFormat:  true,
	    validateFormat2: true
      },
      password: {
        required: true,
        minlength: 5,
		validateFormat2:true,
		validateFormat3:true
      },
	  username: {
	  	required:true
	  },
	  streetaddress:{
	  	required:true
	  },
	  city: {
	  	required:true
	  }
	  
    },
    
    messages: {
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
		validateFormat2:"Password should contain atleast one number between 0-9",
		validateFormat3: "Password should not contain whitespaces"
      },
      email: {
		validateEmailFormat: "Please use valid email format ",
	    validateFormat2: "Email should contain atleast one number 0-9"
	  },
	  username:{
	  	required: "full names must be entered"
	  },
	  streetaddress:{
	  	required:"address must be entered"
	  },
	  city: {
	  	required: "city must be entered"
	  }
	  
	},
	
	submitHandler: function(form) {
      form.submit();
    }
  });
});