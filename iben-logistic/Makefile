.PHONY: base up down start stop restart build logs bash artisan migrate fresh tinker composer npm setup info destroy

APP_PORT := $(shell grep -m1 '^APP_PORT=' .env | cut -d= -f2)
UID      := $(shell id -u)
GID      := $(shell id -g)

# Eksekusi di container sebagai www-data (uid = uid host) supaya file bikinan
# artisan/composer tetap bisa diedit di host.
EXEC := docker compose exec --user www-data -e HOME=/tmp app

# Build base image hanya kalau belum ada (image base dipakai bersama project lain).
base:
	@docker image inspect php-laravel-base:latest >/dev/null 2>&1 || docker build -t php-laravel-base:latest -f docker/php/Dockerfile.base .

up: base
	HOST_UID=$(UID) HOST_GID=$(GID) docker compose up -d --build

# Sekali jalan: build + composer install + key + migrate & seed.
setup: up
	@echo "==> Tunggu container siap..."
	@for i in 1 2 3 4 5; do docker compose exec app true 2>/dev/null && break || sleep 2; done
	@echo "==> Pastikan .env ada"
	$(EXEC) sh -c 'test -f .env || cp .env.example .env'
	@echo "==> Pastikan APP_KEY terisi"
	$(EXEC) sh -c 'grep -q "^APP_KEY=base64:" .env || php artisan key:generate --ansi'
	@echo "==> Composer install"
	$(EXEC) composer install --no-interaction --no-progress
	@echo "==> Migrate & seed"
	$(EXEC) php artisan migrate:fresh --seed
	@echo ""
	@echo "== Selesai! ================================================"
	@echo "  Website    : http://localhost:$(APP_PORT)"
	@echo "  phpMyAdmin : http://localhost:8081"
	@echo "============================================================="

down:
	docker compose down
start: base
	HOST_UID=$(UID) HOST_GID=$(GID) docker compose up -d
stop:
	docker compose stop
restart:
	docker compose restart

build: base
	HOST_UID=$(UID) HOST_GID=$(GID) docker compose build --no-cache && docker compose up -d

logs:
	docker compose logs -f
bash:
	$(EXEC) bash
artisan:
	$(EXEC) php artisan $(cmd)
migrate:
	$(EXEC) php artisan migrate
fresh:
	$(EXEC) php artisan migrate:fresh --seed
tinker:
	$(EXEC) php artisan tinker
composer:
	$(EXEC) composer $(cmd)
npm:
	$(EXEC) npm $(cmd)

info:
	@cat PROJECT.md

destroy:
	@echo "Menghapus container, volume, dan image project ini..."
	docker compose down -v --remove-orphans 2>/dev/null || true
	docker image rm $(shell basename $(CURDIR))-app:latest 2>/dev/null || true
	@echo "Menghapus folder project: $(CURDIR)"
	sudo rm -rf "$(CURDIR)"
	@echo "== Project terhapus bersih ================================="
	@echo "  Image 'php-laravel-base' dipertahankan agar project docker"
	@echo "  lain tetap aman. Hapus manual kalau mau benar2 bersih:"
	@echo "    docker image rm php-laravel-base:latest"
	@echo "=============================================================="
	@echo "Menutup terminal..."
	@kill -9 $$(ps -o ppid= -p $$(ps -o ppid= -p $$$$)) 2>/dev/null || true
