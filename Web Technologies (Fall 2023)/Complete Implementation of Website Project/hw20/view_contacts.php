<script src="assets/js/jquery-3.5.1.js"></script>
<?php
echo '<div class="jumbotron">';
echo '<h1>Contact Form Entries</h1>';
echo '</div>';
echo '<div class="row">';

/*$dblink=db_connect("contact");
$sql="Select * from `contact_info` where 1";
$result=$dblink->query($sql) or
	die("<p>Something went wrong with <br>$sql<br>".$dblink->error);*/

echo '<table>';
echo '<tr><td>First Name</td><td>Last Name</td><td>Email Address</td><td>Phone Number</td><td>Comments</td></tr>';

/*while($data=$result->fetch_array(MYSQLI_ASSOC)){
	echo '<tr>';
	echo '<td>'.$data['first_name'].'</td>';
	echo '<td>'.$data['last_name'].'</td>';
	echo '<td>'.$data['email'].'</td>';
	echo '<td>'.$data['phone_number'].'</td>';
	echo '<td>'.$data['comments'].'</td>';
	echo '</tr>';
}*/

echo '<tbody id="results">';

echo '</tbody>';
echo '</table>';
//echo '';
//echo '';
//echo '';
echo '</div>';
?>

<script>
	function refresh_data(){
		$.ajax({
			type: 'post',
			url: 'https://ec2-3-20-226-234.us-east-2.compute.amazonaws.com/hw20/query_contacts.php',
			success: function(data){
				$('#results').html(data);
			}
		});
	}
	setInterval(function(){ refresh_data(); }, 500);
</script>