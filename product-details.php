<?php
session_start();
include("includes/db.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        die("<p style='color:red; text-align:center;'>Database connection failed.</p>");
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Nishimo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/logo.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/product-details.css">
</head>

<body>

    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>


    <div style="padding-top: 80px;"></div>

    <main class="single-product-container">
        <div class="product-image-large">
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>

        <div class="product-info-panel">
            <div class="breadcrumb">
                <a href="index.php">Home</a> /
                <a href="#"><?php echo htmlspecialchars($product['category']); ?></a> /
                <span class="current"><?php echo htmlspecialchars($product['name']); ?></span>
            </div>

            <h1 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h1>
            <div class="product-category-tag"><?php echo htmlspecialchars($product['category']); ?></div>

            <div class="product-price-large">Rs. <?php echo number_format($product['price'], 2); ?></div>

            <div class="stock-status">
                <?php if ($product['stock_quantity'] > 0): ?>
                    <span style="color: var(--success-color);"><i class="fa fa-check-circle"></i> In Stock (<?php echo $product['stock_quantity']; ?> available)</span>
                <?php else: ?>
                    <span style="color: var(--error-color);"><i class="fa fa-times-circle"></i> Out of Stock</span>
                <?php endif; ?>
            </div>

            <p class="product-description">
                <?php echo isset($product['description']) ? htmlspecialchars($product['description']) : "Experience the magic of playtime with this incredible toy! Made with high-quality materials and designed for endless fun. Add it to your collection today."; ?>
            </p>

            <form action="cart_action.php" method="POST" class="add-to-cart-form">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

                <div class="quantity-selector">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $product['stock_quantity']; ?>" required>
                </div>

                <div class="action-buttons">
                    <?php if ($product['stock_quantity'] > 0): ?>
                        <button type="submit" name="add_to_cart" class="login-button add-cart-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                    <?php else: ?>
                        <button type="button" class="login-button add-cart-btn disabled" disabled>Out of Stock</button>
                    <?php endif; ?>
                    <button type="button" class="favourite-btn-large"><i class="fa fa-heart"></i></button>
                </div>
            </form>

        </div>
    </main>

    <script src="JS/main.js"></script>
</body>

</html>