
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['auth-login'], $_POST['auth-password'])) {
        $login = trim(filter_var($_POST['auth-login'], FILTER_SANITIZE_SPECIAL_CHARS));
        $password = trim(filter_var($_POST['auth-password'], FILTER_SANITIZE_SPECIAL_CHARS));

    } else {
        echo "Не все поля заполнены!";
    }
    if(strlen($login) <= 2) {
        echo "Логин не может состоять из такого кол-ва символов";
        exit;
    }
    if(strlen($password) <= 2) {
        echo "Пароль не может состоять из такого кол-ва символов";
        exit;
    }
}


require "conn.php";

// Подготовленный запрос
$sql = "INSERT INTO users(username,email,login,password) VALUES (?, ?, ?, ?)";
$query = $conn->prepare($sql);
$query->execute([$username,$email,$login,$password]);

header('Location: /index.php')
?>
</body>
</html>
