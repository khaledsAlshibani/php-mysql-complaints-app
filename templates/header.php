<?php
if ($navbar) :
    $user_id = getUserId();
?>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand text-capitalize"><?php echo '👋 Hello, ' . getFullNameById($user_id, $mysqli); ?></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                    <?php if (getUserType() == 'user') : ?>
                        <a class="nav-link" href="create.php">Create</a>
                    <?php endif; ?>
                </div>
                <div class="navbar-nav ms-auto">
                    <form method="post" action="">
                        <button type="submit" class="btn btn-outline-light" name="logout" value="1">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>

<header class="bg-dark py-5 <?php echo ($navbar) ? '' : 'border-top border-3 border-primary'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="display-4 text-white mb-4">Complaints and Suggestions System</h1>
                <p class="lead text-white">Provide feedback, make suggestions, and stay connected with our system.</p>
            </div>
        </div>
    </div>
</header>