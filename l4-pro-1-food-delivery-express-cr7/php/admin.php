<?php
session_start();
include '../config/config.php';

// Controleer of de admin is ingelogd
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Functie om een product toe te voegen
function voegProductToe($conn, $name, $price, $image, $category_id)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($image["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($image["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $sql = "INSERT INTO food_product (name, price, image_url, category_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdsi", $name, $price, $target_file, $category_id);

            if ($stmt->execute() === TRUE) {
                echo "<script>alert('Nieuw product toegevoegd');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Voeg pizza toe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_pizza'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    voegProductToe($conn, $name, $price, $image, 1);
}

// Voeg drank toe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_drink'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    voegProductToe($conn, $name, $price, $image, 2);
}

// Voeg dessert toe
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_dessert'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    voegProductToe($conn, $name, $price, $image, 3);
}

// Functie om een productprijs te updaten
function updateProductPrijs($conn, $id, $new_price)
{
    $sql = "UPDATE food_product SET price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $new_price, $id);
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Prijs bijgewerkt');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Functie om een productnaam te updaten
function updateProductNaam($conn, $id, $new_name)
{
    $sql = "UPDATE food_product SET name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_name, $id);
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('Naam bijgewerkt');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_price'])) {
    $id = $_POST['product_id'];
    $new_price = $_POST['new_price'];
    updateProductPrijs($conn, $id, $new_price);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_name'])) {
    $id = $_POST['product_id'];
    $new_name = $_POST['new_name'];
    updateProductNaam($conn, $id, $new_name);
}

// Haal alle producten op per categorie
function haalProductenOp($conn, $category_id)
{
    $sql = "SELECT * FROM food_product WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    return $stmt->get_result();
}

$pizza_result = haalProductenOp($conn, 1);
$drank_result = haalProductenOp($conn, 2);
$dessert_result = haalProductenOp($conn, 3);
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
                <li><a href="users.php">Users</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </div>
    </header>
    <div class="container">
        <h3>Add New Pizza</h3>
        <form method="post" action="" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Price: <input type="text" name="price" required><br>
            Image: <input type="file" name="image" required><br>
            <input type="submit" name="add_pizza" value="Add Pizza">
        </form>

        <h3>All Pizzas</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Update Price</th>
                <th>Update Name</th>
                <th>Verwijder</th>
                <th>Korting</th>
            </tr>
            <?php
            if ($pizza_result->num_rows > 0) {
                while ($row = $pizza_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_price" required>
                                <input type="submit" name="update_price" value="Update">
                            </form>
                          </td>';
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_name" required>
                                <input type="submit" name="update_name" value="Update">
                            </form>
                          </td>';
                    echo "<td><a class='button' href='delete_product.php?id=" . $row['id'] . "'>Delete</a></td>";
                    if ($row["korting"] == 0) {
                        echo "<td><a class='button' href='korting.php?id=" . $row['id'] . "'>Geef Korting</a></td>";
                        echo "</tr>";
                    } else {
                        echo "<td><a class='button' href='delete_korting.php?id=" . $row['id'] . "'>Verwijder Korting</a></td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>

        <h3>Add New Drink</h3>
        <form method="post" action="" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Price: <input type="text" name="price" required><br>
            Image: <input type="file" name="image" required><br>
            <input type="submit" name="add_drink" value="Add Drink">
        </form>

        <h3>All Drinks</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Update Price</th>
                <th>Update Name</th>
                <th>Verwijder</th>
                <th>Korting</th>
            </tr>
            <?php
            if ($drank_result->num_rows > 0) {
                while ($row = $drank_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_price" required>
                                <input type="submit" name="update_price" value="Update">
                            </form>
                          </td>';
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_name" required>
                                <input type="submit" name="update_name" value="Update">
                            </form>
                          </td>';
                    echo "<td><a class='button' href='delete_product.php?id=" . $row['id'] . "'>Delete</a></td>";
                    if ($row["korting"] == 0) {
                        echo "<td><a class='button' href='korting.php?id=" . $row['id'] . "'>Geef Korting</a></td>";
                        echo "</tr>";
                    } else {
                        echo "<td><a class='button' href='delete_korting.php?id=" . $row['id'] . "'>Verwijder Korting</a></td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>

        <h3>Add New Dessert</h3>
        <form method="post" action="" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Price: <input type="text" name="price" required><br>
            Image: <input type="file" name="image" required><br>
            <input type="submit" name="add_dessert" value="Add Dessert">
        </form>

        <h3>All Desserts</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Update Price</th>
                <th>Update Name</th>
                <th>Verwijder</th>
                <th>Korting</th>
            </tr>
            <?php
            if ($dessert_result->num_rows > 0) {
                while ($row = $dessert_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_price" required>
                                <input type="submit" name="update_price" value="Update">
                            </form>
                          </td>';
                    echo '<td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="' . $row['id'] . '">
                                <input type="text" name="new_name" required>
                                <input type="submit" name="update_name" value="Update">
                            </form>
                          </td>';
                    echo "<td><a class='button' href='delete_product.php?id=" . $row['id'] . "'>Delete</a></td>";
                    if ($row["korting"] == 0) {
                        echo "<td><a class='button' href='korting.php?id=" . $row['id'] . "'>Geef Korting</a></td>";
                        echo "</tr>";
                    } else {
                        echo "<td><a class='button' href='delete_korting.php?id=" . $row['id'] . "'>Verwijder Korting</a></td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
