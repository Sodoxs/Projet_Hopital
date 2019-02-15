<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
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
    public function indexAction(EntityManagerInterface $em,Request $request) {

        $traitements = $em-> getRepository('App:Traitement')->findAll();

        return $this->render('Infirmier/infirmier.html.twig',['traitements' => $traitements]);

    }

}