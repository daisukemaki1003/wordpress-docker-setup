.PHONY: setup up d b ps node


init:
	@docker-compose -f docker-compose.tmp.yml build
	@docker-compose -f docker-compose.tmp.yml up -d
	@make ps

setup:
	@make up
	@make ps

down:
	@make d
	@make ps

d:
	@docker compose down
up:
	@docker compose up -d
ps:
	@docker compose ps
node:
	@docker compose exec node bash
clear:
	@docker system prune

WP_CONTAINER=wordpress
PHP_VERSION_CMD=docker exec $(WP_CONTAINER) php -v
MYSQL_VERSION_CMD=docker exec $(WP_CONTAINER) mysql --version
WP_CLI_VERSION_CMD=docker exec $(WP_CONTAINER) wp --version

.PHONY: check-versions

v:
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
	rm -rf www/html
reset-db:
	rm -rf docker/mysql/storage