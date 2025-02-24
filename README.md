# Authentication System with Sign In and Sign Up

This project is a simple authentication system built using PHP, MySQL, and Bootstrap. It includes a combined Sign In and Sign Up page and a User Profile page where users can view and update their profile information.

## Features

- Sign In: Users can sign in using their email and password.
- Sign Up: Users can create a new account by providing their email, password, and confirming their password.
- User Profile: Users can view and update their profile information, including their name, email, password, and profile picture.

## Requirements

- PHP 7.0 or higher
- MySQL database
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/1dev-hridoy/Simple-User-Account-Management.git
cd auth-system
```

2. Import the database:

- Create a MySQL database.
- Import the `create_user_profile_table.sql` file to create the necessary table:

```sql
CREATE TABLE user_profiles (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_picture_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

3. Update the database configuration in `database/dbcon.php`:

```php
$host = 'localhost'; // or your database host
$db = 'your_database_name'; // your database name
$user = 'your_database_user'; // your database username
$pass = 'your_database_password'; // your database password
```

4. Ensure the `uploads` directory exists and is writable:

```bash
mkdir uploads
chmod 755 uploads
```

## Usage

1. Start your web server.
2. Navigate to `auth.php` in your browser to access the Sign In / Sign Up page.
3. Sign in or sign up to access the User Profile page.

## File Structure

- `auth.php`: Handles both sign-in and sign-up functionalities.
- `profile.php`: Displays and updates user profile information.
- `database/dbcon.php`: Database connection file.
- `assets/css/profile-styles.css`: Custom styles for the profile page.
- `create_user_profile_table.sql`: SQL script to create the `user_profiles` table.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.