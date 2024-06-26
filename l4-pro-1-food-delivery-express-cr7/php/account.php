<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" sizes="32x32" href="../images/headerlogo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapid Delivery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
<?php include '../includes/header.php'; ?> 

<?php

if (isset($_SESSION['username'])) {
    echo '<div class="user-info-card">';
    echo '<h2>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</h2>';
    
    $email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'N/A';
    $login_time = isset($_SESSION['login_time']) ? htmlspecialchars($_SESSION['login_time']) : 'N/A';

    echo '<p>Email: <span>' . $email . '</span></p>';
    echo '<p>Login Time: <span>' . $login_time . '</span></p>';
    echo '</div>';
} else {

    header("Location: login.php");
    exit;
}
?>

<?php include '../includes/footer.php'; ?>
</body>

</html>