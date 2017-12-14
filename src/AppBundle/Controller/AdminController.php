<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/list", name="orders_list")
     */
    public function formAction()
    {
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository('AppBundle:Orders')->findAll();
        return $this->render('AppBundle:contents:list.html.twig', [
            'orders' => $orders,
        ]);
    }
    /**
     * @Route("/details/{id}", name="admin.details")
     */
    public function categoryAction($id)
    {
        $order = $this->getDoctrine()->getRepository('AppBundle:Orders')->find($id);
        if ($order->getSeen() == false) {
            $em = $this->getDoctrine()->getManager();
            $order->setSeen(true);
            $em->persist($order);
            $em->flush();
        }
        return $this->render('AppBundle:contents:details.html.twig', [
            'order' =>$order,
        ]);
    }
}
