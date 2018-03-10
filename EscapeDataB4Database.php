<?php

$name= $_POST['name'];
$message= $_POST['message'];


$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name_escaped = mysqli_real_escape_string($conn, $name);
$message_escaped = mysqli_real_escape_string($conn, $message);

$final_name_escaped = addcslashes($name_escaped, '%_');
$final_name_escaped = addcslashes($message_escaped, '%_');


$query = "INSERT INTO guestbook (name, message) VALUES ('$name_escaped', '$message_escaped')";
$rs = mysqli_query($conn, $query);



mysqli_close($conn);

?>