<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pz\WyskoczBundle\Entity\Auth;
use Pz\WyskoczBundle\Form\AuthType;
class AdminController extends Controller
{
    public function authAction()
    {
        //na razie tylko renderujemy plik w którym będzie formularz do logowania
        return $this->renderSignInForm();
    }
    
    
    /* PRIVATE */
    private function renderSignInForm()
    {
        $auth = new Auth();
        $form = $this->createForm(new AuthType(), $auth);
        
        return $this->render(
            'WyskoczBundle:Admin:sign_in.html.twig', array(
            'sign_in' => $form->createView()
        ));
    }    
}
