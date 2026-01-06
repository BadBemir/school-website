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
    $confirm = isset($_POST['confirm_delete']);
    
    if (empty($user_id)) {
        setError('Не указан ID пользователя');
        header('Location: ../admin.php');
        exit();
    }
    
    if (!$confirm) {
        setError('Подтвердите увольнение пользователя');
        header('Location: ../admin.php');
        exit();
    }
    
    try {
        // Удаляем пользователя из базы данных
        $sql = "DELETE FROM users WHERE id = :id";
        $query = $conn->prepare($sql);
        $query->execute([':id' => $user_id]);
        
        setSuccess('Пользователь успешно уволен (удален)');
    } catch (PDOException $e) {
        setError('Ошибка при удалении пользователя: ' . $e->getMessage());
    }
}

header('Location: ../admin.php');
exit();
?>