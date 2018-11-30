<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 28/11/2018
 * Time: 09:45
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\PatronsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Service\LoanHistory;

class PatronDetailController extends Controller
{
    /**
     * @Route("/patron-detail/{id}", name="patron_detail")
     */
    public function getPatronDetailAction(Request $request, $id, LoanHistory $loanHistory)
    {
        $patron = $this->getDoctrine()->getManager()->getRepository('AppBundle:Patrons')->find($id);

        if (\is_null($patron)) {
            throw new NotFoundHttpException(sprintf("This reference doesn't exist.", $id));
        }

        $form = $this
            ->createForm(PatronsType::class, $patron)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($request->getUri());
        }

        $history = $loanHistory->patronHistory($id);

        return $this->render('patrons/patron_detail.html.twig', [
            "form" => $form->createView(),
            "patron" => $patron,
            "history" => $history
        ]);
    }
}