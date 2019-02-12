<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

/**
 * Class HomeController
 * @package App\Controller
 *
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     *
     */
    public function indexAction(Request $request, AuthorizationCheckerInterface $authChecker) {

        // REDIRECTION VERS LES PAGES RESPECTIVES AU ROLE DE L'UTILISATEUR
        if (true === $authChecker->isGranted('ROLE_MEDECIN')) {
            return $this->redirectToRoute('medecin');
        }
        else if (true === $authChecker->isGranted('ROLE_ACCUEIL')) {
            return $this->redirectToRoute('accueil');
        }
        else if (true === $authChecker->isGranted('ROLE_PHARMACIEN')) {
            return $this->redirectToRoute('pharmacien');
        }
        else if (true === $authChecker->isGranted('ROLE_INFIRMIER')) {
            return $this->redirectToRoute('infirmier');
        }
        else if (true === $authChecker->isGranted('ROLE_GESTIONNAIRE')) {
            return $this->redirectToRoute('gestionnaire');
        }

        // SINON IL FAUT SE CONNECTER
        else {
            return $this->redirectToRoute('app_login');
        }
    }

}