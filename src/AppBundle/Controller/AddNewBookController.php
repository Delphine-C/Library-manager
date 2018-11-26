<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 26/11/2018
 * Time: 19:58
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Books;
use AppBundle\Form\BooksType;
use Symfony\Component\HttpFoundation\Request;

class AddNewBookController extends Controller
{
    /**
     * @Route("/new-book", name="new_book")
     */
    public function AddBookAction(Request $request)
    {
        $book = new Books();
        $form = $this
            ->createForm(BooksType::class, $book)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($book);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("all_books");
        }

        return $this->render('books/add_book.html.twig', ["form" => $form->createView()]);
    }
}