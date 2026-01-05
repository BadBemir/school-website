<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Контакты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    

    
  </head>
  
  <body>
      
    <?php require_once "header.php"?>
    
    
 <!-- Hero Section -->
      <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
          <div class="text-center hero-content">
            <h1 class="display-4 fw-bold mb-3">Контакты</h1>
            <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Свяжитесь с нами любым удобным способом</p>
            <div class="border-bottom border-white mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
          </div>
        </div>
      </section>
      
 <main class="container my-5">

        <div class="row g-4">
            <!-- Левая колонка: Контактная информация -->
            <div class="col-lg-6">
                <div class="card border-0 shadow p-4 contact-card">
                    <h3 class="card-title text-center mb-4">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        Контактная информация
                    </h3>
                    
                    <!-- Адрес -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt text-primary contact-icon"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Адрес</h5>
                            <p class="mb-1">692919,Россия,Приморский край,г.Находка</p>
                            <p class="mb-0">пр.Мира, д.10</p>
                            <button class="btn btn-sm btn-outline-primary mt-2" onclick="copyToClipboard('пр. Мира, 10, Находка, Приморский край, Россия, 692919')">
                                <i class="bi bi-clipboard"></i> Копировать адрес
                            </button>
                        </div>
                    </div>
                    
                    <!-- Телефоны -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-telephone text-primary contact-icon"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Телефоны</h5>
                            <div class="mb-2">
                                <a href="tel:+74236699803" class="text-decoration-none fs-5">
                                    <i class="bi bi-phone me-2"></i> +7 (4236) 69-98-03
                                </a>
                                
                            </div>
                            <div>
                                <a href="tel:+74236741996" class="text-decoration-none">
                                    <i class="bi bi-phone me-2"></i>+7 (4236) 74-19-96
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0">
                            <i class="bi bi-envelope text-primary contact-icon"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">Email</h5>
                            <a href="mailto:school12@nakhodka.edu.ru" class="text-decoration-none fs-5">
                                nkhschool12@mail.ru
                            </a>
                            <br mb-4>
                            <a href="mailto:school12@nakhodka.edu.ru" class="text-decoration-none fs-5">
                                ds670@mail.ru
                            </a>
                            <p class="text-muted small mt-1">Дошкольное отделение</p>
                        </div>
                    </div>
                    
                    <!-- График работы -->
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-clock text-primary contact-icon"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold">График работы</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Учебный процесс:</strong></p>
                                    <span class="badge bg-success hours-badge">ПН-СБ</span> 08:00 - 20:00<br>
                                    <span class="badge bg-secondary hours-badge">ВС</span> Выходной
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Правая колонка: Карта -->
            <div class="col-lg-6">
                <!-- Карта Google -->
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-map me-2"></i>Мы на карте</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2925.7994345099673!2d132.8961283!3d42.8348503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5fb13fc2601de401%3A0x355f5295a6b7ddcd!2z0JzQkNCe0KMgItCh0J7QqCDihJYgMTIg0LjQvC4g0JIu0J0uINCh0LzQtdGC0LDQvdC60LjQvdCwIiDQndCT0J4!5e0!3m2!1sru!2sde!4v1766985368473!5m2!1sru!2sde" 
                                width="100%" 
                                height="400" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="https://maps.app.goo.gl/gi82e9wAoBQr5tjN6" target="_blank"><button class="btn btn-sm btn-primary">
                                <i class="bi bi-arrow-up-right-square me-1"></i>
                                Открыть в Google Maps
                            </button></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Как добраться -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-signpost-split me-2"></i>Как добраться</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <i class="bi bi-bus-front fs-1 text-primary mb-3"></i>
                                <h5>Автобус</h5>
                                <p>Маршруты: 5,9,2</p>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <i class="bi bi-taxi-front fs-1 text-primary mb-3"></i>
                                <h5>На Такси</h5>
                                <p>ул.Проспект мира д.10</p>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <i class="bi bi-car-front fs-1 text-primary mb-3"></i>
                                <h5>На автомобиле</h5>
                                <p>Парковка у школы</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php require_once "footer.php"?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    
  </body>
</html>