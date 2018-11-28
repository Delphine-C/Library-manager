<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 28/11/2018
 * Time: 16:53
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\ReturnBookType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReturnBookController extends Controller
{
    /**
     * @Route("/return-book/{id}", name="return_book")
     */
    public function returnBookAction(Request $request, $id)
    {
        $loan = $this->getDoctrine()->getManager()->getRepository('AppBundle:Loans')->find($id);

        if (\is_null($loan)) {
            throw new NotFoundHttpException(sprintf("This reference doesn't exist.", $id));
        }

        $form = $this
            ->createForm(ReturnBookType::class, $loan)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("all_loans");
        }

        return $this->render('books/return_book.html.twig', [
            "form" => $form->createView(),
            "loan" => $loan
        ]);
    }
}