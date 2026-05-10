<!-- homepage -->
<?php
session_start();
include("includes/db.php");

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $role = $_SESSION["role"];

    if ($role == "admin") {
        header("Location: admin_dashboard.php");
        exit();
    }
}

$successMsg = isset($_SESSION["status"]) && $_SESSION["status"] == "success" ? "Login successful! Welcome back." : null;

unset($_SESSION["success"]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nishimo - Where Playtime Never Grows Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/logo.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/quickCategory.css">
    <link rel="stylesheet" href="styles/categories.css">
    <link rel="stylesheet" href="styles/product.css">
    <link rel="stylesheet" href="styles/productCard.css">

</head>

<body>
    <?php include("includes/header.php"); ?>

    <?php if ($successMsg) { ?>
        <script>
            alert("<?php echo $successMsg; ?>");
        </script>
    <?php } ?>

    <?php include("includes/sidebar.php"); ?>

    <main>
        <section class="quick-cats">
            <div class="bg-video">
                <img src="Assets/Extras/Background GIF.gif" alt="block-video-gif">
            </div>

            <ul class="quick-nav-links">
                <li>
                    <a href="#">Best Sellers</a>
                </li>
                <li>
                    <a href="#">Most Viewed</a>
                </li>
                <li>
                    <a href="#">Offer Products</a>
                </li>
                <li>
                    <a href="#">New In</a>
                </li>
                <li>
                    <a href="#">Highly Recommended</a>
                </li>
                <li>
                    <a href="#">5 Star Rated</a>
                </li>
            </ul>
        </section>

        <section class="categories">
            <div class="shop-by-category-text">Shop By Category</div>
            <ul class="categories-list">
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Soft Toys.jpg" alt="Soft Toys"></div>
                        Soft toys
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Remote Control.jpg" alt="Soft Toys"></div>
                        Remote Controle
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Puzzles.jpeg" alt="Soft Toys"></div>
                        Puzzles
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Pops.webp" alt="Soft Toys"></div>
                        Pops
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Lego.jpg" alt="Soft Toys"></div>
                        Lego
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="category-photo-holder"><img src="photos/Category Photos/Borad Games.jpg" alt="Soft Toys"></div>
                        Board Games
                    </a>
                </li>
            </ul>
        </section>

        <section class="products-sections">
            <section class="products-section-part">
                <div class="topic-text">Best Sellers</div>
                <div class="products">
                    <?php
                    try {
                        $stmt = $conn->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 10");
                        $stmt->execute();
                        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($products) {
                            foreach ($products as $product) {
                    ?>
                                <div class="product-card">

                                    <a href="product-details.php?id=<?php echo $product['id']; ?>" class="product-image">
                                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    </a>

                                    <div class="product-details">
                                        <a href="product-details.php?id=<?php echo $product['id']; ?>" class="product-name">
                                            <?php echo htmlspecialchars($product['name']); ?>
                                        </a>
                                        <div class="product-category"><?php echo htmlspecialchars($product['category']); ?></div>
                                        <div class="product-price">Rs.<?php echo number_format($product['price'], 2); ?></div>
                                    </div>
                                    <div class="product-buttons">
                                        <button class="add-to-cart-button addToCartButton" data-id="<?php echo $product['id']; ?>">Add To Cart</button>
                                        <button class="favourite-button favouriteButton" data-id="<?php echo $product['id']; ?>"><i class="fa fa-heart"></i></button>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "<p style='font-size: 18px; color: var(--text-muted-color);'>No products found.</p>";
                        }
                    } catch (PDOException $e) {
                        echo "<p style='color: var(--error-color);'>Failed to load products. Please check database connection.</p>";
                    }
                    ?>

                </div>
            </section>
        </section>
    </main>

    <?php include("includes/footer.php"); ?>

    <script src="JS/main.js"></script>
</body>

</html>