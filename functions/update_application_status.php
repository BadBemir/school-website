<?php
session_start();
require_once "../config.php";
requireAuth(true);
require_once __DIR__ . "/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app_id = (int)($_POST['app_id'] ?? 0);
    $status = $_POST['status'] ?? '';

    if ($app_id < 1 || !in_array($status, ['new','processed','rejected','done'])) {
        setError("Некорректные данные");
    } else {
        try {
            $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
            $stmt->execute([$status, $app_id]);
            setSuccess("Статус заявки обновлён");
        } catch (PDOException $e) {
            setError("Ошибка обновления статуса");
            error_log($e->getMessage());
        }
    }
}

header("Location: /admin.php");
exit;