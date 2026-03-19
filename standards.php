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
    <title>Школа 12 - Образовательные стандарты</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
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
                    <h1 class="display-4 fw-bold mb-0">Образовательные стандарты</h1>
                    <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">ФГОС и ФГТ</p>
                    <div class="mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
                </div>
            </div>
        </section>

        <!-- Информация о стандартах -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Федеральные государственные образовательные стандарты</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="fs-5">В МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО реализуются следующие федеральные государственные образовательные стандарты:</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 hero-section shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="bi bi-book fs-1 text-primary mb-3"></i>
                                        <h4 class="card-title">ФГОС НОО</h4>
                                        <p class="card-text">Федеральный государственный образовательный стандарт начального общего образования</p>
                                        <p class="fw-bold">1-4 классы</p>
                                        <a href="https://fgos.ru/" target="_blank" class="btn btn-sm btn-outline-primary">Подробнее на fgos.ru</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 hero-section shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="bi bi-journal-bookmark-fill fs-1 text-primary mb-3"></i>
                                        <h4 class="card-title">ФГОС ООО</h4>
                                        <p class="card-text">Федеральный государственный образовательный стандарт основного общего образования</p>
                                        <p class="fw-bold">5-9 классы</p>
                                        <a href="https://fgos.ru/" target="_blank" class="btn btn-sm btn-outline-primary">Подробнее на fgos.ru</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 hero-section shadow-sm">
                                    <div class="card-body text-center">
                                        <i class="bi bi-mortarboard-fill fs-1 text-primary mb-3"></i>
                                        <h4 class="card-title">ФГОС СОО</h4>
                                        <p class="card-text">Федеральный государственный образовательный стандарт среднего общего образования</p>
                                        <p class="fw-bold">10-11 классы</p>
                                        <a href="https://fgos.ru/" target="_blank" class="btn btn-sm btn-outline-primary">Подробнее на fgos.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Документы ФГОС -->
        <section class="py-4 bg">
            <div class="container">
                <div class="card mb-4 shadow-sm     ">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-file-earmark-text me-2"></i>Приказы Минпросвещения об утверждении ФГОС</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Стандарт</th>
                                        <th>Приказ</th>
                                        <th>Дата</th>
                                        <th>Ссылка</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ФГОС НОО</td>
                                        <td>Приказ Минпросвещения России от 31.05.2021 № 286</td>
                                        <td>31.05.2021</td>
                                        <td><a href="http://publication.pravo.gov.ru/Document/View/0001202107050028" target="_blank" class="btn btn-sm btn-primary">Перейти</a></td>
                                    </tr>
                                    <tr>
                                        <td>ФГОС ООО</td>
                                        <td>Приказ Минпросвещения России от 31.05.2021 № 287</td>
                                        <td>31.05.2021</td>
                                        <td><a href="http://publication.pravo.gov.ru/Document/View/0001202107050027" target="_blank" class="btn btn-sm btn-primary">Перейти</a></td>
                                    </tr>
                                    <tr>
                                        <td>ФГОС СОО</td>
                                        <td>Приказ Минобрнауки России от 17.05.2012 № 413</td>
                                        <td>17.05.2012</td>
                                        <td><a href="https://fgos.ru/fgos/fgos-soo/" target="_blank" class="btn btn-sm btn-primary">Перейти</a></td>
                                    </tr>
                                </tbody>
                            </table>
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