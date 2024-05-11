<?php
include("functions.php");
$dblink=db_connect("contact");
$sql="Select * from `contact_info` where 1";
$result=$dblink->query($sql) or
	die("<p>Something went wrong with <br>$sql<br>".$dblink->error.'</p>');

while($data=$result->fetch_array(MYSQLI_ASSOC)){
	echo '<tr>';
	echo '<td>'.$data['first_name'].'</td>';
	echo '<td>'.$data['last_name'].'</td>';
	echo '<td>'.$data['email'].'</td>';
	echo '<td>'.$data['phone_number'].'</td>';
	echo '<td>'.$data['comments'].'</td>';
	echo '</tr>';
}
?>