<?php

$routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    // $routes->get('floor_list/(:any)', '\Modules\Floor\Controllers\Floorcontroller::index/$1', ['as' => 'floor_list']);
    $routes->get('demo_list', '\Modules\Demo\Controllers\Democontroller::index', ['as' => 'demo_list_new']);
    $routes->add('demo_add', '\Modules\Demo\Controllers\Democontroller::demoAdd', ['as' => 'demo_add']);
    $routes->add('demo_edit/(:any)', '\Modules\Demo\Controllers\Democontroller::demoEdit/$1', ['as' => 'demo_edit']);
    $routes->get('demo_delete/(:any)', '\Modules\Demo\Controllers\Democontroller::demoDelete/$1', ['as' => 'demo_delete']);
});