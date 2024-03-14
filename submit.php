<?php

session_start();

$username = htmlspecialchars(trim($_POST["username"]));
$email = htmlspecialchars(trim($_POST["email"]));
$message = htmlspecialchars(trim($_POST["message"]));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Неверный формат email.");
}

$file_path = '';
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_tmp_path = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $allowed_types = array('image/png', 'image/jpeg');

    if (in_array($file_type, $allowed_types)) {
        $upload_path = 'uploads/';
        $file_path = $upload_path . $file_name;
        move_uploaded_file($file_tmp_path, $file_path);
    } else {
        die("Недопустимый формат файла.");
    }
}

$filename = "uploads/messages/" . time() . ".txt";
$file_content = "Имя пользователя: $username\nE-mail: $email\nСообщение: $message\nФайл: " . __DIR__ . "/" . $file_path . "\n";
file_put_contents($filename, $file_content);

#chown -R www-data:www-data /var/www/html/uploads
#chmod -R 775 /var/www/html/uploads

$_SESSION['success_message'] = "Ваше сообщение успешно отправлено!";

header("Location: index.php");
exit;


