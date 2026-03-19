<?php
session_start();
require_once "config.php";

$general_success = getSuccess();
$general_error = getError();
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Информация</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  
  <body>
      
    <?php require_once "header.php"?>
    
    <main>
      <!-- Hero Section -->
      <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
          <div class="text-center hero-content ">
            <h1 class="display-4 fw-bold mb-0">О школе</h1>
            <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Основная информация</p>
            <div class=" mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
          </div>
        </div>
      </section>
        <div class="container my-5">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="card mb-5 border-0">

            <div class="d-flex align-items-center mb-4">
                  <div class="bg-primary rounded-circle p-3 me-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                    <i class="bi bi-book-half text-white fs-2"></i>
                  </div>
                  <div>
                    <h2 class="mb-1 fw-bold">История школы</h2>
                    <p class="text-secondary mb-0">35 лет образовательной деятельности</p>
                  </div>
                </div>
            <!-- Основной текст -->
                <div class=" p-4 rounded-3 border-start border-primary border-4 mb-5">
                  <p class="fs-5 mb-0 lh-lg">
                    <i class="bi bi-quote text-primary me-2"></i>
                    Средняя школа № 12 создана в 1989 году решением исполнительного Комитета Городского Совета Народных Депутатов от 29 августа 1989 года № 552. 
                    С 10.01.2012г. постановлением администрации Находкинского городского округа от 19.12.2011г. № 2287 внесено изменение в наименование школы: 
                    Муниципальное бюджетное общеобразовательное учреждение «Средняя общеобразовательная школа № 12 имени В.Н. Сметанкина» Находкинского городского округа. 
                    Постановлением администрации Находкинского городского округа № 409 от 16.04.2021 г. создано Муниципальное автономное общеобразовательное учреждение 
                    «Средняя общеобразовательная школа № 12 имени В.Н. Сметанкина» Находкинского городского округа путем изменения типа существующего Муниципального 
                    бюджетного общеобразовательного учреждения «Средняя общеобразовательная школа № 12 имени В.Н. Сметанкина» Находкинского городского округа.
                  </p>
                </div>

                              <!-- Хронология -->
                <h4 class="mb-4 fw-bold">
                  <i class="bi bi-clock-history text-primary me-2"></i>
                  Хронология изменений наименования школы
                </h4>
                
                <!-- Список с кастомизированными иконками Bootstrap -->
                <div class="list-group">
                  <div class="list-group-item border-0 bg-transparent ps-0 pb-4">
                    <div class="d-flex">
                      <div class="me-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">1993</span>
                      </div>
                      <div>
                        <small class="text-secondary d-block mb-2">
                          <i class="bi bi-calendar3 me-1"></i>22 февраля 1993 г.
                        </small>
                        <p class="mb-0">Средняя общеобразовательная школа № 12, постановлением главы администрации от 22.02.1993г. № 1903.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="list-group-item border-0 bg-transparent ps-0 pb-4">
                    <div class="d-flex">
                      <div class="me-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">1996</span>
                      </div>
                      <div>
                        <small class="text-secondary d-block mb-2">
                          <i class="bi bi-calendar3 me-1"></i>2 декабря 1996 г.
                        </small>
                        <p class="mb-0">Муниципальное образовательное учреждение средняя школа № 12 имени Сметанкина В.Н., постановлением главы администрации от 25.08.1996 г. № 1224.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="list-group-item border-0 bg-transparent ps-0 pb-4">
                    <div class="d-flex">
                      <div class="me-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">2003</span>
                      </div>
                      <div>
                        <small class="text-secondary d-block mb-2">
                          <i class="bi bi-calendar3 me-1"></i>20 марта 2003 г.
                        </small>
                        <p class="mb-0">Муниципальное общеобразовательное учреждение «Средняя общеобразовательная школа № 12 имени Сметанкина В.Н.», постановлением мэра города Находки от 28.02.2003 г. № 394.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="list-group-item border-0 bg-transparent ps-0 pb-4">
                    <div class="d-flex">
                      <div class="me-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">2007</span>
                      </div>
                      <div>
                        <small class="text-secondary d-block mb-2">
                          <i class="bi bi-calendar3 me-1"></i>30 октября 2007 г.
                        </small>
                        <p class="mb-0">Муниципальное общеобразовательное учреждение «Средняя общеобразовательная школа № 12 имени Сметанкина В.Н.» города Находки, постановлением главы Находкинского городского округа от 15.08.2007г. № 1720.</p>
                      </div>
                    </div>
                  </div>
                  
                  <div class="list-group-item border-0 bg-transparent ps-0">
                    <div class="d-flex">
                      <div class="me-3">
                        <span class="badge bg-primary rounded-pill px-3 py-2">2012</span>
                      </div>
                      <div>
                        <small class="text-secondary d-block mb-2">
                          <i class="bi bi-calendar3 me-1"></i>10 января 2012 г.
                        </small>
                        <p class="mb-0">Муниципальное бюджетное общеобразовательное учреждение «Средняя общеобразовательная школа № 12 имени В.Н. Сметанкина» Находкинского городского округа постановлением администрации Находкинского городского округа от 19.12.2011г. № 2287.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
      </div>
      
      
 
      
<div class="container my-5">
  <!-- Первая таблица: Об образовательной организации -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
      <h3 class="mb-0" id="maininfo" style="scroll-margin-top: 20px;">Основные сведения</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td class="fw-bold" style="width: 30%;">Полное наименование</td>
              <td>Муниципальное автономное общеобразовательное учреждение «Средняя общеобразовательная школа № 12 имени В.Н. Сметанкина» Находкинского городского округа</td>
            </tr>
            <tr>
              <td class="fw-bold">Сокращенное наименование</td>
              <td>МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Вторая таблица: Учредители образовательной организации -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
      <h3 class="mb-0">Учредители образовательной организации</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td class="fw-bold" style="width: 30%;">Наименование</td>
              <td>Администрация Находкинского городского округа</td>
            </tr>
            <tr>
              <td class="fw-bold">Руководитель</td>
              <td>Магинский Тимур Владимирович</td>
            </tr>
            <tr>
              <td class="fw-bold">Место нахождения</td>
              <td>692904, Российская Федерация, Приморский край, г. Находка, Находкинский проспект, д.16</td>
            </tr>
            <tr>
              <td class="fw-bold">График работы</td>
              <td>ПН-ЧТ 08:30-13:00, 13:45-17:30; ПТ 08:30 – 13:00, 13:45 – 16:15; СБ, ВС – выходной</td>
            </tr>
            <tr>
              <td class="fw-bold">Телефоны</td>
              <td>8 (4236) 69-21-21<br><small class="text-muted">8 (4236) 64-19-38</small></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
      <h3 class="mb-0" id="">Место нахождения образовательной организации</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td>Школа: 692919, Российская Федерация, Приморский край, г. Находка, Проспект Мира, 10. Дошкольное отделение: 692919, Российская Федерация, Приморский край, г. Находка, Проспект Мира, 11</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>
    </main>

    <?php require_once "footer.php"?>   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
