<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add</title>
</head>
<body>
    <h1>Data Table</h1>
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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first = $_POST["fname"];
        $last = $_POST["lname"];
        $pass = $_POST["password"];

        $sql = "INSERT INTO testing (fname, lname, password) VALUES ('$first', '$last', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("User Created Successfully, Redirecting to Log In"); window.location.href = "Login.html";</script>';
        } else {
            echo '<script>alert("Unable to Create User, Returning to Create Window"); window.location.href = "index.html";</script>';
        }
    }
    $conn->close();
    ?>
</body>
</html>
