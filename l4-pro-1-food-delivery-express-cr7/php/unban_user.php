<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Update de banned status van de gebruiker
    $sql = "UPDATE food_users SET banned = 0 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Gebruiker succesvol geunbanned.";
    } else {
        echo "Er is een fout opgetreden bij het unbannen van de gebruiker.";
    }

    $stmt->close();
    $conn->close();

    header("Location: users.php");
    exit();
}

