<?php
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $tabletype = $_POST['tabletype'];
  $guestnumber = $_POST['guestnumber'];
  $placement = $_POST['placement'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $note = $_POST['note'];

  $conn = new mysqli('localhost','root','','tablo1');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into tablo2(Name,Lastname,Email,Tabletype,Guestnumber,Placement,Date,Time,Note) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss",$firstname,$lastname,$email,$tabletype,$guestnumber,$placement,$date,$time,$note);
    $execval = $stmt->execute();
    echo "$execval";
    echo "başarılı";
    header('Location: index.html');
    $stmt->close();
    $conn->close();

  }

?>