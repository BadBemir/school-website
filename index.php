<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  
  <body>
      
    <?php 
    session_start();
    require_once "config.php";
    require_once "header.php"; 
    
    $general_success = getSuccess();
    $general_error = getError();
    ?>
    
    <?php if ($general_success || $general_error): ?>
    <div class="container mt-3">
        <?php if ($general_success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i><?php echo htmlspecialchars($general_success); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
        <?php if ($general_error): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i><?php echo htmlspecialchars($general_error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <main>
      <!-- Hero Section -->
      <section class="hero-section mt-4">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 hero-content fade-in-up">
              <h1 class="display-4 fw-bold mb-4">Добро пожаловать в Школу №12 НГО</h1>
              <p class="lead mb-4" style="font-size: 1.25rem; opacity: 0.95;">Мы рады приветствовать гостей на нашем сайте — электронном портрете нашей замечательной школы. Надеемся, что сайт будет во многом полезен как учителям, так ученикам и родителям.</p>
              <p class="mb-4" style="opacity: 0.9;">Здесь Вы сможете найти актуальную информацию об учреждении.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a href="about.php" class="btn btn-primary btn-lg">Узнать больше</a>
                <a href="contact.php" class="btn btn-outline-dark btn-lg">Связаться с нами</a>
              </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
              <img src="images/school-front.jpeg" class="img-fluid shadow-custom" alt="Изображение школы" style="max-height: 500px; object-fit: cover; width: 100%; border-radius: 20px;">
            </div>
          </div>
        </div>
      </section>
      
      <div class="container my-5">
      
      <div class="container my-5">
        <div class="text-center mb-5">
          <h2 class="mb-3 gradient-text">Наши новости</h2>
          <p class="text-muted lead">Следите за последними событиями и новостями нашей школы</p>
          <div class="border-bottom border-primary mx-auto" style="width: 100px; height: 4px; border-radius: 2px;"></div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col">
            <div class="card h-100 shadow-sm">
              <div class="position-relative">
                <img src="images/prof.webp" class="card-img-top" alt="Актовый зал Школа 12">
                <span class="badge bg-danger position-absolute top-0 start-0 m-3">Горячее</span>
              </div>
              <div class="card-body d-flex flex-column">
                <div class="mb-2">
                  <span class="badge bg-light text-dark me-2">Категория</span>
                  <small class="text-muted">12 декабря 2023</small>
                </div>
                <h5 class="card-title fw-bold">Профориентационный классный час</h5>
                <p class="card-text flex-grow-1">22 декабря среди 9-х и 11-х классов прошел профориентационный классный час с сотрудником следственного отдела: «Следственный отдел по г. Находка следственного управления Следственного комитета Российской Федерации по Приморскому краю» Кужель Анной Владимировной.</p>
                <div class="mt-auto">
                  <a href="#" class="btn btn-outline-primary w-100">Подробнее</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="images/conf.jpg" class="card-img-top" alt="Актовый зал НГГПК">
              <div class="card-body d-flex flex-column">
                <div class="mb-2">
                  <span class="badge bg-info me-2">Акция</span>
                  <small class="text-muted">10 декабря 2023</small>
                </div>
                <h5 class="card-title fw-bold">Профессии моего города</h5>
                <p class="card-text flex-grow-1">Сегодня ученики 5Б класса приняли участие в интерактивной игре «Профессии моего города», проходившей в актовом зале НГГПК.</p>
                <div class="mt-auto">
                  <a href="#" class="btn btn-outline-primary w-100">Подробнее</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="images/classroom.jpeg" class="card-img-top" alt="Новость">
              <div class="card-body d-flex flex-column">
                <div class="mb-2">
                  <span class="badge bg-success me-2">Обновление</span>
                  <small class="text-muted">8 декабря 2023</small>
                </div>
                <h5 class="card-title fw-bold">Мои финансы</h5>
                <p class="card-text flex-grow-1">18 декабря 2025 года ученики 6-го «Г» класса приняли участие в занятии по материалам Всероссийской просветительской эстафеты «Мои финансы», посвящённом рациональному потреблению товаров и услуг.</p>
                <div class="mt-auto">
                  <a href="#" class="btn btn-outline-primary w-100">Подробнее</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php require_once "footer.php"?>   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>