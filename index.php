<?php
session_start();
require_once "config.php";
require_once "functions/conn.php";

$general_success = getSuccess();
$general_error = getError();

try {
    $stmt = $conn->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3");
    $latest_news = $stmt->fetchAll();
} catch (PDOException $e) { $latest_news = []; }

?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  
  <body>
      
    <?php require_once "header.php"; ?>
    
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

      <section class="hero-section">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 hero-content fade-in-up">
              <h1 class="display-4 fw-bold mb-4">Добро пожаловать в Школу №12 НГО</h1>
              <p class="lead mb-4" style="font-size: 1.25rem; opacity: 0.95;">Мы рады приветствовать гостей на нашем сайте — электронном портрете нашей замечательной школы. Надеемся, что сайт будет во многом полезен как учителям, так ученикам и родителям.</p>
              <p class="mb-4" style="opacity: 0.9;">Здесь Вы сможете найти актуальную информацию об учреждении.</p>
              <div class="d-flex gap-3 flex-wrap">
                <a href="about.php" class="btn btn-primary btn-lg">Узнать больше</a>
                <a href="contact.php" class="btn btn-outline-primary btn-lg">Связаться с нами</a>
              </div>
            </div>
            <div class="col-lg-6 mt-lg-0">
              <img src="images\school-front.jpeg" class="img-fluid rounded-4 shadow mt-4 mb-4 " alt="Школа №12" loading="lazy">
            </div>
          </div>
        </div>
      </section>

      <section class="mb-5">
        <div class="container">
          <div class="row text-center">
            <div class="col-lg-10 mx-auto">
              <h2 class="m-4">Школа №12 сегодня</h2>
              <div class="row g-4">
                <div class="col-md-4">
                  <div class=" card h-100 border-primary shadow-sm">
                    <div class="card-body">
                      <i class="bi bi-people-fill display-4 text-primary mb-3"></i>
                      <h4 class="text-primary">850+ учеников</h4>
                      <p class="text-muted">1–11 классы + дошкольное отделение</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card  h-100 border-primary shadow-sm">
                    <div class="card-body">
                      <i class="bi bi-mortarboard-fill display-4 text-primary mb-3"></i>
                      <h4 class="text-primary">58 педагогов</h4>
                      <p class="text-muted">Большинство — высшая и первая категория</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card h-100 border-primary shadow-sm">
                    <div class="card-body">
                      <i class="bi bi-calendar-event-fill display-4 text-primary mb-3"></i>
                      <h4 class="text-primary">Активная жизнь</h4>
                      <p class="text-muted">Более 40 мероприятий в год</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>




      <section class="hero-section py-5 bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <h2 class="text-center mb-4">Наша миссия и ценности</h2>
              <p class="lead text-center mb-5">Мы стремимся создать образовательную среду, в которой каждый ребёнок чувствует себя значимым, раскрывает свои способности и готовится к успешной самостоятельной жизни.</p>
              
              <div class="row g-5">
                <div class="col-md-6">
                  <h4>Основные принципы нашей работы</h4>
                  <ul class="list-unstyled">
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i>Индивидуальный подход к каждому ученику</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i>Сочетание традиций и современных образовательных технологий</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i>Создание атмосферы уважения и сотрудничества</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i>Развитие критического мышления и творческих способностей</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i>Формирование активной жизненной позиции и гражданственности</li>
                  </ul>
                </div>
                
                <div class="col-md-6">
                  <h4>Чего мы хотим достичь</h4>
                  <ul class="list-unstyled">
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Самостоятельно ставить цели и достигать их</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Ответственно относиться к себе, другим людям и окружающему миру</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Уважать культурные традиции своей страны и народов мира</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Быть готовым к продолжению образования в выбранной профессии</li>
                    <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Уметь работать в команде и проявлять лидерские качества</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


          
      <section class="py-5">
        <div class="container">
        <div class="container">
          <div class="d-flex justify-content-between"><h2>Последние новости</h2>
          <a href="/news.php" class="btn align-middle btn-outline-primary">Читать далее</a></div>
          
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-2">
            <?php foreach ($latest_news as $news): ?>
            <div class="col">
              <div class="card h-100 shadow-sm border-solid hero-section">
                <?php if ($news['image']): ?>
                    <img src="<?= $news['image'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                <?php endif; ?>
                <div class="card-body">
                  <h5 class="card-title fw-bold"><?= htmlspecialchars($news['title']) ?></h5>
                  <p class="card-text text-muted">
                      <?= mb_strimwidth(htmlspecialchars($news['content']), 0, 150, "...") ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted"><?= date('d.m.Y', strtotime($news['created_at'])) ?></small>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
        </div>
      </section>


      <section class="py-5 hero-section advantage">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <h2 class="text-center mb-4">Почему выбирают именно нашу школу?</h2>
              
              <div class="row g-4 mt-4">
                <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-primary hero-section shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">Сильный педагогический коллектив</h5>
                      <p class="card-text">Большинство наших учителей имеют высшую и первую квалификационную категорию, регулярно проходят курсы повышения квалификации, участвуют в профессиональных конкурсах и имеют значительный стаж успешной работы.</p>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-primary hero-section  shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">Современная материально-техническая база</h5>
                      <p class="card-text">Оборудованные кабинеты физики, химии, биологии, информатики, лингафонные кабинеты, спортивный и тренажёрный залы, современная столовая, медицинский кабинет — всё для комфортного обучения и развития.</p>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6 col-lg-4">
                  <div class="card h-100 border-primary hero-section shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">Богатая внеурочная жизнь</h5>
                      <p class="card-text">Работают 18 объединений дополнительного образования, спортивные секции, театральная студия, вокальная группа, школьный музей, проводятся традиционные праздники, конкурсы, интеллектуальные игры и многое другое.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <?php require_once "footer.php"?>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>