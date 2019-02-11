<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 *
 * @Route("/")
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     *
     */
    public function indexAction(Request $request) {

        $locale = $request->getLocale();

        return $this->render('base.html.twig', array('locale' => $locale));

    }

}