<?php

namespace Ihsan\SimpleAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class IhsanSimpleAdminExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('ihsan.simple_admin.app_title', $config['app_title']);
        $container->setParameter('ihsan.simple_admin.per_page', $config['per_page']);
        $container->setParameter('ihsan.simple_admin.menu', $config['menu']);
        $container->setParameter('ihsan.simple_admin.identifier', $config['identifier']);
        $container->setParameter('ihsan.simple_admin.filter', $config['filter']);
        $container->setParameter('ihsan.simple_admin.date_time_format', $config['date_time_format']);
        $container->setParameter('ihsan.simple_admin.translation_domain', $config['translation_domain']);
        $container->setParameter('ihsan.simple_admin.themes.dashboard', $config['themes']['dashboard']);
        $container->setParameter('ihsan.simple_admin.themes.form_theme', $config['themes']['form_theme']);
        $container->setParameter('ihsan.simple_admin.themes.pagination', $config['themes']['pagination']);
        $container->setParameter('ihsan.simple_admin.security.user_form', $config['security']['user']['form_class']);
        $container->setParameter('ihsan.simple_admin.security.user_entity', $config['security']['user']['entity_class']);

        $action = array();
        if ($config['per_page']['show']) {
            array_push($action, 'show');
        }
        if ($config['per_page']['edit']) {
            array_push($action, 'edit');
        }
        if ($config['per_page']['delete']) {
            array_push($action, 'delete');
        }

        $container->setParameter('ihsan.simple_admin.grid_action', $action);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
