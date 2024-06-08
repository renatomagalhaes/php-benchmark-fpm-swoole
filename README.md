# Benchmark PHP-FPM vs PHP Swoole

## Descrição (PT-BR)
Este projeto tem como objetivo gerar um teste comparativo de benchmark entre o PHP rodando com PHP-FPM e o PHP com Swoole utilizando a biblioteca runtime/swoole.

## Description
This project aims to generate a comparative benchmark test between PHP running with PHP-FPM and PHP with Swoole using the runtime/swoole library.

## Clone and Install
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

## See the Makefile for more commands.

. Run the benchmark with PHP-FPM and Swoole:
  ```bash
  make benchmark
  ```

. Run the benchmark with PHP-FPM and Swoole:
  ```bash
  make benchmark-logs
  ```

. Start the project:
  ```bash
  make up
  ```

. Stop the project:
  ```bash
  make stop
  ```
