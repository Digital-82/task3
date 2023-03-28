<?php

namespace ContainerFIRy672;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_CachePoolList_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.console.command.cache_pool_list.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.console.command.cache_pool_list.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('cache:pool:list', [], 'List available cache pools', false, #[\Closure(name: 'console.command.cache_pool_list', class: 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolListCommand')] function () use ($container): \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand {
            return ($container->privates['console.command.cache_pool_list'] ?? $container->load('getConsole_Command_CachePoolListService'));
        });
    }
}
