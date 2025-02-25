#!/bin/sh

set -e

php artisan migrate:fresh --seed --force

exec "$@"