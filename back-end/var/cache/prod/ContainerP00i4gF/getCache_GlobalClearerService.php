<?php

namespace ContainerP00i4gF;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_GlobalClearerService extends App_KernelProdContainer
{
    /*
     * Gets the public 'cache.global_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['cache.global_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.app' => ($container->services['cache.app'] ?? $container->load('getCache_AppService')), 'cache.system' => ($container->services['cache.system'] ?? $container->load('getCache_SystemService')), 'cache.serializer' => ($container->privates['cache.serializer'] ?? self::getCache_SerializerService($container)), 'cache.property_info' => ($container->privates['cache.property_info'] ?? self::getCache_PropertyInfoService($container)), 'doctrine.result_cache_pool' => ($container->privates['doctrine.result_cache_pool'] ?? $container->load('getDoctrine_ResultCachePoolService')), 'doctrine.system_cache_pool' => ($container->privates['doctrine.system_cache_pool'] ?? $container->load('getDoctrine_SystemCachePoolService')), 'cache.property_access' => ($container->privates['cache.property_access'] ?? self::getCache_PropertyAccessService($container))]);
    }
}
