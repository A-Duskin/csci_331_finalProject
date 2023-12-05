<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "db22";
    $first = '';
    $last = '';
    $pass = '';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    header("Location: ../html/Login.html");
    exit();
    ?>
</body>
</html>
