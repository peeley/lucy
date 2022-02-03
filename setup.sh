#!/usr/bin/env bash
set -euo pipefail

# copy .env file w/ config settings
cp .env.example .env

# generate encryption keys
docker-compose exec app php artisan key:generate

# migrate DB and add seed data
docker-compose exec app php artisan migrate:fresh --seed

# install PHP dependencies
docker-compose exec app composer install

# install & compile javascript dependencies
docker-compose exec app npm install
docker-compose exec app npm run dev

# change permissions, allow docker to write to logs
chmod -R 777 storage
