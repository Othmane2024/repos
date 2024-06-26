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
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <h2>Gebruikers beheren</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Gebruikersnaam</th>
                <th>Acties</th>
            </tr>
            <?php
            // Include database configuration
            include '../config/config.php';

            // Haal alle gebruikers op uit de database
            $sql = "SELECT id, email, username, banned FROM food_users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Gegevens van elke rij outputten
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>";
                    if ($row["banned"] == 0) {
                        echo "<form method='POST' action='ban_user.php''>";
                        echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
                        echo "<input type='submit' value='Ban''>";
                        echo "</form>";
                    } else {
                        echo "<form method='POST' action='unban_user.php''>";
                        echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
                        echo "<input type='submit' value='Unban''>";
                        echo "</form>";
                    }
                    echo "<form method='POST' action='delete_user.php''>";
                    echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
                    echo "<input type='submit' value='Verwijder';'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Geen gebruikers gevonden</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
