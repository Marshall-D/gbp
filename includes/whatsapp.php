<?php

    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $conn = mysqli_connect("localhost","root","","gpd");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$whatsapp_query = "SELECT * FROM `whatsapp` ORDER BY id DESC LIMIT 1";
	$whatsapp_result = mysqli_query($conn, $whatsapp_query) or die(mysql_error());
	while ($row = mysqli_fetch_array($whatsapp_result)) {
		$whatsapp = $row['number'];
	}
?>