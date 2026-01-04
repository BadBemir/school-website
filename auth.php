<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['auth-login'], $_POST['auth-password'])) {
        $login = trim(filter_var($_POST['auth-login'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password = trim($_POST['auth-password']);

        // Валидация данных
        if(strlen($login) <= 2) {
            $_SESSION['error'] = "Логин не может состоять из такого кол-ва символов";
            header('Location: /index.php');
            exit;
        }
        if(strlen($password) <= 2) {
            $_SESSION['error'] = "Пароль не может состоять из такого кол-ва символов";
            header('Location: /index.php');
            exit;
        }

        require "conn.php";

        try {
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
                    
                    // Перенаправление на главную страницу
                    header('Location: /index.php');
                    exit;
                } else {
                    $_SESSION['error'] = "Неверный пароль!";
                    header('Location: /index.php');
                    exit;
                }
            } else {
                $_SESSION['error'] = "Пользователь с таким логином не найден!";
                header('Location: /index.php');
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Ошибка базы данных: " . $e->getMessage();
            header('Location: /index.php');
            exit;
        }
    } else {
        $_SESSION['error'] = "Не все поля заполнены!";
        header('Location: /index.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Неверный метод запроса!";
    header('Location: /index.php');
    exit;
}
?>
