<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ticket;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tickets = $em->getRepository('AppBundle:Ticket')->findBy(array('ticketUserManager' => $this->getUser()->getId()));

        // replace this example code with whatever you need
        return $this->render('home/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'tickets' => $tickets
        ]);
    }

    public function statisticsAction(Request $request)
    {
      $nbferme = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findFerme($this->getUser());
      $nbouvert = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findOuvert($this->getUser());

      return new Response(json_encode(array(count($nbferme),count($nbouvert))));
    }

    public function statistics2Action(Request $request)
    {
      $nbClosedLastWeek = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findFermeLastWeek();

      $nbClosedLastMonth = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findFermeLastMonth();

      return new Response(json_encode(array(count($nbClosedLastWeek), count($nbClosedLastMonth))));
    }

    public function statistics3Action(Request $request)
    {
      $nbOuvertLastWeek = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findOuvertLastWeek();

      $nbOuvertLastMonth = $this->getDoctrine()
                        ->getRepository(Ticket::class)
                        ->findOuvertLastMonth();

      return new Response(json_encode(array(count($nbOuvertLastWeek), count($nbOuvertLastMonth))));
    }
}
