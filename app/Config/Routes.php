<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//El slash "/" representa el HOME de tu aplicación
//es decir www.miweb.com/programador

$routes->get('/', 'Home::dashboard');
$routes->get('/senati', 'Home::index'); //Primer ejemplo de navegación

//¿Cómo funciona una ruta?
//$routes->verbo('/ruta/', 'Controlador::MetodoAccion');
//Nota: Es posible crear más de una ruta para una vista

//$routes->get('/programador', 'Carrera::showIngenieria');
//$routes->get('/coder', 'Carrera::showIngenieria');
//$routes->get('/creativo', 'Carrera::showDesign');
//$routes->get('/marketing', 'Carrera::showDesign');

//Nuevas rutas para navegar desde DASHBOARD
$routes->get('/clientes','Cliente::index'); //Muestra la tabla con datos
$routes->get('/clientes/registrar', 'Cliente::create'); //Muestra solo el formulario
$routes->post('/clientes/guardar','Cliente::registrarCliente'); //Envía los datos del form a la tabla DB
$routes->get('/clientes/eliminar/(:num)', 'Cliente::eliminar/$1');
$routes->get('/clientes/buscar/(:num)', 'Cliente::buscar/$1'); //Antes de actualizar, tenemos que buscar
$routes->post('/clientes/actualizar', 'Cliente::actualizar'); //Después de buscar, actualizamos los datos

// Rutas proveedores
$routes->get('/proveedores', 'Proveedor::index');
$routes->get('/proveedores/registrar', 'Proveedor::create');
$routes->post('/proveedores/guardar', 'Proveedor::registrarProveedor');
$routes->get('/proveedores/editar/(:num)', 'Proveedor::editar/$1');
$routes->post('/proveedores/actualizar/(:num)', 'Proveedor::actualizar/$1');
$routes->get('/proveedores/eliminar/(:num)', 'Proveedor::eliminar/$1');

// Rutas productos
$routes->get('/productos', 'Producto::index');
$routes->get('/productos/registrar', 'Producto::create');
$routes->post('/productos/guardar', 'Producto::registrarProducto');
$routes->get('/productos/editar/(:num)', 'Producto::editar/$1');
$routes->post('/productos/actualizar/(:num)', 'Producto::actualizar/$1');
$routes->get('/productos/eliminar/(:num)', 'Producto::eliminar/$1');

$routes->get('/vehiculos', 'Vehiculo::index');

//BD > Modelo > Controlador > Ruta > JS > HTML
$routes->get('/vehiculos/listar', 'Vehiculo::getVehiculos');
$routes->post('/vehiculos/registrar','Vehiculo::registrarVehiculo');

$routes->get('/marcas/listar', 'Marca::getMarcas');