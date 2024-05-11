<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome to Jeremiah's Homepage</title>

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
        <?php include("navigation.php");?>
      </div>
	  <?php
		if (!isset($_GET['page'])){
			include("default.php");
		}
		else{
			switch($_GET['page']){
				case "work":
					include("work.php");
					break;
				case "school":
					include("school.php");
					break;
				case "hobbies":
					include("hobbies.php");
					break;
				case "movies":
					include("movies.php");
					break;
				case "contact":
					include("contact.php");					
					break;
				default:
					include("default.php");
					break;
			}
		}
	  ?>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
