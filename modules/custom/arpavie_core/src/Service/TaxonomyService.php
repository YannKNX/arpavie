<?php
namespace Drupal\arpavie_core\Service;

/**
 * Permet de gérer les fonctions de manipulation des taxnomies
 * 
 * @package Drupal\arpavie_core\Service
 */
class TaxonomyService
{
    /**
     * Recupère les terms en fonction du machine name du vocabulaire
     * 
     * @param string $name
     * @return array
     */
    public function getTermsByVocabularyName($name)
    {
        $vIdsArr = \Drupal\taxonomy\Entity\Vocabulary::loadMultiple();
        $vocabularyObj = $vIdsArr[$name];
        $container = \Drupal::getContainer();
        return $container->get('entity.manager')->getStorage('taxonomy_term')->loadTree($vocabularyObj->id());        
    }
}
