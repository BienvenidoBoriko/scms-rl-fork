# Scml-rl
Proyecto de fin de CFGS de Desarrollo de Aplicaciones Web

### Requisitos 

- PHP >= 7.2.5
    - BCMath PHP Extension
    - Ctype PHP Extension
    - Fileinfo PHP extension
    - JSON PHP Extension
    - Mbstring PHP Extension
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
- mysql-server
- composer
- node y npm.
- git
- La forma mas sencilla de tener todo esto es mediante vagrant y homestead
link para su instalacion y configuracion https://laravel.com/docs/7.x/homestead.

### Instalacion 

- crear base de datos scmsrl
- crear usuario de base de datos  'scmsrl' clave 'scmsrl' con permisos totales sobre scmsrl.
- clonar el repositorio. git clone https://github.com/BienvenidoBoriko/scms-rl.git .
cd scms-rl.
- composer install
- npm install 
- npm run dev.
- php artisan migrate.
- php artisan db:seed.
- php artisan serve

### acceder

- accreder con dir proporcionada por el comando serve/home.
- usuario: ejemplo@gmail.com.
- contraseña: password.
