<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'DisplayEvent';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['createEvent'] = 'RegisterEvent';
$route['createEvent/validation'] = 'RegisterEvent/validation';
$route['displayEvents'] = 'DisplayEvent';
$route['ForgotPassword'] = 'ForgotPassword';
$route['ProvideCode'] = 'ProvideCode';
$route['ResetPassword'] = 'ResetPassword';
$route['register'] = 'RegisterUser';
$route['register/validation'] = "RegisterUser/validation";
