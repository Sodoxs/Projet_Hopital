<?php
namespace App\Controller;

use App\Forms\AjoutPatient;
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

        $em = $this->getDoctrine()->getManager();
        /*$patient = new Patient();*/

        $form = $this->createForm(AjoutPatient::class/*, $patient*/);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /*$patient->setquelquechose(new \DateTime('now'));
            $em->persist($patient);
            $em->flush();*/

            $this->addFlash('info', "Le patient a bien été ajouté !");
            return $this->redirectToRoute('home');
        }

        return $this->render('Accueil/accueil.html.twig', array(
            'form' => $form->createView(),
            /*'patient' => $patient*/
        ));

    }

}