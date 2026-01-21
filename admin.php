<?php
session_start();
require_once __DIR__ . "/config.php";
requireAuth(true); // Требуем права администратора

// Подключаемся к БД
require_once __DIR__ . "/functions/conn.php";

// Убеждаемся, что колонки существуют
ensureJobColumn($conn);
ensureStatusColumn($conn);

?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
      .status-badge {
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
      }
      .status-working {
        background-color: #00ff8cff;
        color: #ffffffff;
      }
      .status-vacation {
        background-color: #ffc400ff;
        color: #ffffffff;
      }
      .status-sick {
        background-color: #ff0015ff;
        color: #ffffffff;
      }
      .action-buttons {
        min-width: 200px;
      }
    </style>
  </head>
  <body>
    <?php require_once __DIR__ . "/header.php"?>

    <main>
      <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="mb-0"><i class="bi bi-shield-check"></i> Панель администратора</h2>
          <a href="/" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> На главную
          </a>
        </div>

        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-people"></i> Список всех пользователей</h5>
          </div>
          <div class="card-body">
            <?php
            // Показываем сообщения об успехе/ошибке
            $success = getSuccess();
            $error = getError();

            if ($success) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<i class="bi bi-check-circle"></i> ' . htmlspecialchars($success);
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
            if ($error) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '<i class="bi bi-exclamation-triangle"></i> ' . htmlspecialchars($error);
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }

            try {
                $sql = "SELECT id, username, email, login, job, status FROM users ORDER BY id DESC";
                $query = $conn->prepare($sql);
                $query->execute();
                $users = $query->fetchAll(PDO::FETCH_ASSOC);

                if (count($users) > 0):
            ?>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
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
                  <?php foreach ($users as $user):
                    // Определяем класс для статуса
                    $status_class = '';
                    $status_text = 'Работает';
                    if ($user['status'] === 'vacation') {
                        $status_class = 'status-vacation';
                        $status_text = 'В отпуске';
                    } elseif ($user['status'] === 'sick') {
                        $status_class = 'status-sick';
                        $status_text = 'На больничном';
                    } elseif ($user['status'] === 'working' || $user['status'] === null) {
                        $status_class = 'status-working';
                        $status_text = 'Работает';
                    }
                  ?>
                  <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['login']); ?></td>
                    <td>
                      <span id="job-display-<?php echo $user['id']; ?>">
                        <?php echo htmlspecialchars($user['job'] ?? 'Не указана'); ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge status-badge <?php echo $status_class; ?>">
                        <?php echo $status_text; ?>
                      </span>
                    </td>
                    <td class="action-buttons">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editJobModal<?php echo $user['id']; ?>">
                          <i class="bi bi-pencil"></i> Должность
                        </button>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editStatusModal<?php echo $user['id']; ?>">
                          <i class="bi bi-person-badge"></i> Статус
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $user['id']; ?>">
                          <i class="bi bi-trash"></i> Уволить
                        </button>
                      </div>
                    </td>
                  </tr>

                  <!-- Модальное окно редактирования должности -->
                  <div class="modal fade" id="editJobModal<?php echo $user['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Изменить должность</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="functions/update_job.php" method="post">
                          <div class="modal-body">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <div class="mb-3">
                              <label for="job<?php echo $user['id']; ?>" class="form-label">Должность пользователя: <strong><?php echo htmlspecialchars($user['username']); ?></strong></label>
                              <input type="text" class="form-control" id="job<?php echo $user['id']; ?>" name="job"
                                value="<?php echo htmlspecialchars($user['job'] ?? ''); ?>"
                                placeholder="Введите должность">
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

                  <!-- Модальное окно изменения статуса -->
                  <div class="modal fade" id="editStatusModal<?php echo $user['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Изменить статус</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="functions/update_status.php" method="post">
                          <div class="modal-body">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <div class="mb-3">
                              <label class="form-label">Статус пользователя: <strong><?php echo htmlspecialchars($user['username']); ?></strong></label>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="working<?php echo $user['id']; ?>" value="working" <?php echo ($user['status'] === 'working' || $user['status'] === null) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="working<?php echo $user['id']; ?>">
                                  <span class="badge status-badge status-working">Работает</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="vacation<?php echo $user['id']; ?>" value="vacation" <?php echo ($user['status'] === 'vacation') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="vacation<?php echo $user['id']; ?>">
                                  <span class="badge status-badge status-vacation">В отпуске</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="sick<?php echo $user['id']; ?>" value="sick" <?php echo ($user['status'] === 'sick') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sick<?php echo $user['id']; ?>">
                                  <span class="badge status-badge status-sick">На больничном</span>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-warning">Обновить статус</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Модальное окно увольнения пользователя -->
                  <div class="modal fade" id="deleteUserModal<?php echo $user['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Увольнение пользователя</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="functions/delete_user.php" method="post">
                          <div class="modal-body">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <div class="alert alert-danger">
                              <i class="bi bi-exclamation-triangle"></i>
                              <strong>Внимание! Это действие нельзя отменить.</strong>
                            </div>
                            <p>Вы уверены, что хотите уволить пользователя <strong><?php echo htmlspecialchars($user['username']); ?></strong>?</p>
                            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                            <p>Должность: <?php echo htmlspecialchars($user['job'] ?? 'Не указана'); ?></p>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" name="confirm_delete" id="confirmDelete<?php echo $user['id']; ?>" required>
                              <label class="form-check-label" for="confirmDelete<?php echo $user['id']; ?>">
                                Да, я подтверждаю увольнение этого сотрудника
                              </label>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-danger">Уволить</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="mt-3">
              <p class="text-muted">
                <i class="bi bi-info-circle"></i> Всего пользователей: <strong><?php echo count($users); ?></strong>
              </p>
              <div class="d-flex gap-2">
                <span class="badge status-badge status-working">Работает</span>
                <span class="badge status-badge status-vacation">В отпуске</span>
                <span class="badge status-badge status-sick">На больничном</span>
              </div>
            </div>
            <?php
                else:
            ?>
            <div class="alert alert-info">
              <i class="bi bi-info-circle"></i> В базе данных пока нет зарегистрированных пользователей.
            </div>
            <?php
                endif;
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">';
                echo '<i class="bi bi-exclamation-triangle"></i> Ошибка базы данных: ' . htmlspecialchars($e->getMessage());
                echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
    </main>

        <?php require_once "footer.php"?>  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
