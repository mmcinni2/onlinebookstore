<?php

$servername = "sysmysql8.auburn.edu";  
$username = "mzm0382";
$password = "Lhstrack09!!!!";
$dbname = "mzm0382db";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the SQL query from the form
    $sqlQuery = stripslashes($_POST["sqlQuery"]);

    // Execute the SQL query
    $result = mysqli_query($conn, $sqlQuery);

    // Display the results or an error message
    if ($result) {
        echo "<h2>Results:</h2>";
        echo "<table border='1'>";

        // Display column names
        echo "<tr>";
        while ($fieldInfo = mysqli_fetch_field($result)) {
            echo "<th>{$fieldInfo->name}</th>";
        }
        echo "</tr>";

        // Display data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2>Error:</h2>";
        echo "<p>" . mysqli_error($connection) . "</p>";
    }

    // Close the database connection
    mysqli_close($connection);
}

?>

