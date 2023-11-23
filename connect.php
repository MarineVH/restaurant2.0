<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$created_at = date_create()->format("Y-m-d H:i:s");

//database connection
$conn = new mysqli("localhost","root","","restaurant2.0");

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into contact(firstName, lastName, email, subject, message, created_at)values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $subject, $message, $created_at);
    $stmt->execute();
    echo "Contact Successefully";
    $stmt->close();
    $conn->close();
}
?>