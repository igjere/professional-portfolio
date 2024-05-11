// JavaScript Document

var today = new Date();
var hourNow = today.getHours();
var greeting;
var eltag=document.getElementById("greeting");

switch (true) {
  case hourNow > 18:
    greeting = 'Good evening!';
    break;
  case hourNow > 12:
    greeting = 'Good afternoon!';
    break;
  case hourNow > 0:
    greeting = 'Good morning!';
    break;
  default:
    greeting = 'Welcome!';
}

/*if (hourNow > 18){
	greeting = 'Good evening!';
} else if (hourNow > 12){
	greeting = 'Good afternoon!';
} else if (hourNow > 0){
	greeting = 'Good morning!';
} else {
	greeting = 'Welcome!';
}*/

eltag.innerHTML = '<h3>' + greeting + '</h3>';
//document.write('<h3>' + greeting + '</h3>');