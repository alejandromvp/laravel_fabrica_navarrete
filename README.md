## comandos instalacion laravel
composer requiere laravel/ui
php artisan ui vue --auth
npm install && npm run dev

## cambiar idioma a español
composer require laraveles/spanish
php artisan vendor:publish --tag=lang
config/app.php => 'locale' => 'es'

## uso de laravel mix
laravel mix nos permite usar webpack para compilar el codigo javascript y se genere archivo dentro de public

este comando permite que webpack observe si hay cambios en archivos y los compile
npm run watch

# comandos artisan
php artisan route:list
php artisan make:controller Carpeta/NombreController --resource
php artisan make:model Carpeta/NombreModel -m (-m es que se crea el archivo migracion)
php artisan make:seeder NombreSeeder
php artisan migrate 
php artisan db:seed
