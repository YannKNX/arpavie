<?php

/**
 * @file
 * Contains \Drupal\arpavie_core\Form\ArpavieSettingsForm
 */

namespace Drupal\arpavie_core\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Description of ArpavieSettingsForm
 *
 * @author Yann ZHAO <rzhao@kernix.com>
 */
class ArpavieSettingsForm extends ConfigFormBase
{

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'arpavie_admin_settings';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return [
            'arpavie.settings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('arpavie.settings');

        $form['google_api_key'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Google api key'),
            '#default_value' => $config->get('google_api_key'),
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $config = \Drupal::service('config.factory')->getEditable('arpavie.settings');
        $config->set('google_api_key', $form_state->getValue('google_api_key'))
            ->save();

        parent::submitForm($form, $form_state);
    }
}
