<?php
session_start();
include 'database/dbcon.php';

// Initialize variables
$signInError = '';
$signUpError = '';
$signUpSuccess = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signin'])) {
        // Handle sign-in form submission
        $email = $_POST['signinEmail'];
        $password = $_POST['signinPassword'];

        $stmt = $pdo->prepare('SELECT * FROM user_profiles WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: profile.php');
            exit();
        } else {
            $signInError = 'Invalid email or password';
        }
    } elseif (isset($_POST['signup'])) {
        // Handle sign-up form submission
        $email = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];
        $confirmPassword = $_POST['signupConfirmPassword'];

        if ($password !== $confirmPassword) {
            $signUpError = 'Passwords do not match';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            try {
                $stmt = $pdo->prepare('INSERT INTO user_profiles (email, password) VALUES (?, ?)');
                $stmt->execute([$email, $hashedPassword]);
                $signUpSuccess = 'Registration successful! You can now sign in.';
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $signUpError = 'Email already exists';
                } else {
                    $signUpError = 'An error occurred';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In / Sign Up</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a>
                    </li>
                </ul>
                <div class="tab-content" id="authTabContent">
                    <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                        <form class="mt-4" method="POST" action="auth.php">
                            <?php if ($signInError): ?>
                                <div class="alert alert-danger"><?php echo $signInError; ?></div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="signinEmail">Email address</label>
                                <input type="email" class="form-control" id="signinEmail" name="signinEmail" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="signinPassword">Password</label>
                                <input type="password" class="form-control" id="signinPassword" name="signinPassword" placeholder="Password" required>
                            </div>
                            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                        <form class="mt-4" method="POST" action="auth.php">
                            <?php if ($signUpError): ?>
                                <div class="alert alert-danger"><?php echo $signUpError; ?></div>
                            <?php endif; ?>
                            <?php if ($signUpSuccess): ?>
                                <div class="alert alert-success"><?php echo $signUpSuccess; ?></div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="signupEmail">Email address</label>
                                <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="signupPassword">Password</label>
                                <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="signupConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="signupConfirmPassword" name="signupConfirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" name="signup" class="btn btn-success btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>