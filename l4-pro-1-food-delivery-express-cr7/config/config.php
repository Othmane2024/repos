<?php
$servername = "klas4s23_577320";
$username = "klas4s23_577320";
$password = "YLFo1erq";
$dbname = "school_server_db";
// ^ eigen school server wachtwoord en naam

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

