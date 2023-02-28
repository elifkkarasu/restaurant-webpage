<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	$conn = new mysqli('localhost','root','','tablo');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : " . $conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into tabloo(Name,Lastname,Email,Subject,Message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$firstname,$lastname,$email,$subject,$message);
		$execval = $stmt->execute();
		echo "$execval";
		echo "başarılı";
		header('Location: index.html');
		$stmt->close();
		$conn->close();

	}

?>