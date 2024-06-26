<?php
session_start();
include '../config/config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Admin page</h1>
            <ul>
                <li><a href="adminlogout.php">Logout</a></li>
                <li><a href="admin.php">Producten</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <h2>Actuele Orders</h2>
        <table>
            <tr>
                <th>Naam</th>
                <th>Telefoonnummer</th>
                <th>Woonplaats</th>
                <th>Postcode</th>
                <th>Totale Bedrag</th>
            </tr>
            <?php
            // Include database configuration
            include '../config/config.php';

            // Haal alle gebruikers op uit de database
            $sql = "SELECT Naam, Telefoonnummer, Woonplaats, Postcode, totaal_prijs FROM food_orders";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Gegevens van elke rij outputten
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Naam"] . "</td>";
                    echo "<td>" . $row["Telefoonnummer"] . "</td>";
                    echo "<td>" . $row["Woonplaats"] . "</td>";
                    echo "<td>" . $row["Postcode"] . "</td>";
                    echo "<td>" . $row["totaal_prijs"] . "</td>";

                }
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
