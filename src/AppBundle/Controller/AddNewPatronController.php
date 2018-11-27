<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 27/11/2018
 * Time: 18:22
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Patrons;
use AppBundle\Form\PatronsType;
use Symfony\Component\HttpFoundation\Request;

class AddNewPatronController extends Controller
{
    /**
     * @Route("/new-patron", name="new_patron")
     */
    public function AddPatronAction(Request $request)
    {
        $patron = new Patrons();
        $form = $this
            ->createForm(PatronsType::class, $patron)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($patron);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute("all_patrons");
        }

        return $this->render('patrons/add_patron.html.twig', ["form" => $form->createView()]);
    }
}