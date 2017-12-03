<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017-09-13
 * Time: 13:28
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/{_locale}/orders", defaults={"_locale": "lt"}, requirements={"_locale" = "%app.locales%"}), name="ordersIndex")
 */
class ListController extends Controller
{
    /**
     * @Route("/list", name="orders_list")
     */
    public function FormAction()
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
