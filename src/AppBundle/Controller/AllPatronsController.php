<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 27/11/2018
 * Time: 17:59
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AllPatronsController extends Controller
{
    /**
     * @Route("/all-patrons", name="all_patrons")
     */
    public function getPatronsAction()
    {
        $patrons =$this->getDoctrine()->getManager()->getRepository('AppBundle:Patrons')->findAll();

        return $this->render('patrons/all_patrons.html.twig', ["patrons"=>$patrons]);
    }
}