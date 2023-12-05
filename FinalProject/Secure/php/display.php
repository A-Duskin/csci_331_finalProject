<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Account</title>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="text/javascript" href="../js/create.js">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <h1 class="title">Your Account Information</h1>
                <div class="account__information">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "mysql";
                    $dbname = "db22";
                    $first = '';
                    $pass = '';

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["fname"]) && isset($_POST["password"])) {
                        $first = $_POST["fname"];
                        $pass = $_POST["password"];
                        
                        // Fetch records matching the provided name and password along with 'lname'
                        $sql = "SELECT * FROM testing WHERE fname = '$first' AND password = '$pass'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>First</th>";
                            echo "<th>Last</th>";
                            echo "<th>Password</th>";
                            echo "</tr>";
                            echo "</thead>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No matching account found.";
                        }
                    }
                    $conn->close();
                    ?>
                </div>
                <form class="create" id="create" action="../php/redirect.php" method="post">
                <button type="submit" class="button login__submit" id="button login__submit">
                        <span class="button__text">Log Out</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                </button>	
                </form>	
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape7"></span>
                <span class="screen__background__shape screen__background__shape6"></span>		
                <span class="screen__background__shape screen__background__shape5"></span>
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>	
        </div>
    </div>
</body>
</html>
