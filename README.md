# Secure Authentication and User Management System

This repository contains the source code for a **Secure Authentication and User Management** web application built using **PHP**, **MySQL**, and **Tailwind CSS**. The application implements a custom **Authentication, Authorization, and Accounting (AAA)** framework to securely manage users, roles, and access permissions.

## Features

- **User Registration and Authentication**:
  - Users can sign up and log in using a secure system with password hashing.
  - Admin users are registered automatically when a username starts with `adm` and ends with `99@` during registration.
  - The system restricts access to sensitive areas based on user roles (admin, user).
  
- **Role-Based Access Control (RBAC)**:
  - Admin users can assign roles (admin/user) to other registered users.
  - Specific functionalities are restricted to certain roles, ensuring a secure and well-managed environment.
  
- **Failed Login Attempts Tracking**:
  - Failed login attempts are tracked, and after a certain number of failed attempts, the user’s account may be locked or further actions triggered.

- **User Logs**:
  - All user activities (e.g., login, log out, role changes) are logged to ensure accountability.
  
- **Password Hashing**:
  - Passwords are hashed using secure hashing algorithms (e.g., Bcrypt) to ensure that even in the event of a data breach, passwords remain protected.
  
- **Session Management**:
  - Secure session handling ensures that user sessions are maintained and protected, avoiding session hijacking.
  
- **Custom Role Assignment by Admin**:
  - Only admin users have the authority to change the roles of other users post-registration.

