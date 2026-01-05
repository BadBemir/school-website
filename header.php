<?php
session_start();
?>
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
      <!-- Бренд слева -->
      <a class="navbar-brand fs-4 fw-bold" href="index.php">
        <i class="bi bi-mortarboard-fill me-2"></i>Школа №12 НГО
      </a>

      <!-- Кнопка для мобильных -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav fs-5">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Главная</a>
          </li>
          
          <!-- Выпадающий список "О школе" -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="about.php" id="aboutDropdown" 
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
              О школе
            </a>
            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
              <li><a class="dropdown-item" href="about.php#history">История школы</a></li>
              <li><a class="dropdown-item" href="about.php#maininfo">Основные сведенья</a></li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Контакты</a>
          </li>

        </ul>
        

        <div class="d-flex align-items-center">
          <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === true): ?>
            <!-- Пользователь авторизован - показываем имя и кнопку выхода -->
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <!-- Кнопка личного кабинета -->
                <li>
                  <a class="dropdown-item" href="account.php">
                    <i class="bi bi-person-badge"></i> Личный кабинет
                  </a>
                </li>
                
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): ?>
                <li>
                  <a class="dropdown-item" href="admin.php">
                    <i class="bi bi-shield-check"></i> Панель администратора
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <?php endif; ?>
                
                <li>
                  <a class="dropdown-item" href="logout.php">
                    <i class="bi bi-box-arrow-right"></i> Выйти
                  </a>
                </li>
              </ul>
            </div>
          <?php else: ?>
            <!-- Пользователь не авторизован - показываем кнопку входа/регистрации -->
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i> Войти
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="bi bi-box-arrow-in-right"></i> Вход
                  </button>
                </li>
                <li>
                  <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#registerModal">
                    <i class="bi bi-person-plus"></i> Регистрация
                  </button>
                </li>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
</header>
    
    <!-- Модальное окно входа -->
    <div class="modal fade" id="loginModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Вход в систему</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <?php if (isset($_SESSION['error'])): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" id="loginError">
                <i class="bi bi-exclamation-triangle-fill"></i> <?php echo htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <form id="loginForm" action="auth.php" method="post">
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
    
    <!-- Модальное окно регистрации -->
    <div class="modal fade" id="registerModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Регистрация</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form id="registerForm" action="reg.php" method="post">
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
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                <label class="form-check-label" for="acceptTerms">Я согласен с условиями использования</label>
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
      // Автоматически открываем модальное окно входа, если есть ошибка
      // НО ТОЛЬКО НА ГЛАВНОЙ СТРАНИЦЕ (index.php) И НА СТРАНИЦАХ ГДЕ НЕТ ЛИЧНОГО КАБИНЕТА
      <?php 
      $current_page = basename($_SERVER['PHP_SELF']);
      if (isset($_SESSION['error']) && $current_page !== 'account.php'): 
      ?>
      (function() {
        function openLoginModal() {
          if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
          } else {
            // Если Bootstrap еще не загружен, ждем
            setTimeout(openLoginModal, 100);
          }
        }

        // Пытаемся открыть модальное окно после загрузки DOM
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', openLoginModal);
        } else {
          // DOM уже загружен, но Bootstrap может быть еще не загружен
          openLoginModal();
        }
        
      })();

      <?php 
        // Очищаем ошибку после отображения (только на главной)
        if ($current_page === 'index.php') {
          unset($_SESSION['error']);
        }
      endif; ?>
    </script>
</body>
</html>