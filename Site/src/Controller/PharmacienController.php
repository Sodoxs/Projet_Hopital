<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PharmacienController
 * @package App\Controller
 *
 * @Route("/pharmacien")
 */
class PharmacienController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="pharmacien")
     *
     */
    public function indexAction(Request $request) {

        return $this->render('Pharmacien/pharmacien.html.twig');

    }

}