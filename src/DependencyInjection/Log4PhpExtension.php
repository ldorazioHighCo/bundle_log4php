<?php

namespace hcnx\hcnx_bundle_symfony\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class Log4PhpExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
//        var_dump($configs);die;
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration,$configs);

        $definition = $container->getDefinition('hcnx_hcnx_bundle.Log4Php');
        $definition->setArgument(0,$config['lib_path']);
        $definition->setArgument(1,$config['config_path']);
//        var_dump($config);die;
    }

    public function getAlias()
    {
        return "log4php";
    }


}