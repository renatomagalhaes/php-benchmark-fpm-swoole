.PHONY: up down logs install build composer-install app-web app-fpm app-swoole benchmark benchmark-logs

up:
	docker-compose up -d

down:
	docker-compose down

logs:
	docker-compose logs -f

install: build composer-install up benchmark-logs

build:
	docker-compose build --no-cache

composer-install:
	docker run --rm -itv $(shell pwd)/src:/app -w /app composer:2.7.2 composer install --ignore-platform-reqs

app-web:
	docker-compose exec web sh

app-fpm:
	docker-compose exec php-fpm bash

app-swoole:
	docker-compose exec php-swoole bash

benchmark:
	docker-compose up wrk --build

benchmark-logs:
	sleep 5
	docker-compose logs -f wrk
