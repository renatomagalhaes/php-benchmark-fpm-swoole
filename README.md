# PHP Benchmark FPM Swoole

## Descrição

Este projeto tem como objetivo gerar um comparativo de benchmark entre o PHP rodando com PHP-FPM e o PHP com Swoole utilizando a biblioteca PHP Runner.

## Description

This project aims to generate a benchmark comparison between PHP running with PHP-FPM and PHP with Swoole using the PHP Runner library.

## Clonar e Instalar

To clone and install the project, follow these steps:

1. Clone the repository:

  ```bash
  git clone https://github.com/renatomagalhaes/php-benchmark-fpm-swoole.git
  ```

2. Change to the project directory:

  ```bash
  cd php-benchmark-fpm-swoole
  ```

3. Install dependencies using Makefile:

  ```bash
  make install
  ```

4. See the Makefile for more commands.

5. Run the benchmark with PHP-FPM and Swoole:

  ```bash
  make benchmark
  ```
   This command will run the benchmark using PHP-FPM and Swoole.

6. Run the benchmark with PHP-FPM and Swoole:

  ```bash
  make benchmark-logs
  ```
   This command will get the benchmark logs.

7. Build the project:

  ```bash
  make build
  ```
   This command will build the project.

8. Start the project:

  ```bash
  make up
  ```
   This command will start the project.

9. Stop the project:

  ```bash
  make stop
  ```
   This command will stop the project.
