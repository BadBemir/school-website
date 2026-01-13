<?php
session_start();
require_once dirname(__DIR__) . "/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['auth-login'], $_POST['auth-password'])) {
        $login = sanitizeString($_POST['auth-login']);
        $password = trim($_POST['auth-password']);

        if (!validateLength($login, MIN_LOGIN_LENGTH)) {
            $_SESSION['auth_error'] = "Логин должен содержать не менее " . MIN_LOGIN_LENGTH . " символов";
            header('Location: ../');
            exit;
        }
        if (!validateLength($password, MIN_PASSWORD_LENGTH)) {
            $_SESSION['auth_error'] = "Пароль должен содержать не менее " . MIN_PASSWORD_LENGTH . " символов";
            header('Location: ../');
            exit;
        }

        require_once dirname(__DIR__) . "/functions/conn.php";

        try {
            if ($login === 'admin' && $password === 'admin') {
                $_SESSION['user_id'] = 0;
                $_SESSION['username'] = 'Администратор';
                $_SESSION['email'] = 'admin@admin.com';
                $_SESSION['login'] = 'admin';
                $_SESSION['auth'] = true;
                $_SESSION['is_admin'] = true;
                
                setSuccess("Вы успешно вошли как администратор!");
                header('Location: ../');
                exit;
            }
            
            $sql = "SELECT id, username, email, login, password FROM users WHERE login = ?";
            $query = $conn->prepare($sql);
            $query->execute([$login]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['auth'] = true;
                    $_SESSION['is_admin'] = false;
                    
                    setSuccess("Вы успешно вошли в систему!");
                    header('Location: ../');
                    exit;
                } else {
                    $_SESSION['auth_error'] = "Неверный пароль!";
                    header('Location: ../');
                    exit;
                }
            } else {
                $_SESSION['auth_error'] = "Пользователь с таким логином не найден!";
                header('Location: ../');
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['auth_error'] = "Ошибка базы данных. Попробуйте позже.";
            header('Location: ../');
            exit;
        }
    } else {
        $_SESSION['auth_error'] = "Не все поля заполнены!";
        header('Location: ../');
        exit;
    }
} else {
    $_SESSION['auth_error'] = "Неверный метод запроса!";
    header('Location: ../');
    exit;
}
?>