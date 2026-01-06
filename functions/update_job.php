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
    $job = $_POST['job'] ?? '';
    
    if (empty($user_id)) {
        setError('Не указан ID пользователя');
        header('Location: ../admin.php');
        exit();
    }
    
    try {
        // Обновляем должность пользователя
        $sql = "UPDATE users SET job = :job WHERE id = :id";
        $query = $conn->prepare($sql);
        $query->execute([':job' => $job, ':id' => $user_id]);
        
        setSuccess('Должность пользователя успешно обновлена');
    } catch (PDOException $e) {
        setError('Ошибка при обновлении должности: ' . $e->getMessage());
    }
} else {
    setError('Неверный метод запроса');
}

header('Location: ../admin.php');
exit();
?>