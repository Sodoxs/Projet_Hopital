<?php
namespace App\Controller;

use App\Entity\Statut;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $statutsAll = $em->getRepository('App:Statut')->findAll();
        return $this->render('Pharmacien/pharmacien.html.twig',['traitements' => $traitements, 'statutAll' => $statutsAll]);

    }

    /**
     * @param Request $request
     * @Route("/statutUp", name="updateStatut")
     * @return JsonResponse
     */
    public function updateStatutAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $idStatut = $request->request->get('id');
        $idTraitement = $request->request->get('trait');

        $traitement = $em->getRepository('App:Traitement')->find($idTraitement);
        $statut = $em->getRepository('App:Statut')->find($idStatut);
        $traitement->setStatut($statut);
        $em->persist($traitement);
        $em->flush();

        return new JsonResponse('ok');

    }
}