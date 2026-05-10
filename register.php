<!-- registration page (backend logic) -->
<?php
    session_start();
    include ("includes/db.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        if(empty($name) || empty($email) || empty($password)) {
            $_SESSION["error-required"] = "All fields are required!";
            header("Location:register.php");
            exit;
        } 
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["error-email"] = "Invalid email format!";
            header("Location: register.php");
            exit();
        }

        if(strlen($password) < 8) {
            $_SESSION["error-password"] = "Password must be at least 8 characters.";
            header("Location: register.php");
            exit();
        }

        try{

            $checkEmail = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $checkEmail->execute([$email]);

            if($checkEmail->rowCount() > 0) {
                $_SESSION["error-email"] = "This email is already registered! Please sign in.";
                header("Location: register.php");
                exit();
            }

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);
            $_SESSION["success"] = "Registration successful! Please log in.";
            header("Location:login.php");
            exit;
        } catch(PDOException $e) {
            $_SESSION["error"] = "An error occurred during registration. Please try again later.";
            header("Location:register.php");
            exit;
        }

    }
?>

<!-- Register page -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration - Nishimo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/footerCopyrights.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/logo.css">
    <link rel="stylesheet" href="styles/register.css">

 </head>
 <body>
    <p class="logo-web-experience-text">Experience the amazing toy shop Web Application with Us.</p>

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
        <div class="signin-text">Customer Registration</div>
        <div class="privacy-confirmation-text"><i class="fa fa-lock"></i> All data will be encrypted</div>

        <?php 
            $errorMessages = [];
            if(!empty($_SESSION['error'])) {
                $errorMessages[] = $_SESSION['error'];
                unset($_SESSION['error']);
            }
            if(!empty($_SESSION['error-required'])) {
                $errorMessages[] = $_SESSION['error-required'];
                unset($_SESSION['error-required']);
            }
            if(!empty($_SESSION['error-email'])) {
                $errorMessages[] = $_SESSION['error-email'];
                unset($_SESSION['error-email']);
            }
            if(!empty($_SESSION['error-password'])) {
                $errorMessages[] = $_SESSION['error-password'];
                unset($_SESSION['error-password']);
            }

            if(!empty($errorMessages)) {
                $escapeMessages = array_map('htmlspecialchars', $errorMessages);
                echo "<div style='color: var(--error-color); font-weight:600; text-align:center; margin-bottom:16px;'>" . implode('<br>', $escapeMessages) . "</div>";
            }
        ?>

        <form action="register.php" method="post">

            <label for="username">User Name:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
           
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>


            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required minlength="8">
            <label for="password-instructions" class="password-instructions">Password should be minimum of 8 characters.</label>
            
            <input type="submit" value="Register" class="login-button">
        </form>
        <div class="divider"><hr><span>or</span><hr></div>
        <div class="social-sign-up-part">
            <button class="signup-with-social-button google-signup-button"><img src="Assets\Other companies logo\7123025_logo_google_g_icon.svg" alt="Google" class="google-logo">Continue with google</button>
            <button class="signup-with-social-button"><img src="Assets\Other companies logo\icons8-facebook.svg" alt="Facbook" class="facebook-logo">Continue with facebook</button>
        </div>

        <div class="signup-link-text">Already have an account? <a href="login.php">Sign In here</a></div>

        <div class="privacy-policy-text">By clicking register, you confirm that <strong>you're an adult</strong> and you've read and accepted our <a href="#">Nishimo Free Membership Agreement</a> and <a href="#">Privacy Policy</a>.</div>
    </div>
    <div class="footer-copyright"><p>© 2025 Nishimo. All rights reserved.</p></div>
    
 </body>
 </html>