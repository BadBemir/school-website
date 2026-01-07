<?php
session_start();

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type === 'auth_error' && isset($_SESSION['auth_error'])) {
        unset($_SESSION['auth_error']);
    } elseif ($type === 'reg_error' && isset($_SESSION['reg_error'])) {
        unset($_SESSION['reg_error']);
    }
}
?>