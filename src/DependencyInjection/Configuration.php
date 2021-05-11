<?php


namespace hcnx\hcnx_bundle_symfony\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuidler = new TreeBuilder('log4php');
        $rootNode = $treeBuidler->getRootNode();

        $rootNode
            ->children()
                ->variableNode('lib_path')->info('Chemin du fichier des logs du projet')->end()
                ->variableNode('config_path')->info('Chemin du logger log4php')->end()
            ->end()
        ;

        return $treeBuidler;
    }

}