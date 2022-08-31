<?php

namespace Drupal\kibana_logs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Log messages into logs.
 */
class LogMessageForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'log_message_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form['log_message'] = [
      '#type' => 'textarea',
      '#title' => t('Message'),
    ];
    $form['log_message_submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save log message'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(
    array &$form,
    FormStateInterface $form_state
  ): void {
    $this->logger('kibana_logs')->info($form_state->getValue('log_message'));
    $this->messenger()->addMessage($this->t('Message logged'));
  }

}
