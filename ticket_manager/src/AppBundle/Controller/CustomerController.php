<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CustomerController extends Controller
{
    /**
     * @Route("/customer/add", name="addCustomer")
     */
    public function addAction(Request $request)
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerType::class,$customer);
        $form->add("submit",SubmitType::class,[
          "label"=> "Valider",
          "attr"=> ["class" => "btn btn-default pull-right"]
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customer = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('listCustomer');
        }

        return $this->render('Customer/add.html.twig', array(
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
          'form' => $form->createView()
        ));

    }

    /**
     * @Route("/customer/list", name="listCustomer")
     */
    public function listAction()
    {
        $customers = $this->getDoctrine()
                          ->getRepository(Customer::class)
                          ->findAll();

        return $this->render('Customer/list.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'customers'=>$customers,
        ));
    }

    /**
     * @Route("/customer/remove?{id}", name="removeCustomer")
     */
    public function removeAction(Customer $customer, Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($customer);
        $em->flush();

        return $this->redirectToRoute('listCustomer');
    }

    /**
     * @Route("/customer/edit?{id}", name="editCustomer")
     */
    public function editAction(Customer $customer, Request $request)
    {
      $form = $this->createForm(CustomerType::class,$customer);
      $form->add("submit",SubmitType::class,[
        "label"=> "Valider",
        "attr"=> ["class" => "btn btn-default pull-right"]
      ]);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $customer = $form->getData();
          $em = $this->getDoctrine()->getManager();
          $em->persist($customer);
          $em->flush();

          return $this->redirectToRoute('listCustomer');
      }

      return $this->render('Customer/edit.html.twig', array(
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
          'form' => $form->createView()
      ));
    }

}
