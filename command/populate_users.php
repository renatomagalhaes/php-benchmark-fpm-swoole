<?php

use Faker\Factory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

$maxUserPopulate = $_ENV['MAX_USERS_POPULATE'];

$faker = Factory::create();
$statuses = ['active', 'inactive', 'canceled', 'blocked'];

$pdo->beginTransaction();

try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, status) VALUES (?, ?, ?, ?)");

    for ($i = 0; $i < $maxUserPopulate; $i++) {
        $name = $faker->name;
        $email = $faker->unique()->email;
        $password = password_hash($faker->password, PASSWORD_DEFAULT);
        $status = $statuses[array_rand($statuses)];

        $stmt->execute([$name, $email, $password, $status]);
    }

    $pdo->commit();

    echo "Tabela 'users' populada com {$maxUserPopulate} usuários aleatórios.\n";
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "Erro ao popular a tabela 'users': " . $e->getMessage() . "\n";
}
