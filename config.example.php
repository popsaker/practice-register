<?php
// Копируйте этот файл в config.php и укажите свои данные для MySQL.

$host = 'localhost';
$user = 'your_database_user';
$password = 'your_database_password';
$dbname = 'your_database_name';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode([
        'success' => false,
        'message' => 'Ошибка подключения к базе данных'
    ]));
}

$conn->set_charset('utf8');
