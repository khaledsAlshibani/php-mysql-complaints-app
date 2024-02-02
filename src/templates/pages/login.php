<?php
require_once '../../config.php';

requireLogOut();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once INC_DIR . 'headInclude.php' ?>
    <title>Login - Complaints and Suggestions Simple App</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = false;
        include(TEMPLATES_DIR . 'components/header.php');
        ?>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="margin-top: 140px; margin-bottom: 140px;">
                <div class="col-md-6">
                    <div class="card border-0 rounded-4 shadow-lg">
                        <div class="card-body p-5">
                            <h2 class="mb-4 fw-bold text-center">Welcome to the Complaints and Suggestions Simple App</h2>
                            <form method="post" action="core/operations.php">
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

    <?php include_once INC_DIR . 'footInclude.php' ?>
</body>

</html>