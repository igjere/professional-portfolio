// JavaScript Document
function validateName(nameField, nameStatus) {
    var validRegex = /^[A-Za-z-' ]+$/;
    nameStatus.classList.add("alert");

    if (nameField.value.match(validRegex)) {
        nameStatus.classList.remove("alert-danger");
        nameStatus.classList.add("alert-success");
        nameStatus.innerHTML = "Valid!";
    } else {
        nameStatus.classList.remove("alert-success");
        nameStatus.classList.add("alert-danger");
        nameStatus.innerHTML = "Invalid! Only alphabet characters, hyphens, and apostrophes are allowed.";
    }
}

function validateEmail(email){
	var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var elEmailStatus=document.getElementById('emailStatus');
	elEmailStatus.classList.add("alert");
	if (email.value.match(validRegex)){
		elEmailStatus.classList.remove("alert-danger");
		elEmailStatus.classList.add("alert-success");
		elEmailStatus.innerHTML="Email is valid!";
	}
	else{
		elEmailStatus.classList.remove("alert-success");
		elEmailStatus.classList.add("alert-danger");
		elEmailStatus.innerHTML="Email is NOT valid!";
	}
}

function validatePhoneNumber(phoneNumber) {
    var validRegex = /^\d{10}$/;
    var elPhoneNumberStatus = document.getElementById('phoneNumberStatus');
    elPhoneNumberStatus.classList.add("alert");

    if (phoneNumber.value.match(validRegex)) {
        elPhoneNumberStatus.classList.remove("alert-danger");
        elPhoneNumberStatus.classList.add("alert-success");
        elPhoneNumberStatus.innerHTML = "Valid!";
    } else {
        elPhoneNumberStatus.classList.remove("alert-success");
        elPhoneNumberStatus.classList.add("alert-danger");
        elPhoneNumberStatus.innerHTML = "Invalid! Please enter a 10-digit phone number.";
    }
}

function validateComments(comments) {
    var elCommentsStatus = document.getElementById('commentsStatus');
    elCommentsStatus.classList.add("alert");

    if (comments.value.trim() !== "") {
        elCommentsStatus.classList.remove("alert-danger");
        elCommentsStatus.classList.add("alert-success");
        elCommentsStatus.innerHTML = "Valid!";
    } else {
        elCommentsStatus.classList.remove("alert-success");
        elCommentsStatus.classList.add("alert-danger");
        elCommentsStatus.innerHTML = "Invalid! Comments cannot be empty.";
    }
}
var elFirstName = document.getElementById('firstName');
var elLastName = document.getElementById('lastName');
var elEmail=document.getElementById('email');
var elPhoneNumber = document.getElementById('phoneNumber');
var elComments = document.getElementById('comments');

elFirstName.addEventListener('blur', function () {validateName(elFirstName, document.getElementById('firstNameStatus'));}, false);
elLastName.addEventListener('blur', function () {validateName(elLastName, document.getElementById('lastNameStatus'));}, false);
elEmail.addEventListener('blur', function(){validateEmail(elEmail);}, false);
elPhoneNumber.addEventListener('blur', function () {validatePhoneNumber(elPhoneNumber);}, false);
elComments.addEventListener('blur', function () {validateComments(elComments);}, false);