<?php
// Подключение к базе данных
$servername = "sql100.infinityfree.com";
$dbusername = "if0_40957845";
$dbpassword = "Bolivar211007";
$dbname = "if0_40957845_site";

try {
    // Создание подключения с обработкой ошибок
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
