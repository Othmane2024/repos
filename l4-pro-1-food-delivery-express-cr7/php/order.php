<?php
session_start();
include '../config/config.php';

$orderSuccess = false;

// Check if the cart is empty
if (isset($_POST['order'])) {
    if (empty($_SESSION['cart'])) {
        echo "<script>alert('Je winkelmandje is leeg. Voeg eerst iets toe aan je winkelmandje.');</script>";
    } else {
        // Validate and sanitize inputs
        $name = mysqli_real_escape_string($conn, trim($_POST['name']));
        $number = mysqli_real_escape_string($conn, trim($_POST['number']));
        $method = mysqli_real_escape_string($conn, trim($_POST['method']));
        $delivery_method = mysqli_real_escape_string($conn, trim($_POST['delivery_method']));
        $flat = mysqli_real_escape_string($conn, trim($_POST['flat']));
        $pin_code = mysqli_real_escape_string($conn, trim($_POST['pin_code']));
        $street = mysqli_real_escape_string($conn, trim($_POST['street']));
        
        // Correct column names to match the database table `orders`
        $stmt = $conn->prepare("INSERT INTO food_orders (Naam, Telefoonnummer, Betalingopties, Bezorgmethode, Woonplaats, Postcode, Huisnummer) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $number, $method, $delivery_method, $flat, $pin_code, $street);
        
        if ($stmt->execute()) {
            $orderSuccess = true;
            unset($_SESSION['cart']);
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../images/headerlogo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapid Delivery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../includes/header.php'; ?>

<?php if ($orderSuccess): ?>
    <div class="success-message show" id="successMessage">
        <p>Your order has been placed successfully!</p>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').classList.remove('show');
        }, 3000);
    </script>
<?php endif; ?>

<div class="user-account">
    <section>
        <div id="close-account"><span>close</span></div>
        <div class="user">
            <p><span>you are not logged in now!</span></p>
        </div>
        <div class="flex">
            <form action="" method="post">
                <h3>login now</h3>
                <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
                <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20">
                <input type="submit" value="login now" name="login" class="btn">
            </form>
            <form action="" method="post">
                <h3>register now</h3>
                <input type="text" name="name" required class="box" placeholder="enter your name" maxlength="20">
                <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
                <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20">
                <input type="password" name="cpass" required class="box" placeholder="confirm your password" maxlength="20">
                <input type="submit" value="register now" name="register" class="btn">
            </form>
        </div>
    </section>
</div>

<section class="order" id="order">
    <h1 class="heading">Order Now</h1>
    <form action="" method="post">
        <div class="flex">
            <div class="inputBox">
                <span>Naam :</span>
                <input type="text" name="name" class="box" required placeholder="Type je naam" maxlength="20">
            </div>
            <div class="inputBox">
                <span>Telefoonnummer :</span>
                <input type="number" name="number" class="box" required placeholder="Type je telefoonnummer" maxlength="10" min="0">
            </div>
            <div class="inputBox">
                <span>Betalingopties :</span>
                <select name="method" class="box">
                    <option value="cash on delivery">Contant bij levering</option>
                    <option value="credit card">Credit card</option>
                    <option value="paytm">IDEAL</option>
                    <option value="paypal">Paypal</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Bezorgmethode :</span>
                <select name="delivery_method" class="box">
                    <option value="delivery">Bezorgen</option>
                    <option value="pickup">Afhalen</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Woonplaats :</span>
                <input type="text" name="flat" class="box" required placeholder="Type je stad " maxlength="30">
            </div>
            <div class="inputBox">
                <span>Postcode :</span>
                <input name="pin_code" class="box" placeholder="Typ je postcode" maxlength="7">
            </div>
            <div class="inputBox">
                <span>Huisnummer :</span>
                <input name="street" class="box" required placeholder="Type je huisnummer " maxlength="5">
            </div>
        </div>
        <input type="submit" value="order now" class="btn" name="order">
    </form>
</section>

<?php include '../includes/footer.php'; ?>
<script src="../js/script.js"></script>
</body>
</html>
