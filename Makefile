PINT='./vendor/bin/pint'
DOCKER_COMPOSE=docker compose
NEXU_API=nexu-api

linter-fix:
	cd ./app && $(PINT)

run-clear:
	${DOCKER_COMPOSE} exec -T ${NEXU_API} php artisan optimize:clear

test-pre-commit: run-clear-cache
	$(DOCKER_COMPOSE) exec -T $(NEXU_API) php artisan test --compact

build-image:
	docker build -t nexu-api:latest --no-cache -f ./build/Dockerfile .

run-migration:
	${DOCKER_COMPOSE} exec ${NEXU_API} php artisan migrate:fresh --seed
