<?php

namespace Drupal\adequate_passwords\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Implements a form for general settings on adequate passwords.
 */
class AdequatePasswordsSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['adequate_passwords.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'adequate_passwords_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('adequate_passwords.settings');

    $form['strength'] = [
      '#type' => 'select',
      '#title' => $this->t('Minimum password strength'),
      '#default_value' => $config->get('strength'),
      '#options' => [
        80 => $this->t('Strong'),
        70 => $this->t('Good'),
        60 => $this->t('Fair'),
        0 => $this->t('Do not check strength'),
      ],
      '#description' => $this->t('This module matches the built-in password suggestions from Drupal and allows it to be required.'),
    ];

    $options = [];
    $roles = \Drupal::entityTypeManager()->getStorage('user_role')->loadMultiple();
    foreach ($roles as $role) {
      $options[$role->id()] = $role->label();
    }
    unset($options[AccountInterface::ANONYMOUS_ROLE]);
    $form['roles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Apply to roles'),
      '#description' => $this->t('Select Roles to which this policy applies.'),
      '#default_value' => (array) $config->get('roles'),
      '#options' => $options,
      '#multiple' => TRUE,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('adequate_passwords.settings')
      ->set('strength', $form_state->getValue('strength'))
      ->set('roles', array_filter($form_state->getValue('roles')))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
