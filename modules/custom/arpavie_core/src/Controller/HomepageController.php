<?php

namespace Drupal\arpavie_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Renderer;
use Drupal\Core\Site\Settings;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Drupal\arpavie_core\Form\ResidenceSearchForm;

/**
 * Page d'accueil de l'application
 */
class HomepageController extends ControllerBase
{
    
    /**
     * Fonction permettant de récupérer les widgets de la homepage
     *
     * @return Response
     */
    public function indexAction()
    {
        $searchResidenceForm = \Drupal::formBuilder()->getForm(ResidenceSearchForm::class);
        $carouselService = \Drupal::service('arpavie_core.carousel_service');
        $carouselList = $carouselService->getCarousels();
        
        return array(
            '#theme' => 'home',
            '#carouselList' => $carouselList,
            '#searchResidenceForm' => $searchResidenceForm,
        );
    }
}
