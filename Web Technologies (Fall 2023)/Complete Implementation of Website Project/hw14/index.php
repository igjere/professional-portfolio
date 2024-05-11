<?php 
	session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="icon" href="../../favicon.ico">-->

    <title>Welcome to Jeremiah's Contact Page</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/justified-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
<!--        <h3 class="text-muted">Project name</h3>-->
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
            <li class="active"><a href="index.html">Contact (Placeholder)</a></li>
          </ul>
        </nav>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Assignment 14 - PHP Form Validation</h1>
        <p class="lead">Completed by Section 1 Student Jeremiah Garcia (lnm248)</p>
<!--        <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>

      <!-- Example row of columns -->
      <div class="row">

          <h2>Contact Me</h2>
<!--          <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>-->
<!--          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>-->
		  <?php
		  	if (!isset($_POST['submit']))
			{
				echo '<form id="contact" method="post" action="index.php">';
				
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
						echo '<textarea name="comments" class="form-control" id="comments" placeholder="Comments..."></textarea>';
						echo '<p id="commentsStatus"></p>';
						echo '</div>';
					}
				}
		  		elseif (isset($_GET['comments'])){
					if ($_GET['comments']=="commentsNull"){
						echo '<div class="form-group has-error">';
						echo '<label for="comments">Comments</label>';
						echo '<textarea name="comments" class="form-control" id="comments" placeholder="Comments..."></textarea>';
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
						header("Location: https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw14/index.php?$errString");					
					}
					echo "<div> First Name is: $_POST[firstName]</div>";
					echo "<div> Last Name is: $_POST[lastName]</div>";
					echo "<div>Email is: $_POST[email]</div>";
					echo "<div>Phone Number is: $_POST[phoneNumber]</div>";
					echo "<div>Comments are: $_POST[comments]</div>";
				}
	  		}
		  ?>
		  
<!--        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
        </div>-->
      </div>

      <!-- Site footer -->
<!--      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>-->

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
<!--<script src="assets/js/validation.js"></script>-->