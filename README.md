## comandos instalacion laravel
composer requiere laravel/ui <br/>
php artisan ui vue --auth <br/>
npm install && npm run dev <br/>

## cambiar idioma a español
composer require laraveles/spanish <br/>
php artisan vendor:publish --tag=lang <br/>
config/app.php => 'locale' => 'es' <br/>

## uso de laravel mix
laravel mix nos permite usar webpack para compilar el codigo javascript y se genere archivo dentro de public <br/>
este comando permite que webpack observe si hay cambios en archivos y los compile. <br/>
npm run watch <br/>

# comandos artisan
php artisan route:list
php artisan make:controller Carpeta/NombreController --resource <br/>
php artisan make:model Carpeta/NombreModel -m (-m es que se crea el archivo migracion) <br/>
php artisan make:seeder NombreSeeder <br/>
php artisan make:migration create_users_table <br/>
php artisan migrate  <br/>
php artisan db:seed <br/>

# comandos deploy vps
sudo apt-get update <br/>
sudo apt-get upgrade <br/>
sudo apt-get install nginx <br/>
#wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add - <br/>
echo "deb https://packages.sury.org/php/ stretch main" | sudo tee /etc/apt/sources.list.d/php.list <br/>
sudo apt-get update <br/>
sudo apt-get install php7.2 php7.2-fpm php7.2-cli php7.2-xml php7.2-mysql<br/>
php -v se verifica si se instalo php, si se instalo apache hay que eliminarlo<br/>

//se instala composer<br/>
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"<br/>
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"<br/>
php composer-setup.php<br/>
php -r "unlink('composer-setup.php');"<br/>

php composer.phar<br/>
mv composer.phar /usr/local/bin/composer<br/>
//se instala extenciones que pide documentacion laravel<br/>
sudo apt-get install php7.2-xml php7.2-mbstring php7.2-json php7.2-bcmath<br/>
sudo apt-get install php7.0-zip <br/>
sudo apt-get install gitgit clone al proyecto dentro de la carpeta www<br/>
git clone url_proyecto<br/>
composer install<br/>
cp .env.example .env<br/>
php artisan key:generate<br/>

direccionamos nginx a nuestro index de laravel<br/>
nano /etc/nginx/sites-available/default<br/>
y se editan las siguientes lineas:<br/>

root /var/www/laravel_fabrica_navarrete/public;<br/>
index index.php index.html index.htm index.nginx-debian.html;<br/>
server_name 159.203.179.183;<br/>

location / {
        # First attempt to serve request as file, then
        # as directory, then fall back to displaying a 404.
        try_files $uri $uri/ /index.php?args;
}<br/>
location ~ \.php$ {
                include snippets/fastcgi-php.conf;

                # With php-fpm (or other unix sockets):
                fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
                # With php-cgi (or other tcp sockets):
                #fastcgi_pass 127.0.0.1:9000;
        }
 location ~ /\.ht {
                deny all;
        }<br/>

Reiniciar nginx<br/>
sudo /etc/init.d/nginx restart<br/>

sudo chmod -R 755 storage<br/>
sudo chown -R www-data: storage<br/>

hay que agregarle contraseña al usuario root para que funcione los select de laravel
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';



