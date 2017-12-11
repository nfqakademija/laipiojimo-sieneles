<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Orders;
use AppBundle\Form\OrdersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrdersController
 * @package AppBundle\Controller
 * @Route("/{_locale}/order", defaults={"_locale": "lt"}, requirements={"_locale" = "%app.locales%"})
 */
class OrdersController extends Controller
{
    /**
     * @Route("/save", name="orderSave")
     * @Method("POST")
     */
    public function saveAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $newOrder = new Orders();
        $newOrder->setSeen(false);

        $form = $this->createForm(OrdersType::class, $newOrder);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($newOrder);
            $em->flush();

            $output = 'Your order has been sent!';
        } else {
            $output = 'Something went wrong. Go back and try again';
        }

        return $this->render('AppBundle:contents:output.html.twig', [
            'output' => $output,
        ]);
    }

    /**
     * @Route("/form", name="orderForm")
     */
    public function formAction()
    {
        $form = $this->createForm(OrdersType::class, null, [
            'action' => $this->generateUrl('orderSave')
        ]);

        return $this->render('AppBundle:OrderForm:form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
