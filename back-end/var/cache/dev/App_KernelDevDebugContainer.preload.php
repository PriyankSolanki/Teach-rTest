<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg', 'embed'], true)) {
    return;
}

require dirname(__DIR__, 3).''.\DIRECTORY_SEPARATOR.'vendor/autoload.php';
(require __DIR__.'/App_KernelDevDebugContainer.php')->set(\Container6tiyeJK\App_KernelDevDebugContainer::class, null);
require __DIR__.'/Container6tiyeJK/EntityManagerGhost614a58f.php';
require __DIR__.'/Container6tiyeJK/RequestPayloadValueResolverGhost01ca9cc.php';
require __DIR__.'/Container6tiyeJK/getSession_Handler_NativeService.php';
require __DIR__.'/Container6tiyeJK/getSession_FactoryService.php';
require __DIR__.'/Container6tiyeJK/getServicesResetterService.php';
require __DIR__.'/Container6tiyeJK/getSecrets_VaultService.php';
require __DIR__.'/Container6tiyeJK/getSecrets_EnvVarLoaderService.php';
require __DIR__.'/Container6tiyeJK/getRouting_LoaderService.php';
require __DIR__.'/Container6tiyeJK/getPropertyInfo_SerializerExtractorService.php';
require __DIR__.'/Container6tiyeJK/getErrorControllerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_UuidGeneratorService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_UlidGeneratorService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_Listeners_PdoSessionHandlerSchemaListenerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_Listeners_LockStoreSchemaListenerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_Listeners_DoctrineTokenProviderSchemaListenerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_Listeners_DoctrineDbalCacheAdapterSchemaListenerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Orm_DefaultEntityManagerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Dbal_DefaultConnection_EventManagerService.php';
require __DIR__.'/Container6tiyeJK/getDoctrine_Dbal_DefaultConnectionService.php';
require __DIR__.'/Container6tiyeJK/getDoctrineService.php';
require __DIR__.'/Container6tiyeJK/getDebug_ErrorHandlerConfiguratorService.php';
require __DIR__.'/Container6tiyeJK/getContainer_GetRoutingConditionServiceService.php';
require __DIR__.'/Container6tiyeJK/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/Container6tiyeJK/getContainer_EnvVarProcessorService.php';
require __DIR__.'/Container6tiyeJK/getCache_SystemClearerService.php';
require __DIR__.'/Container6tiyeJK/getCache_SystemService.php';
require __DIR__.'/Container6tiyeJK/getCache_GlobalClearerService.php';
require __DIR__.'/Container6tiyeJK/getCache_AppClearerService.php';
require __DIR__.'/Container6tiyeJK/getCache_AppService.php';
require __DIR__.'/Container6tiyeJK/getTemplateControllerService.php';
require __DIR__.'/Container6tiyeJK/getRedirectControllerService.php';
require __DIR__.'/Container6tiyeJK/getProduitsRepositoryService.php';
require __DIR__.'/Container6tiyeJK/getCategoriesRepositoryService.php';
require __DIR__.'/Container6tiyeJK/getProduitsControllerService.php';
require __DIR__.'/Container6tiyeJK/getCategoriesControllerService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_ZHyJIs5_KernelregisterContainerConfigurationService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_ZHyJIs5_KernelloadRoutesService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_ZHyJIs5Service.php';
require __DIR__.'/Container6tiyeJK/getCategoriesControllerdeleteCategoriesService.php';
require __DIR__.'/Container6tiyeJK/getProduitsControllerupdateProduitsService.php';
require __DIR__.'/Container6tiyeJK/getProduitsControllerdeleteProduitsService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_ZyP9f7KService.php';
require __DIR__.'/Container6tiyeJK/getCategoriesControllergetAllCategoriesService.php';
require __DIR__.'/Container6tiyeJK/getCategoriesControllercreateCategoriesService.php';
require __DIR__.'/Container6tiyeJK/getProduitsControllercreateProduitsService.php';
require __DIR__.'/Container6tiyeJK/getCategoriesControllerupdateCategoriesService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_Jmpjl2iService.php';
require __DIR__.'/Container6tiyeJK/getProduitsControllergetAllProduitsService.php';
require __DIR__.'/Container6tiyeJK/get_ServiceLocator_EmI5tzService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_Doctrine_Orm_EntityValueResolverService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_VariadicService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_SessionService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_ServiceService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_RequestPayloadService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_RequestService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_QueryParameterValueResolverService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_DefaultService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_DatetimeService.php';
require __DIR__.'/Container6tiyeJK/get_Debug_ValueResolver_ArgumentResolver_BackedEnumResolverService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle';
$classes[] = 'Nelmio\CorsBundle\NelmioCorsBundle';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\BackedEnumValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DateTimeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\QueryParameterValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Bridge\Doctrine\ArgumentResolver\EntityValueResolver';
$classes[] = 'Symfony\Bridge\Doctrine\Attribute\MapEntity';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\CategoriesController';
$classes[] = 'App\Controller\ProduitsController';
$classes[] = 'App\Repository\CategoriesRepository';
$classes[] = 'App\Repository\ProduitsRepository';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\CacheAttributeListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\ErrorHandlerConfigurator';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\FileLinkFormatter';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Schema\LegacySchemaManagerFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\DebugMiddleware';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\IdleConnectionMiddleware';
$classes[] = 'Doctrine\DBAL\Tools\DsnParser';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Symfony\Bridge\Doctrine\Middleware\IdleConnection\Listener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Middleware\BacktraceDebugDataHolder';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AttributeDriver';
$classes[] = 'Doctrine\ORM\Proxy\Autoloader';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver';
$classes[] = 'Doctrine\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultTypedFieldMapper';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor';
$classes[] = 'Doctrine\ORM\Tools\AttachEntityListenersListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\DoctrineDbalCacheAdapterSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\RememberMeTokenProviderDoctrineSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\LockStoreSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\PdoSessionHandlerSchemaListener';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UlidGenerator';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\SerializerErrorRenderer';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\HttpKernelRunner';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\ResponseRunner';
$classes[] = 'Symfony\Component\Runtime\SymfonyRuntime';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Kernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Nelmio\CorsBundle\EventListener\CacheableResponseVaryListener';
$classes[] = 'Nelmio\CorsBundle\EventListener\CorsListener';
$classes[] = 'Nelmio\CorsBundle\Options\Resolver';
$classes[] = 'Nelmio\CorsBundle\Options\ConfigProvider';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\PhpStanExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\SerializerExtractor';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AttributeDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AttributeFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\Psr4DirectoryLoader';
$classes[] = 'Symfony\Component\DependencyInjection\StaticEnvVarLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Symfony\Component\Serializer\Serializer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer';
$classes[] = 'Symfony\Component\PropertyAccess\PropertyAccessor';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ProblemNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\UidNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer';
$classes[] = 'Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\FormErrorNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\DataUriNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ArrayDenormalizer';
$classes[] = 'Symfony\Component\Serializer\Normalizer\ObjectNormalizer';
$classes[] = 'Symfony\Component\PropertyInfo\PropertyInfoExtractor';
$classes[] = 'Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata';
$classes[] = 'Symfony\Component\Serializer\Encoder\XmlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\JsonEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\YamlEncoder';
$classes[] = 'Symfony\Component\Serializer\Encoder\CsvEncoder';
$classes[] = 'Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\LoaderChain';
$classes[] = 'Symfony\Component\Serializer\Mapping\Loader\AttributeLoader';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\SessionFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorageFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

$preloaded = Preloader::preload($classes);

$classes = [];
$classes[] = 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator';
$classes[] = 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher';
$preloaded = Preloader::preload($classes, $preloaded);
