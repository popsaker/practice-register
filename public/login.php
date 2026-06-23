<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/cart.php';

$data = json_decode(file_get_contents('php://input'), true);

$email = trim($data['email'] ?? '');
$password = $data['password'] ?? '';

if ($email === '' || $password === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Заполните все поля'
    ]);
    exit;
}

$stmt = $conn->prepare('SELECT id, password, Role FROM aregistr WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if (! $result || $result->num_rows === 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Неверный логин или пароль'
    ]);
    exit;
}

$user = $result->fetch_assoc();
$stmt->close();

if (! password_verify($password, $user['password'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Неверный логин или пароль'
    ]);
    exit;
}

// Запоминаем пользователя в сессии для доступа к админ-панели
$_SESSION['user'] = [
    'id' => $user['id'],
    'email' => $email,
    'Role' => $user['Role'] ?? 'user'
];

restoreUserCart($user['id']);

echo json_encode([
    'success' => true,
    'user_id' => $user['id'],
    'role' => $_SESSION['user']['Role']
]);

$conn->close();
