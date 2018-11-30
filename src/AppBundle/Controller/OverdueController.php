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

class OverdueController extends Controller
{
    /**
     * @Route("/overdue-loans", name="loan_overdue")
     */
    public function getOverdueLoansAction()
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

    /**
     * @Route("/overdue-books", name="books_overdue")
     */
    public function getOverdueBooksAction()
    {
        $loans = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Loans')
            ->findBy(['returnedOn' => null]);

        return $this->render('books/books.html.twig', [
            "loans" => $loans,
            "title" => "Checked Out Books"
        ]);

    }
}