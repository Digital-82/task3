<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFIRy672\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFIRy672/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerFIRy672.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerFIRy672\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerFIRy672\App_KernelDevDebugContainer([
    'container.build_hash' => 'FIRy672',
    'container.build_id' => '74c211ec',
    'container.build_time' => 1680036824,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFIRy672');