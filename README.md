🏛️ Citizen Complaint Management System (Nagrik Grievance & Resolution Portal)

A web-based complaint management system developed using **HTML, CSS, JavaScript, PHP, and MySQL**.  
This system allows citizens to submit complaints related to public services and enables administrators to manage and resolve them efficiently.


 🚀 Features

 👨‍💻 Citizen Side
- Submit complaints without login
- Generate unique complaint ID automatically
- Track complaint status using complaint ID
- View **Achievements page** (only completed complaints)

🛠️ Admin Side
- Secure admin login system
- Admin registration system
- View all complaints in dashboard
- Update complaint status:
  - Pending
  - In Progress
  - Completed
- Search complaints by ID
- Logout system



🧰 Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- XAMPP Server

🗄️ Database

The system uses MySQL database with tables such as:
- admin
- complaints

Each complaint has:
- Unique Complaint ID
- Name
- Problem Type (Transport, Electricity, Water, Others)
- Address
- Contact Number
- Status
- Timestamp

⚙️ Installation & Setup

 Step 1: Clone or Download Project
Place the project folder inside:



C:\xampp\htdocs\

### Step 2: Start Server
Start Apache and MySQL using XAMPP Control Panel.

---

### Step 3: Import Database
- Open phpMyAdmin
- Create database: `nagrik_complaint`
- Import provided SQL file (if available)

---

## 🔐 Initial Setup (First Admin Registration)

When the project is installed for the first time, there will be no admin account in the system. To create the first admin account, follow these steps:

### Step 1: Temporarily Allow Admin Registration

Open:

```

admin/register_admin.php

````

Comment out or remove:

```php
// session_start();

// if(!isset($_SESSION['admin'])){
//     header("Location:login.php");
//     exit();
// }
````

---

### Step 2: Create First Admin

Open in browser:

```
http://localhost/nagrik-complaint/admin/register_admin.php
```

Create your first admin account.

---

### Step 3: Restore Security

After creating the admin, re-enable the session protection code to secure the system.

---

## 📸 System Modules

* Home Page (Hero section with background image)
* About Page
* Complaint Submission Form
* Complaint Search System
* Achievements Page (Completed complaints only)
* Admin Login System
* Admin Dashboard
* Complaint Status Management

---

## 🔐 Security Features

* Password hashing using `password_hash()`
* Password verification using `password_verify()`
* Session-based admin authentication
* Protected admin routes

---

## 📈 Future Improvements

* Email/SMS notification system
* File/image upload for complaints
* Mobile application version
* Role-based admin access
* Advanced analytics dashboard
* Google Maps integration for location tracking

---

## 👨‍🎓 Academic Purpose

This project is developed as a **Web Technology semester project (5th Semester)** to demonstrate practical implementation of:

* Frontend development
* Backend development
* Database integration
* CRUD operations
* Authentication system

---

## 📂 Project Structure

```
nagrik-complaint/
│
├── admin/
├── includes/
├── assets/
│   ├── css/
│   ├── images/
├── index.php
├── about.php
├── make_complaint.php
├── search.php
├── achievements.php
└── README.md
```

---

## 🙏 Acknowledgement

This project is developed for educational purposes with guidance from web technology learning. 
It demonstrates how digital systems can improve public service communication and transparency.

---

## 📌 Author

Developed by:Bishmendra Kumar Sah
Semester: 5th Semester
Subject: Web Technology



