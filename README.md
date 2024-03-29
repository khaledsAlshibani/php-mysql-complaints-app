# Complaints and Suggestions Web Application

## Overview
The Complaints and Suggestions Web App is a robust CRUD (Create, Read, Update, Delete) application developed with PHP for the backend, MySQLi for database connectivity, and Bootstrap 5.3.2 for the frontend. The primary focus is on the backend, and Bootstrap is utilized for its CSS framework to streamline frontend development.

- [Complaints and Suggestions Web Application](#complaints-and-suggestions-web-application)
  - [Overview](#overview)
  - [Key Technologies](#key-technologies)
    - [Directory Structure](#directory-structure)
    - [User Management](#user-management)
    - [Authentication](#authentication)
    - [Error Logging](#error-logging)
    - [Security](#security)
  - [User Capabilities](#user-capabilities)
  - [Admin Capabilities](#admin-capabilities)
  - [Installation](#installation)
  - [Login Credentials](#login-credentials)

## Key Technologies

- **Frontend:** HTML, Bootstrap 5.3.2
- **Backend:** PHP, MySQLi Connection, MySQL Database

### Directory Structure

The codebase follows a structured and clear directory layout for easy understanding.

### User Management

- Users are manually created through phpMyAdmin or SQL terminal commands.
- Future versions will include a user registration form.

### Authentication

- There is a login system for admin and regular users.

### Error Logging

- Errors are logged in the `logs/error.log` file for debugging.

### Security

- Passwords are stored in the database without hashing, which is a security risk.
- Future updates will implement secure password storage.

## User Capabilities

- **Feedback Submission:** Users can submit complaints or suggestions.
- **Feedback Management:** Users can view, update, and delete their submitted feedback.

![User Dashboard](./assets/screenshots/user-dashboard.png)

## Admin Capabilities

- **Feedback Review:** Admins can provide feedback on all complaints or suggestions submitted by users.
- **Comprehensive Dashboard:** Admins have access to an overview of all feedback.
- **Feedback Administration:** Admins have complete control to update feedback content or delete them.

![Admin Dashboard](./assets/screenshots/admin-dashboard.png)

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/khaledsAlshibani/php-mysql-complaints-app.git
   ```

2. **Import the Database:**
  - Navigate to the `assets > database` folder and find the `complaints_suggestions_db.sql` file.
  - Create a MySQL database using your preferred method, such as `phpMyAdmin`.
  - Import the database file into the created database.

## Login Credentials

![Users Table](./assets/screenshots/users-table.png)

**Admin:**
- **Username:** `Admin`
- **Password:** `admin123`

**Users:**
1. **Username:** `Ahmed`
   - **Password:** `ahmed123`

2. **Username:** `Mohammed`
   - **Password:** `mohammed2123`