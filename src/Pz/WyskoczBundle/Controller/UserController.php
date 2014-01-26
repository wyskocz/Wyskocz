<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction($show = 'all', $page = 1) {
        $securityContext = $this->container->get('security.context');
        $user = $securityContext->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();  
        $perPage = 10;
        $em->getRepository('WyskoczBundle:Vote')->setMaxResults($perPage);
        $votes = $em->getRepository('WyskoczBundle:Vote')->getUserVotes($user->getId(), ($page-1)*$perPage);
        
        $votesCount = $em->getRepository('WyskoczBundle:Vote')->getUserVotesCount($user->getId());

        $pages = ceil($votesCount/$perPage);
        
        $userData = array(
            'username' =>$user->getUsername(),
            'last_login' => $user->getLastLogin()->format('d-m-Y H:i:s'),
            'email' => $user->getEmail()
        );
        
        return $this->render('WyskoczBundle:User:profile.html.twig', array(
                'show' => $show,
                'userdata' => $userData,
                'voteCount' => $votesCount,
                'pages' => $pages,
                'page' => $page,
                'votes' => $votes
                ));
    }
}
