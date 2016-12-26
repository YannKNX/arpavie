<?php
namespace Drupal\arpavie_core\Service;

use Drupal\Core\Database\Query\Select;
use Drupal\node\Entity\Node;
use Drupal\arpavie_core\Service\NodeService;

/**
 * Permet de gérer les fonctions de manipulation des carrousels
 * 
 * @package Drupal\arpavie_core\Service
 */
class CarouselService
{
    protected $nodeService;

    /**
     * CarouselService constructor.
     * @param NodeService $nodeService
     */
    public function __construct(NodeService $nodeService)
    {
        $this->nodeService = $nodeService;
    }

    /**
     * Permet de remonter les nodes d'un certain type
     *
     * @param int $maxCount
     * @return array
     */
    public function getCarousels()
    {
        
        $query = $this->nodeService->getBaseQuery('carousel', true);
        $query->fields('n', array('nid'));
        
        $query->leftJoin('node__field_ordre', 'o', 'o.entity_id = n.nid');
        $query->orderBy('o.field_ordre_value', 'ASC');
        
        $results = $query->execute();
        $nids = array();
        foreach ($results->fetchAll(\PDO::FETCH_ASSOC) as $result) {
            $nids[] = $result['nid'];
        }
        return Node::loadMultiple($nids);
    }
}
