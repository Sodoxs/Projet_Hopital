<?php
namespace App\Controller;

use App\Entity\Patient;
use App\Forms\RecherchePatient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

        $patient = new Patient();

        $listPatients = $em->getRepository('App:Patient')->findAll();



        // FORMULAIRE QUI NE MARCHE PAS

        /*
        $form = $this->createForm(RecherchePatient::class)
            ->add('id', ChoiceType::class, [
                'choices' => $listPatients,
                'choice_label' => function($patient, $key, $index) {
                    return $patient->getId();
                },
                'placeholder' => 'Sélectionner un patient',
                'label' => 'Patient : '
            ])
            ->add('send', SubmitType::class, array(
                'label' => 'Récupérer patient'
            ));


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //$patient = $em->getRepository('App:Patient')->findByFirstName($form['nompatient']->getData());
            //$patient = $em->getRepository('App:Patient')->find($form['id']->getData());
            var_dump($patient);

            return $this->redirectToRoute('medecin');
        }
        */

        return $this->render('Medecin/medecin.html.twig', array(
            //'form' => $form->createView(),
            'patients' => $listPatients
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

    /**
     * @return Response
     * @Route("/patient/{id}", name="pagePatient")
     *
     */
    public function pagePatientAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository('App:Patient')->find($id);

        return $this->render('Medecin/pagePatient.html.twig', array(
            'patient' => $patient
        ));
    }

}