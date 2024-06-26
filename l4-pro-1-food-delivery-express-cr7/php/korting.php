<?php
include '../config/config.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Update query om korting toe te passen
    $sql = "UPDATE food_product SET korting = 1 WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Discount set successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect terug naar admin pagina
    header("Location: admin.php");
    exit();
}


