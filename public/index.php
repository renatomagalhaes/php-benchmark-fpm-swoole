<?php

namespace App\Fpm;

use PDO;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

// Conexão com o banco de dados usando PDO
$pdo = new PDO($dsn, $username, $password);

// Obter os usuários do banco de dados
$users = getUsers($pdo);

// Função para obter os usuários do banco de dados
function getUsers(PDO $pdo): array
{
    $query = "SELECT * FROM users WHERE status = 'active' LIMIT 10";
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