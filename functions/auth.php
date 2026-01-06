<?php
session_start();
require_once dirname(__DIR__) . "/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['auth-login'], $_POST['auth-password'])) {
        $login = sanitizeString($_POST['auth-login']);
        $password = trim($_POST['auth-password']);

        // Валидация данных
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

        try {
            // Специальная проверка для администратора
            if ($login === 'admin' && $password === 'admin') {
                // Администратор - создаем сессию
                $_SESSION['user_id'] = 0;
                $_SESSION['username'] = 'Администратор';
                $_SESSION['email'] = 'admin@admin.com';
                $_SESSION['login'] = 'admin';
                $_SESSION['auth'] = true;
                $_SESSION['is_admin'] = true;
                
                header('Location: ../index.php');
                exit;
            }
            
            // Поиск пользователя по логину
            $sql = "SELECT id, username, email, login, password FROM users WHERE login = ?";
            $query = $conn->prepare($sql);
            $query->execute([$login]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Проверка пароля
                if (password_verify($password, $user['password'])) {
                    // Успешная авторизация - создаем сессию
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['auth'] = true;
                    $_SESSION['is_admin'] = false;
                    
                    // Перенаправление на главную страницу
                    header('Location: ../index.php');
                    exit;
                } else {
                    setError("Неверный пароль!");
                    header('Location: ../index.php');
                    exit;
                }
            } else {
                setError("Пользователь с таким логином не найден!");
                header('Location: ../index.php');
                exit;
            }
        } catch (PDOException $e) {
            setError("Ошибка базы данных. Попробуйте позже.");
            header('Location: ../index.php');
            exit;
        }
    } else {
        setError("Не все поля заполнены!");
        header('Location: ../index.php');
        exit;
    }
} else {
    setError("Неверный метод запроса!");
    header('Location: ../index.php');
    exit;
}
?>