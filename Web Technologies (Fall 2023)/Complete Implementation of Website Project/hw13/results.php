<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Results Data</title>
</head>

<body>
	<?php
		if(isset($_POST['submit']) && $_POST['submit']=="submit"){
			echo "<div> First Name is: $_POST[firstName]</div>";
			echo "<div> Last Name is: $_POST[lastName]</div>";
			echo "<div>Email is: $_POST[email]</div>";
			echo "<div>Phone Number is: $_POST[phoneNumber]</div>";
			echo "<div>Comments are: $_POST[comments]</div>";
		}
		else{
			echo "<h3>Please go back and fill out the form.</h3>";
		}
	?>
</body>
</html>