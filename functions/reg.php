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
        $_SESSION['reg_error'] = "Не все поля заполнены!";
        header('Location: ../index.php');
        exit;
    }

    if (!validateLength($username, MIN_USERNAME_LENGTH)) {
        $_SESSION['reg_error'] = "Имя должно содержать не менее " . MIN_USERNAME_LENGTH . " символов";
        header('Location: ../index.php');
        exit;
    }
    if (!validateEmail($email)) {
        $_SESSION['reg_error'] = "Почта указана неверно";
        header('Location: ../index.php');
        exit;
    }
    if (!validateLength($login, MIN_LOGIN_LENGTH)) {
        $_SESSION['reg_error'] = "Логин должен содержать не менее " . MIN_LOGIN_LENGTH . " символов";
        header('Location: ../index.php');
        exit;
    }
    if (!validateLength($password, MIN_PASSWORD_LENGTH)) {
        $_SESSION['reg_error'] = "Пароль должен содержать не менее " . MIN_PASSWORD_LENGTH . " символов";
        header('Location: ../index.php');
        exit;
    }

    require_once dirname(__DIR__) . "/functions/conn.php";

    try {
        $check_sql = "SELECT login, email FROM users WHERE login = ? OR email = ?";
        $check_query = $conn->prepare($check_sql);
        $check_query->execute([$login, $email]);
        $existing_user = $check_query->fetch();
        
        if ($existing_user) {
            if ($existing_user['login'] === $login && $existing_user['email'] === $email) {
                $_SESSION['reg_error'] = "Пользователь с таким логином и email уже существует!";
            } elseif ($existing_user['login'] === $login) {
                $_SESSION['reg_error'] = "Пользователь с таким логином уже существует!";
            } elseif ($existing_user['email'] === $email) {
                $_SESSION['reg_error'] = "Пользователь с таким email уже существует!";
            }
            header('Location: ../index.php');
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users(username, email, login, password) VALUES (?, ?, ?, ?)";
        $query = $conn->prepare($sql);
        $query->execute([$username, $email, $login, $hashed_password]);
        
        if ($query->rowCount() > 0) {
            setSuccess("Регистрация прошла успешно! Теперь вы можете войти в систему.");
            header('Location: ../index.php');
            exit;
        } else {
            $_SESSION['reg_error'] = "Ошибка при регистрации пользователя!";
            header('Location: ../index.php');
            exit;
        }
        
    } catch (PDOException $e) {
        $_SESSION['reg_error'] = "Ошибка базы данных. Попробуйте позже.";
        header('Location: ../index.php');
        exit;
    }
} else {
    $_SESSION['reg_error'] = "Неверный метод запроса!";
    header('Location: ../index.php');
    exit;
}
?>