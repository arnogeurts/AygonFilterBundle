<?php

namespace Aygon\FilterBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class AddFilterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('filter')) {
            return;
        }

        $definition = $container->getDefinition('filter');
        foreach ($container->findTaggedServiceIds('filter') as $id => $attributes) {
            $definition->addMethodCall('addFilter', array(new Reference($id)));
        }
    }
}
