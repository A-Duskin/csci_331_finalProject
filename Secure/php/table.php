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
    $country = '';
    $latitude = '';
    $longitude = '';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $first = $_GET["fname"];
        $last = $_GET["lname"];
        $pass = $_GET["password"];
    }

    $sql = "INSERT INTO testing (fname, lname, password) VALUES ('$first', '$last', '$pass')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $mysql = "SELECT fname, lname FROM testing";
    $query = $conn->query($mysql);
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>First</th>";
    echo "<th>Last</th>";
    echo "</tr>";
    echo "</thead>";
    ?>

    <style>
        html {
            text-align: center;
        }

        h1 {
            font-size: 3em;
            color: gray;
        }

        table {
            width: 50%;
        }

        table, th, td {
            padding: 15px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            font-family: sans-serif;
        }

        thead {
            font-size: 1.3em;
            text-align: center;
            background-color: #72afdb;
            color: white;
        }


        td{
            text-align: center;
            padding: 3px;
            border-bottom: 1px solid lightgray;
            border-top: 1px solid lightgray;
        }
    </style>

    <?php
    while ($queryRow = $query->fetch_row()) {
        echo "<tr>";
        foreach($queryRow as $value) {
            echo "<td>".htmlspecialchars($value)."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <p>Sign-In<button onclick="redirectToLogin()">Here!</button>>
        <script>
            function redirectToLogin() {
                // Redirect to Login HTML page
                window.location.href = 'Login.html';
            }
        </script>
    </p>
</body>
</html>
