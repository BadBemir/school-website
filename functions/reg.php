<?php
session_start();
require_once dirname(__DIR__) . "/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reg-username'], $_POST['reg-email'], $_POST['reg-login'], $_POST['reg-password'])) {
        $username = sanitizeString($_POST['reg-username']);
        $email = trim($_POST['reg-email']);
        $login = sanitizeString($_POST['reg-login']);
        $password = trim($_POST['reg-password']);
    } else {
        setError("Не все поля заполнены!");
        header('Location: ../index.php');
        exit;
    }

    // Валидация данных
    if (!validateLength($username, MIN_USERNAME_LENGTH)) {
        setError("Имя должно содержать не менее " . MIN_USERNAME_LENGTH . " символов");
        header('Location: ../index.php');
        exit;
    }
    if (!validateEmail($email)) {
        setError("Почта указана неверно");
        header('Location: ../index.php');
        exit;
    }
    if (!validateLength($login, MIN_LOGIN_LENGTH)) {
        setError("Логин должен содержать не менее " . MIN_LOGIN_LENGTH . " символов");
        header('Location: ../index.php');
        exit;
    }
    if (!validateLength($password, MIN_PASSWORD_LENGTH)) {
        setError("Пароль должен содержать не менее " . MIN_PASSWORD_LENGTH . " символов");
        header('Location: ../index.php');
        exit;
    }

    require_once dirname(__DIR__) . "/functions/conn.php";

    // ПРОВЕРКА НА СУЩЕСТВУЮЩЕГО ПОЛЬЗОВАТЕЛЯ
    try {
        // Проверяем, существует ли пользователь с таким логином или email
        $check_sql = "SELECT login, email FROM users WHERE login = ? OR email = ?";
        $check_query = $conn->prepare($check_sql);
        $check_query->execute([$login, $email]);
        $existing_user = $check_query->fetch();
        
        if ($existing_user) {
            if ($existing_user['login'] === $login && $existing_user['email'] === $email) {
                setError("Пользователь с таким логином и email уже существует!");
            } elseif ($existing_user['login'] === $login) {
                setError("Пользователь с таким логином уже существует!");
            } elseif ($existing_user['email'] === $email) {
                setError("Пользователь с таким email уже существует!");
            }
            header('Location: ../index.php');
            exit;
        }

        // Если пользователь не найден, добавляем нового
        // Хешируем пароль
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users(username, email, login, password) VALUES (?, ?, ?, ?)";
        $query = $conn->prepare($sql);
        $query->execute([$username, $email, $login, $hashed_password]);
        
        // Проверяем успешность добавления
        if ($query->rowCount() > 0) {
            setSuccess("Регистрация прошла успешно!");
            header('Location: ../index.php');
            exit;
        } else {
            setError("Ошибка при регистрации пользователя!");
            header('Location: ../index.php');
            exit;
        }
        
    } catch (PDOException $e) {
        setError("Ошибка базы данных. Попробуйте позже.");
        header('Location: ../index.php');
        exit;
    }
} else {
    setError("Неверный метод запроса!");
    header('Location: ../index.php');
    exit;
}
?>