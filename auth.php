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
                        <form class="mt-4">
                            <div class="form-group">
                                <label for="signinEmail">Email address</label>
                                <input type="email" class="form-control" id="signinEmail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="signinPassword">Password</label>
                                <input type="password" class="form-control" id="signinPassword" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                        <form class="mt-4">
                            <div class="form-group">
                                <label for="signupEmail">Email address</label>
                                <input type="email" class="form-control" id="signupEmail" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="signupPassword">Password</label>
                                <input type="password" class="form-control" id="signupPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="signupConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="signupConfirmPassword" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Sign Up</button>
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