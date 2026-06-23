<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../bootstrap.php';

$data = json_decode(file_get_contents('php://input'), true);

$name = trim($data['name'] ?? '');
$secondname = trim($data['secondname'] ?? '');
$phone = trim($data['phone'] ?? '');
$email = trim($data['email'] ?? '');
$password = $data['password'] ?? '';

if ($name === '' || $secondname === '' || $phone === '' || $email === '' || $password === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Заполните все поля'
    ]);
    exit;
}

$stmt = $conn->prepare('SELECT id FROM aregistr WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Пользователь с таким E-mail уже существует'
    ]);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare('INSERT INTO aregistr (name, secondname, phone, email, password, Role) VALUES (?, ?, ?, ?, ?, ?)');
$role = 'user';
$stmt->bind_param('ssssss', $name, $secondname, $phone, $email, $hash, $role);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка регистрации'
    ]);
}

$stmt->close();
$conn->close();
