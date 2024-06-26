<?php
include_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM food_users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            
            if ($row['banned'] == 1) {
                header("Location: banned.php");
                exit();
            }

            session_start();

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['login_time'] = date("Y-m-d H:i:s");

            if ($row['usertype'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Ongeldige gebruikersnaam of wachtwoord";
        }
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" sizes="32x32" href="../images/headerlogo.png">
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
        <h2>Login In</h2>
        <form class="login-form" action="#" method="post">
            <input type="text" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <p class="register-link">Nog geen account? Klik dan <a href="register.php">hier</a>.</p>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>