<?php
namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Medicament;
use App\Forms\AjoutCommande;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class GestionnaireController
 * @package App\Controller
 *
 * @Route("/gestionnaire")
 * @IsGranted("ROLE_GESTIONNAIRE")
 */
class GestionnaireController extends AbstractController
{
    /**
     * @param Request $request
     * @param EntityManager $em
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @Route("/", name="gestionnaire")
     */
    public function indexAction(Request $request, EntityManagerInterface $em) {

        $stocks = $em->getRepository('App:Commande')->findAll();
        $commande = new Commande();
        $medicaments = $em->getRepository('App:Medicament')->findAll();

        $form = $this->createForm(AjoutCommande::class, $commande);

        $form->add('idmedicaments', ChoiceType::class, [
            'choices' => $medicaments,
            'choice_label' => function($medeicament, $key, $index){
                return $medeicament->getNommedicament();
            },
            'placeholder' => 'Selectionner un mot'
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($commande);
            $em->flush();


            $this->addFlash('info', "La commande a bien été ajouté !");
            return $this->redirectToRoute('gestionnaire');
        }

        return $this->render('Gestionnaire/gestionnaire.html.twig', array(
            'form' => $form->createView(),
            'stocks' => $stocks
        ));
    }

}