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

function subtractingDots(){
	var loadingText= document.getElementById("loadingtext");
		loadingText.innerHTML = "Sending Your Message......";
	var subtractPeriod=setInterval(function(){
	var	length=loadingText.innerHTML.length;	
		loadingText.innerHTML = loadingText.innerHTML.substring(0,length-1);
			if (loadingText.innerHTML.indexOf(".") == -1){
					clearInterval(subtractPeriod);
					subtractingDots(loadingText);
			}
		},100);
}

function processForm(form, FirstName, LastName, Email){
	
	form.style.display = "none";
	container = document.getElementById("animationContainer");
	container.style.display = "block";	
	envelope=document.getElementById("envelope");
	envelope.style.display="block";
	
	
	
	
	var Message=document.getElementById("Message").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("post","Includes/processForm.php",true);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			contactResults();
		}
	}
	
	subtractingDots();
	
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
	xmlhttp.send("FirstName=" + FirstName  + "&LastName=" + LastName + "&Email=" + Email + "&Message=" + Message);	
	 
	function contactResults() {
		var mailMsg=document.getElementById("mailMsg");
			mailMsg.innerHTML=xmlhttp.responseText;
			container.style.display = "none";
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