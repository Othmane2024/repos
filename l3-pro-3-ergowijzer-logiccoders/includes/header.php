<?php
$url = basename(parse_url($_SERVER['PHP_SELF'], PHP_URL_PATH));
$product1page = "Ergonomic-Wrist-Rest";
$product2page = "Protection-glasses";
$product4page = "Ergonomic-Mouse";
$product5page = "sit-stand-desk";

$product1name = str_replace("-", " ", $product1page);
$product2name = str_replace("-", " ", $product2page);
$product4name = str_replace("-", " ", $product4page);
$product5name = str_replace("-", " ", $product5page);



echo '<header>
    <a href="index.php" class="logic-logo"><span class="left-side-logic">Logic</span><span class="right-side-logic"> Coders</span></a>
    <ul class="nav">
        <a href="index.php" class="home">
            <li class="' . ($url == "index.php" ? "active" : "") . '">Home</li>
        </a>
        <li class="products" onclick="toggleDropdown()">Products
            <i class="fa-solid fa-arrow-up"></i>
            <div id="dropdown" class="dropdown">
                <a class="' . ($url == "$product1page.php" ? "active" : "") . '" href="../php/' . $product1page . '.php">' . $product1name . '</a>
                <a class="' . ($url == "$product2page.php" ? "active" : "") . '" href="../php/' . $product2page . '.php">' . $product2name . '</a>
                <a class="' . ($url == "$product4page.php" ? "active" : "") . '" href="../php/' . $product4page . '.php">' . $product4name . '</a>
                <a class="' . ($url == "$product5page.php" ? "active" : "") . '" href="../php/' . $product5page . '.php">' . $product5name . '</a>
            </div>
        </li>
    </ul>
    <a href="aboutus.php" class="aboutBtn"><button>About</button></a>
</header>';
