<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Orders;
use AppBundle\Entity\Product;
use AppBundle\Form\OrdersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HomeController
 *
 * @package AppBundle\Controller
 *
 * @Route("/{_locale}", defaults={"_locale": "lt"}, requirements={"_locale" = "%app.locales%"})
 */
class HomeController extends Controller
{
    /**
     * @Route("", name="home")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render(
            'AppBundle:Pages:home.html.twig',
            [
                'products' => $products,
            ]
        );
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function detailsAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($id);

        $form = $this->createForm(OrdersType::class, null, [
            'action' => $this->generateUrl('orderSave')
        ]);

        return $this->render(
            'AppBundle:Pages:generic.html.twig',
            [
                'product' => $product,
                'form' => $form->createView(),
            ]
        );
    }

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
}
