.PHONY: init prepare build up d b ps node


init:
	@docker-compose -f docker-compose.init.yml build
	@docker-compose -f docker-compose.init.yml up -d
	@make ps

prepare:
	@make build
	@make up
	@make ps

down:
	@make d
	@make ps

d:
	@docker compose down
build:
	@docker compose build
up:
	@docker compose up -d
ps:
	@docker compose ps
clear:
	@docker system prune

WP_CONTAINER=wordpress
PHP_VERSION_CMD=docker exec $(WP_CONTAINER) php -v
MYSQL_VERSION_CMD=docker exec $(WP_CONTAINER) mysql --version
WP_CLI_VERSION_CMD=docker exec $(WP_CONTAINER) wp --version

.PHONY: cv

cv:
	@echo "Checking PHP version..."
	@$(PHP_VERSION_CMD)
	@echo "Checking MySQL version..."
	@$(MYSQL_VERSION_CMD)
	@echo "Checking WP-CLI version..."
	@$(WP_CLI_VERSION_CMD)

logs:
	@docker compose logs -f

logs-app:
	@docker compose logs -f app

logs-db:
	@docker compose logs -f db

reset:
	@read -p "Are you sure you want to reset the app? [y/N] " answer; \
	if [ $$answer = "y" ]; then \
		make reset-app; \
		make reset-db; \
	fi

reset-app:
	@rm -rf src/*
reset-db:
	@rm -rf docker/mysql/storage

