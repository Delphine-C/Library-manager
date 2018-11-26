<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 26/11/2018
 * Time: 15:03
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AllBooksController extends Controller
{
    /**
     * @Route("/all-books", name="all_books")
     */
    public function getBooksAction()
    {
        $books =$this->getDoctrine()->getManager()->getRepository('AppBundle:Books')->findAll();

        return $this->render('books/books.html.twig', ["books"=>$books]);
    }
}