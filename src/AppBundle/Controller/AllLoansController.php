<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 28/11/2018
 * Time: 14:44
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AllLoansController extends Controller
{
    /**
     * @Route("/all-loans", name="all_loans")
     */
    public function getLoansAction()
    {
        $loans = $this->getDoctrine()->getManager()->getRepository('AppBundle:Loans')->findAll();

        return $this->render('loans/loans.html.twig', ["loans" => $loans]);
    }
}