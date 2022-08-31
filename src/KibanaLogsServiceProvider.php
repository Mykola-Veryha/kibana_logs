<?php

namespace Drupal\kibana_logs;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\kibana_logs\Logger\CustomLoggerChannelFactory;

/**
 * Modifies services.
 */
class KibanaLogsServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container): void {
    if ($container->hasDefinition('logger.factory')) {
      $definition = $container->getDefinition('logger.factory');
      $definition->setClass(CustomLoggerChannelFactory::class);
    }
  }

}
