<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['reg-username'], $_POST['reg-email'], $_POST['reg-login'], $_POST['reg-password'])) {
            $username = trim(filter_var($_POST['reg-username'], FILTER_SANITIZE_SPECIAL_CHARS));
            $email = trim(filter_var($_POST['reg-email'], FILTER_SANITIZE_SPECIAL_CHARS));
            $login = trim(filter_var($_POST['reg-login'], FILTER_SANITIZE_SPECIAL_CHARS));
            $password = trim(filter_var($_POST['reg-password'], FILTER_SANITIZE_SPECIAL_CHARS));
        } else {
            echo "Не все поля заполнены!";
            exit;
        }

        // Валидация данных
        if(strlen($username) <= 2) {
            echo "Имя не может состоять из такого кол-ва символов";
            exit;
        }
        if(strlen($email) <= 2 ) {
            echo "Почта указана неверно";
            exit;
        }
        if(strlen($login) <= 2) {
            echo "Логин не может состоять из такого кол-ва символов";
            exit;
        }
        if(strlen($password) <= 2) {
            echo "Пароль не может состоять из такого кол-ва символов";
            exit;
        }

        require "conn.php";

        // ПРОВЕРКА НА СУЩЕСТВУЮЩЕГО ПОЛЬЗОВАТЕЛЯ
        try {
            // Проверяем, существует ли пользователь с таким логином
            $check_sql = "SELECT id FROM users WHERE login = ? OR email = ?";
            $check_query = $conn->prepare($check_sql);
            $check_query->execute([$login, $email]);
            
            if ($check_query->rowCount() > 0) {
                // Получаем данные для уточнения, что именно совпало
                $check_sql_detail = "SELECT login, email FROM users WHERE login = ? OR email = ?";
                $check_query_detail = $conn->prepare($check_sql_detail);
                $check_query_detail->execute([$login, $email]);
                $existing_user = $check_query_detail->fetch(PDO::FETCH_ASSOC);
                
                if ($existing_user['login'] === $login && $existing_user['email'] === $email) {
                    echo "Пользователь с таким логином и email уже существует!";
                } elseif ($existing_user['login'] === $login) {
                    echo "Пользователь с таким логином уже существует!";
                } elseif ($existing_user['email'] === $email) {
                    echo "Пользователь с таким email уже существует!";
                }
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
                // на главную
                header('Location: /index.php');
                exit;
            } else {
                echo "Ошибка при регистрации пользователя!";
            }
            
        } catch (PDOException $e) {
            echo "Ошибка базы данных: " . $e->getMessage();
            exit;
        }
    } else {
        echo "Неверный метод запроса!";
    }
    ?>
</body>
</html>