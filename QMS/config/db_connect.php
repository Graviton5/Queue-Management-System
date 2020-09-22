<?php 
	$connected = mysqli_connect('localhost','Grav','thisisnotme','qms');

		if(!$connected){
			echo 'Connection error: '. mysqli_connect_error();
		}
	$sql1 = "SELECT * FROM patients ORDER BY created";
	$sql2 = "SELECT * FROM children ORDER BY created";
	$sql3 = "SELECT * FROM seniors ORDER BY created";
	$sql4 = "SELECT * FROM doctor ORDER BY created";

	$result1 = mysqli_query($connected, $sql1);
	$patients = mysqli_fetch_all($result1, MYSQLI_ASSOC);

	$result2 = mysqli_query($connected, $sql2);
	$children = mysqli_fetch_all($result2, MYSQLI_ASSOC);

	$result3 = mysqli_query($connected, $sql3);
	$seniors = mysqli_fetch_all($result3, MYSQLI_ASSOC);

	$result4 = mysqli_query($connected, $sql4);
	$doctors = mysqli_fetch_all($result4, MYSQLI_ASSOC);

	mysqli_free_result($result1);
	mysqli_free_result($result2);
	mysqli_free_result($result3);
	mysqli_free_result($result4);

?>