<?php
require_once __DIR__ . '/config.php';

$email = 'lelele@mail.com';
$password = 'password111';

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare('UPDATE aregistr SET password = ? WHERE email = ?');
$stmt->bind_param('ss', $hash, $email);

if ($stmt->execute()) {
    echo "Пароль обновлен\n";
} else {
    echo "Ошибка: " . $stmt->error . "\n";
}

$stmt->close();
$conn->close();