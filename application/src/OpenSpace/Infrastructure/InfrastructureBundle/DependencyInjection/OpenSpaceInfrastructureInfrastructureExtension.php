<?php

namespace OpenSpace\Infrastructure\InfrastructureBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 */
class OpenSpaceInfrastructureInfrastructureExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        // Domain
        $loader->load('domain/command_handlers.yml');
        $loader->load('domain/repositories.yml');

        // Data
        $loader->load('query/repositories.yml');
        $loader->load('query/event_handlers.yml');
    }
}