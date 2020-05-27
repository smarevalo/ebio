# Escuela de Ingeniería de La Universidad de Chilecito
Desarrollo de sistema de gestión de información de la Escuela de Ingeniería (EING), perteneciente a la Universidad Nacional de Chilecito.

## Instalación

> 1. Descargar el paquete y copiar en la carpeta del servidor correspondiente /var/www/html/eing (linux)
> 2. Crear base de datos en el motor de mysql e importar el archivo que se encuentra en /database/eing.sql
> 3. Modificar el archivo /application/config/database.php con los valores que correspondan
		'hostname' => 'localhost',
		'username' => 'user_name',
		'password' => 'user_password',
		'database' => 'database_name',
> 4. Modificar el archivo /application/config/config.php con los valores que correspondan
		$config['base_url'] = 'http://localhost/eing/';
    


### Usuarios
http://localhost/eing/login

### Admin Login
Username: admin Password: 12345678

### User Login
Username: user Password: 12345678

## For Help
smacoweb@gmail.com
