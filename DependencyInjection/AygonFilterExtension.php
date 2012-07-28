<?php

namespace Aygon\FilterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AygonFilterExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $this->setConfig($config, $container, $this->getAlias());
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('filters.yml');
    }

    /**
     * Set configuration recursive in container
     * 
     * @param type $config
     * @param ContainerBuilder $container
     * @param type $prefix 
     */
    private function setConfig($config, ContainerBuilder $container, $prefix)
    {
        foreach ($config as $key => $value) {
            $id = $prefix . '.' . $key;
            
            if (is_array($value)) {
                $this->setConfig($value, $container, $id);
            } else {
                $container->setParameter($id, $value);
            }
        }
    }
}
