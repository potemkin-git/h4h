<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class MainController extends Controller
{

    /**
     * @Route("/", name="landing_page")
     */
    public function number(SessionInterface $session)
    {
        $number = mt_rand(0, 100);

        return $this->render('home.html.twig', array(
            'number' => $number,
        ));
    }


}
