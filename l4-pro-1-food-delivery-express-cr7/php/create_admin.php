<?php
include '../config/config.php';

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);

$sql = "INSERT INTO food_admins (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}