<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add</title>
</head>
<body>
    <h1>Data Table</h1>
    <?php
    $servername = "localhost";
    $username = "user22";
    $password = "22bolo";
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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $first = $_POST["first"];
        $last = $_POST["last"];
        $country = $_POST["country"];
        $age = $_POST["age"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        
    }
    elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
        $first = $_GET["first"];
        $last = $_GET["last"];
        $country = $_GET["country"];
        $age = $_GET["age"];
        $latitude = $_GET["latitude"];
        $longitude = $_GET["longitude"];
    }

    $sql = "INSERT INTO randuser (first_name, last_name, country, age, latitude, longitude) VALUES ('$first', '$last', '$country', '$age', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $mysql = "SELECT * FROM randuser";
    $query = $conn->query($mysql);
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>First</th>";
    echo "<th>Last</th>";
    echo "<th>Location</th>";
    echo "<th>Age</th>";
    echo "<th>Latitude</th>";
    echo "<th>Longitude</th>";
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

    $query = "SELECT * FROM randuser";
    
    ?>
</body>
</html>
