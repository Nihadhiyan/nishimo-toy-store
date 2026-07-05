# Nishimo Toy Store

A PHP + MySQL e-commerce website for an online toy store — browsing products by category, cart and checkout, customer accounts, and an admin panel for managing products and orders.

> "Where Playtime Never Grows Up"

## Tech Stack

- **PHP** (procedural, session-based)
- **MySQL** (via PDO)
- **Vanilla JavaScript** (cart, search)
- **CSS** (no framework — custom stylesheets per component)
- **MySQL Workbench** model file for the database schema

## Features

- **Storefront**: home page with banners and quick categories, product listing (`products.php`), product detail pages (`product-details.php`), and search (`JS/search.js`).
- **Cart & checkout**: add/update/remove items client-side (`JS/cart.js`) backed by `cart.php` / `cart_action.php`, with `checkout.php` and an `order_success.php` confirmation page.
- **Accounts**: registration and login (`register.php`, `login.php`) with session-based auth (`login.php` sets `$_SESSION["user_id"]`, `user_name`, and `role`), a customer profile page (`customer_page.php`), and logout handling.
- **Role-based routing**: on login/session check, users with the `admin` role are redirected to the admin dashboard; regular customers see the storefront.
- **Admin panel** (`Admin/`): add, update, delete, and manage products (`addProduct.php`, `updateProduct.php`, `deleteProduct.php`, `manageProduct.php`) and manage customer orders (`manageOrders.php`).
- **Static pages**: `about.php`, `contact.php`.

## Project Structure

```
nishimo-toy-store/
├── Admin/                    # Admin-only pages (product & order management)
│   ├── addProduct.php
│   ├── deleteProduct.php
│   ├── manageOrders.php
│   ├── manageProduct.php
│   └── updateProduct.php
├── includes/                 # Shared partials
│   ├── db.php                  # PDO database connection
│   ├── header.php / footer.php
│   ├── sidebar.php / admin_sidebar.php
│   └── admin_header.php
├── JS/
│   ├── cart.js                 # Cart interactions
│   ├── main.js                 # General front-end behavior
│   └── search.js                # Product search
├── styles/                   # Per-component CSS (header, footer, cart, login, products, etc.)
├── photos/                   # Product, category, banner, and logo images
├── Assets/                   # Extra media (background video/GIF) and third-party logos
├── DataBase/                 # MySQL Workbench schema model (DB Model.mwb)
├── index.php                 # Homepage
├── products.php               # Product listing
├── product-details.php        # Single product view
├── cart.php / cart_action.php # Cart page and cart operations
├── checkout.php               # Checkout flow
├── order_success.php          # Order confirmation
├── login.php / register.php / logout.php
├── customer_page.php          # Customer account/profile
├── about.php / contact.php
```

## Getting Started

### Prerequisites

- PHP 7.4+ (with PDO MySQL extension enabled)
- MySQL/MariaDB
- A local server stack such as XAMPP, WAMP, or MAMP (or `php -S` + a MySQL instance)

### Setup

1. **Clone the repo** into your web server's document root (e.g. `htdocs/` for XAMPP):
   ```bash
   git clone https://github.com/Nihadhiyan/nishimo-toy-store.git
   ```

2. **Create the database.** Open `DataBase/DB Model.mwb` in MySQL Workbench and forward-engineer it to create the `nishimo_store` schema, or export a SQL script from the model and import it via phpMyAdmin/CLI.

3. **Configure the database connection.** The connection is defined in `includes/db.php`:
   ```php
   $servername = "localhost";
   $db = "nishimo_store";
   $username = "root";
   $password = "";
   ```
   Update these to match your local MySQL credentials if they differ from the defaults.

4. **Start the server.** For XAMPP/WAMP, start Apache and MySQL, then visit:
   ```
   http://localhost/nishimo-toy-store/index.php
   ```
   Or, using PHP's built-in server:
   ```bash
   php -S localhost:8000
   ```

5. **Register an account** via `register.php` to browse as a customer, or set a user's `role` column to `admin` in the database to access the admin panel under `/Admin`.

## Notes

- Database credentials in `includes/db.php` are currently hardcoded for local development (default XAMPP `root` user, no password) — update these before deploying anywhere beyond localhost, and avoid committing real credentials.
- The admin/customer distinction is driven by a `role` column on the user record, checked at login and on protected pages.
