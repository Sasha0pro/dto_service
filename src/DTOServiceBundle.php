<?php

namespace Symfony\Bundle\DTOService;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
class DTOServiceBundle extends AbstractBundle
{
    private array $property;

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
              ->scalarNode('property')->end()
              ->end()
            ->end()
        ;
    }

    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        $this->property = $config;
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getProperty(): string
    {
        return $this->property;
    }
}