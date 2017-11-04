<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-13
 * Time: 10:30
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Orders;
use AppBundle\Form\OrdersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrdersController extends Controller
{
    /**
     * @Route("/orders", name="orderForm")
     */
    public function FormAction()
    {
        $form = $this->createForm(OrdersType::class, null, [
            'action' => $this->generateUrl('saveOrder')
        ]);
        return $this->render('AppBundle:contents:index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/saveOrder", name="saveOrder")
     * @Method("POST")
     */
    public function SaveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $newOrder = new Orders();
        $newOrder->setSeen(false);
        $form = $this->createForm(OrdersType::class, $newOrder);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($newOrder);
            $em->flush();
            return $this->render('AppBundle:contents:output.html.twig', [
                'output' => 'Your order has been sent!',
            ]);
        } else {
            return $this->render('AppBundle:contents:output.html.twig', [
                'output' => 'Something went wrong. Go back and try again',
            ]);
        }
    }
}
