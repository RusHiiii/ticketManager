<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Squad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Squad controller.
 *
 * @Route("squad")
 */
class SquadController extends Controller
{
    /**
     * Lists all squad entities.
     *
     * @Route("/", name="squad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $squads = $em->getRepository('AppBundle:Squad')->findAll();

        return $this->render('squad/index.html.twig', array(
            'squads' => $squads,
        ));
    }

    /**
     * Creates a new squad entity.
     *
     * @Route("/new", name="squad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $squad = new Squad();
        $form = $this->createForm('AppBundle\Form\SquadType', $squad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($squad);
            $em->flush();

            return $this->redirectToRoute('squad_show', array('id' => $squad->getId()));
        }

        return $this->render('squad/new.html.twig', array(
            'squad' => $squad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a squad entity.
     *
     * @Route("/{id}", name="squad_show")
     * @Method("GET")
     */
    public function showAction(Squad $squad)
    {
        $deleteForm = $this->createDeleteForm($squad);

        return $this->render('squad/show.html.twig', array(
            'squad' => $squad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing squad entity.
     *
     * @Route("/{id}/edit", name="squad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Squad $squad)
    {
        $deleteForm = $this->createDeleteForm($squad);
        $editForm = $this->createForm('AppBundle\Form\SquadType', $squad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('squad_edit', array('id' => $squad->getId()));
        }

        return $this->render('squad/edit.html.twig', array(
            'squad' => $squad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a squad entity.
     *
     * @Route("/{id}", name="squad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Squad $squad)
    {
        $form = $this->createDeleteForm($squad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($squad);
            $em->flush();
        }

        return $this->redirectToRoute('squad_index');
    }

    /**
     * Creates a form to delete a squad entity.
     *
     * @param Squad $squad The squad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Squad $squad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squad_delete', array('id' => $squad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
