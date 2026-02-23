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
    <title>Школа 12 - Меры поддержки обучающихся</title>
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
                    <h1 class="display-4 fw-bold mb-0">Меры поддержки обучающихся</h1>
                    <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Социальная поддержка и стипендии</p>
                    <div class="mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
                </div>
            </div>
        </section>

        <!-- Социальная поддержка -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-heart me-2"></i>Меры социальной поддержки</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <strong>Информация о мерах социальной поддержки:</strong> В МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО предоставляются следующие меры социальной поддержки обучающимся.
                        </div>
                        
                        <div class="row g-4 mt-2">
                            <div class="col-md-6">
                                <div class="card h-100 border-primary shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"><i class="bi bi-cup-hot me-2"></i>Бесплатное питание</h5>
                                        <p class="card-text">Обучающиеся 1-4 классов обеспечиваются бесплатным горячим питанием (завтрак) за счет средств бюджетов.</p>
                                        <p class="fw-bold mb-0">Категории:</p>
                                        <ul class="mb-0">
                                            <li>Все обучающиеся 1-4 классов</li>
                                            <li>Обучающиеся 5-11 классов из многодетных семей</li>
                                            <li>Дети с ОВЗ</li>
                                            <li>Дети-инвалиды</li>
                                            <li>Дети из малообеспеченных семей</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card h-100 border-primary shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"><i class="bi bi-bus-front me-2"></i>Бесплатный проезд</h5>
                                        <p class="card-text">Предоставляется бесплатный проезд на городском транспорте (кроме такси) следующим категориям:</p>
                                        <ul class="mb-0">
                                            <li>Дети из многодетных семей</li>
                                            <li>Дети-сироты и дети, оставшиеся без попечения родителей</li>
                                            <li>Дети с ОВЗ</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card h-100 border-primary shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"><i class="bi bi-book me-2"></i>Обеспечение учебниками</h5>
                                        <p class="card-text">Все обучающиеся школы обеспечиваются бесплатными учебниками и учебными пособиями на время получения образования.</p>
                                        <p class="fw-bold mb-0">Для льготных категорий предоставляются дополнительные канцелярские принадлежности.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card h-100 border-primary shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary"><i class="bi bi-hospital me-2"></i>Медицинское обслуживание</h5>
                                        <p class="card-text">В школе работает медицинский кабинет (лицензированный). Оказывается первичная медико-санитарная помощь.</p>
                                        <p class="fw-bold mb-0">Для детей с ОВЗ проводятся регулярные осмотры.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Психолого-педагогическая поддержка -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-people me-2"></i>Психолого-педагогическая поддержка</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5>В школе работает служба психолого-педагогического сопровождения:</h5>
                                <ul class="list-group list-group-flush mb-4">
                                    <li class="list-group-item"><i class="bi bi-check-circle text-primary me-2"></i>Педагог-психолог (2 специалиста)</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle text-primary me-2"></i>Социальный педагог</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle text-primary me-2"></i>Учитель-логопед</li>
                                    <li class="list-group-item"><i class="bi bi-check-circle text-primary me-2"></i>Учитель-дефектолог</li>
                                </ul>
                                
                                <h5>Направления работы:</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Индивидуальные и групповые консультации</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Диагностика и коррекция</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Профориентационная работа</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Помощь в адаптации</li>
                                    <li class="list-group-item"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Работа с детьми с ОВЗ</li>
                                </ul>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title">Контакты</h5>
                                        <p><i class="bi bi-telephone me-2 text-primary"></i> 8 (4236) 69-21-21 (доб. 123)</p>
                                        <p><i class="bi bi-envelope me-2 text-primary"></i> psiholog_school12@mail.ru</p>
                                        <p><i class="bi bi-geo-alt me-2 text-primary"></i> Кабинет психолога (2 этаж)</p>
                                        <p><i class="bi bi-clock me-2 text-primary"></i> Пн-Пт: 9:00 - 16:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Льготные категории -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-person-badge me-2"></i>Льготные категории обучающихся</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row text-center">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="border rounded p-3 bg-white">
                                    <i class="bi bi-people-fill display-4 text-primary"></i>
                                    <h5 class="mt-2">Многодетные семьи</h5>
                                    <p class="text-muted">87 обучающихся</p>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-6 mb-3">
                                <div class="border rounded p-3 bg-white">
                                    <i class="bi bi-person-down display-4 text-primary"></i>
                                    <h5 class="mt-2">Малообеспеченные</h5>
                                    <p class="text-muted">124 обучающихся</p>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-6 mb-3">
                                <div class="border rounded p-3 bg-white">
                                    <i class="bi bi-heart-pulse display-4 text-primary"></i>
                                    <h5 class="mt-2">Дети с ОВЗ</h5>
                                    <p class="text-muted">32 обучающихся</p>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-6 mb-3">
                                <div class="border rounded p-3 bg-white">
                                    <i class="bi bi-star display-4 text-primary"></i>
                                    <h5 class="mt-2">Дети-сироты</h5>
                                    <p class="text-muted">8 обучающихся</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h5>Документы для получения льгот</h5>
                            <p>Для оформления мер социальной поддержки необходимо предоставить следующие документы:</p>
                            <ol>
                                <li>Заявление от родителя (законного представителя)</li>
                                <li>Документ, подтверждающий льготную категорию (удостоверение многодетной семьи, справка об инвалидности и т.д.)</li>
                                <li>Справка о доходах семьи (для малообеспеченных)</li>
                                <li>Свидетельство о рождении ребенка</li>
                            </ol>
                            <a href="/docs/perechen_dokumentov_lgoty.pdf" class="btn btn-primary"><i class="bi bi-download me-1"></i>Скачать полный перечень документов</a>
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