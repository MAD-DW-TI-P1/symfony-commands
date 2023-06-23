<img src="https://jorgebenitezlopez.com/github/symfony.jpg">
<img src="https://img.shields.io/static/v1?label=PHP&message=Symfony&color=green">

# Symfony commands

Creación de un comando de pruebas en Symfony para ejecutar en un servidor

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP 8.2.3 (cli). Por ejemplo se puede descargar en OSX con: https://formulae.brew.sh/formula/php
- Composer: https://getcomposer.org/download/

# Pasos para la instalación de Symfomy y paquetes

- symfony new symfony-commands --version=5.4
- cd symfony-commands
- composer require symfony/orm-pack
- composer require symfony/maker-bundle
- composer update
- composer require form validator twig-bundle security-csrf annotations

# Configuración y creación de controlador

- Modificamos el .env para que genere un sqlite (https://www.sqlite.org/index.html)
- php bin/console make:entity (master)
- php bin/console make:crud
- Creo un comando y ejecuto el comando: bin/console app:alert-master

# Rutas

- /master
- /master/new
- /master/1/edit


# Referencias

- https://symfony.com/doc/current/console.html
