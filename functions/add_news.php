<?php
session_start();
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/conn.php";

// Проверка прав (только админ)
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../news.php");
    exit;
}

// УДАЛЕНИЕ
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    $stmt = $conn->prepare("SELECT image FROM news WHERE id = ?");
    $stmt->execute([$id]);
    $img = $stmt->fetchColumn();
    
    if ($img && file_exists(__DIR__ . '/../' . $img)) {
        @unlink(__DIR__ . '/../' . $img);
    }

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: ../news.php");
    exit;
}

// СОЗДАНИЕ / ОБНОВЛЕНИЕ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'create';
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $image_path = null;

    // Обработка изображения
    if (isset($_FILES['news_image']) && $_FILES['news_image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../uploads/news/';
        if (!is_dir($upload_dir)) {
            @mkdir($upload_dir, 0777, true);
        }

        $ext = pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);
        $file_name = uniqid('img_') . '.' . $ext;
        
        if (move_uploaded_file($_FILES['news_image']['tmp_name'], $upload_dir . $file_name)) {
            $image_path = 'uploads/news/' . $file_name;
        }
    }

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $image_path]);
    } elseif ($action === 'update' && $id) {
        if ($image_path) {
            // Удаляем старое фото перед обновлением
            $stmt = $conn->prepare("SELECT image FROM news WHERE id = ?");
            $stmt->execute([$id]);
            $old = $stmt->fetchColumn();
            if ($old && file_exists(__DIR__ . '/../' . $old)) @unlink(__DIR__ . '/../' . $old);

            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image_path, $id]);
        } else {
            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
            $stmt->execute([$title, $content, $id]);
        }
    }
}

header("Location: ../news.php");
exit;