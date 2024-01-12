DOCKER_COMPOSE = docker compose -f docker-compose.yml

init:
	$(DOCKER_COMPOSE) build --pull
	$(DOCKER_COMPOSE) run --rm php-cli composer install
	$(DOCKER_COMPOSE) up -d
	$(DOCKER_COMPOSE) run --rm php-cli wait-for-it postgres:5432 -t 60
	$(DOCKER_COMPOSE) run --rm php-cli php artisan migrate --seed

start:
	$(DOCKER_COMPOSE) up -d --remove-orphans --force-recreate --build

stop:
	$(DOCKER_COMPOSE) stop

down:
	$(DOCKER_COMPOSE) down

down-clear:
	$(DOCKER_COMPOSE) down -v --remove-orphans

pull:
	$(DOCKER_COMPOSE) pull

update-deps:
	$(DOCKER_COMPOSE) run --rm --no-deps php-cli composer update
