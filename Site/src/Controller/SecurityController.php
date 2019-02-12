<?php
/**
 * Created by PhpStorm.
 * User: tbraul01
 * Date: 12/12/2018
 * Time: 18:35
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 *
 * @Route("/")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     *
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return Response
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUserName = $authUtils->getLastUsername();

        return $this->render('Security/login.html.twig', array(
            'last_username' => $lastUserName,
            'error' => $error,
        ));
    }

    /**
     * @Route("login_check", name="app_login_check")
     * @throws \Exception
     */
    public function loginCheckAction()
    {
        throw new \Exception('Unexpected loginCheck action');
    }

    /**
     * @Route("logout", name="app_logout")
     * @throws \Exception
     */
    public function logoutAction()
    {
        throw new \Exception('Unexpected logout action');
    }
}