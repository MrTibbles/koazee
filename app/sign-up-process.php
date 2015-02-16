<?php
	
	require("db_connect.php"); 
	$email = 'fgdgfg';//$_POST['email']; 
	$group = 'fgdgfg';//$_POST['group'];
	$destination = 'fgdgfg';//$_POST['destination'];
	$date = 'fgdgfg';//$_POST['date'];

	$sql = "INSERT INTO enquiries (email, group, destination, date) VALUES ('$email', '$group', '$destination', '$date')";

	if (!mysql_query($sql, $connect)) { // if the query cannot run with the connection info provided
		die("error: " . mysql_error());	 // DIE
	} 
	$result = "sent";

	if ($result == "sent") {
		echo 'stored_enquiry';
	}else {
		echo 'error';
	}