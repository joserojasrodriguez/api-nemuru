<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDuv99UC\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDuv99UC/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDuv99UC.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDuv99UC\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDuv99UC\App_KernelDevDebugContainer([
    'container.build_hash' => 'Duv99UC',
    'container.build_id' => 'c16c02f9',
    'container.build_time' => 1633797922,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDuv99UC');
