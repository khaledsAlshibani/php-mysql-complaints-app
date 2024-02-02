<?php
require_once 'config.php';

requireLogIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once INC_DIR . 'headInclude.php' ?>
    <title>Dashboard - Complaints and Suggestions Simple App</title>
</head>

<body class="bg-light">
    <div class="mb-4">
        <?php
        $navbar = true;
        include(TEMPLATES_DIR . 'components/header.php');
        ?>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center mt-4" style="margin-top: 120px !important;">
                <div class="">
                    <div class="container"> <!-- Added container div -->
                        <!-- Complaints Cards Start -->
                        <?php include_once COMPS_DIR . "complaints-cards.php" ?>
                        <!-- Complaints Cards End -->

                        <!-- Suggestions Cards Start -->
                        <?php include_once COMPS_DIR . "suggestions-cards.php" ?>
                        <!-- Suggestions Cards End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once INC_DIR . 'footInclude.php' ?>
</body>


</html>