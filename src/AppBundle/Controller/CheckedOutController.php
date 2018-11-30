<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 30/11/2018
 * Time: 13:00
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Service\CheckedOutBooks;

class CheckedOutController extends Controller
{
    /**
     * @Route("/checked-loans", name="loan_checked")
     */
    public function getCheckedOutAction(CheckedOutBooks $checkedOutBooks)
    {
        $loans = $checkedOutBooks->getCheckedOutBooks();

        return $this->render('loans/loans.html.twig', [
            "loans" => $loans,
            "title" => "Checked Out Books"
        ]);

    }
}