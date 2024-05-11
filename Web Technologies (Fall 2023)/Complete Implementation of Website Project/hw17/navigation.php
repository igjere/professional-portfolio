<?php
$dblink=db_connect("content");
$sql="Select * from `menus` where `status`='active'";
$result=$dblink->query($sql) or
	die("<p>Something went wrong with $sql</p>".$dblink->error);

echo '<nav>';
echo '<ul class="nav nav-justified">';

while($data=$result->fetch_array(MYSQLI_ASSOC)){
	/* if (!isset($_GET['page']) && $data['page_variable']=="index"){
		echo '<li class="active"><a href="index.php">Home</a></li>';
	}
	elseif($_GET['page']=="index" && $data['page_variable']=="index"){
		echo '<li class="active"><a href="index.php">Home</a></li>';
	}
	else{
		echo '<li><a href="index.php">Home</a></li>';
	}*/
	
	if($_GET['page']==$data['page_variable']){
		echo '<li class="active"><a href="index.php?page='.$data['page_variable'].'">'.$data['title'].'</a></li>';
	}
	else{
		echo '<li><a href="index.php?page='.$data['page_variable'].'">'.$data['title'].'</a></li>';
	}
}

echo '</ul>';
echo '</nav>';
?>