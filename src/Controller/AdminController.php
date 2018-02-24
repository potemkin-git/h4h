<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class AdminController extends Controller
{

    /**
     * @Route("/admin/master")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }


}
