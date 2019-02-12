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

        if (true === $authChecker->isGranted('ROLE_MEDECIN')) {
            return $this->redirectToRoute('medecin');
        }
        if (true === $authChecker->isGranted('ROLE_ACCUEIL')) {
            return $this->redirectToRoute('accueil');
        }
        if (true === $authChecker->isGranted('ROLE_PHARMACIEN')) {
            return $this->redirectToRoute('pharmacien');
        }
        if (true === $authChecker->isGranted('ROLE_INFIRMIER')) {
            return $this->redirectToRoute('infirmier');
        }
        if (true === $authChecker->isGranted('ROLE_GESTIONNAIRE')) {
            return $this->redirectToRoute('gestionnaire');
        }
        return $this->render('base.html.twig');

    }

}