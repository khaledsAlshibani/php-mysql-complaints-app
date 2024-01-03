# Complaints and Suggestions Web App

Welcome to the Complaints and Suggestions app, a powerful CRUD (Create, Read, Update, Delete) application developed with PHP for the backend, MySQLi for seamless MySQL interactions, and Bootstrap 5.3.2 for an elegant frontend. The codebase is meticulously organized for clarity, with extensive comments for easy understanding and customization.

- [Complaints and Suggestions Web App](#complaints-and-suggestions-web-app)
  - [Key Technologies](#key-technologies)
  - [Features](#features)
    - [User Capabilities:](#user-capabilities)
    - [Admin Capabilities:](#admin-capabilities)
  - [Installation](#installation)
  - [Login Credentials](#login-credentials)

## Key Technologies

- **HTML**
- **Backend:** PHP, MySQL
- **Frontend:** Bootstrap 5.3.2

## Features

- **Structured Codebase:** The code is not just functional but also organized and well-commented, utilizing MySQLi for efficiency and transparency.
- **User Management:** Users can be manually created through phpMyAdmin or SQL terminal commands.
- **Authentication App:** A robust login app caters to two user types: admin and regular users.
- **Error logs:** Errors are generated inside the `error.log` file for streamlined debugging.

### User Capabilities:

- **Feedback Submission:** Users can effortlessly submit complaints or suggestions.
- **Feedback Management:** An intuitive interface empowers users to view, update, and delete their submitted feedback.

### Admin Capabilities:

- **Feedback Review:** Admins can provide feedback on all complaints or suggestions submitted by users.
- **Comprehensive Dashboard:** Admins have access to an overview of all feedback, ensuring efficient management.
- **Feedback Administration:** Admins have complete control to update feedback content or remove entries.

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/khaledsAlshibani/complaints-and-suggestions-webapp.git
   ```

2. **Import the Database:**
  - Navigate to the db folder and find the complaints_suggestions_db.sql file.
  - Create a MySQL database using your preferred method, such as http://localhost/phpmyadmin/index.php for localhost installations.
  - Import the database file into the created database.

## Login Credentials

**Admin:**
- **Username:** `Admin`
- **Password:** `admin123`

**Users:**
1. **Username:** `Ahmed`
   - **Password:** `ahmed123`

2. **Username:** `Mohammed`
   - **Password:** `mohammed2123`