<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "db22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["fname"];
    $password = $_POST["password"];

    $stmt = "SELECT * FROM testing WHERE fname = '" . $username . "' AND password = '" . $password . "'";

    $result = $conn->query($stmt);

    if ($result->num_rows === 1) {
        $_SESSION['loggedin'] = true;
        echo "Login successful!";
    } else {
        echo "Login denied. Incorrect username or password.";
    }
}

$conn->close();
?>
