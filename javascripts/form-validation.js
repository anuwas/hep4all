$(document).ready(function($) {

	// hide messages 
	$(".error").hide();
	$(".success").hide();
	
	$('#loginForm input').click(function(e) {
        $(".error").fadeOut();
    });
	
	// on submit...
	$("#loginForm #submit").click(function() {
		$(".error").hide();
		
		//required:
		
		//name
		var name = $("input#username").val();
		if(name == ""){
			//$("#error").fadeIn().text("Name required.");
			$('#uname').fadeIn('slow');
			$("input#username").focus();
			return false;
		}
		
		//pass
		var name = $("input#pass").val();
		if(name == ""){
			//$("#error").fadeIn().text("Name required.");
			$('#vpass').fadeIn('slow');
			$("input#pass").focus();
			return false;
		}
		
		
		
	});  
		
		
	// on success...
	 function success(){
	 	$("#success").fadeIn();
	 	$("#loginForm").fadeOut();
	 }
	
    return false;
});




$(document).ready(function($) {

	// hide messages 
	$(".error").hide();
	$(".success").hide();
	
	$('#regForm input').click(function(e) {
        $(".error").fadeOut();
    });
	
	
	//registration form validation
	// on submit...
	$("#regForm #submit").click(function() {
		$(".error").hide();
		
		//required:
		
		//name
		var name = $("input#first-name").val();
		if(name == ""){
			//$("#error").fadeIn().text("Name required.");
			$('#fname').fadeIn('slow');
			$("input#first-name").focus();
			return false;
		}
		
		//pass
		var name = $("input#last-name").val();
		if(name == ""){
			//$("#error").fadeIn().text("Name required.");
			$('#lname').fadeIn('slow');
			$("input#last-name").focus();
			return false;
		}
		
		
		//email (check if entered anything)
		var email = $("input#email").val();
		//email (check if entered anything)
		if(email == ""){
			//$("#error").fadeIn().text("Email required");
			$('#nemail').fadeIn('slow');
			$("input#email").focus();
			return false;
		}
		
		//email (check if email entered is valid)

		if (email !== "") {  // If something was entered
			if (!isValidEmailAddress(email)) {
				$('#nemail').fadeIn('slow'); //error message
				$("input#email").focus();   //focus on email field
				return false;  
			}
		} 

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

var pass=$("input#pass").val();
if(pass == ""){
	$('#npass').fadeIn('slow');
	$("input#pass").focus();
	return false;
}

var reppass=$("input#repass").val();
if(pass == ""){
	$('#nrepass').fadeIn('slow');
	$("input#repass").focus();
	return false;
}

if(pass!=reppass){
	$('#nrepass').fadeIn('slow');
	$("input#repass").focus();
	return false;
}
		
var isChecked = $('#termscheck').attr('checked')?true:false;
if(isChecked==false){
	$("#termsv").show();
	$("#termsv").focus();
	return false;
}
		
		// comments
		var comments = $("#msg").val();
		
		if(comments == ""){
			//$("#error").fadeIn().text("Email required");
			$('#fmsg').fadeIn('slow');
			$("input#msg").focus();
			return false;
		}
	});  
	// end of registration form validation
		
	// on success...
	 function success(){
	 	$("#success").fadeIn();
	 	$("#regForm").fadeOut();
	 }
	
    return false;
});


//profileupdate form validation
$(document).ready(function($) {

	$(".error").hide();
	$(".success").hide();
	
	$('#ProfileForm input').click(function(e) {
        $(".error").fadeOut();
    });
	
	
	//registration form validation
	// on submit...
	$("#ProfileForm #submit").click(function() {
		$(".error").hide();
		
		//name
		var name = $("input#first-name").val();
		if(name == ""){
			$('#fname').fadeIn('slow');
			$("input#first-name").focus();
			return false;
		}
		
		var name = $("input#last-name").val();
		if(name == ""){
			$('#lname').fadeIn('slow');
			$("input#last-name").focus();
			return false;
		}
		var email = $("input#email").val();
		if(email == ""){
			$('#nemail').fadeIn('slow');
			$("input#email").focus();
			return false;
		}
		
		if (email !== "") {  // If something was entered
			if (!isValidEmailAddress(email)) {
				$('#nemail').fadeIn('slow'); //error message
				$("input#email").focus();   //focus on email field
				return false;  
			}
		} 

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};

var pass=$("input#Users_title").val();
if(pass == ""){
	$('#vtitle').fadeIn('slow');
	$("input#Users_title").focus();
	return false;
}

/*
var pass=$("input#pass").val();
if(pass == ""){
	$('#npass').fadeIn('slow');
	$("input#pass").focus();
	return false;
}

var reppass=$("input#repass").val();
if(pass == ""){
	$('#nrepass').fadeIn('slow');
	$("input#repass").focus();
	return false;
}

if(pass!=reppass){
	$('#nrepass').fadeIn('slow');
	$("input#repass").focus();
	return false;
}
		
	*/

	});  
	// end of registration form validation
		
	// on success...
	 function success(){
	 	$("#success").fadeIn();
	 	$("#regForm").fadeOut();
	 }
	
    return false;
});
//end of profile update form validation












