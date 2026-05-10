<!-- shopping cart -->

   <?php
   session_start();
   include ('includes/db.php');

   if(!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
   }

   $total_items = 0;
   foreach($_SESSION['cart'] as $qty) {
      $total_items += $qty;
   }
   ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title>
 </head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="styles/style.css">
   <link rel="stylesheet" href="styles/logo.css">
   <link rel="stylesheet" href="styles/button.css">
   <link rel="stylesheet" href="styles/header.css">
   <link rel="stylesheet" href="styles/footer.css">
   <link rel="stylesheet" href="styles/footerCopyrights.css">
   <link rel="stylesheet" href="styles/cart.css">

 <body>

   <?php include("includes/header.php"); ?>

   <div style="padding-top: 100px;"></div>
   
   <main class="cart">
      <div class="cart-middle-part">
         <div class="cart-topbar">
            <h2 class="cart-head-text">Cart(<?php echo $total_items; ?>)</h2>

            <?php if(!empty($_SESSION['cart'])): ?>
               <div class="checkbox-with-label">
                  <input type="checkbox" name="cart-select-all-items" id="cart-select-all-items" checked>
                  <label class="cart-select-all-items-text">Select All Items</label>
            </div>
            <?php endif; ?>
         </div>

         <ul class="cart-items">

               <?php
               $grand_total = 0;

               if(empty($_SESSION['cart'])) {
                  echo "<div style='padding: 40px; text-align: center;'>";
                  echo "<h2>Your cart is empty!</h2>";
                  echo "<p style='color: var(--text-muted-color); margin-top: 8px;'>Add some awesome toys to see them here.</p>";
                  echo "<a href='index.php' class='checkout-button' style='display: inline-block; margin-top: 24px;'>Continue Shopping</a>";
                  echo "</div>";
               } else {
                  $placeholders = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
                  $product_ids = array_keys($_SESSION['cart']);

                  try {
                     $stmt = $conn->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
                     $stmt->execute($product_ids);
                     $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                     foreach($products as $product) {
                        $product_id = $product['id'];
                            $quantity = $_SESSION['cart'][$product_id];
                            $subtotal = $product['price'] * $quantity;
                            $grand_total += $subtotal;

                            ?>

               <li class=cart-item>

               <input type="checkbox" id="product" checked>

               <a href="product-details.php?id=<?php echo $product_id ?>" class="cart-product-image-container">
                  <img src="<?php echo htmlspecialchars($product['image_url']) ?>" alt="<?php echo htmlspecialchars($product['name']) ?>">
               </a>
               <div class="cart-product-details">
                  <a href="product-details.php?id=<?php echo $product_id ?>" class="cart-product-name">
                     <?php echo htmlspecialchars($product['name']) ?>
                  </a>
                  <a href="#" class="cart-product-category">
                     <?php echo htmlspecialchars($product['category']) ?>
                  </a>
                  <div class="cart-product-price">Rs. <?php echo number_format($product['price'], 2); ?></div>
               </div>

               <div class="cart-items-buttons">
                  <div class="cart-delete-favourit-button-container">
                     <a href="remove_from_cart.php?id=<?php echo $product_id; ?>" class="cart-item-button" style="color: var(--text-muted-color); transition: 0.3s;"><i class="fas fa-trash"></i></a>
                     <button class="cart-item-button"><i class="fa fa-heart"></i></button>
                  </div>

                  <div class="quantity-button"><button class="minus-button">-</button>
                  <input type="text" value="<?php echo $quantity; ?>" min="1" class="cart-quantity-input-value" readonly>
                  <button class="plus-button">+</button></div>
               </div>
            
            </li>
            <?php
                     }
                  } catch(PDOException $e) {
                     echo "<p style='color:red;'>Failed to load cart items.</p>";
                  }
               }
               ?>
            
         </ul>
      </div>

      <div class="cart-side-part">
         <div class="cart-sidebar-upper">
            <h2 class="cart-summary-text">Summary</h2>
            <div class="cart-side-bar-estimation-part">
               <div class="estimated-total-text">Estimated Total:</div>
               <div class="estimated-total-price"
               <h2>Rs. <?php echo number_format($grand_total, 2); ?></h2>
            </div>
            </div>
            <a href="checkout.php" class="checkout-button" style="text-align: center;">Checkout(<?php echo $total_items; ?>)</a>
         </div>
      </div>
    </main>

    <?php include("includes/footer.php"); ?>
    
 </body>
 </html>