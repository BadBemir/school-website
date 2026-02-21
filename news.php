<?php
session_start();
require_once "config.php";
require_once "functions/conn.php";

$news_list = [];
try {
    $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
    $news_list = $stmt->fetchAll();
} catch (PDOException $e) {}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Новости - Школа №12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require_once "header.php"; ?>

    <div class="container py-5">
        <h2 class="text-center fw-bold mb-5">Новости школы</h2>
        
        <div class="row g-4">
            <?php foreach ($news_list as $news): ?>
                <div class="col-12">
                    <div class="card shadow-sm border-solid overflow-hidden">
                        <div class="row g-0">
                            <?php if ($news['image']): ?>
                                <div class="col-md-4">
                                    <img src="<?= htmlspecialchars($news['image']) ?>" class="img-fluid h-100 w-100" style="object-fit: cover; min-height: 250px;">
                                </div>
                            <?php endif; ?>
                            <div class="col-md-<?= $news['image'] ? '8' : '12' ?>">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h3 class="card-title fw-bold mb-0"><?= htmlspecialchars($news['title']) ?></h3>
                                        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                            <div class="btn-group">
                                                <button class="btn btn-outline-primary btn-sm" onclick='editNews(<?= json_encode($news) ?>)' data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <a href="functions/add_news.php?delete=<?= $news['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Удалить?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-muted small mb-3"><i class="bi bi-calendar3 me-2"></i><?= date('d.m.Y H:i', strtotime($news['created_at'])) ?></p>
                                    <p class="card-text fs-5 text-secondary" style="white-space: pre-wrap;"><?= htmlspecialchars($news['content']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="functions/add_news.php" method="POST" enctype="multipart/form-data" class="modal-content text-dark">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header fw-bold">Редактировать новость</div>
                <div class="modal-body">
                    <input type="text" name="title" id="edit-title" class="form-control mb-3" required placeholder="Заголовок">
                    <textarea name="content" id="edit-content" class="form-control mb-3" rows="6" required placeholder="Текст"></textarea>
                    <label class="small text-muted">Сменить картинку:</label>
                    <input type="file" name="news_image" class="form-control" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function editNews(data) {
        document.getElementById('edit-id').value = data.id;
        document.getElementById('edit-title').value = data.title;
        document.getElementById('edit-content').value = data.content;
    }
    </script>

    <?php require_once "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>