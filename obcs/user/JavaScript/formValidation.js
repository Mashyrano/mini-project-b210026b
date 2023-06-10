function validate() {
	// declare variables
	form  = document.getElementById('myForm');
	var string_date = form.elements["dob"].value;
	var dateToCheck = new Date(string_date);
	var currentDate = new Date();
	var email = form.elements["email"].value;
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	//check if date is in future
	if (dateToCheck > currentDate){
		alert("Date is too far in future");	
		return false;
	}

	// check email format

	if (!emailRegex.test(email)){
		alert("Wrong Email Format");
		return false;
	}

	//
	
	return true;
}