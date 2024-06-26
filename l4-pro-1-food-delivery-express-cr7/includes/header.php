<!-- header.php -->
<header class="header">
    <section class="flex">
        <div><img src="../images/logofooddelivery.png" class="logo"></div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="menu.php">Menu</a>
            <a href="order.php">Order</a>
            <a href="contact.php">Contact</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <?php
            if (isset($_SESSION['username'])) {
                $signout = "logout.php";
                echo '<a href="' . $signout . '">';
                echo '<div id="cart-btn" class="fas fa-sign-out "></div>';
                echo '</a>';
                $userbutton = "account.php";
                echo '<a href="' . $userbutton . '">';
                echo '<div id="cart-btn" class="fas fa-user"></div>';
                echo '</a>';
            } else {
                $login = "login.php";
                echo '<a href="' . $login . '">';
                echo '<div id="cart-btn" class="fas fa-user "></div>';
                echo '</a>';
            }
            ?>
            <div id="cartBtn" class="fas fa-shopping-cart"></div>
        </div>
    </section>
</header>
