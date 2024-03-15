<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка CSV файла</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="upload.php" method="post" enctype="multipart/form-data" class="mt-5">
                <div class="form-group">
                    <label for="csvFile">Выберите CSV файл для загрузки:</label>
                    <input type="file" name="csvFile" id="csvFile" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Загрузить файл</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>