<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 27/11/2018
 * Time: 16:40
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\BooksType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookDetailController extends Controller
{
    /**
     * @Route("/book-detail/{id}", name="book_detail")
     */
    public function getBookDetailAction(Request $request, $id)
    {
        $book = $this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->find($id);

        if(\is_null($book)){
            throw new NotFoundHttpException(sprintf("This reference doesn't exist.", $id));
        }

        $form = $this
            ->createForm(BooksType::class, $book)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($request->getUri());
        }

        return $this->render('books/book_detail.html.twig', [
            "form" => $form->createView(),
            "book" => $book
        ]);
    }
}