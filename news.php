<?php
session_start();
require_once "config.php";
require_once "functions/conn.php";

$news_list = [];
try {
    $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
    $news_list = $stmt->fetchAll();
} catch (PDOException $e) {
    // можно добавить лог ошибки, если нужно
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новости - Школа №12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php require_once "header.php"; ?>

    <!-- Hero-блок — такой же стиль, как на главной, чтобы визуально было похоже -->
    <section class="hero-section py-5 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Новости школы</h1>
            <p class="lead text-muted mb-0">Актуальные события, достижения и жизнь нашей школы №12</p>
        </div>
    </section>

    <!-- Основной контейнер с новостями -->
    <div class="container py-5">
        <?php if (empty($news_list)): ?>
            <div class="text-center py-5">
                <h3 class="text-muted">Новостей пока нет</h3>
                <p class="lead text-muted">Следите за обновлениями!</p>
            </div>
        <?php else: ?>
            <div class="row row-cols-1 row-cols-lg-3 g-4">
                <?php foreach ($news_list as $news): ?>
                    <div class="col">
                        <div class="card news-card h-100 shadow-sm position-relative overflow-hidden">
                            
                            <?php if (!empty($news['image'])): ?>
                                <div class="news-image-wrapper position-relative">
                                    <img src="<?= htmlspecialchars($news['image']) ?>" 
                                         class="card-img-top" 
                                         alt="<?= htmlspecialchars($news['title']) ?>"
                                         loading="lazy"
                                         style ="height:250px; overflow:hidden;">
                                    
                                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                                        <div class="admin-controls position-absolute top-0 end-0 p-2 d-flex gap-2">
                                            <button class="btn btn-sm btn-light rounded-circle shadow-sm" 
                                                    onclick='editNews(<?= json_encode($news) ?>)' 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#editModal"
                                                    title="Редактировать">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <a href="functions/add_news.php?delete=<?= $news['id'] ?>" 
                                               class="btn btn-sm btn-light rounded-circle shadow-sm"
                                               onclick="return confirm('Удалить новость?')"
                                               title="Удалить">
                                                <i class="bi bi-trash text-danger"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column p-4">
                                <h5 class="card-title fw-bold mb-2 text-start">
                                    <?= htmlspecialchars($news['title']) ?>
                                </h5>
                                
                                <p class="text-muted small mb-3 text-start">
                                    <i class="bi bi-calendar3 me-2"></i>
                                    <?= date('d.m.Y H:i', strtotime($news['created_at'])) ?>
                                </p>
                                
                                <p class="card-text mb-0 text-start flex-grow-1">
                                    <?= nl2br(htmlspecialchars($news['content'])) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Модалка редактирования (оставляем как было) -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="functions/add_news.php" method="POST" enctype="multipart/form-data" class="modal-content text-dark">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-header fw-bold">Редактировать новость</div>
                <div class="modal-body">
                    <input type="text" name="title" id="edit-title" class="form-control mb-3" required placeholder="Заголовок">
                    <textarea name="content" id="edit-content" class="form-control mb-3" rows="6" required placeholder="Текст новости"></textarea>
                    <label class="small text-muted">Сменить картинку (не обязательно):</label>
                    <input type="file" name="news_image" class="form-control" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function editNews(data) {
        document.getElementById('edit-id').value     = data.id;
        document.getElementById('edit-title').value   = data.title;
        document.getElementById('edit-content').value = data.content;
    }
    </script>

    <?php require_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>