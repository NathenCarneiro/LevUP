<?php
	$Name = $_POST['Name'];
	$Phone_No = $_POST['Phone_No'];
	$Email = $_POST['Email'];
	$Highest_Qualification = $_POST['Highest_Qualification'];

	// Database connection
	$conn = new mysqli('localhost:8111','root','','pcpf');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into information(Name, Phone_No, Email, Highest_Qualification) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Name,$Phone_No,$Email,$Highest_Qualification);
		$stmt->execute();
		echo "Successfully Submitted the details....";
		$stmt->close();
		$conn->close();
	}
?>