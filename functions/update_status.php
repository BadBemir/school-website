<?php
session_start();
require_once dirname(__DIR__) . "/config.php";
requireAuth(true); // Требуем права администратора

// Сначала проверяем подключение к БД
try {
    require_once dirname(__DIR__) . "/functions/conn.php";
} catch (Exception $e) {
    setError('Ошибка подключения к базе данных: ' . $e->getMessage());
    header('Location: ../admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? '';
    $status = $_POST['status'] ?? 'working';
    
    if (empty($user_id)) {
        setError('Не указан ID пользователя');
        header('Location: ../admin.php');
        exit();
    }
    
    try {
        // Обновляем статус пользователя
        $sql = "UPDATE users SET status = :status WHERE id = :id";
        $query = $conn->prepare($sql);
        $query->execute([':status' => $status, ':id' => $user_id]);
        
        setSuccess('Статус пользователя успешно обновлен');
    } catch (PDOException $e) {
        setError('Ошибка при обновлении статуса: ' . $e->getMessage());
    }
}

header('Location: ../admin.php');
exit();
?>