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

    $stmt = $conn->prepare("SELECT * FROM testing WHERE fname = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['loggedin'] = true;
        echo "Login successful!";
    } else {
        echo "Login denied. Incorrect username or password.";
    }
}

$conn->close();
?>
