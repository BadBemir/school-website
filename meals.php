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
    <title>Школа 12 - Организация питания</title>
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
                    <h1 class="display-4 fw-bold mb-0">Организация питания</h1>
                    <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Горячее питание в школе</p>
                    <div class="mx-auto" style="width: 100px; height: 4px; border-radius: 2px; opacity: 0.8;"></div>
                </div>
            </div>
        </section>

        <!-- Общая информация -->
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0"><i class="bi bi-info-circle me-2"></i>Общая информация о питании</h3>
                            </div>
                            <div class="card-body p-4">
                                <p class="fs-5">В МАОУ «СОШ № 12 им. В.Н. Сметанкина» НГО организовано горячее питание обучающихся. Школьная столовая работает на сырье, оборудована современным технологическим оборудованием.</p>
                                
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <h5><i class="bi bi-clock text-primary me-2"></i>Режим работы столовой:</h5>
                                        <ul class="list-unstyled">
                                            <li><strong>Понедельник - пятница:</strong> 8:00 - 16:00</li>
                                            <li><strong>Завтрак:</strong> после 1-го, 2-го, 3-го уроков</li>
                                            <li><strong>Обед:</strong> после 4-го, 5-го, 6-го уроков</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <h5><i class="bi bi-people text-primary me-2"></i>Охват питанием:</h5>
                                        <ul class="list-unstyled">
                                            <li><strong>1-4 классы:</strong> 100% (бесплатное горячее питание)</li>
                                            <li><strong>5-11 классы:</strong> 85% (завтраки и обеды)</li>
                                            <li><strong>Льготные категории:</strong> 100% охват</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <p><i class="bi bi-building text-primary me-2"></i> <strong>Пищеблок:</strong> 2 обеденных зала на 180 посадочных мест</p>
                                    <p><i class="bi bi-person-badge text-primary me-2"></i> <strong>Организатор питания:</strong> ИП Иванов И.И. (по договору аутсорсинга)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Контактная информация</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Ответственный за питание:</strong><br> Петрова Анна Сергеевна</p>
                                <p><i class="bi bi-telephone me-2 text-primary"></i> 8 (4236) 69-21-21 (доб. 145)</p>
                                <p><i class="bi bi-envelope me-2 text-primary"></i> pitanie_school12@mail.ru</p>
                                <p><i class="bi bi-clock me-2 text-primary"></i> Часы приема: Пн-Пт 10:00-14:00</p>
                                
                                <hr>
                                <p><strong>Заведующая производством:</strong><br> Сидорова Елена Викторовна</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Меню -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-menu-button me-2"></i>Меню</h3>
                    </div>
                    <div class="card-body p-4">
                        <ul class="nav nav-tabs" id="menuTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="zavtrak-tab" data-bs-toggle="tab" data-bs-target="#zavtrak" type="button" role="tab">Завтраки</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="obed-tab" data-bs-toggle="tab" data-bs-target="#obed" type="button" role="tab">Обеды</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="polnik-tab" data-bs-toggle="tab" data-bs-target="#polnik" type="button" role="tab">Полдники</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content p-4 border border-top-0 rounded-bottom bg-white" id="menuTabContent">
                            <div class="tab-pane fade show active" id="zavtrak" role="tabpanel">
                                <h5 class="mb-3">Примерное меню завтраков на неделю</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>День недели</th>
                                                <th>Блюдо</th>
                                                <th>Выход (г)</th>
                                                <th>Пищевая ценность (белки/жиры/углеводы)</th>
                                                <th>Калорийность</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" class="align-middle fw-bold">Понедельник</td>
                                                <td>Каша овсяная молочная с маслом</td>
                                                <td>200/10</td>
                                                <td>7,5/11,5/32</td>
                                                <td>260</td>
                                            </tr>
                                            <tr>
                                                <td>Какао с молоком, булочка</td>
                                                <td>200/50</td>
                                                <td>6/7/35</td>
                                                <td>225</td>
                                            </tr>
                                            
                                            <tr>
                                                <td rowspan="2" class="align-middle fw-bold">Вторник</td>
                                                <td>Запеканка творожная со сгущенкой</td>
                                                <td>200/20</td>
                                                <td>14/16/38</td>
                                                <td>350</td>
                                            </tr>
                                            <tr>
                                                <td>Чай с сахаром, лимоном</td>
                                                <td>200</td>
                                                <td>0/0/15</td>
                                                <td>60</td>
                                            </tr>
                                            
                                            <tr>
                                                <td rowspan="2" class="align-middle fw-bold">Среда</td>
                                                <td>Омлет с сыром</td>
                                                <td>150</td>
                                                <td>12/15/5</td>
                                                <td>210</td>
                                            </tr>
                                            <tr>
                                                <td>Кофейный напиток, печенье</td>
                                                <td>200/50</td>
                                                <td>2/5/30</td>
                                                <td>180</td>
                                            </tr>
                                            
                                            <tr>
                                                <td rowspan="2" class="align-middle fw-bold">Четверг</td>
                                                <td>Макароны по-флотски с мясом</td>
                                                <td>220</td>
                                                <td>12/15/35</td>
                                                <td>320</td>
                                            </tr>
                                            <tr>
                                                <td>Чай с сахаром, яблоко</td>
                                                <td>200/100</td>
                                                <td>0/0/25</td>
                                                <td>105</td>
                                            </tr>
                                            
                                            <tr>
                                                <td rowspan="2" class="align-middle fw-bold">Пятница</td>
                                                <td>Каша гречневая молочная с маслом</td>
                                                <td>200/10</td>
                                                <td>7/9/40</td>
                                                <td>270</td>
                                            </tr>
                                            <tr>
                                                <td>Чай, бутерброд с сыром</td>
                                                <td>200/50</td>
                                                <td>6/10/20</td>
                                                <td>200</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="/docs/menu_zavtrak.pdf" class="btn btn-primary mt-3"><i class="bi bi-download me-1"></i>Скачать полное меню завтраков</a>
                            </div>
                            
                            <div class="tab-pane fade" id="obed" role="tabpanel">
                                <h5 class="mb-3">Комплексные обеды</h5>
                                <p>Комплексный обед состоит из первого, второго блюда, салата, напитка и хлеба.</p>
                                <a href="/docs/menu_obed.pdf" class="btn btn-primary mt-3"><i class="bi bi-download me-1"></i>Скачать меню обедов</a>
                            </div>
                            
                            <div class="tab-pane fade" id="polnik" role="tabpanel">
                                <h5 class="mb-3">Полдники</h5>
                                <p>Для групп продленного дня организованы полдники: напиток (сок, кисель, молоко) и выпечка или фрукты.</p>
                                <a href="/docs/menu_polnik.pdf" class="btn btn-primary mt-3"><i class="bi bi-download me-1"></i>Скачать меню полдников</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Льготное питание -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-gift me-2"></i>Льготное питание</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="fs-5">Право на льготное (бесплатное) питание имеют следующие категории обучающихся:</p>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети из многодетных семей</span>
                                        <span class="badge bg-primary rounded-pill">87 чел.</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети из малообеспеченных семей</span>
                                        <span class="badge bg-primary rounded-pill">124 чел.</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети с ОВЗ</span>
                                        <span class="badge bg-primary rounded-pill">32 чел.</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети-инвалиды</span>
                                        <span class="badge bg-primary rounded-pill">15 чел.</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети-сироты и дети, оставшиеся без попечения родителей</span>
                                        <span class="badge bg-primary rounded-pill">8 чел.</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети, состоящие на учете у фтизиатра</span>
                                        <span class="badge bg-primary rounded-pill">5 чел.</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-check-circle-fill text-success me-2"></i>Дети из семей, пострадавших от ЧС</span>
                                        <span class="badge bg-primary rounded-pill">2 чел.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="alert alert-info mt-4">
                            <h5 class="alert-heading"><i class="bi bi-file-text me-2"></i>Документы для оформления льготного питания</h5>
                            <p>Для оформления бесплатного питания необходимо предоставить классному руководителю:</p>
                            <ol>
                                <li>Заявление на имя директора</li>
                                <li>Документ, подтверждающий льготную категорию</li>
                                <li>Справка о составе семьи</li>
                                <li>Справка о доходах (для малообеспеченных)</li>
                            </ol>
                            <a href="/docs/zayavlenie_pitanie.doc" class="btn btn-outline-primary btn-sm"><i class="bi bi-download me-1"></i>Скачать образец заявления</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Документы по питанию -->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-files me-2"></i>Документы по организации питания</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Локальные акты</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Положение об организации питания
                                        <a href="/docs/polozhenie_pitanie.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Порядок предоставления льготного питания
                                        <a href="/docs/poryadok_lgot_pitanie.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Приказ о создании бракеражной комиссии
                                        <a href="/docs/prikaz_brakerazh.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-6">
                                <h5>Отчеты и контроль</h5>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Отчет о контроле за питанием (родительский контроль)
                                        <a href="/docs/otchet_kontrol_pitaniya.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        График дежурства родителей в столовой
                                        <a href="/docs/grafik_dezhurstva.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Результаты проверок Роспотребнадзора
                                        <a href="/docs/proverka_rospotrebnadzor.pdf" class="btn btn-sm btn-outline-primary">Скачать</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Родительский контроль -->
        <section class="py-4">
            <div class="container">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-people me-2"></i>Родительский контроль за питанием</h3>
                    </div>
                    <div class="card-body p-4">
                        <p>Родители (законные представители) могут осуществлять контроль за организацией питания в школе:</p>
                        
                        <div class="row text-center g-4">
                            <div class="col-md-4">
                                <div class="card h-100 border-primary hero-section">
                                    <div class="card-body">
                                        <i class="bi bi-calendar-check display-4 text-primary"></i>
                                        <h5 class="mt-3">График посещений</h5>
                                        <p>Каждую среду с 10:00 до 12:00</p>
                                        <p class="small text-muted">По предварительной записи</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card h-100 border-primary hero-section">
                                    <div class="card-body">
                                        <i class="bi bi-clipboard-data display-4 text-primary"></i>
                                        <h5 class="mt-3">Чек-лист проверки</h5>
                                        <p>Оценка качества блюд, соблюдение норм, санитарное состояние</p>
                                        <a href="/docs/chek_list_pitanie.pdf" class="btn btn-sm btn-outline-primary">Скачать чек-лист</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card h-100 border-primary hero-section">
                                    <div class="card-body">
                                        <i class="bi bi-chat-dots display-4 text-primary"></i>
                                        <h5 class="mt-3">Анкетирование</h5>
                                        <p>Ежеквартальное анкетирование удовлетворенности питанием</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal">Оставить отзыв</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-light rounded">
                            <p><i class="bi bi-info-circle-fill text-primary me-2"></i> <strong>Запись на родительский контроль:</strong> по телефону 8 (4236) 69-21-21 (доб. 145) или через классного руководителя.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Модальное окно обратной связи -->
    <div class="modal fade" id="feedbackModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Отзыв о качестве питания</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">ФИО родителя</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Класс</label>
                            <input type="text" class="form-control" placeholder="Например: 5А">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Оценка качества питания (1-5)</label>
                            <select class="form-select">
                                <option>5 - Отлично</option>
                                <option>4 - Хорошо</option>
                                <option>3 - Удовлетворительно</option>
                                <option>2 - Плохо</option>
                                <option>1 - Очень плохо</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ваши пожелания и замечания</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Отправить отзыв</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>