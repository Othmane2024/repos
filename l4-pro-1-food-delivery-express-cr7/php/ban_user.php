<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $sql = "UPDATE food_users SET banned = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Gebruiker succesvol verbannen.";
    } else {
        echo "Er is een fout opgetreden bij het bannen van de gebruiker.";
    }

    $stmt->close();
    $conn->close();

    header("Location: users.php");
    exit();
}

