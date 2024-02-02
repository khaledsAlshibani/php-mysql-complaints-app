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
                    <a class="nav-link" href="index.php">Dashboard</a>
                    <?php if (getUserType() == 'user') : ?>
                        <a class="nav-link"  href="templates/pages/create.php">Create</a>
                    <?php endif; ?>
                </div>

                <div class="navbar-nav ms-auto">
                    <a class="btn btn-outline-light" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>