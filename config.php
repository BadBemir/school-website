<?php

define('MIN_LOGIN_LENGTH', 3);
define('MIN_PASSWORD_LENGTH', 3);
define('MIN_USERNAME_LENGTH', 3);

function isLoggedIn() {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
}

function isAdmin() {
    return isLoggedIn() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

function requireAuth($requireAdmin = false, $redirectUrl = '/') {
    if (!isLoggedIn()) {
        header('Location: ' . $redirectUrl);
        exit;
    }
    if ($requireAdmin && !isAdmin()) {
        header('Location: ' . $redirectUrl);
        exit;
    }
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateLength($value, $minLength = 3, $maxLength = 255) {
    $length = mb_strlen($value);
    return $length >= $minLength && $length <= $maxLength;
}

function sanitizeString($value) {
    return trim(filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
}

function setError($message) {
    $_SESSION['error'] = $message;
}

function setSuccess($message) {
    $_SESSION['success'] = $message;
}

function getError() {
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
        return $error;
    }
    return null;
}

function getSuccess() {
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
        return $success;
    }
    return null;
}

function columnExists($conn, $table, $column) {
    try {
        $stmt = $conn->query("SHOW COLUMNS FROM `$table` LIKE '$column'");
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        return false;
    }
}

function ensureJobColumn($conn) {
    if (!columnExists($conn, 'users', 'job')) {
        try {
            $conn->exec("ALTER TABLE users ADD COLUMN job VARCHAR(255) DEFAULT NULL");
        } catch (PDOException $e) {
        }
    }
}

function ensureStatusColumn($conn) {
    if (!columnExists($conn, 'users', 'status')) {
        try {
            $conn->exec("ALTER TABLE users ADD COLUMN status VARCHAR(20) DEFAULT 'working'");
        } catch (PDOException $e) {
        }
    }
}
?>