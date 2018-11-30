<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 30/11/2018
 * Time: 19:35
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Service\CheckedOutBooks;

class OverdueController extends Controller
{
    /**
     * @Route("/overdue-loans", name="loan_overdue")
     */
    public function getOverdueLoansAction(CheckedOutBooks $checkedOutBooks)
    {
        $loans = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Loans')
            ->findBy(['returnedOn' => null]);

        return $this->render('loans/loans.html.twig', [
            "loans" => $loans,
            "title" => "Overdue Loans"
        ]);
    }
}