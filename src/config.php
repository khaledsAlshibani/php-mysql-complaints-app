<?php

// Start session
session_start();

// Connect database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'complaints_suggestions_db';

// Configure error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Debugging MySQLi connection
try {
    $mysqli = new mysqli($host, $username, $password, $database);
} catch (mysqli_sql_exception $e) {
    error_log("Connection Error!" . $e->getMessage());
    die("Connection failed!");
}

// Define directory constants
define('BASE_URL', 'http://localhost/php-mysql-complaints-app/src/');
define('HOME_DIR', str_replace('\\', '/', __DIR__) . '/');
define('CORE_DIR', HOME_DIR . 'core/');
define('TEMPLATES_DIR', HOME_DIR . 'templates/');
define('INC_DIR', TEMPLATES_DIR . 'includes/');
define('PAGES_DIR', TEMPLATES_DIR . 'pages/');
define('COMPS_DIR', TEMPLATES_DIR . 'components/');
define('MODALS_DIR', TEMPLATES_DIR . 'modals/');

// Generate error logs into an `error.log` file
ini_set("error_log", HOME_DIR . "logs/error.log");

// Include `functions.php`
require_once CORE_DIR . 'functions.php';
