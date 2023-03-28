<?php

namespace ContainerFIRy672;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_GlobalStateRegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public '.zenstruck_foundry.global_state_registry' shared service.
     *
     * @return \Zenstruck\Foundry\Test\GlobalStateRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Test/GlobalStateRegistry.php';

        return $container->services['.zenstruck_foundry.global_state_registry'] = new \Zenstruck\Foundry\Test\GlobalStateRegistry();
    }
}
