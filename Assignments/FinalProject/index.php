<?php
$nav = "";
require_once 'routes/router.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Final Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		
	</head>

	<body class="container">
		<?php
			/* This is the navigation  */
			echo $nav;
			
			/* This is the page content  */
			echo $content; 

		?>
	</body>
</html> 
<!--What architectural pattern does this project use? What are the benefits of separating routes, views, and controllers?

How does the application enforce different permissions for staff vs. admin users? 
What happens if a staff user tries to access an admin-only page?

How does the navigation menu change based on user role? Why is this important for user experience?

How does the routing system work? What happens when a user requests a page that doesn't exist?

How does the application handle database errors? What user-facing messages are shown when operations fail? 
-->
