<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:32
 */

return $routes = array(
    '/' => 'UserController/loginFormView',
    '/login' => 'UserController/login',
    '/logout' => 'UserController/logout',
    '/stats' => 'DeviceController/stats',
    '/processStats' => 'DeviceController/processStats',
    '/viewStats' => 'DeviceController/viewStats'
);