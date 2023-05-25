<?php
	$email2 = $_POST['email2'];


	$conn = new mysqli('localhost','root','','tablo');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed:" . $conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into tabloo(Email) values(?)");
		$stmt->bind_param("s",$email);
		$execval = $stmt->execute();
		echo "$execval";
		echo "başarılı";
		header('Location: index.html');
		$stmt->close();
		$conn->close();

	}

?>
