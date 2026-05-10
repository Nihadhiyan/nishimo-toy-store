<!-- navbar -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/logo.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/button.css">

</head>

<body>
    <header>
        <div class="header-left">
            <a href="#" class="logo-container" aria-label="Go to homepage">
                <img src="photos/Logo/Nishimo OG logo.jpg" alt="Logo" class="logo">
            </a>
            <button class="categories-button categoriesButton" aria-label="Browse categories">
                <i class="fa fa-bars menu-icon"></i>
                <span>Categories</span>
            </button>
        </div>
        <div class="header-center">
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Search">
                <button class="search-icon-button" aria-label="Search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="header-right">
            <nav aria-label="Main navigation">
                <ul class="nav-buttons-container">
                    <li>
                        <a href="#"><i class="fa fa-shopping-bag"></i> <span>Orders</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-heart"></i> <span>Favourites</span></a>
                    </li>
                    <li>
                        <?php
                        $cart_count = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $qty) {
                                $cart_count += $qty;
                            }
                        }
                        if ($cart_count > 0) :
                        ?>
                            <div class="cart-number"><?php echo $cart_count; ?></div>
                        <?php endif; ?>
                        <a href="cart.php"><i class="fa fa-shopping-cart"></i> <span>Cart</span></a>
                    </li>
                </ul>
            </nav>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION["user_id"])):
                $avatar_url = "https://ui-avatars.com/api/?name=" . urlencode($_SESSION['user_name']) . "&background=2563EB&color=fff";
            ?>

                <div class="my-profile">
                    <img src="<?php echo $avatar_url; ?>" alt="Profile" class="profile-image">
                    <div class="dropdown">
                        <div class="profile-name"><?php echo htmlspecialchars($_SESSION['user_name']); ?></div>
                        <div class="role" style="text-transform: capitalize;"><?php echo htmlspecialchars($_SESSION['role']); ?></div>
                        <hr style="margin: 8px 0; background-color: var(--border-color);">

                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <a href="Admin/manageProduct.php"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
                        <?php else: ?>
                            <a href="customer_page.php"><i class="fa fa-user-circle"></i> My Account</a>
                        <?php endif; ?>

                        <a href="logout.php" style="color: var(--error-color);"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>

            <?php else: ?>
                <a href="login.php" class="login-button">
                    Log In
                </a>
            <?php endif; ?>
        </div>
    </header>
</body>

</html>