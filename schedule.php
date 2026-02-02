<?php
// schedule.php
session_start();
require_once "config.php";

// Подключаемся к БД
require_once "functions/conn.php";

// Получаем выбранную дату (по умолчанию — сегодня)
$selected_date = $_GET['date'] ?? date('Y-m-d');

// Безопасно экранируем
$selected_date = preg_replace('/[^0-9-]/', '', $selected_date);

// Проверяем валидность даты
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_date)) {
    $selected_date = date('Y-m-d');
}

// Получаем все классы, у которых есть расписание на эту дату
try {
    $sql = "SELECT DISTINCT class_name 
            FROM schedule 
            WHERE schedule_date = :date 
            ORDER BY class_name";
    $query = $conn->prepare($sql);
    $query->execute([':date' => $selected_date]);
    $classes = $query->fetchAll(PDO::FETCH_COLUMN);

    // Получаем расписание для всех классов на эту дату
    $schedules = [];
    if (!empty($classes)) {
        $placeholders = implode(',', array_fill(0, count($classes), '?'));
        $sql = "SELECT * FROM schedule 
                WHERE schedule_date = ? 
                AND class_name IN ($placeholders) 
                ORDER BY class_name";
        $query = $conn->prepare($sql);
        
        $params = array_merge([$selected_date], $classes);
        $query->execute($params);
        $schedules = $query->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (PDOException $e) {
    $error_message = "Ошибка загрузки расписания: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа №12 — Расписание уроков</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        .lesson-card {
            min-height: 100px;
            border-left: 5px solid #0d6efd;
        }
        .no-lessons {
            background-color: #f8f9fa;
            border: 2px dashed #adb5bd;
        }
        .date-picker {
            max-width: 220px;
        }
    </style>
</head>
<body>

    <?php require_once "header.php"; ?>

    <main class="container my-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-5 fw-bold text-center mb-1">
                    <i class="bi bi-calendar-check me-2"></i>Расписание уроков
                </h1>
                <p class="text-center lead text-muted">
                    Муниципальное автономное общеобразовательное учреждение «СОШ №12 имени В.Н. Сметанкина» НГО
                </p>
            </div>
        </div>

        <!-- Выбор даты -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" class="d-flex flex-wrap gap-3 align-items-end">
                    <div>
                        <label for="date" class="form-label fw-bold">Выберите дату:</label>
                        <input type="date" 
                               name="date" 
                               id="date" 
                               class="form-control date-picker" 
                               value="<?= htmlspecialchars($selected_date) ?>" 
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Показать
                    </button>
                    <a href="schedule.php" class="btn btn-outline-secondary">
                        Сегодня
                    </a>
                </form>
            </div>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($schedules)): ?>
            <div class="alert alert-info text-center py-5">
                <i class="bi bi-calendar-x display-4 d-block mb-3"></i>
                <h4>На <?= date('d.m.Y', strtotime($selected_date)) ?> расписание отсутствует</h4>
                <p class="mb-0">Возможно, это выходной день или расписание ещё не добавлено</p>
            </div>
        <?php else: ?>

            <div class="row g-4">
                <?php foreach ($schedules as $sched): ?>
                    <div class="col-lg-6 col-xl-4">
                        <div class="card shadow h-100 lesson-card">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">
                                    <?= htmlspecialchars($sched['class_name']) ?> класс
                                    <small class="float-end">
                                        <?= date('d.m.Y', strtotime($sched['schedule_date'])) ?>
                                    </small>
                                </h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $has_lessons = false;
                                for ($i = 1; $i <= 7; $i++) {
                                    $lesson = trim($sched["lesson$i"] ?? '');
                                    if ($lesson !== '') {
                                        $has_lessons = true;
                                        echo "<div class='mb-2'>";
                                        echo "<strong>Урок $i:</strong> ";
                                        echo htmlspecialchars($lesson);
                                        echo "</div>";
                                    }
                                }
                                if (!$has_lessons) {
                                    echo "<div class='text-center text-muted py-4 no-lessons rounded'>";
                                    echo "<i class='bi bi-dash-circle fs-3'></i><br>";
                                    echo "Уроки не указаны";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </main>

    <?php require_once "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>