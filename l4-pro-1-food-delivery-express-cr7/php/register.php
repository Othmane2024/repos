<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = 'user'; // Default usertype
    $banned = 0; // Default banned status

    // Check if email or username already exists
    $checkEmail = $conn->prepare("SELECT * FROM food_users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $resultEmail = $checkEmail->get_result();

    $checkUsername = $conn->prepare("SELECT * FROM food_users WHERE username = ?");
    $checkUsername->bind_param("s", $username);
    $checkUsername->execute();
    $resultUsername = $checkUsername->get_result();

    if ($resultEmail->num_rows > 0) {
        echo "<script>alert('Email already in use');</script>";
    } elseif ($resultUsername->num_rows > 0) {
        echo "<script>alert('Username already in use');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = $conn->prepare("INSERT INTO food_users (email, username, password, usertype, banned) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("ssssi", $email, $username, $hashed_password, $usertype, $banned);

        if ($sql->execute() === TRUE) {
            $user_id = $conn->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            echo '<script language="javascript">';
            echo 'window.open("login.php", "_self")';
            echo '</script>';
        } else {
            echo "Error: " . $sql->error;
        }
    }

    $checkEmail->close();
    $checkUsername->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rapid Delivery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="login-container">
        <h2>Registreer</h2>
        <form class="login-form" method="post">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="text" name="username" placeholder="Gebruikers naam" required>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <input type="submit" value="Registreer">
        </form>
        <p class="register-link">Heb je al een account? Klik dan <a href="login.php">hier</a>.</p>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
