<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if ($name === '' || mb_strlen($name) > 50) {
    $errors['name'] = 'Numele este obligatoriu si trebuie sa aiba cel mult 50 de caractere.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Adresa de email nu este valida.';
}

if ($message === '' || mb_strlen($message) > 500) {
    $errors['message'] = 'Mesajul este obligatoriu si trebuie sa aiba cel mult 500 de caractere.';
}

if ($errors) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = compact('name', 'email', 'message');
    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Te rugam sa corectezi erorile de mai jos.'];
    header('Location: index.php');
    exit;
}

$dataDir = __DIR__ . '/data';
$dataFile = $dataDir . '/messages.json';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$messages = [];
if (file_exists($dataFile)) {
    $raw = file_get_contents($dataFile);
    $messages = json_decode($raw, true) ?: [];
}

$messages[] = [
    'id' => uniqid('msg_', true),
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'created_at' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
];

file_put_contents(
    $dataFile,
    json_encode($messages, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
    LOCK_EX
);

$_SESSION['flash'] = ['type' => 'success', 'message' => 'Mesaj trimis cu succes! Multumim.'];
header('Location: view.php');
exit;
