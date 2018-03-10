<?php

$host = '';
$db   = '';
$user = '';
$pass = '';
$charset = 'utf8mb4';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);

        $stmt = $pdo->query('SELECT date, name, message FROM guestbook');
        while ($row = $stmt->fetch())
        {
        echo "<tr><td id='date'>" . $row['date'] . "</td><td>" . test_input($row['name']) . "</td><td><div>" . test_input($row['message']). "</div></td></tr>";
        }

?>