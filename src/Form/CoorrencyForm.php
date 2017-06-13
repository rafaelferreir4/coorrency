<?php

namespace Drupal\coorrency\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * ConfigFormBase lets us use $this->config to retrieve the module's configuration.
 */
class CoorrencyForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'coorrency_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Form constructor.
    $form = parent::buildForm($form, $form_state);
    // Default settings.
    $config = $this->config('coorrency.settings');

    $form['api'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('API Settings'),
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    ];

    $form['api']['ajax'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use AJAX?'),
      '#default_value' => $config->get('coorrency.ajax'),
      '#description' => $this->t('If this option is not selected, the form will redirect the page to /coorrency/convert/{from}/{to}'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('coorrency.settings');
    $config->set('coorrency.ajax', $form_state->getValue('ajax'));
    $config->save();

    return parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    // This function returns the name of the settings files we will create/use.
    return [
      'coorrency.settings',
    ];
  }

}
