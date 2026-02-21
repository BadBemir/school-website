<?php
session_start();
require_once "config.php";
require_once "functions/conn.php";

$general_success = getSuccess();
$general_error = getError();

$stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
$news_list = $stmt->fetchAll();
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
        <?php if ($general_success) echo "<div class='alert alert-success'>$general_success</div>"; ?>
        <?php if ($general_error) echo "<div class='alert alert-danger'>$general_error</div>"; ?>

        <h2 class="text-center fw-bold mb-5">Новости школы</h2>
        
        <div class="row g-4">
            <?php foreach ($news_list as $news): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-solid position-relative">
                        
                        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                        <div class="position-absolute top-0 end-0 m-2 d-flex gap-1" style="z-index: 10;">
                            <button class="btn btn-light btn-sm shadow-sm" 
                                    onclick='editNews(<?= json_encode($news) ?>)' 
                                    data-bs-toggle="modal" data-bs-target="#editNewsModal">
                                <i class="bi bi-pencil text-primary"></i>
                            </button>
                            <a href="functions/add_news.php?delete=<?= $news['id'] ?>" 
                               class="btn btn-light btn-sm shadow-sm" 
                               onclick="return confirm('Удалить эту новость?')">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                        </div>
                        <?php endif; ?>

                        <?php if ($news['image']): ?>
                            <img src="<?= htmlspecialchars($news['image']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <small class="text-muted"><?= date('d.m.Y', strtotime($news['created_at'])) ?></small>
                            <h5 class="card-title fw-bold mt-2"><?= htmlspecialchars($news['title']) ?></h5>
                            <p class="card-text text-secondary"><?= nl2br(htmlspecialchars($news['content'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
    <div class="modal fade text-dark" id="editNewsModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="functions/add_news.php" method="POST" enctype="multipart/form-data" class="modal-content">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Редактировать новость</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Заголовок</label>
                        <input type="text" name="title" id="edit-title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Текст</label>
                        <textarea name="content" id="edit-content" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Заменить изображение (необязательно)</label>
                        <input type="file" name="news_image" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function editNews(news) {
        document.getElementById('edit-id').value = news.id;
        document.getElementById('edit-title').value = news.title;
        document.getElementById('edit-content').value = news.content;
    }
    </script>
    <?php endif; ?>

    <?php require_once "footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>