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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


/**
 * Class MedecinController
 * @package App\Controller
 *
 * @Route("/medecin")
 * @IsGranted("ROLE_MEDECIN")
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
     * @Route("/recherche", name="auto_complete")
     *
     */
    public function autoCompleteAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $word = $request->get('word');
        $patients = $em->getRepository('App:Patient')->findByFirstName("%" . $word . "%");
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizer = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizer, $encoders);
        $jsonContent = $serializer->serialize($patients,'json');

        return new JsonResponse($jsonContent);
    }

    /**
     * @return Response
     * @Route("/patient/{id}", name="pagePatient")
     *
     */
    public function pagePatientAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $patient = $em->getRepository('App:Patient')->find($id);

        $traitements = $em->getRepository('App:Traitement')->findByPatient($id);

        //$traitement = $em->getRepository('App:Traitement')->findById(1);
        $medicaments = $em->getRepository('App:Medicament')->findAll();

        return $this->render('Medecin/pagePatient.html.twig', array(
            'patient' => $patient,
            'traitements' => $traitements,
            'medicament' => $medicaments
        ));
    }

}