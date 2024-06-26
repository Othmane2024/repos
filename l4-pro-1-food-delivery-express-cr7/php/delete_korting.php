<?php
include '../config/config.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Update query om korting te verwijderen
    $sql = "UPDATE food_product SET korting = 0 WHERE id = $product_id";

    if ($conn->query($sql) === TRUE) {
        echo "Discount removed successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect terug naar admin pagina
    header("Location: admin.php");
    exit();
}