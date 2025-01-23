laravel new Practica:
Crea un proyecto de Laravel.

php artisan make:migration create_alumno_table --create=alumno:
Crea un archivo de migracion para crear una tabla en la base de datos.

php artisan make:seeder AlumnoSeeder:
Crea un seeder para meter datos en la tabla alumno.

php artisan db:seed --class=AlumnoSeeder:
Ejecuta el seeder para insertar datos en la tabla alumno.

php artisan make:controller AlumnoController:
Genera un controlador para manejar las operaciones CRUD de la tabla alumno.

php artisan install:api:
Genera un archivo api.php para agregar las rutas.

php artisan make:middleware ValidarId:
Crea un middleware que se usa para verificar el ID antes de procesar una solicitud.