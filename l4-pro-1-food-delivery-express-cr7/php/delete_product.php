<?php
session_start();
include '../config/config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Check if product ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL delete statement
    $sql = "DELETE FROM food_product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Product deleted successfully');window.location.href='admin.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No product ID provided.";
}

