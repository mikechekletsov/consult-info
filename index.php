<?php

session_start();
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}       
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mt-5">
                <h2 class="mb-3">Форма обратной связи</h2>
                <form action="submit.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Имя пользователя</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="message">Сообщение</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="file">Файл(*.jpg, *.png)</label>
                        <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .png">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-2">Отправить</button>
                </form>
                <?php

                if (isset($success_message)) {
                    echo '<label class="form-label mb-3">' . $success_message . '</label>';
                }
                ?>
            </div>    
        </div>    
    </div>
</body>
</html>