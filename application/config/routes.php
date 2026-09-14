<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'masuk';
$route['display_antrian']= 'display_cetak';
$route['display_antrian/(:any)']= 'display_cetak/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
