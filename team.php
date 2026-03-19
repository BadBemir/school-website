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
          <div class="text-center hero-content">
            <h1 class="display-4 fw-bold mb-3">Руководство и педагогический состав</h1>
            <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Высококвалифицированные специалисты с большим опытом работы</p>

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
              <div class="col-md-4">
                <div class="card h-100 ">
                  <div class="card-body text-center">
                    <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px;">
                      <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="card-title fw-bold">Подкопаева Ольга Викторовна</h5>
                    <p class="text-primary mb-2">Директор школы</p>
                    <div class="mb-3">
                    </div>
                    <p class="text-muted small"><i class="bi bi-award me-1"></i>В должности директора: 15 лет</p>
                  </div>
                </div>
              </div>
              
              <!-- Заместители -->
              <div class="col-md-8">
                <div class="card h-100">
                  <div class="card-body">
                    <h6 class="card-subtitle mb-3 text-primary fw-bold"><i class="bi bi-people me-1"></i>Заместители директора</h6>
                    
                    <div class="mb-3">
                      <h6 class="fw-bold mb-1">Мартынова Елена Юрьевна</h6>
                      <p class="text-muted mb-1">Заместитель директора по учебно-воспитательной работе (Начальное образование)</p>
                      <p class="text-muted">8 (4236) 69-98-03</p>
                    </div>
                    
                    <div class="mb-3">
                      <h6 class="fw-bold mb-1">Азаренко Алена Николаевна</h6>
                      <p class="text-muted mb-1">Заместитель директора по учебно-воспитательной работе (Общее и Среднее образование)</p>
                      <p class="text-muted">8 (4236) 69-98-03</p>
                    </div>
                    
                    <div>
                      <h6 class="fw-bold mb-1">Коваль Любовь Анатольевна</h6>
                      <p class="text-muted mb-1">Заместитель директора по учебно-воспитательной работе</p>
                      <p class="text-muted">8 (4236) 69-98-03</p>
                    </div>

                    <div>
                      <h6 class="fw-bold mb-1">Полина Евгения Юрьевна</h6>
                      <p class="text-muted mb-1">Методист (Дошкольное образование)</p>
                      <p class="text-muted">8 (4236) 74-19-96</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


            <div class="container my-5">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-file-text me-2"></i>Педагогический состав</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Наименование документа</th>
                                        <th>Файл</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Персональный состав педагогических работников дошкольного образования</td>
                                        <td><a href="/docs/DO.docx" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать</a></td>
                                    </tr>
                                    <tr>
                                        <td>Персональный состав педагогических работников НОО</td>
                                        <td><a href="/docs/NOO.xlsx" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать</a></td>
                                    </tr>
                                    <tr>
                                        <td>Персональный состав педагогических работников ООО и СОО</td>
                                        <td><a href="/docs/SOO.xlsx" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать</a></td>
                                    </tr>
                                </tbody>
                            </table>
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