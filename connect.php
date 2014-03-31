<?php 
	$con = mysql_connect('disemo.com','limoragn_sir','.X#Mo^M!h$TR');
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$selected = mysql_select_db("subsub");

	if (!$selected) {
	    echo "Unable to select mydbname: " . mysql_error();
	    exit;
	}
?>