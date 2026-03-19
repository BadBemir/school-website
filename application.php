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
    <title>Школа 12 - Обратная связь</title>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php require_once "header.php"; ?>
    
    <main>
    <!-- Внутри <main> или секции -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <?php if (isset($_SESSION['form_success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($_SESSION['form_success']) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['form_success']); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION['form_errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($_SESSION['form_errors'] as $err): ?>
                            <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['form_errors']); ?>
            <?php endif; ?>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Связатся с нами</h4>
                </div>
                <div class="card-body">
                    <form action="functions/form_action.php" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">ФИО <span class="text-danger">*</span></label>
                            <input type="text" name="fullname" class="form-control" 
                                   value="<?= htmlspecialchars($_SESSION['form_old']['fullname'] ?? '') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Телефон <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control" 
                                   value="<?= htmlspecialchars($_SESSION['form_old']['phone'] ?? '') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email (необязательно)</label>
                            <input type="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($_SESSION['form_old']['email'] ?? '') ?>">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Текст заявки <span class="text-danger">*</span></label>
                            <textarea name="message" rows="5" class="form-control" required><?= htmlspecialchars($_SESSION['form_old']['message'] ?? '') ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Отправить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php unset($_SESSION['form_old']); ?>
    </main>

    <?php require_once "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>