<!-- login page (backend logic) -->
<?php
    session_start();
    include("includes/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["status"] = "success";
            header("Location:index.php");
            exit;
        } else {
            $_SESSION["error"] = "Invalid email or password!";
        }

    }

?>

<!-- Login page -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login - Nishimo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/footerCopyrights.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/logo.css">
    <link rel="stylesheet" href="styles/login.css">

 </head>
 <body>
    <p class="logo-web-experience-text">Experience the amazing toy shop Web Application with Us.</p>

    <?php
        if(!empty($_SESSION["error"])) {
            echo "<p style=\"color:red; font-weight:600; text-align:center;\">{$_SESSION['error']}</p>";
            unset($_SESSION["error"]);
        }
        if(!empty($_SESSION["success"])) {
            echo "<p style=\"color:green; font-weight:600; text-align:center;\">{$_SESSION['success']}</p>";
            unset($_SESSION["success"]);
        }
    ?>

     <div class="login-form-container">
        <div class="full-logo">
                <a href="#" class="logo-with-name-slogan">
                    <div class="logo-container"><img src="photos\Logo\Nishimo OG logo.jpg" alt="Logo"></div>
                    <div class="logo-name-slogan">
                        <h1 class="logo-shop-name">Nishimo</h1>
                        <h2 class="logo-slogan">Where Playtime Powers Up!</h2>
                    </div>
                </a>
            </div>
        <div class="signin-text">Customer Sign in</div>
        <div class="privacy-confirmation-text"><i class="fa fa-lock"></i> All data will be encryted</div>

        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password">
            
            <div class="forget-password-link-container"><a href="#" class="forget-password-link">Forget Password?</a></div>

            <input type="submit" value="Sign in" class="login-button">
        </form>
        <div class="divider"><hr><span>or</span><hr></div>
        <div class="social-sign-up-part">
            <button class="signup-with-social-button google-signup-button"><img src="Assets\Other companies logo\7123025_logo_google_g_icon.svg" alt="Google" class="google-logo">Sign in with google</button>
            <button class="signup-with-social-button"><img src="Assets\Other companies logo\icons8-facebook.svg" alt="Facbook" class="facebook-logo">Sign in with facebook</button>
        </div>

        <div class="signup-link-text">Don't you have a sign in Account? <a href="register.php">Sign Up</a></div>
        <div class="privacy-policy-text">By signing in, you confirm that <strong>you're an adult</strong> and you've read and accepted our <a href="#">Nishimo Free Membership Agreement</a> and <a href="#">Privacy Policy</a>.</div>
    </div>
    <div class="footer-copyright"><p>© 2025 Nishimo. All rights reserved.</p></div>
 </body>
 </html>
 


   <!-- <div class="login-form-container">
     <div>Sign in / Register</div>
        <div><i class="fa fa-lock"></i> All data will be encryted</div>
        <form action="/login" method="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">

            <input type="submit" value="Continue" class="continue-button">
        </form>
        <p class="divider">or</p>
        <div class="social-sign-up-part">
            <button class="signup-with-social-button">Sign in with google</button>
            <button class="signup-with-social-button">Sign in with facebook</button>
        </div>
        <div class="privacy-policy-text">By continuing, you confirm that <strong>you're an adult</strong> and you've read and accepted our <a href="#">Nishimo Free Membership Agreement</a> and <a href="#">Privacy Policy</a>.</div>
    </div> -->