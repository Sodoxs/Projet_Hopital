<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Class PharmacienController
 * @package App\Controller
 *
 * @Route("/pharmacien")
 * @IsGranted("ROLE_PHARMACIEN")
 */
class PharmacienController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="pharmacien")
     *
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $traitements = $em->getRepository('App:Traitement')->findBycomposer(1);

        return $this->render('Pharmacien/pharmacien.html.twig',['traitements' => $traitements]);

    }

}