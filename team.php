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
    <title>Школа 12 - Руководство и педагоги</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  
  <body>
      
    <?php require_once "header.php"?>
    
    <main>
      <!-- Hero Section -->
      <section class="hero-section mt-4" style="padding: 3rem 0;">
        <div class="container">
          <div class="text-center hero-content">
            <h1 class="display-4 fw-bold mb-3">Руководство и педагогический состав</h1>
            <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Высококвалифицированные специалисты с большим опытом работы</p>
            <div class="border-bottom border-white mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
          </div>
        </div>
      </section>
      
      <div class="container my-5">
        <!-- Руководство школы -->
        <div class="card mb-5 shadow-lg">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-person-badge me-2"></i>Руководство школы</h3>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <!-- Директор -->
              <div class="col-md-6">
                <div class="card h-100 border-primary">
                  <div class="card-body text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                      <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="card-title fw-bold">Подкопаева Ольга Викторовна</h5>
                    <p class="text-primary mb-2">Директор школы</p>
                    <div class="mb-3">
                    </div>
                    <p class="text-muted small mb-2"><i class="bi bi-briefcase me-1"></i>Общий стаж: 35 лет</p>
                    <p class="text-muted small"><i class="bi bi-award me-1"></i>В должности директора: 15 лет</p>
                  </div>
                </div>
              </div>
              
              <!-- Заместители -->
              <div class="col-md-6">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-primary fw-bold"><i class="bi bi-people me-1"></i>Заместители директора</h6>
                    
                    <div class="mb-3">
                      <h6 class="fw-bold mb-1">Сидорова Елена Викторовна</h6>
                      <p class="text-muted small mb-1">Заместитель директора по учебно-воспитательной работе</p>
                      <p class="text-muted small"><i class="bi bi-book me-1"></i>Учитель математики высшей категории</p>
                    </div>
                    
                    <div class="mb-3">
                      <h6 class="fw-bold mb-1">Петров Игорь Сергеевич</h6>
                      <p class="text-muted small mb-1">Заместитель директора по воспитательной работе</p>
                      <p class="text-muted small"><i class="bi bi-flag me-1"></i>Координатор патриотического воспитания</p>
                    </div>
                    
                    <div>
                      <h6 class="fw-bold mb-1">Смирнова Ольга Витальевна</h6>
                      <p class="text-muted small mb-1">Заместитель директора по начальной школе</p>
                      <p class="text-muted small"><i class="bi bi-mortarboard me-1"></i>Учитель начальных классов высшей категории</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Педагогический состав -->
        <div class="card mb-5 shadow-lg">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-people-fill me-2"></i>Педагогический состав</h3>
          </div>
          <div class="card-body p-4">
            <!-- Фильтры -->
            <div class="row mb-4">
              <div class="col-md-12">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-outline-primary active">Все</button>
                  <button type="button" class="btn btn-outline-primary">Начальная школа</button>
                  <button type="button" class="btn btn-outline-primary">Гуманитарные науки</button>
                  <button type="button" class="btn btn-outline-primary">Естественные науки</button>
                  <button type="button" class="btn btn-outline-primary">Иностранные языки</button>
                </div>
              </div>

            </div>

            <!-- Таблица учителей -->
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ФИО</th>
                    <th>Должность / Предмет</th>
                    <th>Стаж</th>
                    <th>Награды</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Ковалева Мария Ивановна</strong></td>
                    <td>Учитель русского языка и литературы</td>
                    <td>32 года</td>
                    <td><span class="badge bg-warning">Почетный работник</span></td>
                  </tr>
                  <tr>
                    <td><strong>Петровский Александр Сергеевич</strong></td>
                    <td>Учитель истории и обществознания</td>
                    <td>28 лет</td>
                    <td><span class="badge bg-info">Руководитель музея</span></td>
                  </tr>
                  <tr>
                    <td><strong>Сидорова Татьяна Владимировна</strong></td>
                    <td>Учитель математики</td>
                    <td>25 лет</td>
                    <td><span class="badge bg-success">Учитель года-2020</span></td>
                  </tr>
                  <tr>
                    <td><strong>Козлов Дмитрий Анатольевич</strong></td>
                    <td>Учитель физики</td>
                    <td>18 лет</td>
                    <td><span class="badge bg-secondary">Наставник</span></td>
                  </tr>
                  <tr>
                    <td><strong>Николаева Елена Петровна</strong></td>
                    <td>Учитель английского языка</td>
                    <td>30 лет</td>
                    <td><span class="badge bg-warning">Почетный работник</span></td>
                  </tr>
                  <tr>
                    <td><strong>Федоров Сергей Михайлович</strong></td>
                    <td>Учитель информатики</td>
                    <td>12 лет</td>
                    <td><span class="badge bg-info">IT-координатор</span></td>
                  </tr>
                  <tr>
                    <td><strong>Васильева Ольга Николаевна</strong></td>
                    <td>Учитель начальных классов</td>
                    <td>40 лет</td>
                    <td><span class="badge bg-success">Заслуженный учитель</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
  
            
          </div>
        </div>

        <!-- Методические объединения -->
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="bi bi-diagram-3 me-2"></i>Методические объединения</h3>
          </div>
          <div class="card-body p-4">
            <div class="row g-4">
              <div class="col-md-4">
                <div class="card h-100 border-primary">
                  <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Начальных классов</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">15 педагогов</p>
                    <p class="card-text small text-muted">Руководитель: Васильева О.Н.</p>
                    <ul class="small">
                      <li>Инновационные технологии обучения</li>
                      <li>Преемственность ДОУ-школа</li>
                      <li>Развивающее обучение</li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="card h-100 border-primary">
                  <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-book me-2"></i>Гуманитарного цикла</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">12 педагогов</p>
                    <p class="card-text small text-muted">Руководитель: Ковалева М.И.</p>
                    <ul class="small">
                      <li>Патриотическое воспитание</li>
                      <li>Краеведческая работа</li>
                      <li>Проектная деятельность</li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="card h-100 border-primary">
                  <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-calculator me-2"></i>Естественных наук</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">10 педагогов</p>
                    <p class="card-text small text-muted">Руководитель: Сидорова Т.В.</p>
                    <ul class="small">
                      <li>STEM-образование</li>
                      <li>Олимпиадная подготовка</li>
                      <li>Цифровые лаборатории</li>
                    </ul>
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
      // Простой поиск по таблице
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[type="text"]');
        const tableRows = document.querySelectorAll('table tbody tr');
        
        if (searchInput) {
          searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
              const text = row.textContent.toLowerCase();
              if (text.includes(searchTerm)) {
                row.style.display = '';
              } else {
                row.style.display = 'none';
              }
            });
          });
        }
        
        // Переключение фильтров
        const filterButtons = document.querySelectorAll('.btn-group .btn');
        filterButtons.forEach(button => {
          button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.textContent;
            // Здесь можно добавить логику фильтрации
          });
        });
      });
    </script>
  </body>
</html>