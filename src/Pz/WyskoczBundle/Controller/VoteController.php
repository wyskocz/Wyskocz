<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Pz\WyskoczBundle\Entity\Vote;

class VoteController extends Controller
{
    public function voteAction(Request $request)
    {
        $value = $request->request->get('value');
        $userId = $request->request->get('userId');
        $contentId = $request->request->get('contentId');
        $contentType = $request->request->get('contentType');

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WyskoczBundle:Vote');
        $vote_exists = $repository->findBy(
            array('userId' => $userId )
        );

        if(!empty($vote_exists)) {
            return new Response('ALREADY_VOTED');
        }
        
        $vote = new Vote;
        $vote->setValue( $value );
        $vote->setContentId( $contentId );
        $vote->setContentType( $contentType );
        $vote->setUserId( $userId );


        $em->persist( $vote );
        $em->flush();
        
        if( $repository->find( $vote->getId() ) ) {
            return new Response('OK');
        }
        else {
            return new Response('NOT');
        }
    }
    
    public function getVotesAction($id = NULL)
    {
        if( $id === NULL )  {
            return new Response('NO_ID');
        }
        
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('WyskoczBundle:Vote');
        $votes = $repository->findOneBy(array(
            'contentId' => $id
            ));
        
        if(empty($votes)) {
            return new Response('0');
        }
        
        $result = $repository->getVotes( $id );
        return new Response($result);
        
    }
    
    public function removeVoteAction($userId, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $vote = $em->getRepository('WyskoczBundle:Vote')->findOneBy(array(
            'userId' => $userId,
            'contentId' => $id
        ));
        
        
        if(empty($vote)) return new Response("NO_VOTE");
        
        $em->remove($vote);
        $em->flush();
        
        return new Response("OK");
    }
    
    public function checkIfVotedAction($userId, $id) {
        $em = $this->getDoctrine()->getManager();
        $vote = $em->getRepository('WyskoczBundle:Vote')->checkIfVoted($userId, $id);
        if($vote === true) return new Response('TRUE');
        else return new Response('FALSE');
    }
}
