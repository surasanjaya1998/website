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
$route['default_controller'] = 'PetugasController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['buku'] = 'BukuController';
$route['buku/create'] = 'BukuController/create';
$route['buku/store'] = 'BukuController/store';
$route['buku/delete'] = 'BukuController/delete';
$route['buku/(:any)'] = 'BukuController/edit/$1';
$route['buku/(:any)/update'] = 'BukuController/update/$1';

$route['peminjaman'] = 'PeminjamanController';
$route['peminjaman/create'] = 'PeminjamanController/create';
$route['peminjaman/store'] = 'PeminjamanController/store';
$route['peminjaman/delete'] = 'PeminjamanController/delete';
$route['peminjaman/(:any)'] = 'PeminjamanController/edit/$1';
$route['peminjaman/(:any)/update'] = 'PeminjamanController/update/$1';

$route['peminjaman/detail_peminjaman/(:any)'] = 'DetailPeminjamanController/index/$1';
$route['peminjaman/detail_peminjaman/(:any)/create'] = 'DetailPeminjamanController/create/$1';
$route['peminjaman/detail_peminjaman/(:any)/store'] = 'DetailPeminjamanController/store/$1';

$route['anggota'] = 'AnggotaController';
$route['anggota/create'] = 'AnggotaController/create';
$route['anggota/store'] = 'AnggotaController/store';
$route['anggota/delete'] = 'AnggotaController/delete';
$route['anggota/(:any)'] = 'AnggotaController/edit/$1';
$route['anggota/(:any)/update'] = 'AnggotaController/update/$1';

$route['petugas'] = 'PetugasController';
$route['petugas/create'] = 'PetugasController/create';
$route['petugas/store'] = 'PetugasController/store';
$route['petugas/delete'] = 'PetugasController/delete';
$route['petugas/(:any)'] = 'PetugasController/edit/$1';
$route['petugas/(:any)/update'] = 'PetugasController/update/$1';

$route['welcome'] = 'Welcome';