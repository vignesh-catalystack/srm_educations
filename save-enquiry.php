<?php

require 'connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false]);
    exit;
}

$data = $_POST;

$required = ['full_name','email','phone','message'];

foreach ($required as $field) {
    if (empty($data[$field])) {
        echo json_encode(['success' => false]);
        exit;
    }
}

$stmt = $pdo->prepare("
    INSERT INTO enquiries
    (full_name, email, phone, course, message)
    VALUES
    (:full_name, :email, :phone, :course, :message)
");

$stmt->execute([
    ':full_name' => $data['full_name'],
    ':email'     => $data['email'],
    ':phone'     => $data['phone'],
    ':course'    => $data['course'] ?? '',
    ':message'   => $data['message']
]);

echo json_encode(['success' => true]);