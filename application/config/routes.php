<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/carrera';
$route['404_override'] = 'frontend/error404';
$route['translate_uri_dashes'] = FALSE;

//Login
$route['login'] = "auth/login";
$route['logout'] = "auth/logout";

//Frontend
$route['carrera/(:num)'] = "frontend/carrera/verCarrera/$1";
$route['calendar/(:num)/(:num)'] = "frontend/carrera/index/$1/$2";
$route['docente/(:num)'] = "frontend/docente/verDocente/$1";
$route['materia/(:num)'] = "frontend/materia/verMateria/$1";
$route['docentes'] = "frontend/docente/index";

$route['publicaciones/(:num)'] = "frontend/publicaciones/index/$1";
$route['cronograma'] = "frontend/cursos/cronograma/";
$route['publicacion/(:num)'] = "frontend/publicaciones/verPublicacion/$1";

$route['abm/proyecto/(:num)'] = "abm/proyecto/index/$1";
$route['publicacion/(:num)/(:num)/(:num)'] = "frontend/publicaciones/verPublicacionesPorDia/$1/$2/$3";