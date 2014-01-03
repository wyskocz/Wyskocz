<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction() {
        
        return $content = $this->render(
            'WyskoczBundle:Default:index.html.twig'
        );
        
    }
}
