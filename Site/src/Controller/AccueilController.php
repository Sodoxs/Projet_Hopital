<?php
namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Lit;
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
        $patients = $em->getRepository('App:Patient')->findBy(array(),array('nompatient' => 'desc'));

        $patient = new Patient();
        $patient->setDateentree(new \DateTime());
        $patient->setEtaturgence('F');

        $lit = $em->getRepository('App:Lit')->findOneBy(['patient' => null]);
        $patient->setLit($lit);

        $form = $this->createForm(AjoutPatient::class, $patient, array(
            'method' => 'POST'
        ));
        $form->add('submit', SubmitType::class, array('label' => 'Ajouter Patient',
            'attr' => array(
                'class' => "btn btn-contact",
            )));
        if ($request->isMethod('POST'))
        {
            $civ = $patient->getCivilite();
            dump($civ);
            if ($patient->getCivilite()=="0"){
                $patient->setCivilite('H');
            } else {
                $patient->setCivilite('F');
            }

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                $em->persist($patient);
                $em->flush();

                $this->addFlash('info', "Le patient a bien été ajouté !");
                return $this->redirectToRoute('accueil'); // appel ajax to refresh
            }
        }
        return $this->render('Accueil/accueil.html.twig', array('form' => $form->createView(), $patients));
    }

}