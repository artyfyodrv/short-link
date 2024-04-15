build:
	docker compose build
up:
	docker compose up -d
up-logs:
	docker compose up
down:
	docker compose down
stop:
	docker compose stop
start:
	docker compose start
php-bash:
	docker compose exec -it php-link bash
php-logs:
	docker compose logs --follow php-link
php-logs-f:
	docker compose logs --follow php-link
nginx-bash:
	docker compose exec nginx-link bash
nginx-logs:
	docker compose logs nginx-link
nginx-logs-f:
	docker compose logs --follow php-link
