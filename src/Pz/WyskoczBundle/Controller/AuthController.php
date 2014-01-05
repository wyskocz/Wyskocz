<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{ 
    public function authCheckAction() {
        $request = $this->getRequest();
        $session = $request->getSession();
        
        if($session->get('role') == "ROLE_ADMIN")
            return $this->redirect($this->generateUrl('admin_dashboard'));
        
        $userData['username'] = $request->request->get("_username");
        $userData['password'] = $request->request->get("_password");
        if($userData['username'] == 'admin' && $userData['password'] == '123')
        {
            $session->set('role', 'ROLE_ADMIN');
            return $this->redirect($this->generateUrl('admin_dashboard'));
        }
        
        return $this->render('WyskoczBundle:Admin:sign_in.html.twig');
    }
    
    public function logoutAction() {
        $request = $this->getRequest();
        $session = $request->getSession();     
        $session->invalidate();
        return $this->render('WyskoczBundle:Admin:sign_in.html.twig');
    }
    
    private function asdx() {
        
    }
}
