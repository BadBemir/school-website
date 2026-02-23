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
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Федеральные государственные образовательные стандарты</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="fs-5">В МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО реализуются следующие федеральные государственные образовательные стандарты:</p>
                        
                        <div class="row mt-4">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100 border-primary hero-section shadow-sm">
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
                                <div class="card h-100 border-primary hero-section shadow-sm">
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
                                <div class="card h-100 border-primary hero-section shadow-sm">
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
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
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

        <!-- Реализуемые образовательные программы -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Реализуемые образовательные программы в соответствии с ФГОС</h3>
                    </div>
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs" id="programsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="noo-tab" data-bs-toggle="tab" data-bs-target="#noo" type="button" role="tab">Начальное общее образование</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ooo-tab" data-bs-toggle="tab" data-bs-target="#ooo" type="button" role="tab">Основное общее образование</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="soo-tab" data-bs-toggle="tab" data-bs-target="#soo" type="button" role="tab">Среднее общее образование</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content p-3 border border-top-0 rounded-bottom" id="programsTabContent">
                            <div class="tab-pane fade show active" id="noo" role="tabpanel">
                                <h5 class="mb-3">Основная образовательная программа начального общего образования (ФГОС НОО)</h5>
                                <p><strong>Срок действия государственной аккредитации:</strong> бессрочно</p>
                                <p><strong>Язык обучения:</strong> русский</p>
                                <p><strong>Уровень образования:</strong> начальное общее образование</p>
                                <p><strong>Нормативный срок обучения:</strong> 4 года</p>
                                <p><strong>Численность обучающихся:</strong> 340 человек</p>
                                <p><strong>Учебные предметы:</strong> Русский язык, Литературное чтение, Иностранный язык (английский), Математика, Окружающий мир, Основы религиозных культур и светской этики, Музыка, Изобразительное искусство, Технология, Физическая культура</p>
                                <a href="/docs/oop_noo.pdf" class="btn btn-primary mt-2"><i class="bi bi-download me-1"></i>Скачать программу (PDF)</a>
                            </div>
                            
                            <div class="tab-pane fade" id="ooo" role="tabpanel">
                                <h5 class="mb-3">Основная образовательная программа основного общего образования (ФГОС ООО)</h5>
                                <p><strong>Срок действия государственной аккредитации:</strong> бессрочно</p>
                                <p><strong>Язык обучения:</strong> русский</p>
                                <p><strong>Уровень образования:</strong> основное общее образование</p>
                                <p><strong>Нормативный срок обучения:</strong> 5 лет</p>
                                <p><strong>Численность обучающихся:</strong> 420 человек</p>
                                <p><strong>Учебные предметы:</strong> Русский язык, Литература, Иностранный язык (английский), Математика, Алгебра, Геометрия, Информатика, История, Обществознание, География, Физика, Химия, Биология, Музыка, Изобразительное искусство, Технология, Физическая культура, Основы безопасности жизнедеятельности</p>
                                <a href="/docs/oop_ooo.pdf" class="btn btn-primary mt-2"><i class="bi bi-download me-1"></i>Скачать программу (PDF)</a>
                            </div>
                            
                            <div class="tab-pane fade" id="soo" role="tabpanel">
                                <h5 class="mb-3">Основная образовательная программа среднего общего образования (ФГОС СОО)</h5>
                                <p><strong>Срок действия государственной аккредитации:</strong> бессрочно</p>
                                <p><strong>Язык обучения:</strong> русский</p>
                                <p><strong>Уровень образования:</strong> среднее общее образование</p>
                                <p><strong>Нормативный срок обучения:</strong> 2 года</p>
                                <p><strong>Численность обучающихся:</strong> 90 человек</p>
                                <p><strong>Профили обучения:</strong> универсальный, технологический, гуманитарный</p>
                                <p><strong>Учебные предметы (углубленный уровень):</strong> Математика, Физика, Информатика, История, Обществознание, Право, Литература</p>
                                <a href="/docs/oop_soo.pdf" class="btn btn-primary mt-2"><i class="bi bi-download me-1"></i>Скачать программу (PDF)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Методические материалы -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-journal-check me-2"></i>Методические материалы по ФГОС</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Для педагогов</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Методические рекомендации по реализации ФГОС
                                        <a href="/docs/metod_rekom_fgos.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Технологическая карта урока по ФГОС (шаблон)
                                        <a href="/docs/tehnologicheskaya_karta.docx" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Критерии оценки урока по ФГОС
                                        <a href="/docs/kriterii_uroka_fgos.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-6">
                                <h5>Для родителей</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Что такое ФГОС? (памятка для родителей)
                                        <a href="/docs/pamyatka_fgos_roditeli.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Портрет выпускника по ФГОС
                                        <a href="/docs/portret_vypusknika.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Организация проектной деятельности (рекомендации)
                                        <a href="/docs/proektnaya_deyatelnost.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Адаптированные программы -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-person-heart me-2"></i>Адаптированные образовательные программы</h3>
                    </div>
                    <div class="card-body p-4">
                        <p>В школе реализуются адаптированные основные общеобразовательные программы для обучающихся с ограниченными возможностями здоровья:</p>
                        
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                АООП НОО для обучающихся с задержкой психического развития (вариант 7.1)
                                <a href="/docs/aoop_noo_zpr_7.1.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                АООП НОО для обучающихся с задержкой психического развития (вариант 7.2)
                                <a href="/docs/aoop_noo_zpr_7.2.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                АООП ООО для обучающихся с задержкой психического развития
                                <a href="/docs/aoop_ooo_zpr.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                АООП для обучающихся с тяжелыми нарушениями речи (вариант 5.1)
                                <a href="/docs/aoop_tnr_5.1.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
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