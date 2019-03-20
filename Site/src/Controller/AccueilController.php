<?php
namespace App\Controller;

use App\Entity\Patient;
use App\Forms\AjoutPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $patient = new Patient();
        $patient->setDatenaissance(new \DateTime());

        $form = $this->createForm(AjoutPatient::class, null, array(
            'method' => 'POST'
        ));
        $form->add('submit', SubmitType::class, array('label' => 'Ajouter Patient',
            'attr' => array(
                'class' => "btn btn-contact",
            )));
        if ($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                $data = $form->getData();
                /*if ($data['civilite'] == 0) {
                    $patient->setCivilite('M');
                } else {
                    $patient->setCivilite('F');
                }*/
                $patient->setPrenompatient($data['prenompatient']);
                /*$patient->setNompatient($data['nompatient']);
                $patient->setDatenaissance($data['datenaissance']);
                $patient->setAdresse($data['adresse']);
                $patient->setNumsecu($data['numsecu']);
                $patient->setNummutuelle($data['nummutuelle']);
                $patient->setTelephone($data['telephone']);
                $patient->setNivurgence($data['nivurgence']);*/
                $em->persist($patient);
                $em->flush();

                $this->addFlash('info', "Le patient a bien été ajouté !");
                return $this->redirectToRoute('home'); // appel ajax to refresh
            }
        }
        return $this->render('Accueil/accueil.html.twig', array('form' => $form->createView()));
    }

}