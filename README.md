# 🛍️ Shop Nix – Modern eCommerce Website for Electronics

A responsive and feature-rich full-stack eCommerce platform for electronics built with PHP, MySQL, and frontend tools. Supports user and admin login, product categories, cart/wishlist system, and admin dashboard.

---

## 🚀 Features  

- 🔐 Secure login/register for Users & Admins
- 🛍️ Browse by categories (Laptop, Smartphone, Camera, Watch)
- ❤️ Wishlist and 🛒 Cart functionality
- 📦 Simulated checkout & order management
- 🎯 Admin dashboard: add/edit/delete products, view users & orders
- 📱 Responsive mobile-first design with animations
- 🎬 Netflix-style intro animation

---

## 📂 Project Structure  

```bash
E-Commerce/
├── admin/              # Admin panel pages
├── components/         # Common PHP scripts
├── css/                # Stylesheets
├── js/                 # JS scripts
├── images/             # Static assets
├── uploaded_img/       # Product images
├── *.php               # Main site pages
└── shop_db.sql         # MySQL DB dump
               
```
## ⚙️ Getting Started  

### 🔧 Requirements

- XAMPP / WAMP

- PHP 7+

- MySQL

- Web browser

🛠️ Setup Instructions

### 🔹 1. Clone the Repository

```bash
git clone https://github.com/your-username/E-Commerce.git
cd E-Commerce

```
### 🔹 2.Move to XAMPP folder


```bash
C:\xampp\htdocs\E-Commerce

```

### 🔹 3.Create Database

- Open http://localhost/phpmyadmin

- Create a DB named shop_db

- Import shop_db.sql

🔹 4.Run Application

- User: http://localhost/E-Commerce/home.php

- Admin: http://localhost/E-Commerce/admin/admin_login.php


### 📸 Screenshots

### 📸 Screenshots

<p align="center"> 
  <img src="screenshots/Screenshot (23).png" alt="Intro Animation" width="300"/> 
  <img src="screenshots/Screenshot (24).png" alt="Home Page" width="300"/> 
  <img src="screenshots/Screenshot (25).png" alt="Register Page" width="300"/> 
</p>

<p align="center"> 
  <img src="screenshots/Screenshot (26).png" alt="Cart Page" width="300"/> 
  <img src="screenshots/Screenshot (27).png" alt="Admin Dashboard" width="300"/> 
  <img src="screenshots/Screenshot (28).png" alt="Orders Page" width="300"/> 
</p>

<p align="center">
  <em>Intro Animation • Home Page • Register Page • Cart • Admin Dashboard • Orders</em>
</p>


---

### 🔐 Sample Admin Access
- ⚠️ Ensure these credentials exist in your database or insert them manually using phpMyAdmin.

- Username: admin123

- Password: admin123

### 🧩 Tech Stack

- Frontend: HTML5, CSS3, JavaScript, Swiper.js

- Backend: PHP

- Database: MySQL

- Platform: XAMPP (localhost)

- Tools: phpMyAdmin, VS Code

### 🔮 Future Enhancements

💳 Integrate payment gateway (Razorpay/Stripe)

🌟 Product ratings & reviews

🔍 Advanced search filters

📦 Inventory/stock alerts

🚚 Delivery tracking mockup

📱 PWA support for mobile view

---

### 👨‍💻 Developer
- Srinidhi SN
