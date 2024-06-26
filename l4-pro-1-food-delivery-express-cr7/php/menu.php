<?php
session_start();
include '../config/config.php';

// Ontvang filterinvoer
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Functie om een gefilterde query te genereren
function getFilteredQuery($category_id)
{
   $sql = "SELECT * FROM food_product WHERE category_id = " . $category_id;
   return $sql;
}

// Haal alle categorieën op
$categories_sql = "SELECT * FROM food_category";
$categories_result = $conn->query($categories_sql);
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <link rel="stylesheet" href="../css/style.css">
</head>

<body>

   <?php include '../includes/header.php'; ?>

   <div class="user-account">
      <!-- User account content -->
   </div>

   <section id="menu" class="menu">

      <h1 class="heading">Menu</h1>
      <div class="filter-container">
         <form method="GET" action="">
            <select name="category">
               <option value="">All Categories</option>
               <?php
               $categories_result = $conn->query($categories_sql); // Reset the result set
               while ($category_row = $categories_result->fetch_assoc()) {
                  echo '<option value="' . $category_row['id'] . '"' . ($category == $category_row['id'] ? ' selected' : '') . '>' . $category_row['name'] . '</option>';
               }
               ?>
            </select>
            <input type="submit" value="Filter">
         </form>
      </div>

      <?php
      if ($category) {
         // Filter products based on the selected category
         $products_sql = getFilteredQuery($category);
         $products_result = $conn->query($products_sql);

         // Display filtered products
         if ($products_result->num_rows > 0) {
            echo '<div class="box-container">';
            while ($product_row = $products_result->fetch_assoc()) {
               echo '<div class="box">';

               // Add the discount ribbon if applicable
               if (isset($product_row['korting']) && $product_row['korting'] == 1) {
                  echo '<div class="ribbon"><span>-50%</span></div>';
               }

               // Add your product display code here
               echo '<div class="cart-item">';
               echo '<img src="' . $product_row['image_url'] . '" style="width: 100px; height: 100px;">';
               echo '<p class="cart-item-name">' . $product_row['name'] . '</p>';
               echo '<div class="cart-item-details">';
               echo '<div class="price">€<span>' . $product_row['price'] . '</span></div>';
               echo '<input type="submit" value="add to cart" name="add_to_cart" class="btn add_to_cart" data-id=' . $product_row['id'] . '>';
               echo '</div>';
               echo '</div>';
               echo '</div>';
            }
            echo '</div>';
         } else {
            echo '<p>No products found for this category.</p>';
         }
      } else {
         // Display all products if no category is selected
         $products_sql = "SELECT * FROM food_product";
         $products_result = $conn->query($products_sql);

         // Get category names
         $categories_result = $conn->query($categories_sql);

         // Display all products with category names
         while ($category_row = $categories_result->fetch_assoc()) {
            $category_id = $category_row['id'];
            $category_name = $category_row['name'];

            echo '<h1 class="heading">' . $category_name . '</h1>';

            echo '<div class="box-container">';
            $category_products_result = $conn->query("SELECT * FROM food_product WHERE category_id = $category_id");
            if ($category_products_result->num_rows > 0) {
               while ($product_row = $category_products_result->fetch_assoc()) {
                  echo '<div class="box">';

                  // Add the discount ribbon if applicable
                  if (isset($product_row['korting']) && $product_row['korting'] == 1) {
                     echo '<div class="ribbon"><span>-50%</span></div>';
                  }

                  // Add your product display code here
                  echo '<div class="cart-item">';
                  echo '<img src="' . $product_row['image_url'] . '" style="width: 100px; height: 100px;">';
                  echo '<p class="cart-item-name">' . $product_row['name'] . '</p>';
                  echo '<div class="cart-item-details">';
                  echo '<div class="price">€<span>' . $product_row['price'] . '</span></div>';
                  echo '<input type="submit" value="add to cart" name="add_to_cart" class="btn add_to_cart" data-id=' . $product_row['id'] . '>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
               }
            } else {
               echo '<p>No products found for this category.</p>';
            }
            echo '</div>';
         }
      }
      ?>
      <div id="sidebar" class="sidebar-hidden">
         <div class="sidebar">

            <div id="cart-sidebar" class="sidebar">
               <div class="cart-container" id="cart-container">
                  <?php
                  $total = 0;
                  if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                     foreach ($_SESSION['cart'] as $productId => $product) {
                        $productId = intval($productId);
                        $sql = "SELECT * FROM food_product WHERE id = $productId";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                           $row = $result->fetch_assoc();
                           $productPrice = $row['price'];
                           $totalPriceForProduct = $product['quantity'] * $productPrice;
                           $total += $totalPriceForProduct;
                           echo '<div class="cart-item">';
                           echo '<i id="close-btn" class="fa-solid fa-xmark" data-id="' . $productId . '"></i>';
                           echo '<img src="' . $row['image_url'] . '" style="width: 100px; height: 100px;">';
                           echo '<div class="cart-item-details">';
                           echo '<p class="cart-item-name">' . $row['name'] . '</p>';
                           echo '<div class="price">€<span>' . $row['price'] . '</span></div>';
                           echo '<p class="cart-item-quantity"> quantity: ' . $product['quantity'] . '</p>';
                           echo '</div>';
                           echo '</div>';
                        }
                     }
                  } else {
                     echo 'geen producten';
                  }
                  ?>
               </div>
               <p>Total: €<span id="total-price"><?php echo $total; ?></span></p>
               <form action="order.php" method="post">

                  <button id="checkout" class="btn">Checkout</button>
               </form>
            </div>
         </div>
      </div>
   </section>

   <?php include '../includes/footer.php'; ?>
   <script src="../js/script.js"></script>
</body>

</html>
