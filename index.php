<?php
include 'database/dbcon.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $profile_picture_url = $_FILES['profile_pic']['name'] ? 'uploads/' . basename($_FILES['profile_pic']['name']) : null;

    if ($profile_picture_url) {
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $profile_picture_url);
    }

    $sql = "UPDATE user_profiles SET name = ?, email = ?, profile_picture_url = ?";
    if ($password) {
        $sql .= ", password = ?";
        $stmt = $pdo->prepare($sql . " WHERE user_id = ?");
        $stmt->execute([$name, $email, $profile_picture_url, $password, $user_id]);
    } else {
        $stmt = $pdo->prepare($sql . " WHERE user_id = ?");
        $stmt->execute([$name, $email, $profile_picture_url, $user_id]);
    }
}

$stmt = $pdo->prepare('SELECT * FROM user_profiles WHERE user_id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch();
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
                <form id="profileForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group text-center">
                    <img src="<?php echo $user['profile_picture_url'] ? $user['profile_picture_url'] : 'default-profile.png'; ?>" 
     alt="Profile Picture" 
     class="profile-pic mb-3" 
     width="200" height="200">

                        <input type="file" class="form-control-file" name="profile_pic">
                    </div>
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email address</label>
                        <input type="email" class="form-control" id="userEmail" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="userPassword">New Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter new password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>