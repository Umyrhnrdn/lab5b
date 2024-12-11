<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }
        .btn-update {
            background-color: #4CAF50;
            color: white;
        }
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Users Table</h2>

    <?php
    // Enable error reporting for debugging
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Database connection details
    $servername = "localhost"; // Adjust if needed
    $username = "root";       // Adjust based on your database
    $password = "";           // Adjust based on your database
    $database = "lab_5b";     // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch data from the users table
    $sql = "SELECT matric, name, role FROM users";
    $result = $conn->query($sql);

    // Check if the query returned results
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Matric</th><th>Name</th><th>Role</th><th>Actions</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['matric']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
            echo "<td>";
            echo "<a href='update.php?matric=" . $row['matric'] . "' class='btn btn-update'>Update</a>";
            echo "<a href='delete.php?matric=" . $row['matric'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
