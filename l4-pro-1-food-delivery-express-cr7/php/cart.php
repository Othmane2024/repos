<?php
session_start();
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $action = $_POST['action'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($action == 'add') {
        AddToCart($productId);
    } else if ($action == 'remove') {
        RemoveFromCart($productId);
    } else {
        echo 'Invalid action';
    }
}

function AddToCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = ['quantity' => 1];
    }
    GetCartItems();
}
function RemoveFromCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']--;
        if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }
    }
    GetCartItems();

}

// function GetCartItems()
// {
//     global $conn;

//     $total = 0;
//     $cartItemsHtml = '';

//     foreach ($_SESSION['cart'] as $productId => $product) {
//         $productId = intval($productId);
//         $sql = "SELECT * FROM product WHERE id = $productId";
//         $result = $conn->query($sql);
//         if ($result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             $productPrice = $row['price'];
//             $totalPriceForProduct = $product['quantity'] * $productPrice;
//             $total += $totalPriceForProduct;
//             $cartItemsHtml .= '<div class="cart-item">';
//             $cartItemsHtml .= '<i id="close-btn" class="fa-solid fa-xmark" data-id="' . $productId . '"></i>';
//             $cartItemsHtml .= '<img src="' . $row['image_url'] . '" style="width: 100px; height: 100px;">';
//             $cartItemsHtml .= '<div class="cart-item-details">';
//             $cartItemsHtml .= '<p class="cart-item-name">' . $row['name'] . '</p>';
//             $cartItemsHtml .= '<div class="price">€<span>' . $row['price'] . '</span></div>';
//             $cartItemsHtml .= '<p class="cart-item-quantity"> quantity: ' . $product['quantity'] . '</p>';
//             $cartItemsHtml .= '</div>';
//             $cartItemsHtml .= '</div>';
//         }
//     }

//     $isCartEmpty = empty($_SESSION['cart']);

//     echo json_encode([
//         'cartItemsHtml' => $cartItemsHtml,
//         'totalPrice' => $total,
//         'isCartEmpty' => $isCartEmpty
//     ]);
// }


// Adjusted Function to Fetch Cart Items with 50% Discount Calculation
function GetCartItems() {
    global $conn;

    $total = 0;
    $cartItemsHtml = '';

    foreach ($_SESSION['cart'] as $productId => $product) {
        $productId = intval($productId);
        $sql = "SELECT *, IF(korting = 1, price * 0.5, price) as calculated_price FROM food_product WHERE id = $productId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productPrice = $row['calculated_price'];
            $totalPriceForProduct = $product['quantity'] * $productPrice;
            $total += $totalPriceForProduct;
            $cartItemsHtml .= '<div class="cart-item">';
            $cartItemsHtml .= '<i id="close-btn" class="fa-solid fa-xmark" data-id="' . $productId . '"></i>';
            $cartItemsHtml .= '<img src="' . $row['image_url'] . '" style="width: 100px; height: 100px;">';
            $cartItemsHtml .= '<div class="cart-item-details">';
            $cartItemsHtml .= '<p class="cart-item-name">' . $row['name'] . '</p>';
            $cartItemsHtml .= '<div class="price">€<span>' . number_format($row['calculated_price'], 2) . '</span></div>';
            $cartItemsHtml .= '<p class="cart-item-quantity"> quantity: ' . $product['quantity'] . '</p>';
            $cartItemsHtml .= '</div>';
            $cartItemsHtml .= '</div>';
        }
    }

    $isCartEmpty = empty($_SESSION['cart']);

    echo json_encode([
        'cartItemsHtml' => $cartItemsHtml,
        'totalPrice' => number_format($total, 2),
        'isCartEmpty' => $isCartEmpty
    ]);
}


?>


