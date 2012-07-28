<?php

namespace Aygon\FilterBundle;

use Aygon\FilterBundle\DependencyInjection\Compiler\AddFilterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Arno Geurts
 */
class AygonFilterBundle extends Bundle
{
    /**
     * Add filter compiler pass to the container builder
     * 
     * @param ContainerBuilder $container 
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new AddFilterPass());
    }
}
