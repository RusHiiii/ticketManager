<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Priority;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Priority controller.
 *
 * @Route("priority")
 */
class PriorityController extends Controller
{
    /**
     * Lists all priority entities.
     *
     * @Route("/", name="priority_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $priorities = $em->getRepository('AppBundle:Priority')->findAll();

        return $this->render('priority/index.html.twig', array(
            'priorities' => $priorities,
        ));
    }

    /**
     * Creates a new priority entity.
     *
     * @Route("/new", name="priority_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $priority = new Priority();
        $form = $this->createForm('AppBundle\Form\PriorityType', $priority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($priority);
            $em->flush();

            return $this->redirectToRoute('priority_show', array('id' => $priority->getId()));
        }

        return $this->render('priority/new.html.twig', array(
            'priority' => $priority,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a priority entity.
     *
     * @Route("/{id}", name="priority_show")
     * @Method("GET")
     */
    public function showAction(Priority $priority)
    {
        $deleteForm = $this->createDeleteForm($priority);

        return $this->render('priority/show.html.twig', array(
            'priority' => $priority,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing priority entity.
     *
     * @Route("/{id}/edit", name="priority_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Priority $priority)
    {
        $deleteForm = $this->createDeleteForm($priority);
        $editForm = $this->createForm('AppBundle\Form\PriorityType', $priority);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('priority_index');
        }

        return $this->render('priority/edit.html.twig', array(
            'priority' => $priority,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a priority entity.
     *
     * @Route("/{id}", name="priority_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Priority $priority)
    {
        $form = $this->createDeleteForm($priority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($priority);
            $em->flush();
        }

        return $this->redirectToRoute('priority_index');
    }

    /**
     * Creates a form to delete a priority entity.
     *
     * @param Priority $priority The priority entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Priority $priority)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('priority_delete', array('id' => $priority->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
