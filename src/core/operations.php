<?php
require_once '../config.php';

// Login Form Data
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // Authenticate User
    authenticateUser($username, $password, $mysqli);
}

// Create Item (complaint or suggestion)
function createItem($type, $title, $description, $mysqli)
{
    try {
        if ($type == 1) {
            $tableName = 'complaints';
        } elseif ($type == 2) {
            $tableName = 'suggestions';
        }
        $sql = "INSERT INTO $tableName (`user_id`, `title`, `description`) VALUES (?, ?, ?)";

        $user_id = $_SESSION['user_id'];

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('iss', $user_id, $title, $description);

        $success = $stmt->execute();

        if ($success) {
            redirectByPath(HOME_DIR. "index.php");
            exit();
        } else {
            redirectByPath(PAGES_DIR . "create.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Add Complaint Feedback
function addComplaintFeedback($complaint_id, $feedback, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `complaints` SET `feedback` = ?, `status` = 1 WHERE `id` = ?");

        $stmt->bind_param('si', $feedback, $complaint_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Remove Complaint Feedback
function removeComplaintFeedback($complaint_id, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `complaints` SET `feedback` = NULL, `status` = 0 WHERE `id` = ?");
        $stmt->bind_param('i', $complaint_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Add Suggestion Feedback
function addSuggestionFeedback($suggestion_id, $feedback, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `suggestions` SET `feedback` = ?, `status` = 1 WHERE `id` = ?");

        $stmt->bind_param('si', $feedback, $suggestion_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Remove Suggestion Feedback
function removeSuggestionFeedback($suggestion_id, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `suggestions` SET `feedback` = NULL, `status` = 0 WHERE `id` = ?");
        $stmt->bind_param('i', $suggestion_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Update Complaint
function updateComplaint($complaint_id, $title, $description, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `complaints` SET `title` = ?, `description` = ? WHERE `id` = ?");

        $stmt->bind_param('ssi', $title, $description, $complaint_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Update Suggestion
function updateSuggestion($suggestion_id, $title, $description, $mysqli)
{
    try {
        $stmt = $mysqli->prepare("UPDATE `suggestions` SET `title` = ?, `description` = ? WHERE `id` = ?");

        $stmt->bind_param('ssi', $title, $description, $suggestion_id);
        $stmt->execute();

        redirectByPath(HOME_DIR. "index.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete Complaint
function deleteComplaint($complaint_id, $delete_complaint, $mysqli)
{
    try {
        if ($delete_complaint) {
            $stmt = $mysqli->prepare("DELETE FROM `complaints` WHERE `id` = ?");

            $stmt->bind_param('i', $complaint_id);
            $stmt->execute();

            redirectByPath(HOME_DIR. "index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Delete Suggestion
function deleteSuggestion($suggestion_id, $delete_suggestion, $mysqli)
{
    try {
        if ($delete_suggestion) {
            $stmt = $mysqli->prepare("DELETE FROM `suggestions` WHERE `id` = ?");

            $stmt->bind_param('i', $suggestion_id);
            $stmt->execute();

            redirectByPath(HOME_DIR. "index.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }
}

// Create Item Form Data
if (isset($_POST["type"]) && isset($_POST["title"]) && isset($_POST["description"])) {
    $type = htmlspecialchars($_POST["type"], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST["title"], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST["description"], ENT_QUOTES, 'UTF-8');

    createItem($type, $title, $description, $mysqli);

    return TRUE;
}

// Add Complaint Feedback Form Data
if (isset($_POST["complaint_feedback"]) && isset($_POST["complaint_id"])) {
    $complaint_id = htmlspecialchars($_POST["complaint_id"], ENT_QUOTES, 'UTF-8');
    $feedback = htmlspecialchars($_POST["complaint_feedback"], ENT_QUOTES, 'UTF-8');

    addComplaintFeedback($complaint_id, $feedback, $mysqli);

    return TRUE;
}

// Add Suggestion Feedback Form Data
if (isset($_POST["suggestion_feedback"]) && isset($_POST["suggestion_id"])) {
    $suggestion_id = htmlspecialchars($_POST["suggestion_id"], ENT_QUOTES, 'UTF-8');
    $feedback = htmlspecialchars($_POST["suggestion_feedback"], ENT_QUOTES, 'UTF-8');

    addSuggestionFeedback($suggestion_id, $feedback, $mysqli);

    return TRUE;
}

// Update Complaint Form Data
if (isset($_POST["complaint_description"]) && isset($_POST["complaint_id"])) {
    $complaint_id = htmlspecialchars($_POST["complaint_id"], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST["complaint_title"], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST["complaint_description"], ENT_QUOTES, 'UTF-8');

    updateComplaint($complaint_id, $title, $description, $mysqli);

    return TRUE;
}

// Update Suggestion Form Data
if (isset($_POST["suggestion_description"]) && isset($_POST["suggestion_id"])) {
    $suggestion_id = htmlspecialchars($_POST["suggestion_id"], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST["suggestion_title"], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST["suggestion_description"], ENT_QUOTES, 'UTF-8');

    updateSuggestion($suggestion_id, $title, $description, $mysqli);

    return TRUE;
}

// Delete Complaint Form Data
if (isset($_POST["delete_complaint"]) && isset($_POST["complaint_id"])) {
    $complaint_id = htmlspecialchars($_POST["complaint_id"], ENT_QUOTES, 'UTF-8');
    $delete_complaint = htmlspecialchars($_POST["delete_complaint"], ENT_QUOTES, 'UTF-8');

    deleteComplaint($complaint_id, $delete_complaint, $mysqli);

    return TRUE;
}

// Delete Suggestion Form Data
if (isset($_POST["delete_suggestion"]) && isset($_POST["suggestion_id"])) {
    $suggestion_id = htmlspecialchars($_POST["suggestion_id"], ENT_QUOTES, 'UTF-8');
    $delete_suggestion = htmlspecialchars($_POST["delete_suggestion"], ENT_QUOTES, 'UTF-8');

    deleteSuggestion($suggestion_id, $delete_suggestion, $mysqli);

    return TRUE;
}

// Remove Complaint Feedback Form Data
if (isset($_POST["remove_comp_feedback"]) && isset($_POST["complaint_id"])) {
    $complaint_id = htmlspecialchars($_POST["complaint_id"], ENT_QUOTES, 'UTF-8');

    removeComplaintFeedback($complaint_id, $mysqli);

    return TRUE;
}

// Delete Suggestion Form Data
if (isset($_POST["remove_sug_feedback"]) && isset($_POST["suggestion_id"])) {
    $suggestion_id = htmlspecialchars($_POST["suggestion_id"], ENT_QUOTES, 'UTF-8');

    removeSuggestionFeedback($suggestion_id, $mysqli);

    return TRUE;
}
