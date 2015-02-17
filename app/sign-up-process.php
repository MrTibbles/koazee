<?php
	
	// require("db_connect.php"); 
	// $email = 'fgdgfg';//$_POST['email']; 
	// $group = 'fgdgfg';//$_POST['group'];
	// $destination = 'fgdgfg';//$_POST['destination'];
	// $dates = 'fgdgfg';//$_POST['date'];

	//Connecting to sql db.
	$connect = mysqli_connect("mysql-55.int.mythic-beasts.com'","vaughnmck","ecohraep","vaughnmck");

	//Sending form data to sql db.
	mysqli_query($connect,"INSERT INTO enquiries (email, group, destination, dates)
	VALUES ('$_POST[post_email]', '$_POST[post_group]', '$_POST[post_destination]', '$_POST[post_dates]')";

	?>