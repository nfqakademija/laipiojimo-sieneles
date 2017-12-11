<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
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

//        $product = new Product();
//        $product->setName('top_rope');
//        $product->setBasePrice('220');
//        $product->setMainPicture('pic07.jpg');
//        $product->setShortDescription('');
//        $product->setLongDescription('');

//        $em->persist($product);
//        $em->flush();

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

        return $this->render(
            'AppBundle:Pages:generic.html.twig',
            [
                'product' => $product,
            ]
        );
    }
}
