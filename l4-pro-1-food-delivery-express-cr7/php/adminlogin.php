<?php
session_start();
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Zoek de gebruiker in de database
    $sql = "SELECT * FROM food_admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Gebruik password_verify om het wachtwoord te controleren
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin'] = $username;
                header("Location: admin.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No user found.";
        }
        
        $stmt->close();
    } else {
        echo "Database error: failed to prepare statement.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="title">
            <h1>Admin Login</h1>
        </div>
    </header>
    
    <div class="main">
        <form method="post" action="">
            <h2>Login in </h2>
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
