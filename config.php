<?php

	$hostname="localhost";
	$username= "root";
	$password= "";
	$database="votingsystem";

function test_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;

	
		//  return $data;

}

?>