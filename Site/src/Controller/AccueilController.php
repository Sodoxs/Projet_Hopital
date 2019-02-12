<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AccueilController
 * @package App\Controller
 *
 * @Route("/accueil")
 */
class AccueilController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="accueil")
     *
     */
    public function indexAction(Request $request) {

        return $this->render('Accueil/accueil.html.twig');

    }

}