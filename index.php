<?php
include
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/profile-styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">User Profile</h2>
                <form id="profileForm">
                    <div class="form-group text-center">
                        <img src="default-profile.png" alt="Profile Picture" class="profile-pic mb-3">
                        <input type="file" class="form-control-file" id="profilePic" disabled>
                    </div>
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" placeholder="Enter your name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email address</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Enter your email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">New Password</label>
                        <input type="password" class="form-control" id="userPassword" placeholder="Enter new password" disabled>
                    </div>
                    <div class="form-group">
                        <label for="userConfirmPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="userConfirmPassword" placeholder="Confirm new password" disabled>
                    </div>
                    <button type="button" class="btn btn-secondary btn-block" id="editButton">Edit Profile</button>
                    <button type="submit" class="btn btn-primary btn-block" id="saveButton" style="display: none;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./assets/js/app.js"></script>
</body>
</html>