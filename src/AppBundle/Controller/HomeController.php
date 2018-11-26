<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 26/11/2018
 * Time: 14:39
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function getHomeAction()
    {
        return $this->render('home/home.html.twig');
    }
}