<?php
session_start();
require_once __DIR__ . "/config.php";
requireAuth(true); // Требуем права администратора

// Подключаем функции из папки functions/
require_once __DIR__ . "/functions/conn.php";

// Убеждаемся, что нужные колонки существуют
ensureJobColumn($conn);
ensureStatusColumn($conn);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Панель администратора</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .status-badge {
            font-size: 0.8rem;
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
        .badge-working   { background-color: #198754; }
        .badge-vacation  { background-color: #fd7e14; }
        .badge-sick      { background-color: #dc3545; }
        .badge-new       { background-color: #ffc107; color: #000; }
        .badge-processed { background-color: #0d6efd; }
        .badge-rejected  { background-color: #6c757d; }
        .badge-done      { background-color: #198754; }
        .table-section {
            margin-bottom: 3rem;
        }
        .card-header {
            font-weight: 500;
        }
    </style>
</head>
<body>

<?php require_once "header.php"; ?>

<main class="container my-5">

    <!-- Сообщения об успехе / ошибке -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- 1. Пользователи -->
    <section class="table-section">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Список всех пользователей</h5>
                <?php
                $total_users = $conn->query("SELECT COUNT(*) FROM users")->fetchColumn();
                ?>
                <span class="badge bg-light text-primary">Всего: <?= $total_users ?></span>
            </div>

            <div class="card-body p-0">
                <?php
                try {
                    $stmt = $conn->query("SELECT id, username, email, login, job, status FROM users ORDER BY id");
                    $users = $stmt->fetchAll();

                    if ($users):
                ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>ФИО</th>
                                <th>Email</th>
                                <th>Логин</th>
                                <th>Должность</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= htmlspecialchars($user['username'] ?: '—') ?></td>
                                <td><?= htmlspecialchars($user['email'] ?: '—') ?></td>
                                <td><?= htmlspecialchars($user['login']) ?></td>
                                <td><?= htmlspecialchars($user['job'] ?: 'Не указана') ?></td>
                                <td>
                                    <?php
                                    $status_classes = [
                                        'working'  => 'badge-working',
                                        'vacation' => 'badge-vacation',
                                        'sick'     => 'badge-sick'
                                    ];
                                    $status_texts = [
                                        'working'  => 'Работает',
                                        'vacation' => 'В отпуске',
                                        'sick'     => 'На больничном'
                                    ];
                                    $cls = $status_classes[$user['status']] ?? 'bg-secondary';
                                    $txt = $status_texts[$user['status']] ?? '—';
                                    ?>
                                    <span class="badge status-badge <?= $cls ?>"><?= $txt ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editJobModal<?= $user['id'] ?>">
                                        <i class="bi bi-briefcase"></i> Должность
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editStatusModal<?= $user['id'] ?>">
                                        <i class="bi bi-toggle-on"></i> Статус
                                    </button>
                                    <form action="/delete_user.php" method="post" class="d-inline"
                                          onsubmit="return confirm('Уволить / удалить пользователя?');">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <input type="hidden" name="confirm_delete" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Уволить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Модалки для пользователей -->
                <?php foreach ($users as $user): ?>
                    <!-- Изменение должности -->
                    <div class="modal fade" id="editJobModal<?= $user['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Изменить должность — <?= htmlspecialchars($user['username']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="functions/update_job.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Должность</label>
                                            <input type="text" name="job" class="form-control"
                                                   value="<?= htmlspecialchars($user['job'] ?? '') ?>"
                                                   placeholder="Например: Учитель математики">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Изменение статуса -->
                    <div class="modal fade" id="editStatusModal<?= $user['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Изменить статус — <?= htmlspecialchars($user['username']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="functions/update_status.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Статус</label>
                                            <select name="status" class="form-select">
                                                <option value="working"  <?= $user['status']==='working'?'selected':'' ?>>Работает</option>
                                                <option value="vacation" <?= $user['status']==='vacation'?'selected':'' ?>>В отпуске</option>
                                                <option value="sick"     <?= $user['status']==='sick'?'selected':'' ?>>На больничном</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php else: ?>
                    <div class="alert alert-info m-3">
                        <i class="bi bi-info-circle me-2"></i>В базе данных пока нет зарегистрированных пользователей.
                    </div>
                <?php endif; 
                } catch (PDOException $e) { ?>
                    <div class="alert alert-danger m-3">
                        Ошибка базы данных: <?= htmlspecialchars($e->getMessage()) ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- 2. Сообщения / заявки -->
    <section class="table-section">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Заявки от пользователей</h5>
                <?php
                $total_apps = $conn->query("SELECT COUNT(*) FROM applications")->fetchColumn();
                ?>
                <span class="badge bg-light text-primary">Всего: <?= $total_apps ?></span>
            </div>

            <div class="card-body p-0">
                <?php
                try {
                    $stmt = $conn->query("SELECT * FROM applications ORDER BY created_at DESC");
                    $apps = $stmt->fetchAll();

                    if ($apps):
                ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Дата</th>
                                <th>ФИО</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($apps as $app): ?>
                            <tr>
                                <td><?= $app['id'] ?></td>
                                <td><?= date('d.m.Y H:i', strtotime($app['created_at'])) ?></td>
                                <td><?= htmlspecialchars($app['fullname']) ?></td>
                                <td><?= htmlspecialchars($app['phone']) ?></td>
                                <td><?= $app['email'] ? htmlspecialchars($app['email']) : '—' ?></td>
                                <td>
                                    <?php
                                    $status_info = [
                                        'new'       => ['class'=>'badge-new',       'text'=>'Новая'],
                                        'processed' => ['class'=>'badge-processed', 'text'=>'В работе'],
                                        'rejected'  => ['class'=>'badge-rejected',  'text'=>'Отклонена'],
                                        'done'      => ['class'=>'badge-done',      'text'=>'Обработана']
                                    ];
                                    $si = $status_info[$app['status']] ?? ['class'=>'bg-secondary', 'text'=>'—'];
                                    ?>
                                    <span class="badge status-badge <?= $si['class'] ?>"><?= $si['text'] ?></span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#appModal<?= $app['id'] ?>">
                                        <i class="bi bi-eye"></i> Подробно
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Модальные окна для заявок -->
                <?php foreach ($apps as $app): ?>
                <div class="modal fade" id="appModal<?= $app['id'] ?>" tabindex="-1" aria-labelledby="appModalLabel<?= $app['id'] ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="appModalLabel<?= $app['id'] ?>">
                                    Заявка #<?= $app['id'] ?> от <?= date('d.m.Y H:i', strtotime($app['created_at'])) ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-sm-4 fw-bold">ФИО:</div>
                                    <div class="col-sm-8"><?= htmlspecialchars($app['fullname']) ?></div>

                                    <div class="col-sm-4 fw-bold">Телефон:</div>
                                    <div class="col-sm-8"><?= htmlspecialchars($app['phone']) ?></div>

                                    <div class="col-sm-4 fw-bold">Email:</div>
                                    <div class="col-sm-8"><?= $app['email'] ? htmlspecialchars($app['email']) : '—' ?></div>

                                    <div class="col-sm-4 fw-bold">Текст заявки:</div>
                                    <div class="col-sm-8"><?= nl2br(htmlspecialchars($app['message'])) ?></div>

                                    <div class="col-sm-4 fw-bold">Статус:</div>
                                    <div class="col-sm-8">
                                        <form action="functions/update_application_status.php" method="post" class="d-flex align-items-center gap-2">
                                            <input type="hidden" name="app_id" value="<?= $app['id'] ?>">
                                            <select name="status" class="form-select form-select-sm">
                                                <option value="new"       <?= $app['status']==='new'?'selected':'' ?>>Новая</option>
                                                <option value="processed" <?= $app['status']==='processed'?'selected':'' ?>>В работе</option>
                                                <option value="rejected"  <?= $app['status']==='rejected'?'selected':'' ?>>Отклонена</option>
                                                <option value="done"      <?= $app['status']==='done'?'selected':'' ?>>Обработана</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-success">Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php else: ?>
                    <div class="alert alert-info m-3">
                        <i class="bi bi-info-circle me-2"></i>Пока нет ни одной заявки
                    </div>
                <?php endif; 
                } catch (PDOException $e) { ?>
                    <div class="alert alert-danger m-3">
                        Ошибка загрузки заявок: <?= htmlspecialchars($e->getMessage()) ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</main>

<?php require_once "footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>