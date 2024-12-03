<?php

namespace ContainerP00i4gF;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrine_Dbal_DefaultConnectionService extends App_KernelProdContainer
{
    /*
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    public static function do($container, $lazyLoad = true)
    {
        $a = new \Doctrine\DBAL\Configuration();

        $b = new \Doctrine\Bundle\DoctrineBundle\Middleware\IdleConnectionMiddleware(($container->privates['doctrine.dbal.connection_expiries'] ??= new \ArrayObject()), ['default' => 600]);
        $b->setConnectionName('default');

        $a->setSchemaManagerFactory(new \Doctrine\DBAL\Schema\LegacySchemaManagerFactory());
        $a->setMiddlewares([$b]);

        $container->services['doctrine.dbal.default_connection'] = $instance = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([], new \Doctrine\DBAL\Tools\DsnParser(['db2' => 'ibm_db2', 'mssql' => 'pdo_sqlsrv', 'mysql' => 'pdo_mysql', 'mysql2' => 'pdo_mysql', 'postgres' => 'pdo_pgsql', 'postgresql' => 'pdo_pgsql', 'pgsql' => 'pdo_pgsql', 'sqlite' => 'pdo_sqlite', 'sqlite3' => 'pdo_sqlite'])))->createConnection(['url' => $container->getEnv('resolve:DATABASE_URL'), 'use_savepoints' => true, 'driver' => 'pdo_mysql', 'idle_connection_ttl' => 600, 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => [], 'defaultTableOptions' => []], $a, ($container->privates['doctrine.dbal.default_connection.event_manager'] ?? $container->load('getDoctrine_Dbal_DefaultConnection_EventManagerService')), []);

        $instance->setNestTransactionsWithSavepoints(true);

        return $instance;
    }
}