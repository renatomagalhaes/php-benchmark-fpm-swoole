.PHONY: up down logs install build composer-install app-web app-fpm app-swoole benchmark benchmark-logs

up:
	docker-compose up -d

down:
	docker-compose down

logs:
	docker-compose logs -f

install: build copy-env composer-install up benchmark-logs

build:
	docker-compose build

copy-env:
	cp .env.example .env

composer-install:
	docker run --rm -itv $(shell pwd)/:/app -w /app composer:2.7.2 composer install --ignore-platform-reqs

app-web:
	docker-compose exec web sh

app-fpm:
	docker-compose exec php-fpm bash

app-swoole:
	docker-compose exec php-swoole bash

migrate:
	docker-compose run --rm php-swoole php command/migrate.php

benchmark:
	docker-compose up wrk --build

benchmark-logs:
	# Waiting for healthcheck for web container to start...
	docker-compose logs -f wrk
