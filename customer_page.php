<!-- homepage -->
<?php
    session_start();

    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $user_name = $_SESSION["user_name"];
        $role = $_SESSION["role"];

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
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/categories.css">
    <link rel="stylesheet" href="styles/product.css">
    <link rel="stylesheet" href="styles/productCard.css">

</head>

<body>
    <?php include("includes/header.php");?>

    <?php if($successMsg) { ?>
        <script>
            alert("<?php echo $successMsg; ?>");
        </script>
    <?php } ?>

    <aside class="side-bar">
        <div class="sidebar-filter">
            <div class="sidebar-topic">FILTER</div>
            <div class="sidebar-price-range">
                <div class="sidebar-sub-topic">Price, $</div>
                <input type="text" placeholder="Min" class="min-input">
                <input type="text" placeholder="Max" class="max-input">
            </div>
            <div class="sidebar-filter-brand">
                <div class="sidebar-sub-topic">Brands</div>
                <ul class="brands-selection">
                    <li class="brand">
                        <input type="checkbox" id="brand_1">
                        <span class="selection-text">Hot Wheels</span>
                    </li>
                    <li class="brand">
                        <input type="checkbox" id="brand_2">
                        <span class="selection-text">VTech</span>
                    </li>
                    <li class="brand">
                        <input type="checkbox" id="brand_3">
                        <span class="selection-text">Lego</span>
                    </li>
                    <li class="brand">
                        <input type="checkbox" id="brand_4">
                        <span class="selection-text">Emco Toys</span>
                    </li>
                </ul>
            </div>
            <div class="sidebar-filter-model">
                <div class="sidebar-sub-topic">Models</div>
                <ul class="model-selection">
                    <li class="model">
                        <input type="checkbox" id="model_1">
                        <span class="selection-text">Remote</span>
                    </li>
                    <li class="model">
                        <input type="checkbox" id="model_2">
                        <span class="selection-text">Normal</span>
                    </li>
                    <li class="model">
                        <input type="checkbox" id="model_3">
                        <span class="selection-text">Remote + Normal</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-bottom-part">
            <div class="sidebar-categories">
                <div class="sidebar-topic">CATEGORIES</div>
                <ul>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Pops</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Toy Cars</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Soft toys</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Remote Conroled Toys</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Construction and Stacking</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Lego Toys</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Puzzles</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Pretend Toys</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Board Games</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Baby Rattles</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Action Games</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Educational Games</a></li>
                </ul>
            </div>

            <div class="sidebar-brands">
                <div class="sidebar-topic">BRANDS</div>
                <ul>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Hot Wheels</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Panther</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">EMCO Toys</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Hasbro</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">VTech</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Barbie</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Kid Joy</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Pheonix</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Nangrow</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Matchbox</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Atlas</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Lego</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Intex</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Fisherprice</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Arrow</a></li>
                    <li><a href="#" class="sidebar-category-and-brand-texts">Melissa & Doug</a></li>
                </ul>
            </div>
        </div>
    </aside>

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

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>


                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <a href="#" class="product-image"><img src="photos/Products photo/product 1.webp" alt="Shimo Pop"></a>
                        <div class="product-details">
                            <a href="#" class="product-name">Funko Pop! Godzilla vs Kong 2: The New Empire – Shimo with Ice-Ray</a>
                            <div class="product-category">Pops</div>
                            <div class="product-price">Rs.7000.00</div>
                        </div>
                        <div class="product-buttons">
                            <button class="add-to-cart-button addToCartButton">Add To Cart</button>
                            <button class="favourite-button"><i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <?php include("includes/footer.php");?>

    <script src="JS/main.js"></script>
</body>

</html>