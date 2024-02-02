<?php

function redirectByPath($path)
{
    $redirect = substr(strtr(realpath($path), '\\', '/'), strlen($_SERVER['DOCUMENT_ROOT']));
    header("location: $redirect");
    exit;
}

// Logout Start
function logout()
{
    session_destroy();
    redirectByPath(PAGES_DIR . "login.php");

    return TRUE;
}

// Check if User is Logged Out
function isLogout()
{
    return !isset($_SESSION['user_id']);
}
// Logout End

function requireLogIn()
{
    if (isLogout()) {
        redirectByPath(PAGES_DIR . "login.php");
        exit;
    }
}

function requireLogOut()
{
    if (!isLogout()) {
        redirectByPath(HOME_DIR . "index.php");
    }
}

// Authenticate User
function authenticateUser($username, $password, $mysqli)
{
    try {
        $query = "SELECT * FROM `users` WHERE `username` = ? AND `password` = ?";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['user_type'];

            redirectByPath(HOME_DIR . "index.php");
            exit();
        } else {
            redirectByPath(HOME_DIR . "index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        die("Authenticate User Error: " . $e->getMessage());
    }
}

// Get User Id from Session
function getUserId()
{
    return $_SESSION['user_id'];
}

// Get User Type from Session
function getUserType()
{
    return $_SESSION['user_type'];
}

// Get User Full Name By Id
function getFullNameById($user_id, $mysqli)
{
    try {
        $query = "SELECT `full_name` FROM `users` WHERE `id` = ?";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return $user['full_name'];
        } else {
            return "User not found";
        }
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

/*
    Get
*/

// Get Complaints By User
function getComplaintsByUser($mysqli)
{
    try {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM `complaints` WHERE `user_id` = ? ORDER BY `id` DESC";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $complaints = [];
        while ($row = $result->fetch_assoc()) {
            $complaints[] = $row;
        }

        return $complaints;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Get All Complaints for Admin
function getAllComplaints($mysqli)
{
    try {
        $query = "SELECT * FROM `complaints` ORDER BY `id` DESC";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();

        // Fetch the result as an associative array
        $complaints = $result->fetch_all(MYSQLI_ASSOC);

        return $complaints;
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Get Single Complaint By Id
function getComplaint($id, $mysqli)
{
    try {
        $query = "SELECT * FROM `complaints` WHERE `id` = ? ORDER BY `id` DESC";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $complaint = $result->fetch_assoc();

        return $complaint;
    } catch (PDOException $e) {
        error_log('getComplaint error: id: ' . $id);
        die("Error: " . $e->getMessage());
    }
}

// Get Suggestions By User
function getSuggestionsByUser($mysqli)
{
    try {
        $user_id = $_SESSION['user_id'];
        $stmt = $mysqli->prepare("SELECT * FROM `suggestions` WHERE `user_id` = ? ORDER BY `id` DESC");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $suggestions = $result->fetch_all(MYSQLI_ASSOC);

        return $suggestions;
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Get Single Suggestion By Id
function getSuggestion($id, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("SELECT * FROM `suggestions` WHERE `id` = ? ORDER BY `id` DESC");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $suggestion = $result->fetch_assoc();

        return $suggestion;
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Get All Suggestions for Admin
function getAllSuggestions($mysqli)
{
    try {
        $stmt = $mysqli->prepare("SELECT * FROM `suggestions` ORDER BY `id` DESC");
        $stmt->execute();

        $result = $stmt->get_result();
        $suggestions = $result->fetch_all(MYSQLI_ASSOC);

        return $suggestions;
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}
