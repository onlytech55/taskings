# taskings
 Laravel tasks

 Laravel 9.5

Setup
Clonar el repositorio o descargar la carpeta taskings y completar:

Ejecutar composer install

Editar .env y modificar las variables de base de datos según su conexión y su base de datos.
DB_DATABASE, DB_USERNAME, DB_PASSWORD

Ejecutar las migraciones: php artisan migrate

Ejecutar los seeders

Run php artisan db:seed --class = ProfilesSeeder   (perfiles de usuario)
Run php artisan db:seed --class = UserSeeder   (usuarios por defecto)

Comando para “eliminar” tareas ya realizadas 
Run php artisan schedule:work

Usabilidad:
Entorno de desarrollo: npm run dev
Producción: npm run build




