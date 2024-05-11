<?php
session_start();
echo '<div class="jumbotron">';
echo '<h1>Contact Me</h1>';
echo '</div>';
echo '<div class="row">';

if(isset($_GET['msg']) && $_GET['msg']== "success"){
	echo '<div class="alert alert-success alert-dismissable">';
	echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</buttton>';
	echo 'Contact info successfully entered!</div>';
}

if (!isset($_POST['submit']))
{
	echo '<form id="contact" method="post" action="">';

	if(!isset($_GET['fname'])){
		if(isset($_SESSION['fname'])){
			echo '<div class="form-group">';
			echo '<label for="firstName">First Name</label>';
			echo '<input name="firstName" type="text" class="form-control" id="firstName" value="'.$_SESSION['fname'].'">';
			echo '<p id="firstNameStatus"></p>';
			echo '</div>';
		}
		else{
			echo '<div class="form-group">';
			echo '<label for="firstName">First Name</label>';
			echo '<input name="firstName" type="text" class="form-control" id="firstName" placeholder="First Name">';
			echo '<p id="firstNameStatus"></p>';
			echo '</div>';
		}
	}
	elseif (isset($_GET['fname'])){
		if ($_GET['fname']=="fnameNull"){
			echo '<div class="form-group has-error">';
			echo '<label for="inputError1">First Name</label>';
			echo '<input name="firstName" type="text" class="form-control" id="inputError1" placeholder="First Name">';
			echo '<p class="alert-danger" id="firstNameStatus">First name cannot be blank!</p>';
			echo '</div>';
		}
		else{
			if(isset($_SESSION['fname'])){
				echo '<div class="form-group has-error">';
				echo '<label for="inputError1">First Name</label>';
				echo '<input name="firstName" type="text" class="form-control" id="inputError1" value="'.$_SESSION['fname'].'">';
				echo '<p class="alert-danger" id="firstNameStatus">Invalid First Name Data!</p>';
				echo '</div>';
			}						
		}
	}

	if(!isset($_GET['lname'])){
		if(isset($_SESSION['lname'])){
			echo '<div class="form-group">';
			echo '<label for="lastName">Last Name</label>';
			echo '<input name="lastName" type="text" class="form-control" id="lastName" value="'.$_SESSION['lname'].'">';
			echo '<p id="lastNameStatus"></p>';
			echo '</div>';
		}
		else{
			echo '<div class="form-group">';
			echo '<label for="lastName">Last Name</label>';
			echo '<input name="lastName" type="text" class="form-control" id="lastName" placeholder="Last Name">';
			echo '<p id="lastNameStatus"></p>';
			echo '</div>';
		}
	}
	elseif (isset($_GET['lname'])){
		if ($_GET['lname']=="lnameNull"){
			echo '<div class="form-group has-error">';
			echo '<label for="lastName">Last Name</label>';
			echo '<input name="lastName" type="text" class="form-control" id="lastName" placeholder="Last Name">';
			echo '<p class="alert-danger" id="lastNameStatus">Last name cannot be blank!</p>';
			echo '</div>';
		}
		else{
			if(isset($_SESSION['lname'])){
				echo '<div class="form-group has-error">';
				echo '<label for="lastName">Last Name</label>';
				echo '<input name="lastName" type="text" class="form-control" id="lastName" value="'.$_SESSION['lname'].'">';
				echo '<p class="alert-danger" id="lastNameStatus">Invalid Last Name Data!</p>';
				echo '</div>';
			}					
		}
	}

	if(!isset($_GET['email'])){
		if(isset($_SESSION['email'])){
			echo '<div class="form-group">';
			echo '<label for="email">Email address</label>';
			//echo '<input name = "email" type="email" class="form-control" id="email" value="'.$_SESSION['email'].'">';
			echo '<input name = "email" class="form-control" id="email" value="'.$_SESSION['email'].'">';
			echo '<p id="emailStatus"></p>';
			echo '</div>';
		}
		else{
			echo '<div class="form-group">';
			echo '<label for="email">Email address</label>';
			//echo '<input name = "email" type="email" class="form-control" id="email" placeholder="Email">';
			echo '<input name = "email" class="form-control" id="email" placeholder="Email">';
			echo '<p id="emailStatus"></p>';
			echo '</div>';
		}					
	}
	elseif (isset($_GET['email'])){
		if  ($_GET['email']=="emailNull"){
			echo '<div class="form-group has-error">';
			echo '<label for="email">Email address</label>';
			//echo '<input name = "email" type="email" class="form-control" id="email" placeholder="Email">';
			echo '<input name = "email" class="form-control" id="email" placeholder="Email">';
			echo '<p class="alert-danger"  id="emailStatus">Email cannot be blank!</p>';
			echo '</div>';
		}
		else{
			if(isset($_SESSION['email'])){
				echo '<div class="form-group has-error">';
				echo '<label for="email">Email address</label>';
				//echo '<input name = "email" type="email" class="form-control" id="email" value="'.$_SESSION['email'].'">';
				echo '<input name = "email" class="form-control" id="email" value="'.$_SESSION['email'].'">';
				echo '<p class="alert-danger"  id="emailStatus">Invalid Email Data!</p>';
				echo '</div>';						
			}				
		}
	}

	if(!isset($_GET['phoneNumber'])){
		if(isset($_SESSION['phoneNumber'])){
			echo '<div class="form-group">';
			echo '<label for="phoneNumber">Phone Number</label>';
			echo '<input name="phoneNumber" class="form-control" id="phoneNumber" value="'.$_SESSION['phoneNumber'].'">';
			echo '<p id="phoneNumberStatus"></p>';
			echo '</div>';
		}
		else{
			echo '<div class="form-group">';
			echo '<label for="phoneNumber">Phone Number</label>';
			echo '<input name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number">';
			echo '<p id="phoneNumberStatus"></p>';
			echo '</div>';
		}
	}
	elseif (isset($_GET['phoneNumber'])){
		if($_GET['phoneNumber']=="phoneNull"){
			echo '<div class="form-group has-error">';
			echo '<label for="phoneNumber">Phone Number</label>';
			echo '<input name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Phone Number">';
			echo '<p class="alert-danger" id="phoneNumberStatus">Phone number cannot be blank!</p>';
			echo '</div>';
		}
		else{
			if(isset($_SESSION['phoneNumber'])){
				echo '<div class="form-group has-error">';
				echo '<label for="phoneNumber">Phone Number</label>';
				echo '<input name="phoneNumber" class="form-control" id="phoneNumber" value="'.$_SESSION['phoneNumber'].'">';
				echo '<p class="alert-danger" id="phoneNumberStatus">Invalid Phone Number Data!</p>';
				echo '</div>';

			}						
		}
	}

	if(!isset($_GET['comments'])){
		if(isset($_SESSION['comments'])){
			echo '<div class="form-group ">';
			echo '<label for="comments">Comments</label>';
			echo '<textarea name="comments" class="form-control" id="comments" value="'.$_SESSION['comments'].'"></textarea>';
			echo '<p id="commentsStatus"></p>';
			echo '</div>';
		}
		else{
			echo '<div class="form-group ">';
			echo '<label for="comments">Comments</label>';
			echo '<textarea name="comments" class="form-control" id="comments" placeholder="Comments"></textarea>';
			echo '<p id="commentsStatus"></p>';
			echo '</div>';
		}
	}
	elseif (isset($_GET['comments'])){
		if ($_GET['comments']=="commentsNull"){
			echo '<div class="form-group has-error">';
			echo '<label for="comments">Comments</label>';
			echo '<textarea name="comments" class="form-control" id="comments" placeholder="Comments"></textarea>';
			echo '<p class="alert-danger" id="commentsStatus">Comments cannot be blank!</p>';
			echo '</div>';
		}
		else{
			if(isset($_SESSION['comments'])){
				echo '<div class="form-group has-error">';
				echo '<label for="comments">Comments</label>';
				echo '<textarea name="comments" class="form-control" id="comments" value="'.$_SESSION['comments'].'"></textarea>';
				echo '<p class="alert-danger" id="commentsStatus">Invalid Comments Data!</p>';
				echo '</div>';
			}						
		}
	}

	echo '<button name="submit" type="submit" value="submit">Submit</button>';
	echo '</form>';
}
if(isset($_POST['submit'])){
	if($_POST['submit']=="submit"){

		$errStatus=array();
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$email=$_POST['email'];
		$phoneNumber=trim($_POST['phoneNumber']);
		$comments=$_POST['comments'];

		if($firstName==NULL){
			$errStatus[]="fname=fnameNull";
			//header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?fnameErr=missing");
		}
		if (preg_match('/^[a-zA-Z\'-]+$/', $firstName) ===FALSE){
			$errStatus[]="fname=fnameInvalid";
			$_SESSION['fname']=$firstName;
		}
		//$_SESSION['fname'];
		$_SESSION['fname']=$firstName;

		if($lastName==NULL){
			$errStatus[]="lname=lnameNull";
			//header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?lnameErr=missing");
		}
		if (preg_match('/^[a-zA-Z\'-]+$/', $lastName) ===FALSE){
			$errStatus[]="lname=lnameInvalid";
			$_SESSION['lname']=$lastName;
		}
		//$_SESSION['lname'];
		$_SESSION['lname']=$lastName;

		if($email==NULL){
			$errStatus[]="email=emailNull";
			//header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?emailErr=missing");
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){	 
			$errStatus[]="email=emailInvalid";
			$_SESSION['email']=$email;
		}
		//$_SESSION['email'];
		$_SESSION['email']=$email;

		if($phoneNumber==NULL){
			$errStatus[]="phoneNumber=phoneNull";
			//header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?phoneErr=missing");
		}
		//if (preg_match('/[0-9]{10}/', $phoneNumber) === FALSE) { 
		if (preg_match('/^\d{10}$/', $phoneNumber) ===FALSE){
			$errStatus[]="phoneNumber=phoneInvalid";
			$_SESSION['phoneNumber']=$phoneNumber;
		}
		//$_SESSION['phone'];

		$_SESSION['phoneNumber']=$phoneNumber;


		if($comments==NULL){
			$errStatus[]="comments=commentsNull";
			//header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?commentsErr=missing");
		}
			if (preg_match('/^[\s\S]*$/', $comments) ===FALSE){ 
			$errStatus[]="comments=commentsInvalid";
			$_SESSION['comments']=$comments;
		}
		//$_SESSION['comments'];
		$_SESSION['comments']=$comments;

		if(count($errStatus) > 0){
			$errString=implode("&", $errStatus);
			redirect("https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw18/index.php?page=contact&$errString");					
		}
		
		$dblink=db_connect("contact");
		$fnameClean=addslashes($firstName);
		$lnameClean=addslashes($lastName);
		$emailClean=addslashes($email);
		$phoneClean=addslashes($phoneNumber);
		$commentsClean=addslashes($comments);
		
		$sql="Insert into `contact_info` (`first_name`, `last_name`, `email`, `phone_number`, `comments`) values ('$fnameClean', '$lnameClean', '$emailClean', '$phoneClean', '$commentsClean')";
		
		$dblink->query($sql) or
			die("<p>Something went wrong with: $sql<br>".$dblink->error."</p>");
		redirect("https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw19/index.php?page=contact&msg=success");
		//echo "<div> First Name is: $_POST[firstName]</div>";
		//echo "<div> Last Name is: $_POST[lastName]</div>";
		//echo "<div>Email is: $_POST[email]</div>";
		//echo "<div>Phone Number is: $_POST[phoneNumber]</div>";
		//echo "<div>Comments are: $_POST[comments]</div>";
	}
}
echo '</div>';
?>
