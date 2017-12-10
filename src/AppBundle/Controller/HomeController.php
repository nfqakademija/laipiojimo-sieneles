<?php

namespace AppBundle\Controller;

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
        return $this->render('AppBundle:Home:index.html.twig', array(
            // ...
        ));
    }
}
