<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Хедер</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
     <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand fs-4 fw-bold" href="/">
                <i class="bi bi-mortarboard-fill me-2"></i>Школа №12 НГО
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto fs-5">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="about.php" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            О школе
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="about.php#history">История школы</a></li>
                            <li><a class="dropdown-item" href="about.php#maininfo">Основные сведения</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Контакты</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="team.php">Педагоги</a>
                    </li>

                    <!-- Сюда можно добавить ещё пункты меню при необходимости -->
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <!-- Кнопка смены темы -->
                    <button id="theme-toggle" class="btn btn-light me-2" title="Сменить тему">
                        <i class="bi bi-moon"></i>
                    </button>

                    <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>

                        <!-- Кнопки для авторизованных пользователей -->
                        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                            <!-- Администратор -->
                            <a href="admin_schedule.php" class="btn btn-outline-warning me-2" title="Управление расписанием">
                                <i class="bi bi-calendar-event me-1"></i> Расписание (админ)
                            </a>
                            <a href="admin.php" class="btn btn-outline-danger me-2" title="Панель администратора">
                                <i class="bi bi-shield-lock me-1"></i> Админ-панель
                            </a>
                        <?php else: ?>
                            <!-- Обычный пользователь -->
                            <a href="schedule.php" class="btn btn-outline-warning me-2" title="Посмотреть расписание уроков">
                                <i class="bi bi-calendar-check me-1"></i> Расписание
                            </a>
                        <?php endif; ?>

                        <!-- Выпадающее меню с именем пользователя -->
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                <?= htmlspecialchars($_SESSION['username'] ?? 'Пользователь') ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="account.php">
                                        <i class="bi bi-person-badge me-1"></i> Личный кабинет
                                    </a>
                                </li>
                                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                                    <li>
                                        <a class="dropdown-item" href="admin.php">
                                            <i class="bi bi-gear me-1"></i> Админ-панель
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="logout.php">
                                        <i class="bi bi-box-arrow-right me-1"></i> Выйти
                                    </a>
                                </li>
                            </ul>
                        </div>

                    <?php else: ?>

                        <!-- Не авторизован -->
                        <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Войти
                        </button>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#registerModal">
                            <i class="bi bi-person-plus me-1"></i> Регистрация
                        </button>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
    
<div class="modal fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Вход в систему</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <?php if (isset($_SESSION['auth_error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="loginError">
            <i class="bi bi-exclamation-triangle-fill"></i> <?php echo htmlspecialchars($_SESSION['auth_error']); ?>
            <button type="button" class="btn-close" onclick="clearAuthError()" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <form id="loginForm" action="functions/auth.php" method="post">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Логин</label>
            <input name="auth-login" type="text" class="form-control" id="loginEmail" placeholder="Логин" required>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Пароль</label>
            <input name="auth-password" type="password" class="form-control" id="loginPassword" placeholder="Введите пароль" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Войти</button>
        </form>
      </div>
      <div class="modal-footer">
        <p class="text-muted small mb-0">Нет аккаунта? 
          <a href="#" class="link-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">
            Зарегистрируйтесь
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Регистрация</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <?php if (isset($_SESSION['reg_error'])): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="registerError">
            <i class="bi bi-exclamation-triangle-fill"></i> <?php echo htmlspecialchars($_SESSION['reg_error']); ?>
            <button type="button" class="btn-close" onclick="clearRegError()" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <form id="registerForm" action="/functions/reg.php" method="post">
          <div class="mb-3">
            <label for="registerName" class="form-label">ФИО</label>
            <input name="reg-username" type="text" class="form-control" id="registerName" placeholder="Введите ваше ФИО" required>
          </div>
          <div class="mb-3">
            <label for="registerEmail" class="form-label">Email</label>
            <input name="reg-email" type="email" class="form-control" id="registerEmail" placeholder="example@mail.ru" required>
          </div>
          <div class="mb-3">
            <label for="registerLogin" class="form-label">Логин</label>
            <input name="reg-login" type="text" class="form-control" id="registerLogin" placeholder="Придумайте логин" required>
          </div>
          <div class="mb-3">
            <label for="registerPassword" class="form-label">Пароль</label>
            <input name="reg-password" type="password" class="form-control" id="registerPassword" placeholder="Не менее 6 символов" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>
      </div>
      <div class="modal-footer">
        <p class="text-muted small mb-0">Уже есть аккаунт? 
          <a href="#" class="link-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
            Войдите
          </a>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
  <?php if (isset($_SESSION['reg_error'])): ?>
  document.addEventListener('DOMContentLoaded', function() {
    const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
    registerModal.show();
  });
  <?php endif; ?>
  
  <?php if (isset($_SESSION['auth_error'])): ?>
  document.addEventListener('DOMContentLoaded', function() {
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
  });
  <?php endif; ?>
  
  function clearAuthError() {
    fetch('functions/clear_errors.php?type=auth_error');
  }
  
  function clearRegError() {
    fetch('functions/clear_errors.php?type=reg_error');
  }
  
  document.getElementById('loginModal').addEventListener('hidden.bs.modal', function () {
    clearAuthError();
  });
  
  document.getElementById('registerModal').addEventListener('hidden.bs.modal', function () {
    clearRegError();
  });

  // Логика смены темы
  document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Проверяем сохраненную тему в localStorage
    if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('dark-theme');
      themeToggle.innerHTML = '<i class="bi bi-sun"></i>';
    } else {
      themeToggle.innerHTML = '<i class="bi bi-moon"></i>';
    }

    // Обработчик клика по кнопке
    themeToggle.addEventListener('click', function() {
      body.classList.toggle('dark-theme');
      if (body.classList.contains('dark-theme')) {
        themeToggle.innerHTML = '<i class="bi bi-sun"></i>';
        localStorage.setItem('theme', 'dark');
      } else {
        themeToggle.innerHTML = '<i class="bi bi-moon"></i>';
        localStorage.setItem('theme', 'light');
      }
    });
  });
</script>
