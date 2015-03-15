<?php
namespace Ihsan\SimpleCrudBundle\Controller;

/**
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: http://blog.khodam.org
 *
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class IndexController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return $this->render('IhsanSimpleCrudBundle:Index:index.html.twig');
    }
}