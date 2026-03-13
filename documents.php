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
    <title>Школа 12 - Документы</title>
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
                    <h1 class="display-4 fw-bold mb-0">Документы</h1>
                    <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Официальные документы школы</p>
                    <div class="mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
                </div>
            </div>
        </section>

        <!-- Учредительные документы -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-file-text me-2"></i>Учредительные документы</h3>
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
                                        <td>Устав МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО</td>
                                        <td><a href="/docs/ustav-maou-sosh12.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Свидетельство о постановке на учет в налоговом органе</td>
                                        <td><a href="/docs/naloguchet.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Правила внутреннего распорядка обучающихся</td>
                                        <td><a href="/docs/pravilarasporyadkauch.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Отчеты и планы -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-bar-chart me-2"></i>Отчеты</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Публичные отчеты</h5>
                                <ul class="list-group mb-4">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Отчёт о результатах самообследования МБОУ СОШ№12 НГО за 2020 год
                                        <a href="/docs/otc20.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Отчёт о результатах самообследования МБОУ СОШ№12 НГО за 2021 год
                                        <a href="/docs/otc21.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Отчёт о результатах самообследования МБОУ СОШ№12 НГО за 2022 год
                                        <a href="/docs/otc22.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Предписания органов контроля -->
        <section class="py-4 bg">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-shield-check me-2"></i>Предписания органов контроля</h3>
                    </div>
                    <div class="card-body p-4">
                     
                        
                        <h5 class="mt-4">Результаты проверок</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Протокол по оценке готовности к началу 25-26 учебному году
                                <a href="/docs/proverka26.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Протокол комиссии по оценке готовности ОО к 2023-2024 учебному году
                                <a href="/docs/proverka24.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>