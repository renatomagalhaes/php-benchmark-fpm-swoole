<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/database.php';

// Obter os usuários do banco de dados
$users = getUsers($pdo);

// Função para obter os usuários do banco de dados
function getUsers(PDO $pdo): array
{
    $query = "SELECT `id`, `name`, `email`, `status` FROM users WHERE status = 'active' LIMIT 10";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Definir o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Retornar uma resposta JSON com uma mensagem e os usuários obtidos
echo json_encode([
    'message' => [
        'Hello World PHP-FPM',
        $users
    ]
]);