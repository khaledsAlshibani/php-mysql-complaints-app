<?php
require_once 'functions.php';

if (!isLogout()) {
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>