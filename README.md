# 🚲 Bike Rental Portal

![License](https://img.shields.io/badge/License-Educational-blue.svg)  
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?logo=php&logoColor=white)  
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)  
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-blueviolet?logo=bootstrap&logoColor=white)  

A **PHP & MySQL based web application** for renting bikes online.  
Includes a **user portal** to browse, search, and book bikes, and an **admin panel** to manage inventory, bookings, and users.  
Perfect for **final year projects** and learning full-stack web development with PHP.

---

## ✨ Features

### 🧑‍💻 User Side
- 🔐 User Registration & Login
- 🔍 Search bikes with filters
- 📋 View bike details with images
- 📆 Check bike availability
- 🛒 Book bikes online
- 📌 Manage bookings (view/cancel)
- 📝 Post & view testimonials
- 👤 Update profile & password
- 📧 Contact form for queries

### 🛠 Admin Side
- 🔑 Admin login
- 📊 Dashboard overview
- 🚲 Manage bikes (add, edit, delete)
- 🖼 Upload multiple bike images
- 🏷 Manage brands
- 📅 Handle bookings (confirm/cancel)
- 👥 Manage users
- 🗣 Manage testimonials
- 🔒 Change admin password

---

## 🛠 Tech Stack

| Technology   | Purpose            |
|--------------|--------------------|
| **PHP**      | Backend logic      |
| **MySQL**    | Database           |
| **Bootstrap**| Styling & layout   |
| **HTML5/CSS3**| Structure & design |
| **JavaScript/jQuery** | Interactivity |
| **Apache (XAMPP/WAMP)** | Local server |

---

## 📂 Folder Structure
Bikerental/
│
├── bikerental/ # Main project folder
│ ├── admin/ # Admin panel
│ ├── css/ # Stylesheets
│ ├── images/ # Project images
│ ├── includes/ # Config, header, footer
│ ├── js/ # Scripts
│ ├── bike-listing.php
│ ├── check_availability.php
│ ├── contact-us.php
│ ├── index.php
│ ├── my-booking.php
│ ├── profile.php
│ └── ... (more PHP files)
│
└── database/ # SQL file


## ⚙️ Installation & Setup

1️⃣ **Download & Extract** into `htdocs` (XAMPP) or `www` (WAMP)  
2️⃣ **Create Database** in phpMyAdmin → Import `bikerental.sql`  
3️⃣ **Update Config** in `includes/config.php`:
```php
$dbuser = 'root';
$dbpass = '';
$dbname = 'bikerental';
4️⃣ Run Project → http://localhost/bikerental



🔑 Default Login Credentials
Admin
Username: admin  
Password: admin123

