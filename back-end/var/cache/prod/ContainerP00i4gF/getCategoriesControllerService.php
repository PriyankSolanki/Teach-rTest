<?php

namespace ContainerP00i4gF;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoriesControllerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'App\Controller\CategoriesController' shared autowired service.
     *
     * @return \App\Controller\CategoriesController
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['App\\Controller\\CategoriesController'] = $instance = new \App\Controller\CategoriesController();

        $instance->setContainer(($container->privates['.service_locator.ZyP9f7K'] ?? $container->load('get_ServiceLocator_ZyP9f7KService'))->withContext('App\\Controller\\CategoriesController', $container));

        return $instance;
    }
}