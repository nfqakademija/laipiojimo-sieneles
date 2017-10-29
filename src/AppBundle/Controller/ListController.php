<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-13
 * Time: 13:28
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/orders", name="ordersIndex")
 */
class ListController extends Controller
{
    /**
     * @Route("/list", name="ordersList")
     */
    public function FormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository('AppBundle:Orders')->findAll();

        return $this->render('AppBundle:contents:list.html.twig', [
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function categoryAction(Request $request, $id)
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
