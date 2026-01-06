<?php 
// Подключение к базе данных
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "site";

try {
    // Создание подключения с обработкой ошибок
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
    // Устанавливаем режим ошибок PDO на исключения
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Устанавливаем режим выборки по умолчанию - ассоциативный массив
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

function ensureStatusColumn($conn) {
    try {
        // Проверяем наличие колонки status
        $stmt = $conn->query("SHOW COLUMNS FROM users LIKE 'status'");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            // Добавляем колонку status если её нет
            $conn->exec("ALTER TABLE users ADD COLUMN status VARCHAR(20) DEFAULT 'working'");
        }
    } catch (PDOException $e) {
        error_log("Ошибка при проверке колонки status: " . $e->getMessage());
    }
}


// ... существующий код подключения к БД ...

// Добавляем проверку на существование функции ensureJobColumn
if (!function_exists('ensureJobColumn')) {
    function ensureJobColumn($conn) {
        try {
            // Проверяем наличие колонки job
            $stmt = $conn->query("SHOW COLUMNS FROM users LIKE 'job'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                // Добавляем колонку job если её нет
                $conn->exec("ALTER TABLE users ADD COLUMN job VARCHAR(255) DEFAULT NULL");
            }
        } catch (PDOException $e) {
            error_log("Ошибка при проверке колонки job: " . $e->getMessage());
        }
    }
}



?>