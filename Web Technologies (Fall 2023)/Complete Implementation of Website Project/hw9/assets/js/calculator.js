// JavaScript Document
var calcExec=document.getElementById('calcExec');
var numb1=document.getElementById('num1');
var numb2=document.getElementById('num2');
var calcFunc=document.getElementById('calcFunc');
var results=document.getElementById('results');
var answer;
function calculate(){
	var num1=parseInt(numb1.value);
	var num2=parseInt(numb2.value);
	if(calcFunc.value=="multiply"){
		answer = num1 * num2;
	}
	else if (calcFunc.value=="add") {
        answer = num1 + num2;
    } 
	else if (calcFunc.value=="subtract") {
        answer = num1 - num2;
    } 
	else if (calcFunc.value=="divide") {
        answer = num1 / num2;
    } 
	else {
        results.innerHTML = '<h3>Result is: Invalid operation</h3>';
        return;
    }
	
	results.innerHTML='<h3>Result is: ' +answer+'</h3>';
}

calcExec.addEventListener('click', calculate);