function validate() {
	"use strict";
	var form = document.getElementById("form");
	var username = form.username.value;
	var pswd = form.password.value;
	var f_name = form.fname.value;
	var l_name = form.lname.value;
	var phone = form.phone.value;
	var email = form.email.value;
	var gender = form.gender.value;

	var email_regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]2,5)$/;
	var number_regex = /^(0-9)[10]$/;

	if (!username) {
		alert("Please Enter Username");
	} else if (!pswd) {
		alert("Please enter password");
	} else if (!f_name) {
		alert("Please enter First Name");
	} else if (!l_name) {
		alert("Please enter Last Name");
	} else if (!gender) {
		alert("Please Select a Gender");
	} else if (pswd.length < 6) {
		alert("Minimum 6 characters required in password");
	} else if (username.length > 16 || username.length < 3) {
		alert("Username should be atleat 3 - 16 character long");
	} else if (email.match(email_regex)) {
		alert("Invalid Email");
	} else if (phone.match(number_regex)) {
		alert("Please enter phone no.");
	} else if (!form.tnc.checked) {
		alert("Please Accept the Terms & Conditions in order to proceed");
	} else { 
		return true;
   	}
		return false;
}
