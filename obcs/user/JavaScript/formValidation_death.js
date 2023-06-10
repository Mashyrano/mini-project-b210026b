function validate() {
	// declare variables
	form  = document.getElementById('myForm');

	var string_dob = form.elements["dob"].value;
	var dob = new Date(string_dob);

	var string_dod = form.elements["dod"].value;
	var dod = new Date(string_dod);

	var currentDate = new Date();
	

	//check if date of birth is in future
	if (dob > currentDate){
		alert("Date is too far in future");	
		return false;
	}

	// check date of death is in future
	if (dod > currentDate){
		alert("Date is too far in future");	
		return false;
	}

	

	//
	
	return true;
}