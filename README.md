# Registration Form

A secure, responsive registration form with admin dashboard built using PHP, MySQL, JavaScript, and CSS.

## Features

### Form

- Modern and aesthetic design
- Responsive layout for all devices
- Real-time input validation
- Custom animations and transitions
- CSRF protection
- Secure password handling
- Alert system for user feedback

### Admin Dashboard

- Secure admin login system
- View all registered users
- Delete user functionality
- Responsive table design
- Session management
- Protected routes

### Security Features

- CSRF Protection
- Password Hashing
- Prepared SQL Statements
- Input Sanitization
- Content Security Policy
- XSS Protection
- Session Security
- HTTP Security Headers

## Technologies Used

- PHP 7.4+
- MySQL 5.7+
- JavaScript (ES6+)
- CSS3
- HTML5

## Directory Structure

```
Form/
├── src/
│   ├── admin/
│   │   ├── admin.css
│   │   ├── admin.js
│   │   ├── check_session.php
│   │   ├── dashboard.php
│   │   ├── delete-user.php
│   │   ├── login.php
│   │   └── logout.php
│   ├── css/
│   │   ├── animations.css
│   │   └── styles.css
│   ├── js/
│   │   ├── alerts.js
│   │   └── validation.js
│   ├── php/
│   │   ├── config.php
│   │   ├── connection.php
│   │   ├── headers.php
│   │   └── process-form.php
│   └── index.php
├── .gitignore
├── .htaccess
└── README.md
```

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/Form.git
```

2. Configure your web server (Apache/XAMPP):

   - Place the project in your web root directory
   - Enable mod_rewrite
   - Configure virtual host (optional)

3. Set up the database:

```sql
CREATE DATABASE form_db;
USE form_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Configure the database connection:
   - Update `src/php/config.php` with your database credentials

## Usage

### User Registration

1. Access the form at: `http://localhost/Form/`
2. Fill in the registration details
3. Submit the form
4. Receive confirmation message

### Admin Access

1. Navigate to: `http://localhost/Form/admin/login.php`
2. Login credentials:
   - Username: `admin`
   - Password: `admin123`
3. View registered users
4. Manage user data

## Security Configuration

### Apache (.htaccess)

- URL Rewriting enabled
- Directory listing disabled
- Protected sensitive files
- Forced HTTPS (production)

### PHP Security

- Session security measures
- Input validation
- SQL injection prevention
- XSS protection
- CSRF tokens

## Responsive Design

- Mobile-first approach
- Breakpoints:
  - Desktop: > 768px
  - Tablet: 768px
  - Mobile: 480px
- Touch-friendly interfaces
- Optimized for various devices

## Development

### Prerequisites

- XAMPP/WAMP/MAMP
- PHP 7.4+
- MySQL 5.7+
- Modern web browser

### Local Development

1. Start Apache and MySQL services
2. Place project in `htdocs` directory
3. Configure virtual host (optional)
4. Access via localhost

## Production Deployment

1. Update security headers
2. Enable HTTPS
3. Secure database credentials
4. Update admin credentials
5. Enable error logging
6. Configure backup system

## Contributing

1. Fork the repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## License

This project is licensed under the MIT License.
