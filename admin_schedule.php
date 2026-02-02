<?php
session_start();
require_once __DIR__ . "/config.php";
requireAuth(true); // Требуем права администратора

// Подключаемся к БД
require_once __DIR__ . "/functions/conn.php";

// Убеждаемся, что таблица schedule существует
function ensureScheduleTable($conn) {
    try {
        $conn->exec("
            CREATE TABLE IF NOT EXISTS schedule (
                id INT AUTO_INCREMENT PRIMARY KEY,
                schedule_date DATE NOT NULL,
                class_name VARCHAR(50) NOT NULL,
                lesson1 VARCHAR(255) DEFAULT NULL,
                lesson2 VARCHAR(255) DEFAULT NULL,
                lesson3 VARCHAR(255) DEFAULT NULL,
                lesson4 VARCHAR(255) DEFAULT NULL,
                lesson5 VARCHAR(255) DEFAULT NULL,
                lesson6 VARCHAR(255) DEFAULT NULL,
                lesson7 VARCHAR(255) DEFAULT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    } catch (PDOException $e) {
        // Игнорируем ошибку, если таблица уже существует
    }
}

ensureScheduleTable($conn);

// Обработка формы добавления расписания
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_schedule') {
    $schedule_date = $_POST['schedule_date'] ?? '';
    $class_name = sanitizeString($_POST['class_name'] ?? '');
    $lessons = [];
    for ($i = 1; $i <= 7; $i++) {
        $lessons["lesson$i"] = sanitizeString($_POST["lesson$i"] ?? '');
    }

    if (empty($schedule_date) || empty($class_name)) {
        setError('Дата и класс обязательны для заполнения');
    } else {
        try {
            // Проверяем, существует ли уже расписание для этой даты и класса
            $check_sql = "SELECT id FROM schedule WHERE schedule_date = ? AND class_name = ?";
            $check_query = $conn->prepare($check_sql);
            $check_query->execute([$schedule_date, $class_name]);
            
            if ($check_query->fetch()) {
                setError('Расписание для этого класса на указанную дату уже существует');
            } else {
                $sql = "INSERT INTO schedule (schedule_date, class_name, lesson1, lesson2, lesson3, lesson4, lesson5, lesson6, lesson7) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $query = $conn->prepare($sql);
                $query->execute([
                    $schedule_date,
                    $class_name,
                    $lessons['lesson1'],
                    $lessons['lesson2'],
                    $lessons['lesson3'],
                    $lessons['lesson4'],
                    $lessons['lesson5'],
                    $lessons['lesson6'],
                    $lessons['lesson7']
                ]);
                
                setSuccess('Расписание успешно добавлено');
            }
        } catch (PDOException $e) {
            setError('Ошибка при добавлении расписания: ' . $e->getMessage());
        }
    }
    header('Location: admin_schedule.php');
    exit();
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Школа 12 - Управление расписанием</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require_once __DIR__ . "/header.php"; ?>

    <main>
        <div class="container my-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0"><i class="bi bi-calendar-event"></i> Управление расписанием</h2>
                <a href="admin.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> В панель администратора
                </a>
            </div>

            <?php
            $success = getSuccess();
            $error = getError();

            if ($success) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<i class="bi bi-check-circle"></i> ' . htmlspecialchars($success);
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
            if ($error) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '<i class="bi bi-exclamation-triangle"></i> ' . htmlspecialchars($error);
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }
            ?>

            <!-- Форма добавления расписания -->
            <div class="card shadow-sm mb-5">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Добавить новое расписание</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="admin_schedule.php">
                        <input type="hidden" name="action" value="add_schedule">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="schedule_date" class="form-label">Дата</label>
                                <input type="date" name="schedule_date" id="schedule_date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="class_name" class="form-label">Класс (например, 10А)</label>
                                <input type="text" name="class_name" id="class_name" class="form-control" required minlength="2" maxlength="50">
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6>Уроки (укажите предмет и учителя, если нужно)</h6>
                            <?php for ($i = 1; $i <= 7; $i++): ?>
                            <div class="mb-3">
                                <label for="lesson<?php echo $i; ?>" class="form-label">Урок <?php echo $i; ?></label>
                                <input type="text" name="lesson<?php echo $i; ?>" id="lesson<?php echo $i; ?>" class="form-control" maxlength="255">
                            </div>
                            <?php endfor; ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Добавить расписание</button>
                    </form>
                </div>
            </div>

            <!-- Список существующих расписаний -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-list-ul"></i> Существующие расписания</h5>
                </div>
                <div class="card-body">
                    <?php
                    try {
                        $sql = "SELECT * FROM schedule ORDER BY schedule_date DESC, class_name ASC LIMIT 50";
                        $query = $conn->prepare($sql);
                        $query->execute();
                        $schedules = $query->fetchAll(PDO::FETCH_ASSOC);

                        if ($schedules):
                    ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Класс</th>
                                    <th>Уроки</th>
                                    <th>Создано</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($schedules as $schedule): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($schedule['schedule_date']); ?></td>
                                    <td><?php echo htmlspecialchars($schedule['class_name']); ?></td>
                                    <td>
                                        <ul class="list-unstyled small">
                                            <?php for ($i = 1; $i <= 7; $i++): ?>
                                                <?php if (!empty($schedule["lesson$i"])): ?>
                                                    <li><strong>Урок <?php echo $i; ?>:</strong> <?php echo htmlspecialchars($schedule["lesson$i"]); ?></li>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </ul>
                                    </td>
                                    <td><?php echo htmlspecialchars($schedule['created_at']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        else:
                            echo '<div class="alert alert-info"><i class="bi bi-info-circle"></i> Нет добавленных расписаний</div>';
                        endif;
                    } catch (PDOException $e) {
                        echo '<div class="alert alert-danger"><i class="bi bi-exclamation-triangle"></i> Ошибка: ' . htmlspecialchars($e->getMessage()) . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <?php require_once __DIR__ . "/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>