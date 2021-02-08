<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/categoria/addCategoria' => [[['_route' => 'categoriaaddCategoria', '_controller' => 'App\\Controller\\CategoriaController::addCategoria'], null, ['POST' => 1], null, false, false, null]],
        '/categoria/getCategorias' => [[['_route' => 'categoriagetCategorias', '_controller' => 'App\\Controller\\CategoriaController::getCategorias'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/contacto/addContacto' => [[['_route' => 'contactoaddContacto', '_controller' => 'App\\Controller\\ContactoController::addContacto'], null, ['POST' => 1], null, false, false, null]],
        '/contacto/getContactos' => [[['_route' => 'contactogetContactos', '_controller' => 'App\\Controller\\ContactoController::getContactos'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/proyecto/addProyecto' => [[['_route' => 'proyectoaddProyecto', '_controller' => 'App\\Controller\\ProyectoController::addProyecto'], null, ['POST' => 1], null, false, false, null]],
        '/proyecto/getProyectos' => [[['_route' => 'proyectogetProyectos', '_controller' => 'App\\Controller\\ProyectoController::getProyectos'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['POST' => 0], null, false, false, null]],
        '/usuario/addUsuario' => [[['_route' => 'usuarioaddUsuario', '_controller' => 'App\\Controller\\UsuarioController::addUsuario'], null, ['POST' => 1], null, false, false, null]],
        '/usuario/getUsuarios' => [[['_route' => 'usuariogetUsuarios', '_controller' => 'App\\Controller\\UsuarioController::getUsuarios'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/c(?'
                    .'|ategoria/(?'
                        .'|getCategoria/([^/]++)(*:80)'
                        .'|updateCategoria/([^/]++)(*:111)'
                        .'|deleteCategoria/([^/]++)(*:143)'
                    .')'
                    .'|ontacto/(?'
                        .'|getContacto(?'
                            .'|/([^/]++)(*:186)'
                            .'|sEntreDosFechas/([^/]++)/([^/]++)(*:227)'
                        .')'
                        .'|updateContacto/([^/]++)(*:259)'
                        .'|deleteContacto/([^/]++)(*:290)'
                    .')'
                .')'
                .'|/proyecto/(?'
                    .'|getProyecto(?'
                        .'|/([^/]++)(*:336)'
                        .'|s(?'
                            .'|MenorTiempo/([^/]++)(*:368)'
                            .'|ConCategoria/([^/]++)(*:397)'
                        .')'
                    .')'
                    .'|updateProyecto/([^/]++)(*:430)'
                    .'|deleteProyecto/([^/]++)(*:461)'
                .')'
                .'|/usuario/(?'
                    .'|getUsuario(?'
                        .'|/([^/]++)(*:504)'
                        .'|sPorFecha/([^/]++)(*:530)'
                    .')'
                    .'|updateUsuario/([^/]++)(*:561)'
                    .'|deleteUsuario/([^/]++)(*:591)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        80 => [[['_route' => 'categoriagetCategoria', '_controller' => 'App\\Controller\\CategoriaController::getCategoria'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        111 => [[['_route' => 'categoriaupdateCategoria', '_controller' => 'App\\Controller\\CategoriaController::editCategoria'], ['id'], ['POST' => 0, 'PUT' => 1], null, false, true, null]],
        143 => [[['_route' => 'categoriadeleteCategoria', '_controller' => 'App\\Controller\\CategoriaController::deleteCategoria'], ['id'], ['POST' => 0, 'DELETE' => 1], null, false, true, null]],
        186 => [[['_route' => 'contactogetContacto', '_controller' => 'App\\Controller\\ContactoController::getContacto'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        227 => [[['_route' => 'contactogetContactosEntreDosFechas', '_controller' => 'App\\Controller\\ContactoController::getContactosEntreDosFechas'], ['fecha1', 'fecha2'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        259 => [[['_route' => 'contactoupdateContacto', '_controller' => 'App\\Controller\\ContactoController::editContacto'], ['id'], ['POST' => 0, 'PUT' => 1], null, false, true, null]],
        290 => [[['_route' => 'contactodeleteContacto', '_controller' => 'App\\Controller\\ContactoController::deleteContacto'], ['id'], ['POST' => 0, 'DELETE' => 1], null, false, true, null]],
        336 => [[['_route' => 'proyectogetProyecto', '_controller' => 'App\\Controller\\ProyectoController::getProyecto'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        368 => [[['_route' => 'proyectogetProyectosMenorTiempo', '_controller' => 'App\\Controller\\ProyectoController::getProyectosConTiempoEstimadoMenor'], ['tiempo'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        397 => [[['_route' => 'proyectogetProyectosConCategoria', '_controller' => 'App\\Controller\\ProyectoController::getProyectosConCategoria'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        430 => [[['_route' => 'proyectoupdateProyecto', '_controller' => 'App\\Controller\\ProyectoController::editProyecto'], ['id'], ['POST' => 0, 'PUT' => 1], null, false, true, null]],
        461 => [[['_route' => 'proyectodeleteProyecto', '_controller' => 'App\\Controller\\ProyectoController::deleteProyecto'], ['id'], ['POST' => 0, 'DELETE' => 1], null, false, true, null]],
        504 => [[['_route' => 'usuariogetUsuario', '_controller' => 'App\\Controller\\UsuarioController::getUsuario'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        530 => [[['_route' => 'usuariogetUsuariosPorFecha', '_controller' => 'App\\Controller\\UsuarioController::getUsuariosPorDia'], ['fecha'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        561 => [[['_route' => 'usuarioupdateUsuario', '_controller' => 'App\\Controller\\UsuarioController::editUsuario'], ['id'], ['POST' => 0, 'PUT' => 1], null, false, true, null]],
        591 => [
            [['_route' => 'usuariodeleteUsuario', '_controller' => 'App\\Controller\\UsuarioController::deleteUsuario'], ['id'], ['POST' => 0, 'DELETE' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
