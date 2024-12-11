<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            width: 300px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="password"], select, input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2><center>Register New User</center></h2>
    <form action="" method="POST">
		
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" required>
		
		<label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="" disabled selected>Please select</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Student">Student</option>
        </select>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Lab_5b";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $matric = $_POST['matric'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
        $role = $_POST['role'];

        // Insert query
        $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>New record created successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
