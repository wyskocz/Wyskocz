<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
    public function indexAction()
    {
        return $content = $this->render(
            'WyskoczBundle:Place:index.html.twig'
        );
    }
}
