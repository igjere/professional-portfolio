<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
		<?php
		if (!isset($_GET['page'])){
			echo "Welcome to Jeremiah's Homepage";
		}
		else{
			switch($_GET['page']){
				case "work":
					echo "Work";
					break;
				case "school":
					echo "School";
					break;
				case "hobbies":
					echo "Hobbies";
					break;
				case "movies":
					echo "Movies";
					break;
				case "contact":
					echo "Contact";					
					break;
				default:
					echo "Welcome to Jeremiah's Homepage";
					break;
			}
		}
	  ?>
	</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/justified-nav.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="masthead">
        <?php
		  include("functions.php");
		  include("navigation.php");
		 ?>
      </div>
	  <?php
		$dblink=db_connect("content");
		
		if (!isset($_GET['page'])){
			$page="index";
		}
		else{
			$page=$_GET['page'];
		}
		$pageClean=addslashes($page);
		
		$sql="Select * from `pages` where `page_name`='$pageClean'";
		$result=$dblink->query($sql) or
			die("<p> Something went wrong with: $sql".$dblink->error);
		$data=$result->fetch_array(MYSQLI_ASSOC);
		echo $data['content_data'];	
	  ?>
	</div>
  </body>
</html>
