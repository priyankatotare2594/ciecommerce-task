# 🛒 CodeIgniter E-commerce Task

This is a backend E-commerce application developed using the CodeIgniter 3 framework.  
The project demonstrates product management with multiple image upload functionality using proper MVC architecture and relational database structure.
---
##  Features

- Add Product (Name, Price)
- Upload Multiple Images for Each Product
- View Product List
- Edit Product
- Delete Product
- Relational Database (Products & Product Images)
- MVC Architecture Implementation
---
##  Technology Used
- PHP
- CodeIgniter 3
- MySQL
- HTML
- CSS
- Bootstrap
- XAMPP (Apache & MySQL)
---

##  Database Details
**Database Name:** `ciecommerce_db`
### Tables:
### 1. products
- id (Primary Key, Auto Increment)
- name
- price
- created_at

### 2. product_images
- id (Primary Key, Auto Increment)
- product_id (Foreign Key)
- image_path
- created_at

---

##  Installation & Setup

1. Clone the repository:

```
git clone https://github.com/priyankatotare2594/ciecommerce-task.git
```

2. Move the project folder to:

```
C:\xampp\htdocs\
```

3. Open phpMyAdmin and create a new database:

```
ciecommerce_db
```

4. Import the SQL file into the database (if provided).

5. Configure database settings in:

```
application/config/database.php
```

Update credentials:
```
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'ciecommerce_db',
```
6. Start Apache and MySQL from XAMPP.

7. Run the project in browser:
```
http://localhost/ciecommerce-task/
```
---
##  Folder Structure

- application/  → Controllers, Models, Views
- system/       → CodeIgniter core files
- uploads/      → Product images
- assets/       → CSS, JS, Bootstrap files
---
##  Developed By
**Priyanka Lende**  
Junior Software Developer
**Priyanka Lende**  
Junior Software Developer
