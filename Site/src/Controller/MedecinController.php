<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class MedecinController
 * @package App\Controller
 *
 * @Route("/medecin")
 */
class MedecinController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="medecin")
     *
     */
    public function indexAction(Request $request) {

        return $this->render('Medecin/medecin.html.twig');

    }

}