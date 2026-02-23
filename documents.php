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
                                        <td><a href="/docs/ustav.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Свидетельство о государственной аккредитации</td>
                                        <td><a href="/docs/akkreditaciya.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Лицензия на осуществление образовательной деятельности</td>
                                        <td><a href="/docs/licenziya.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Свидетельство о постановке на учет в налоговом органе</td>
                                        <td><a href="/docs/inn.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Правила внутреннего распорядка обучающихся</td>
                                        <td><a href="/docs/pravila.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                    <tr>
                                        <td>Коллективный договор</td>
                                        <td><a href="/docs/kollektivnyy_dogovor.pdf" class="btn btn-sm btn-primary"><i class="bi bi-download me-1"></i>Скачать (PDF)</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Локальные нормативные акты -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-files me-2"></i>Локальные нормативные акты</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="accordion" id="documentsAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        Локальные акты, регламентирующие образовательный процесс
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#documentsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о формах, периодичности и порядке текущего контроля успеваемости и промежуточной аттестации
                                                <a href="/docs/polozhenie_kontrol.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о порядке обучения по индивидуальному учебному плану
                                                <a href="/docs/polozhenie_iup.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о языке образования
                                                <a href="/docs/polozhenie_yazyk.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о рабочей программе учебных предметов, курсов
                                                <a href="/docs/polozhenie_rabochaya_programma.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        Локальные акты, регламентирующие права и обязанности обучающихся
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#documentsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Правила внутреннего распорядка обучающихся
                                                <a href="/docs/pravila.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о школьной форме и внешнем виде обучающихся
                                                <a href="/docs/polozhenie_forma.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о поощрениях и взысканиях
                                                <a href="/docs/polozhenie_pooshchreniya.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                        Локальные акты, регламентирующие прием обучающихся
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#documentsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Правила приема на обучение по образовательным программам начального общего, основного общего, среднего общего образования
                                                <a href="/docs/pravila_priema.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Порядок приема в 1 класс
                                                <a href="/docs/priem_1_klass.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Административный регламент предоставления услуги по приему заявлений, постановке на учет и зачислению в образовательное учреждение
                                                <a href="/docs/reglament_priema.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                        Локальные акты о порядке и основаниях перевода, отчисления и восстановления
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#documentsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о порядке и основаниях перевода, отчисления и восстановления обучающихся
                                                <a href="/docs/polozhenie_perevod.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Порядок оформления возникновения, приостановления и прекращения отношений между школой и обучающимися
                                                <a href="/docs/poryadok_otnosheniy.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                        Локальные акты о комиссии по урегулированию споров
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#documentsAccordion">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Положение о комиссии по урегулированию споров между участниками образовательных отношений
                                                <a href="/docs/polozhenie_komissiya_spory.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Состав комиссии по урегулированию споров
                                                <a href="/docs/sostav_komissii.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                        <h3 class="mb-0"><i class="bi bi-bar-chart me-2"></i>Отчеты и планы работы</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Публичные отчеты</h5>
                                <ul class="list-group mb-4">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Отчет о самообследовании за 2023 год
                                        <a href="/docs/otchet_samoobsledovanie_2023.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Публичный доклад директора за 2022-2023 учебный год
                                        <a href="/docs/publichnyy_doklad_2023.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Финансово-хозяйственная деятельность (план ФХД)
                                        <a href="/docs/plan_fhd.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Планы работы</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Годовой план работы на 2023-2024 учебный год
                                        <a href="/docs/godovoy_plan_2023-2024.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        План воспитательной работы
                                        <a href="/docs/plan_vospitatelnoy.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        План работы школьной библиотеки
                                        <a href="/docs/plan_biblioteka.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Предписания органов контроля -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-shield-check me-2"></i>Предписания органов контроля</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="alert alert-success">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            По состоянию на текущую дату действующих предписаний органов, осуществляющих государственный контроль (надзор) в сфере образования, не имеется.
                        </div>
                        
                        <h5 class="mt-4">Результаты проверок</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Акт проверки Роспотребнадзора от 15.03.2023
                                <a href="/docs/akt_rospotrebnadzor_2023.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Акт проверки Госпожнадзора от 22.02.2023
                                <a href="/docs/akt_gpn_2023.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
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