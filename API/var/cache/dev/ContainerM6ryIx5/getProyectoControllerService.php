<?php

namespace ContainerM6ryIx5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProyectoControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ProyectoController' shared autowired service.
     *
     * @return \App\Controller\ProyectoController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'ProyectoController.php';

        $container->services['App\\Controller\\ProyectoController'] = $instance = new \App\Controller\ProyectoController(($container->privates['App\\Repository\\ProyectoRepository'] ?? $container->load('getProyectoRepositoryService')));

        $instance->setContainer(($container->privates['.service_locator.5nX7ca3'] ?? $container->load('get_ServiceLocator_5nX7ca3Service'))->withContext('App\\Controller\\ProyectoController', $container));

        return $instance;
    }
}
