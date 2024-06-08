<?php

namespace App\Swoole;

use Dotenv\Dotenv;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Coroutine\MySQL;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function () {
    return function (Request $request, Response $response) {
        // Carrega as variáveis de ambiente
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        // Conecta ao banco de dados
        $dbConfig = [
            'host' => $_ENV['DB_HOST'],
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'database' => $_ENV['DB_DATABASE'],
        ];
        $swoole_mysql = new MySQL();
        $swoole_mysql->connect($dbConfig);

        // Define o cabeçalho da resposta
        $response->header("Content-Type", "application/json");

        try {
            // Executa a consulta
            $users = getUsers($swoole_mysql);

            // Retorna a resposta
            $response->end(json_encode(['message' => [
                'Hello World Swoole',
                $users
            ]]));
        } catch (\Throwable $e) {
            // Lida com erros
            $response->end(json_encode(['error' => $e->getMessage()]));
        }
    };
};

if (!function_exists('getUsers')) {
    function getUsers(MySQL $db): array
    {
        $statement = $db->prepare("SELECT * FROM users WHERE `status` = 'active' LIMIT 10");
        if ($statement === false) {
            throw new \Exception($db->error, $db->errno);
        }

        return $statement->execute();
    }
}
