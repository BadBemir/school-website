<?php
session_start();
require_once "../config.php";
require_once __DIR__ . "/conn.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone']   ?? '');
$email    = trim($_POST['email']   ?? '');
$message  = trim($_POST['message'] ?? '');

$errors = [];

if (mb_strlen($fullname) < 3) $errors[] = "ФИО слишком короткое";
if (!preg_match('/^\+?\d[\d\s\-\(\)]{9,18}$/', $phone)) $errors[] = "Некорректный номер телефона";
if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Некорректный email";
if (mb_strlen($message) < 10) $errors[] = "Сообщение слишком короткое";

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_old'] = $_POST;
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
    exit;
}

$user_id = null;
if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])) {
    $user_id = (int)$_SESSION['user_id'];
}

try {
    $sql = "INSERT INTO applications (fullname, phone, email, message, user_id) 
            VALUES (:fn, :ph, :em, :msg, :uid)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':fn'  => $fullname,
        ':ph'  => $phone,
        ':em'  => $email ?: null,
        ':msg' => $message,
        ':uid' => $user_id
    ]);

    $_SESSION['form_success'] = "Заявка успешно отправлена!";
} catch (PDOException $e) {
    $_SESSION['form_errors'] = ["Ошибка сервера. Попробуйте позже."];
    error_log("Ошибка сохранения заявки: " . $e->getMessage());
}

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
exit;