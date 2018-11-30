<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 30/11/2018
 * Time: 22:50
 */

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class LoanHistory
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function bookHistory($id)
    {
        $bookHistory = $this->em
            ->getRepository('AppBundle:Loans')
            ->findBy(['book' => $id]);

        return $bookHistory;
    }

    public function patronHistory($id)
    {
        $patronHistory = $this->em
            ->getRepository('AppBundle:Loans')
            ->findBy(['patron' => $id]);

        return $patronHistory;
    }
}