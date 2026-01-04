<?php
/**
 * Конфигурационный файл и общие функции
 */

// Настройки безопасности
define('MIN_LOGIN_LENGTH', 3);
define('MIN_PASSWORD_LENGTH', 3);
define('MIN_USERNAME_LENGTH', 3);

/**
 * Проверка авторизации пользователя
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
}

/**
 * Проверка прав администратора
 * @return bool
 */
function isAdmin() {
    return isLoggedIn() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

/**
 * Проверка авторизации с редиректом
 * @param bool $requireAdmin Требовать ли права администратора
 * @param string $redirectUrl URL для редиректа при отсутствии прав
 */
function requireAuth($requireAdmin = false, $redirectUrl = '/index.php') {
    if (!isLoggedIn()) {
        header('Location: ' . $redirectUrl);
        exit;
    }
    if ($requireAdmin && !isAdmin()) {
        header('Location: ' . $redirectUrl);
        exit;
    }
}

/**
 * Валидация email
 * @param string $email
 * @return bool
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Валидация длины строки
 * @param string $value
 * @param int $minLength
 * @param int $maxLength
 * @return bool
 */
function validateLength($value, $minLength = 3, $maxLength = 255) {
    $length = mb_strlen($value);
    return $length >= $minLength && $length <= $maxLength;
}

/**
 * Очистка строки от опасных символов
 * @param string $value
 * @return string
 */
function sanitizeString($value) {
    return trim(filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
}

/**
 * Установка сообщения об ошибке
 * @param string $message
 */
function setError($message) {
    $_SESSION['error'] = $message;
}

/**
 * Установка сообщения об успехе
 * @param string $message
 */
function setSuccess($message) {
    $_SESSION['success'] = $message;
}

/**
 * Получение и удаление сообщения об ошибке
 * @return string|null
 */
function getError() {
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
        return $error;
    }
    return null;
}

/**
 * Получение и удаление сообщения об успехе
 * @return string|null
 */
function getSuccess() {
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
        return $success;
    }
    return null;
}

/**
 * Проверка существования колонки в таблице
 * @param PDO $conn
 * @param string $table
 * @param string $column
 * @return bool
 */
function columnExists($conn, $table, $column) {
    try {
        $stmt = $conn->query("SHOW COLUMNS FROM `$table` LIKE '$column'");
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        return false;
    }
}

/**
 * Создание колонки job если её нет
 * @param PDO $conn
 */
function ensureJobColumn($conn) {
    if (!columnExists($conn, 'users', 'job')) {
        try {
            $conn->exec("ALTER TABLE users ADD COLUMN job VARCHAR(255) DEFAULT NULL");
        } catch (PDOException $e) {
            // Колонка уже существует или ошибка
        }
    }
}
?>


