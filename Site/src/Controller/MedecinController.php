<?php
namespace App\Controller;

use App\Entity\Patient;
use App\Forms\RecherchePatient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        $em = $this->getDoctrine()->getManager();
        $patients = $em->getRepository('App:Patient')->findAll();

        $form = $this->createForm(RecherchePatient::class);
        $form
            ->add('patients', EntityType::class, [
            'class' => Patient::class,
            'choice_label' => 'nompatient',
        ])
            ->add('submit', SubmitType::class, array(
            'label' => '+'
            ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /*$patient->setquelquechose(new \DateTime('now'));
            $em->persist($patient);
            $em->flush();
            $this->addFlash('info', "Le patient a bien été ajouté !");*/

            return $this->redirectToRoute('home');
        }

        return $this->render('Medecin/medecin.html.twig', array(
            'form' => $form->createView(),
            /*'patient' => $patient*/
        ));
    }

    /**
     * @return Response
     * @Route("/", name="auto_complete")
     *
     */
    public function autoCompleteAction(Request $request){
        if ($request -> isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();
            $word = $request->request->get('word');
            $words = $em->getRepository('App:Patient')->findByFirstName($word . "%");


            return new JsonResponse(array('words' => $words));
            //return new JsonResponse(array('wordsFr'=>$wordsFr, 'wordsEn'=>$wordsEn));

        }
        return $this->redirectToRoute('home');
    }

}