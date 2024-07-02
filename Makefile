.PHONY: setup up d b ps node

setup:
	@make up
	@make ps

down:
	docker compose down
up:
	docker compose up -d
ps:
	docker compose ps
node:
	docker compose exec node bash

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