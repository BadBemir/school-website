<?php
session_start();
require_once "config.php";
requireAuth(true); // Требуем права администратора

require "conn.php";
// Убеждаемся, что колонка job существует (один раз при загрузке страницы)
ensureJobColumn($conn);
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php require_once "header.php"?>
    
    <main>
      <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="mb-0"><i class="bi bi-shield-check"></i> Панель администратора</h2>
          <a href="index.php" class="btn btn-outline-secondary">
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
                $sql = "SELECT id, username, email, login, job FROM users ORDER BY id DESC";
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
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
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
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editJobModal<?php echo $user['id']; ?>">
                        <i class="bi bi-pencil"></i> Изменить
                      </button>
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
                        <form action="update_job.php" method="post">
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
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="mt-3">
              <p class="text-muted">
                <i class="bi bi-info-circle"></i> Всего пользователей: <strong><?php echo count($users); ?></strong>
              </p>
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

