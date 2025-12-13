#!/bin/bash
set -e

# Backend telepítés
cd backend
composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan storage:link

# Frontend build
cd ../frontend
npm install
npm run build

# Másolás a backend public mappába
cp -r dist/* ../backend/public/

# Laravel futtatása
cd ../backend
php artisan serve --host 0.0.0.0 --port $PORT
