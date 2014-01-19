<?php

namespace Pz\WyskoczBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Pz\WyskoczBundle\Entity\Place;
use Pz\WyskoczBundle\Form\PlaceType;

/**
 * Place controller.
 *
 */
class PlaceController extends Controller
{

    
    /**
     * Lists all Place entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $places = $em->getRepository('WyskoczBundle:Place')->getPlaces();
        $securityContext = $this->container->get('security.context');
        
        if( $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') ){
            return $this->render('WyskoczBundle:Admin:Place/index.html.twig', array(
            'places' => $places,
            ));
        } else {
            return $this->render('WyskoczBundle:Place:list.html.twig', array(
                'places' => $places,
            ));
        }
    }
    
    
    
    /**
     * Creates a new Place entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Place();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //inwersja - nie wiem po co
            $coordinates = $entity->getLocation();
            $coordinates = explode(', ', $coordinates);
            $coordinates = $coordinates[1].', '.$coordinates[0];
            
            $location = '{"type":"Point","coordinates":[';
            $location .= $coordinates;
            $location .= ']}';
            
            
            
            $entity->setLocation($location);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_place_show', array('id' => $entity->getId())));
        }

        return $this->render('WyskoczBundle:Place:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Place entity.
    *
    * @param Place $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Place $entity)
    {
        $form = $this->createForm(new PlaceType(), $entity, array(
            'action' => $this->generateUrl('admin_place_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Place entity.
     *
     */
    public function newAction()
    {
        $entity = new Place();
        $form   = $this->createCreateForm($entity);

        return $this->render('WyskoczBundle:Admin:Place/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Place entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WyskoczBundle:Place')->getPlace($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Place entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WyskoczBundle:Place:show.html.twig', array(
            'entity'      => $entity['raw'],
            'location' => $entity['location']
          ));
    }

    /**
     * Displays a form to edit an existing Place entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WyskoczBundle:Place')->getPlace($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Place entity.');
        }
        
        $entity['raw']->setLocation($entity['location'][1].', '.$entity['location'][0]);
        
        $editForm = $this->createEditForm($entity['raw']);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WyskoczBundle:Admin:Place/edit.html.twig', array(
            'entity'      => $entity['raw'],
            'location' => $entity['location'],
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Place entity.
    *
    * @param Place $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Place $entity)
    {
        $form = $this->createForm(new PlaceType(), $entity, array(
            'action' => $this->generateUrl('admin_place_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));
        
        $form->add('submit', 'button', array('label' => 'Zaktualizuj dane', 'attr' => array('class' => 'btn btn-success btn-sm pull-left')));

        return $form;
    }
    /**
     * Edits an existing Place entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WyskoczBundle:Place')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Place entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
            
        if ($editForm->isValid()) {
            
            $coordinates = $editForm->getData()->getLocation();
            $coordinates = explode(', ', $coordinates);
            $coordinates = $coordinates[1].', '.$coordinates[0];
            
            $editForm->getData()->setLocation(
                    '{"type":"Point","coordinates":['.
                    $coordinates.
                    ']}');

            $em->flush();

            return $this->redirect($this->generateUrl('admin_place_edit', array('id' => $id)));
        }

        return $this->render('WyskoczBundle:Admin:Place/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Place entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WyskoczBundle:Place')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Place entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_place'));
    }

    /**
     * Creates a form to delete a Place entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_place_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Usuń miejsce', 'attr' => array('class' => 'btn btn-danger btn-sm pull-right')))
            ->getForm()
        ;
    }
}
