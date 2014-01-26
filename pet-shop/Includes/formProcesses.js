function checkLength(text, min, max){
	min = min || 0;
	max = max || 10000;
	
	if (text.length < min || text.length > max) {
		return false;
	}
	return true;
}

function checkEmail(email){
	if (!checkLength(email, 6)) {
		return false;
	} else if (email.indexOf("@") == -1) {
		return false;
	} else if (email.indexOf(".") == -1) {
		return false;
	} else if (email.lastIndexOf(".") < email.lastIndexOf("@")) {
		return false;
	}
	return true;
}

function checkTextArea(textArea, max){
	var numChars, chopped, message;
	if (!checkLength(textArea.value, 0, max)) {
		numChars = textArea.value.length;
		chopped = textArea.value.substr(0, max);
		message = 'You typed ' + numChars + ' characters.\n';
		message += 'The limit is ' + max + '.';
		message += 'Your entry will be shortened to:\n\n' + chopped;
		alert(message);
		textArea.value = chopped;
	}
}

function processForm(form, FirstName, LastName, Email){
	var Message=document.getElementById("Message").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("post","Includes/processForm.php",true);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			contactResults();
		}
	}
	
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
	xmlhttp.send("FirstName=" + FirstName  + "&LastName=" + LastName + "&Email=" + Email + "&Message=" + Message);	
	 
	function contactResults() {
		var mailMsg=document.getElementById("mailMsg");
			mailMsg.innerHTML=xmlhttp.responseText;
			form.style.display = "none";
	}	
}

function validate(form){
		var firstName = document.getElementById("Firstname").value;
		var lastName = document.getElementById("Lastname").value;
		var email = document.getElementById("Email").value;
		
		var errors = [];
		
		if (!checkLength(firstName,1,20)) {
			errors[errors.length] = "You must enter a first name.";
		}
		
		if (!checkLength(lastName,1,20)) {
			errors[errors.length] = "You must enter a last name.";
		}
		
		if (!checkEmail(email)) {
			errors[errors.length] = "You must enter a valid email address.";
		}
		
		if (errors.length > 0) {
			reportErrors(errors);
			return false;
		}
		
		processForm(form,firstName, lastName, email);
		
		return true;
	}

	function reportErrors(errors){
		
		var msg = "There were some problems...\n";
		
		var numError;
		
		for (var i = 0; i<errors.length; i++) {
			numError = i + 1;
			msg += "\n" + numError + ". " + errors[i];
		}
		
		alert(msg);
	}