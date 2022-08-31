<?php

namespace Drupal\kibana_logs\Logger;

use Drupal\Core\Logger\LoggerChannel;

/**
 * Defines a logger channel that most implementations will use.
 */
class CustomLoggerChannel extends LoggerChannel {

  /**
   * {@inheritdoc}
   */
  public function log($level, $message, array $context = []) {
    // Kibana splits a message into multiple messages by new lines.
    $message_without_new_lines = preg_replace('/\s+/', ' ', $message);
    parent::log($level, $message_without_new_lines, $context);
  }

}
