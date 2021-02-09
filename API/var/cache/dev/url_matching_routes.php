<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/addCity' => [[['_route' => 'addCity', '_controller' => 'App\\Controller\\CityController::addCity'], null, ['POST' => 0], null, false, false, null]],
        '/getCities' => [[['_route' => 'getCities', '_controller' => 'App\\Controller\\CityController::getCities'], null, ['GET' => 0], null, false, false, null]],
        '/addUser' => [[['_route' => 'addUser', '_controller' => 'App\\Controller\\UserController::addUser'], null, ['POST' => 0], null, false, false, null]],
        '/getUsers' => [[['_route' => 'getUsers', '_controller' => 'App\\Controller\\UserController::getUsers'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/get(?'
                    .'|City/([^/]++)(*:62)'
                    .'|User/([^/]++)(*:82)'
                .')'
                .'|/update(?'
                    .'|City/([^/]++)(*:113)'
                    .'|User/([^/]++)(*:134)'
                .')'
                .'|/delete(?'
                    .'|City/([^/]++)(*:166)'
                    .'|User/([^/]++)(*:187)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        62 => [[['_route' => 'getCity', '_controller' => 'App\\Controller\\CityController::getCity'], ['idCity'], ['GET' => 0], null, false, true, null]],
        82 => [[['_route' => 'getUser', '_controller' => 'App\\Controller\\UserController::getUsr'], ['idUser'], ['GET' => 0], null, false, true, null]],
        113 => [[['_route' => 'updateCity', '_controller' => 'App\\Controller\\CityController::editCity'], ['idCity'], ['PUT' => 0], null, false, true, null]],
        134 => [[['_route' => 'updateUser', '_controller' => 'App\\Controller\\UserController::editUser'], ['idUser'], ['PUT' => 0], null, false, true, null]],
        166 => [[['_route' => 'deleteCity', '_controller' => 'App\\Controller\\CityController::deleteCity'], ['idCity'], ['DELETE' => 0], null, false, true, null]],
        187 => [
            [['_route' => 'deleteUser', '_controller' => 'App\\Controller\\UserController::deleteUser'], ['idUser'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
