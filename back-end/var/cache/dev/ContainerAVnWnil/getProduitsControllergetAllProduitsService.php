<?php

namespace ContainerAVnWnil;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProduitsControllergetAllProduitsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.G67Y8Do.App\Controller\ProduitsController::getAllProduits()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.G67Y8Do.App\\Controller\\ProduitsController::getAllProduits()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'produitsRepository' => ['privates', 'App\\Repository\\ProduitsRepository', 'getProduitsRepositoryService', true],
            'serializer' => ['privates', 'serializer', 'getSerializerService', false],
        ], [
            'produitsRepository' => 'App\\Repository\\ProduitsRepository',
            'serializer' => '?',
        ]))->withContext('App\\Controller\\ProduitsController::getAllProduits()', $container);
    }
}
