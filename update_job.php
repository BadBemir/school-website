<?php
session_start();
require_once "config.php";
requireAuth(true); // Требуем права администратора

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['user_id'], $_POST['job'])) {
        $user_id = intval($_POST['user_id']);
        $job = sanitizeString($_POST['job']);
        
        require "conn.php";
        
        try {
            // Убеждаемся, что колонка job существует
            ensureJobColumn($conn);
            
            // Обновляем должность пользователя
            $sql = "UPDATE users SET job = ? WHERE id = ?";
            $query = $conn->prepare($sql);
            $query->execute([$job, $user_id]);
            
            if ($query->rowCount() > 0) {
                setSuccess("Должность пользователя успешно обновлена!");
            } else {
                setError("Не удалось обновить должность пользователя. Возможно, данные не изменились.");
            }
        } catch (PDOException $e) {
            setError("Ошибка базы данных: " . $e->getMessage());
        }
    } else {
        setError("Не все данные переданы!");
    }
} else {
    setError("Неверный метод запроса!");
}

header('Location: /admin.php');
exit;
?>

