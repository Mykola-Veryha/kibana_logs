<?php

namespace Drupal\kibana_logs\Logger;

use Drupal\Core\Logger\LoggerChannelFactory;

/**
 * Defines a factory for logging channels.
 */
class CustomLoggerChannelFactory extends LoggerChannelFactory {

  /**
   * {@inheritdoc}
   */
  public function get($channel) {
    if (!isset($this->channels[$channel])) {
      $instance = new CustomLoggerChannel($channel);
      if ($this->container) {
        $instance->setRequestStack($this->container->get('request_stack'));
        $instance->setCurrentUser($this->container->get('current_user'));
      }

      // Pass the loggers to the channel.
      $instance->setLoggers($this->loggers);
      $this->channels[$channel] = $instance;
    }

    return $this->channels[$channel];
  }

}
