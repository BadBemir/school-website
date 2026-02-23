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
    <title>Школа 12 - Структура и органы управления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require_once "header.php"; ?>
    
    <main>
        <!-- Hero Section -->
        <section class="hero-section" style="padding: 3rem 0;">
            <div class="container">
                <div class="text-center hero-content">
                    <h1 class="display-4 fw-bold mb-0">Структура и органы управления</h1>
                    <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Организационная структура школы</p>
                    <div class="mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
                </div>
            </div>
        </section>

        <!-- Структура управления -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-5 border-0 shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Структурные подразделения</h3>
                            </div>
                            <div class="card-body p-4">
                                <p class="fs-5 mb-4">В МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО функционируют следующие структурные подразделения:</p>
                                
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="card h-100 border-primary hero-section shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bi bi-building fs-1 text-primary me-3"></i>
                                                    <h4 class="card-title mb-0">Начальная школа</h4>
                                                </div>
                                                <p class="card-text">1-4 классы. Реализация программ начального общего образования. Классные руководители, учителя-предметники, педагог-психолог, логопед.</p>
                                                <p class="fw-bold mb-0">Руководитель: Иванова Елена Петровна</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="card h-100 border-primary hero-section shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bi bi-building fs-1 text-primary me-3"></i>
                                                    <h4 class="card-title mb-0">Основная и средняя школа</h4>
                                                </div>
                                                <p class="card-text">5-11 классы. Реализация программ основного общего и среднего общего образования. Классные руководители, учителя-предметники, психолог, социальный педагог.</p>
                                                <p class="fw-bold mb-0">Руководитель: Петров Сергей Иванович</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="card h-100 border-primary hero-section shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bi bi-building fs-1 text-primary me-3"></i>
                                                    <h4 class="card-title mb-0">Дошкольное отделение</h4>
                                                </div>
                                                <p class="card-text">Группы дошкольного образования. Воспитатели, музыкальный руководитель, инструктор по физической культуре, психолог, логопед.</p>
                                                <p class="fw-bold mb-0">Руководитель: Смирнова Ольга Викторовна</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="card h-100 border-primary hero-section shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bi bi-building fs-1 text-primary me-3"></i>
                                                    <h4 class="card-title mb-0">Служба сопровождения</h4>
                                                </div>
                                                <p class="card-text">Социально-психологическая служба, логопедическая служба, служба здоровья. Обеспечение психолого-педагогического сопровождения образовательного процесса.</p>
                                                <p class="fw-bold mb-0">Руководитель: Козлова Анна Дмитриевна</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Органы управления -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Органы управления образовательной организацией</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Наименование органа управления</th>
                                        <th>Функции</th>
                                        <th>Руководитель</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Директор</td>
                                        <td>Осуществляет текущее руководство деятельностью школы, действует от имени школы без доверенности</td>
                                        <td>Гервальд Елена Эдуардовна</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Педагогический совет</td>
                                        <td>Рассматривает вопросы организации образовательного процесса, утверждает образовательные программы, рабочие программы</td>
                                        <td>Гервальд Елена Эдуардовна</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Управляющий совет</td>
                                        <td>Коллегиальный орган управления, принимает решения по важнейшим вопросам деятельности школы</td>
                                        <td>Председатель - представитель родительской общественности</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Методический совет</td>
                                        <td>Координирует методическую работу, обобщает педагогический опыт, организует повышение квалификации педагогов</td>
                                        <td>Руководитель методической службы</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Родительский комитет</td>
                                        <td>Содействует укреплению связей семьи и школы, участвует в организации воспитательной работы</td>
                                        <td>Председатель родительского комитета</td>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <strong>Информация о местах нахождения структурных подразделений:</strong>
                            <ul class="mb-0 mt-2">
                                <li>Основное здание школы: г. Находка, Проспект Мира, 10</li>
                                <li>Дошкольное отделение: г. Находка, Проспект Мира, 11</li>
                            </ul>
                        </div>
                        
                        <div class="mt-4">
                            <h5>Контактная информация органов управления</h5>
                            <p><i class="bi bi-telephone me-2 text-primary"></i> Телефон: 8 (4236) 69-21-21</p>
                            <p><i class="bi bi-envelope me-2 text-primary"></i> Email: school12_nakhodka@mail.ru</p>
                            <p><i class="bi bi-geo-alt me-2 text-primary"></i> Адрес: 692919, г. Находка, Проспект Мира, 10</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Схема управления -->
        <section class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Схема организационной структуры управления</h3>
                            </div>
                            <div class="card-body p-4 text-center">
                                <p class="mt-3 text-muted">Схема отражает иерархию и взаимодействие органов управления и структурных подразделений школы.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Положения о структурных подразделениях -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Локальные акты, регламентирующие деятельность структурных подразделений</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="list-group">
                            <a href="/docs/polozhenie-pedsovet.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-file-pdf text-danger me-2"></i>
                                    Положение о педагогическом совете
                                </div>
                                <span class="badge bg-primary rounded-pill">PDF</span>
                            </a>
                            <a href="/docs/polozhenie-upsovet.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-file-pdf text-danger me-2"></i>
                                    Положение об Управляющем совете
                                </div>
                                <span class="badge bg-primary rounded-pill">PDF</span>
                            </a>
                            <a href="/docs/polozhenie-metodsovet.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-file-pdf text-danger me-2"></i>
                                    Положение о методическом совете
                                </div>
                                <span class="badge bg-primary rounded-pill">PDF</span>
                            </a>
                            <a href="/docs/polozhenie-rodkomitet.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-file-pdf text-danger me-2"></i>
                                    Положение о родительском комитете
                                </div>
                                <span class="badge bg-primary rounded-pill">PDF</span>
                            </a>
                            <a href="/docs/polozhenie-doshkolnoe.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="bi bi-file-pdf text-danger me-2"></i>
                                    Положение о дошкольном отделении
                                </div>
                                <span class="badge bg-primary rounded-pill">PDF</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>