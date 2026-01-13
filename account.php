<?php
session_start();
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/functions/conn.php";

if (!isLoggedIn()) {
    header('Location: /');
    exit;
}



try {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0) {
        $user = [
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
            'login' => $_SESSION['login'],
            'job' => 'Администратор'
        ];
        $user['created_at'] = date('Y-m-d H:i:s');
    } else {
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT id, username, email, login, job FROM users WHERE id = ?";
        $query = $conn->prepare($sql);
        $query->execute([$user_id]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            session_destroy();
            header('Location: /');
            exit;
        }
        
        if (empty($user['job'])) {
            $user['job'] = 'Не указано';
        }
        
        try {
            $date_sql = "SELECT created_at FROM users WHERE id = ?";
            $date_query = $conn->prepare($date_sql);
            $date_query->execute([$user_id]);
            $created_at = $date_query->fetchColumn();
            
            if ($created_at) {
                $user['created_at'] = $created_at;
            } else {
                $user['created_at'] = date('Y-m-d H:i:s');
            }
        } catch (PDOException $e) {
            $user['created_at'] = date('Y-m-d H:i:s');
        }
    }
} catch (PDOException $e) {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0) {
        $user = [
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
            'login' => $_SESSION['login'],
            'job' => 'Администратор',
            'created_at' => date('Y-m-d H:i:s')
        ];
    } else {
        setError("Ошибка загрузки данных профиля");
        $user = [
            'username' => $_SESSION['username'] ?? 'Пользователь',
            'email' => $_SESSION['email'] ?? 'Не указан',
            'login' => $_SESSION['login'] ?? 'Не указан',
            'job' => 'Не указано',
            'created_at' => date('Y-m-d H:i:s')
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    
    if ($_POST['action'] === 'update_profile') {
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0) {
            setError("Редактирование профиля администратора недоступно");
            header('Location: account.php');
            exit;
        }
        
        $new_username = sanitizeString($_POST['username'] ?? '');
        $new_email = sanitizeString($_POST['email'] ?? '');
        $new_login = sanitizeString($_POST['login'] ?? '');
        $new_job = sanitizeString($_POST['job'] ?? '');
        
        $errors = [];
        
        if (!validateLength($new_username, MIN_USERNAME_LENGTH)) {
            $errors[] = "ФИО должно содержать не менее " . MIN_USERNAME_LENGTH . " символов";
        }
        
        if (!validateEmail($new_email)) {
            $errors[] = "Введите корректный email адрес";
        }
        
        if (!validateLength($new_login, MIN_LOGIN_LENGTH)) {
            $errors[] = "Логин должен содержать не менее " . MIN_LOGIN_LENGTH . " символов";
        }
        
        if ($new_login !== $_SESSION['login']) {
            try {
                $check_sql = "SELECT id FROM users WHERE login = ? AND id != ?";
                $check_query = $conn->prepare($check_sql);
                $check_query->execute([$new_login, $_SESSION['user_id']]);
                if ($check_query->fetch()) {
                    $errors[] = "Этот логин уже занят другим пользователем";
                }
            } catch (PDOException $e) {
                $errors[] = "Ошибка проверки логина";
            }
        }
        
        if ($new_email !== $_SESSION['email']) {
            try {
                $check_sql = "SELECT id FROM users WHERE email = ? AND id != ?";
                $check_query = $conn->prepare($check_sql);
                $check_query->execute([$new_email, $_SESSION['user_id']]);
                if ($check_query->fetch()) {
                    $errors[] = "Этот email уже используется другим пользователем";
                }
            } catch (PDOException $e) {
                $errors[] = "Ошибка проверки email";
            }
        }
        
        if (empty($errors)) {
            try {
                $update_sql = "UPDATE users SET username = ?, email = ?, login = ?, job = ? WHERE id = ?";
                $update_query = $conn->prepare($update_sql);
                $result = $update_query->execute([$new_username, $new_email, $new_login, $new_job, $_SESSION['user_id']]);
                
                if ($result) {
                    $_SESSION['username'] = $new_username;
                    $_SESSION['email'] = $new_email;
                    $_SESSION['login'] = $new_login;
                    
                    $user['username'] = $new_username;
                    $user['email'] = $new_email;
                    $user['login'] = $new_login;
                    $user['job'] = $new_job ?: 'Не указано';
                    
                    setSuccess("Профиль успешно обновлен!");
                    
                    header('Location: account.php');
                    exit;
                } else {
                    setError("Ошибка обновления профиля: не удалось выполнить запрос к базе данных");
                }
            } catch (PDOException $e) {
                setError("Ошибка обновления профиля в базе данных");
            }
        } else {
            setError(implode("<br>", $errors));
        }
    }
    
    if ($_POST['action'] === 'change_password') {
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0) {
            setError("Смена пароля администратора недоступна");
            header('Location: account.php');
            exit;
        }
        
        $current_password = $_POST['current_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        $errors = [];
        
        if (!validateLength($new_password, MIN_PASSWORD_LENGTH)) {
            $errors[] = "Новый пароль должен содержать не менее " . MIN_PASSWORD_LENGTH . " символов";
        }
        
        if ($new_password !== $confirm_password) {
            $errors[] = "Пароли не совпадают";
        }
        
        if (empty($errors)) {
            try {
                $password_sql = "SELECT password FROM users WHERE id = ?";
                $password_query = $conn->prepare($password_sql);
                $password_query->execute([$_SESSION['user_id']]);
                $db_password = $password_query->fetchColumn();
                
                if (password_verify($current_password, $db_password)) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    
                    $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                    $update_query = $conn->prepare($update_sql);
                    $result = $update_query->execute([$hashed_password, $_SESSION['user_id']]);
                    
                    if ($result) {
                        setSuccess("Пароль успешно изменен!");
                        header('Location: account.php');
                        exit;
                    } else {
                        setError("Ошибка обновления пароля в базе данных");
                    }
                } else {
                    setError("Текущий пароль указан неверно");
                }
            } catch (PDOException $e) {
                setError("Ошибка смены пароля в базе данных");
            }
        } else {
            setError(implode("<br>", $errors));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школа 12 - Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .profile-card {
            max-width: 500px;
            margin: 0 auto;
        }
        .job-badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
    <?php 
    $temp_error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
    $temp_success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
    
    unset($_SESSION['error']);
    unset($_SESSION['success']);
    
    include __DIR__ . '/header.php'; 
    
    if ($temp_error) {
        $_SESSION['error'] = $temp_error;
    }
    if ($temp_success) {
        $_SESSION['success'] = $temp_success;
    }
    ?>

    <main class="container py-5">
        <?php if ($error = getError()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
        <?php if ($success = getSuccess()): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i><?php echo $success; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow profile-card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-person-circle me-2"></i>Мой профиль</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                <i class="bi bi-person-fill text-white" style="font-size: 4rem;"></i>
                            </div>
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($user['username']); ?></h5>
                        <p class="text-muted mb-1">Логин: <?php echo htmlspecialchars($user['login']); ?></p>
                        <p class="text-muted mb-1">Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        
                        <div class="my-3">
                            <span class="badge bg-info job-badge">
                                <i class="bi bi-briefcase me-1"></i><?php echo htmlspecialchars($user['job']); ?>
                            </span>
                        </div>
                        
                        <div class="mt-4">
                            <?php if (!(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0)): ?>
                                <button class="btn btn-outline-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <i class="bi bi-pencil-square me-2"></i>Редактировать профиль
                                </button>
                                <button class="btn btn-outline-warning w-100" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    <i class="bi bi-key me-2"></i>Сменить пароль
                                </button>
                            <?php else: ?>
                                <div class="alert alert-info mb-3">
                                    <small><i class="bi bi-info-circle"></i> Редактирование профиля администратора недоступно</small>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php if (!(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true && $_SESSION['user_id'] == 0)): ?>
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование профиля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="account.php">
                    <input type="hidden" name="action" value="update_profile">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editName" class="form-label">ФИО</label>
                            <input type="text" name="username" class="form-control" id="editName" 
                                   value="<?php echo htmlspecialchars($user['username']); ?>" 
                                   minlength="<?php echo MIN_USERNAME_LENGTH; ?>" required>
                            <div class="form-text">Минимум <?php echo MIN_USERNAME_LENGTH; ?> символа</div>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="editEmail" 
                                   value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLogin" class="form-label">Логин</label>
                            <input type="text" name="login" class="form-control" id="editLogin" 
                                   value="<?php echo htmlspecialchars($user['login']); ?>" 
                                   minlength="<?php echo MIN_LOGIN_LENGTH; ?>" required>
                            <div class="form-text">Минимум <?php echo MIN_LOGIN_LENGTH; ?> символа</div>
                        </div>
                        <div class="mb-3">
                            <label for="editJob" class="form-label">Должность</label>
                            <input type="text" name="job" class="form-control" id="editJob" 
                                   value="<?php echo htmlspecialchars($user['job'] === 'Не указано' ? '' : $user['job']); ?>"
                                   placeholder="Например: Ученик, Учитель, Родитель">
                            <div class="form-text">Укажите вашу должность или роль в школе</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePasswordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Смена пароля</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="post" action="account.php">
                    <input type="hidden" name="action" value="change_password">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Текущий пароль</label>
                            <input type="password" name="current_password" class="form-control" id="currentPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Новый пароль</label>
                            <input type="password" name="new_password" class="form-control" id="newPassword" 
                                   minlength="<?php echo MIN_PASSWORD_LENGTH; ?>" required>
                            <div class="form-text">Минимум <?php echo MIN_PASSWORD_LENGTH; ?> символа</div>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Подтвердите новый пароль</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Сменить пароль</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_SESSION['error']) && isset($_POST['action'])): ?>
                <?php if ($_POST['action'] === 'update_profile'): ?>
                    const editModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
                    editModal.show();
                <?php elseif ($_POST['action'] === 'change_password'): ?>
                    const passwordModal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
                    passwordModal.show();
                <?php endif; ?>
            <?php endif; ?>
        });
    </script>
</body>
</html>