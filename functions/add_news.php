<?php
session_start();
require_once dirname(__DIR__) . "/config.php";
require_once __DIR__ . "/conn.php";

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header("Location: ../news.php");
    exit;
}

// ЛОГИКА УДАЛЕНИЯ
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    
    // Сначала удаляем файл картинки с сервера
    $stmt = $conn->prepare("SELECT image FROM news WHERE id = ?");
    $stmt->execute([$id]);
    $img = $stmt->fetchColumn();
    if ($img && file_exists('../' . $img)) {
        unlink('../' . $img);
    }

    $stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
    $stmt->execute([$id]);
    setSuccess("Новость удалена.");
    header("Location: ../news.php");
    exit;
}

// ЛОГИКА СОЗДАНИЯ И ОБНОВЛЕНИЯ
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'create';
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
    $image_path = null;

    // Загрузка изображения
    if (isset($_FILES['news_image']) && $_FILES['news_image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/news/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

        $file_name = uniqid('img_') . '.' . pathinfo($_FILES['news_image']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($_FILES['news_image']['tmp_name'], $upload_dir . $file_name)) {
            $image_path = 'uploads/news/' . $file_name;
        }
    }

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $image_path]);
        setSuccess("Новость опубликована!");
    } elseif ($action === 'update' && $id) {
        if ($image_path) {
            // Если загрузили новую картинку, удаляем старую и обновляем путь
            $stmt = $conn->prepare("SELECT image FROM news WHERE id = ?");
            $stmt->execute([$id]);
            $old_img = $stmt->fetchColumn();
            if ($old_img && file_exists('../' . $old_img)) unlink('../' . $old_img);

            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ?, image = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image_path, $id]);
        } else {
            // Обновляем только текст
            $stmt = $conn->prepare("UPDATE news SET title = ?, content = ? WHERE id = ?");
            $stmt->execute([$title, $content, $id]);
        }
        setSuccess("Новость обновлена!");
    }
}

header("Location: ../news.php");
exit;