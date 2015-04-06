<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'bosmassagecom');
	define('DB_PASSWORD', 'unionstar87700917');
	define('DB_NAME', 'bosmassagecom');
	
	$clientname = $_POST['clientname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$reserve_time = $_POST['reserve_time'];
	$reserve_hour = $_POST['reservehour'];
	$parking = $_POST['parking'];
	$duration = $_POST['duration'];
	$others = $_POST['others'];
	
	//Connect to the database.
	$dbc = mysql_connect("localhost","bosmassagecom","unionstar87700917");
	mysql_select_db('bosmassagecom');
	if(!$dbc){
		die('Could not connect :' . mysql_error());
	}
	
	//Insert the value into the database.
	$query = "INSERT INTO reserve(clientname, phone, address, reserve_time,reserve_hour,submit_time, parking, duration, others) " . 
	         "VALUES('$clientname','$phone','$address','$reserve_time','$reserve_hour',now(),'$parking','$duration','$others')";
	        
	if(mysql_query($query, $dbc)){
		echo 'Thanks for your reservation. Mr./ Ms. ' . $clientname . '<br />';
		echo 'Dave will contact with you quickly to confirm your reservation!<br />';
		echo '<a href="index.htm">Back to the Homepage</a>';
	}else{
		echo "Failed to insert the data.";
	}
	
	mysql_close($dbc);
?>