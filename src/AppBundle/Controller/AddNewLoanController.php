<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 28/11/2018
 * Time: 15:13
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Loans;
use AppBundle\Form\LoansType;
use Symfony\Component\HttpFoundation\Request;

class AddNewLoanController extends Controller
{
    /**
     * @Route("/new-loan", name="new_loan")
     */
    public function AddLoanAction(Request $request)
    {
        $loan = new Loans();
        $form = $this
            ->createForm(LoansType::class, $loan)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($loan);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("all_loans");
        }

        return $this->render('loans/add_loan.html.twig', ["form" => $form->createView()]);
    }
}