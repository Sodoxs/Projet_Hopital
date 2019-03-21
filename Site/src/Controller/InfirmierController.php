<?php
namespace App\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class InfirmierController
 * @package App\Controller
 *
 * @Route("/infirmier")
 */
class InfirmierController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="infirmier")
     *
     */
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $traitements = $em-> getRepository('App:Traitement')->findByPatient(8);

        return $this->render('Infirmier/infirmier.html.twig',['traitements' => $traitements]);

    }

}