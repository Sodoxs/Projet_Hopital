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
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $patient = new Patient();
        $patient->setNompatient("");
        $patient->setPrenompatient("");
        $patient->setDatenaissance(new \DateTime());
        $patient->setCivilite("");
        $patient->setNivurgence(0);
        $patient->setEtaturgence(0);
        $form = $this->createForm(AjoutPatient::class, $patient);
        $form->add('submit', SubmitType::class, array('label' => 'Ajouter Patient',
            'attr' => array(
                'class' => "btn btn-contact background-color-orange-lacces waves-effect",
                )));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $patient->setDateentree(new \DateTime());
            $em->persist($patient);
            $em->flush();

            $this->addFlash('info', "Le patient a bien été ajouté !");
            return $this->redirectToRoute('home');
        }
        return $this->render('Accueil/accueil.html.twig', array('form' => $form->createView()));
    }

}