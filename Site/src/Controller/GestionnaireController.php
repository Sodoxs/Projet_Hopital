<?php
namespace App\Controller;

use App\Forms\AjoutCommande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class GestionnaireController
 * @package App\Controller
 *
 * @Route("/gestionnaire")
 */
class GestionnaireController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="gestionnaire")
     *
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        #$patient = $em->getRepository('App:quelquechose')->find($id);

        $form = $this->createForm(AjoutCommande::class/*, $commande*/);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            #$patient->setquelquechose(new \DateTime('now'));
            #$em->persist($patient);
            #$em->flush();

            $this->addFlash('info', "La commande a bien été ajouté !");
            return $this->redirectToRoute('home');
        }

        return $this->render('Gestionnaire/gestionnaire.html.twig', array(
            'form' => $form->createView(),
            #'patient' => $patient
        ));
    }

}