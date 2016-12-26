<?php

namespace Drupal\arpavie_core\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ResidenceSearchForm extends FormBase
{

    /**
     * Returns a unique string identifying the form.
     *
     * @return string
     *   The unique string identifying the form.
     */
    public function getFormId()
    {
        return 'residence_search_form';
    }

    /**
     * Form submission handler.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param FormStateInterface $form_state
     *   An associative array containing the current state of the form.
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // Empty implementation of the abstract submit class.
    }

    /**
     * Define the form used for LotOption settings.
     * @return array
     *   Form definition array.
     *
     * @param array $form
     *   An associative array containing the structure of the form.
     * @param FormStateInterface $form_state
     *   An associative array containing the current state of the form.
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $taxoService = \Drupal::service('arpavie_core.taxonomy_service');
        $types = $taxoService->getTermsByVocabularyName('residence_type');

        $typeOptions = [];
        
        foreach($types as $type) {
            $typeOptions[$type->tid] = $type->name ;
        }
        
        $form['type'] = [
            '#type' => 'select',
            '#required' => false,
            '#options' => $typeOptions,
            '#title' => $this->t('Type de résidence')
        ];
        
        $form['place'] = [
            '#type' => 'textfield',
            '#required' => false,
            '#size' => 60,
            '#title' => $this->t("Votre adresse"),
            '#form_placeholder' => true
        ];
        
//        $form['lat'] = [
//            '#type' => 'hidden',
//            '#required' => false,
//            '#value' => "",
//        ];
//        
//        $form['lng'] = [
//            '#type' => 'hidden',
//            '#required' => false,
//            '#value' => "",
//        ];
        
        return $form;
    }
}
