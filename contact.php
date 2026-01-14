<?php
session_start();
require_once "config.php";

$general_success = getSuccess();
$general_error = getError();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Контакты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
      /* Только минимальные стили для нового макета */
      .hexagon-card {
        position: relative;
        overflow: hidden;
      }
      .hexagon-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent 30%, rgba(59, 130, 246, 0.1) 50%, transparent 70%);
        transform: rotate(15deg);
        z-index: 0;
      }
      .staggered-item:nth-child(odd) {
        transform: translateY(20px);
      }
      .staggered-item:nth-child(even) {
        transform: translateY(-20px);
      }
      .contact-icon-large {
        font-size: 2.5rem;
        opacity: 0.8;
      }
    </style>
  </head>
  
  <body>
      
    <?php require_once "header.php"?>
    
    <main class="container my-5">

        <!-- Нестандартный макет с диагональным разделением -->
        <div class="row g-0 mb-5 shadow-lg rounded-4 overflow-hidden">
            <!-- Левая часть - карта занимает 60% -->
            <div class="col-lg-7 p-0">
                <div class="h-100">
                    <div class="map-container h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1462.8996897851712!2d132.8946817684068!3d42.83485146042789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5fb13fc2601de401%3A0x355f5295a6b7ddcd!2z0JzQkNCe0KMgItCh0J7QqCDihJYgMTIg0LjQvC4g0JIu0J0uINCh0LzQtdGC0LDQvdC60LjQvdCwIiDQndCT0J4!5e0!3m2!1sru!2sru!4v1768132243182!5m2!1sru!2sru" 
                            width="100%" 
                            height="600" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
            
            <!-- Правая часть - контакты занимают 40% с наклонным краем -->
            <div class="col-lg-5 bg-primary text-white p-4 position-relative">
                <a href="https://maps.app.goo.gl/YmiD5eAn1oZ8b3oq5" target="_blank" class="text-white">
                    <i class="bi bi-arrow-up-right-square me-1"></i>
                    Google Maps
                </a>
                
                <h2 class="text-white mb-4"><i class="bi bi-geo-alt-fill me-2"></i>Контакты</h2>
                
                <!-- Контактная информация в виде списка с иконками -->
                <div class="list-group list-group-flush bg-transparent">
                    <div class="list-group-item bg-transparent text-white border-white border-opacity-25 py-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-geo-alt fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Адрес</h5>
                                <p class="mb-0 opacity-75">692919, Россия, Приморский край<br>г. Находка, пр. Мира, д.10</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-group-item bg-transparent text-white border-white border-opacity-25 py-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-telephone fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Телефоны</h5>
                                <p class="mb-1 opacity-75">+7 (4236) 69-98-03</p>
                                <p class="mb-0 opacity-75">+7 (4236) 74-19-96</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-group-item bg-transparent text-white border-white border-opacity-25 py-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="bi bi-envelope fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-1 opacity-75">nkhschool12@mail.ru</p>
                                <p class="mb-0 opacity-75">ds670@mail.ru</p>
                                <small class="opacity-50">Дошкольное отделение</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Нестандартная сетка с перемешанными элементами -->
        <div class="row g-4 mb-5">
            <!-- Как добраться - слева, но смещено -->
            <div class="col-lg-8 staggered-item">
                <div class="card border-primary h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-signpost-split me-2"></i>Как добраться</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(59, 130, 246, 0.1);">
                                    <i class="bi bi-bus-front fs-1 text-primary mb-3"></i>
                                    <h6>Автобус</h6>
                                    <p class="small mb-0">Маршруты: 5, 9, 2</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(59, 130, 246, 0.1);">
                                    <i class="bi bi-taxi-front fs-1 text-primary mb-3"></i>
                                    <h6>Такси</h6>
                                    <p class="small mb-0">Проспект мира 10</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(59, 130, 246, 0.1);">
                                    <i class="bi bi-car-front fs-1 text-primary mb-3"></i>
                                    <h6>Автомобиль</h6>
                                    <p class="small mb-0">Парковка у школы</p>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="p-3 rounded-3" style="background: rgba(59, 130, 246, 0.1);">
                                    <i class="bi bi-clock fs-1 text-primary mb-3"></i>
                                    <h6>График</h6>
                                    <p class="small mb-0">ПН-СБ: 08:00-20:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Дополнительная информация - справа, но смещено в другую сторону -->
            <div class="col-lg-4 staggered-item">
                <div class="card border-success h-100 hexagon-card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Дополнительно</h5>
                    </div>
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="bi bi-building-fill contact-icon-large text-success"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Школьное здание</h6>
                                <p class="small mb-0">3-этажное здание, построенное в 1990 году</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="bi bi-people contact-icon-large text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Персонал</h6>
                                <p class="small mb-0">Более 50 преподавателей</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="bi bi-book contact-icon-large text-warning"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fw-bold">Обучение</h6>
                                <p class="small mb-0">1-11 классы + дошкольное отделение</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

       
        </div>

    </main>

    <?php require_once "footer.php"?>   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      // Простая анимация при прокрутке
      document.addEventListener('DOMContentLoaded', function() {
        const staggeredItems = document.querySelectorAll('.staggered-item');
        
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.style.transition = 'transform 0.5s ease';
              entry.target.style.transform = 'translateY(0)';
            }
          });
        }, { threshold: 0.1 });
        
        staggeredItems.forEach(item => observer.observe(item));
      });
    </script>
  </body>
</html>