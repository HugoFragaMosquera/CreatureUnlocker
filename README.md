## Requisitos ##
- PHP 8.2.12
- Composer (https://getcomposer.org)
- XAMPP (https://www.apachefriends.org/es/index.html)
- Node.js y npm


## Pasos a seguir ##

- Clonación del repositorio --> git clone https://github.com/HugoFragaMosquera/CreatureUnlocker.git
                                cd CreatureUnlocker
  
- Instalación dependencias PHP --> composer install

- Configuración del entorno
  - Duplicar el archivo .env.example y renombralo como .env --> cp .env.example .env
  - Generar clave de aplicación --> php artisan key:generate
  - Configura tu conexión a la base de datos en el archivo .env --> Debe quedar la siguiente sección así:
                                                                    DB_CONNECTION=mysql
                                                                    DB_HOST=127.0.0.1
                                                                    DB_PORT=3306
                                                                    DB_DATABASE=creatureunlocker
                                                                    DB_USERNAME=root
                                                                    DB_PASSWORD=
- Creación de la DB
  - En el panel de XAMPP, pon en marcha Apache y MySQL
  - En el navegador, ve a http://localhost/phpmyadmin
  - En "Nueva", ponle de nombre "creatureunlocker" y creala

- Ejecutar migrations y seeders --> php artisan migrate:fresh --seed

- Instalación de dependencias frontend y compilación --> npm install
                                                         npm run dev
- Inicialización del servidor --> php artisan serve

El proyecto ya debería estar en fucionamiento en http://127.0.0.1:8000

  
