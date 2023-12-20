#!/bin/sh

echo "+++++++++++++++++++++++++++++++++++++++"
echo "Application starting..."
echo "Running migrations..."

php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=8000

echo "Application started"
echo "+++++++++++++++++++++++++++++++++++++++"

