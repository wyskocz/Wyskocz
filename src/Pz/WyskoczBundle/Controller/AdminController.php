<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pz\WyskoczBundle\Entity\Auth;
use Pz\WyskoczBundle\Form\AuthType;
use Symfony\Component\HttpFoundation\Request;



class AdminController extends Controller
{
    public function viewDashboardAction()
    {
        return $this->render(
            'WyskoczBundle:Admin:dashboard.html.twig'
        );
    }
}
