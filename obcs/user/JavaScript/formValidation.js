function validate() {
	// declare variables
	form  = document.getElementById('myForm');
	var string_date = form.elements["dob"].value;
	var dateToCheck = new Date(string_date);
	var currentDate = new Date();

	//check if date is in future
	if (dateToCheck > currentDate){
		alert("Date is too far in future");	
		return false;
	}


	//
	
	return true;
}