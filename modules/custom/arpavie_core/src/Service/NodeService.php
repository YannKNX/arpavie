<?php
namespace Drupal\arpavie_core\Service;

use Drupal\Core\Database\Query\ConditionInterface;
use Drupal\node\Entity\Node;

/**
 * Permet de gérer les fonctions de manipulation des noeuds
 * 
 * @package Drupal\arpavie_core\Service
 */
class NodeService
{
 
    /**
     * Permet de retourner la requete correspondante en fonction du type
     *
     * @param string $type Type du noeud
     * 
     * @param boolean|null $status
     *
     * @return \Drupal\Core\Database\Query\ConditionInterface
     */
    public function getBaseQuery($type, $status = null)
    {
        $query = \Drupal::database()
            ->select('node', 'n')
            ->fields('n', array('nid'))
            ->condition('n.type', $type);
        
        if ($status != null) {
            $query->leftJoin('node_field_data', 'nd', 'nd.nid = n.nid');
            $query->condition('nd.status', $status);
        }
        return $query;
    }
}
