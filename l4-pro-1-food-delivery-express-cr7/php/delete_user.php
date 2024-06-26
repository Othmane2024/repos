<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM food_users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Gebruiker succesvol verwijderd.";
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van de gebruiker.";
    }

    $stmt->close();
    $conn->close();

    header("Location: users.php");
    exit();
}

