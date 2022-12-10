<?php
include('conn.php');

if (isset($_POST['addsched'])) {
	$brgy = $_POST['barangay'];
	$date = $_POST['date_collection'];
	$time = $_POST['time_collection'];

	// $sql = "INSERT INTO schedule(brgy, date, time)VALUE(brgy= ?,date= ?, time= ?)";
	// if (!$stmt = $pdo->prepare($sql)) {
	// 	header("Location: ../admin.php?=error=sqlerror");
	// }
	// // $hashpass = password_hash($password, PASSWORD_DEFAULT);
	// $stmt->execute([$brgy, $date, $time]);

	// header("Location: ../admin.php?added successfully");

	
	$sql = "INSERT INTO schedule (brgy, date, time) VALUES (:barangay, :date_collection, :time_collection)";

	// Prepare the SQL query
	$stmt = $pdo->prepare($sql);

	// Bind the parameters to the query
	$stmt->bindParam(':barangay', $brgy);
	$stmt->bindParam(':date_collection', $date);
	$stmt->bindParam(':time_collection', $time);

	// Execute the SQL query
	$stmt->execute();

	// Print a message
	echo "User added successfully!";
}




















?>