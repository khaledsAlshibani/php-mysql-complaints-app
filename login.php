<?php
require_once 'functions.php';

if (!isLogout()) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login - Complaints and Suggestions System</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = false;
        include('templates/header.php');
        ?>
        <div class="container">
        <div class="row justify-content-center align-items-center" style="margin-top: 140px; margin-bottom: 140px;">
                <div class="col-md-6">
                    <div class="card border-0 rounded-4 shadow-lg">
                        <div class="card-body p-5">
                            <h2 class="mb-4 fw-bold text-center">Welcome to the Complaints and Suggestions System</h2>
                            <form method="post" action="functions.php">
                                <div class="input-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control rounded-2" id="username" placeholder="Username" name="username" required>
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="form-floating">
                                        <input type="password" class="form-control rounded-2" id="password" placeholder="Password" name="password" required>
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block rounded-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>