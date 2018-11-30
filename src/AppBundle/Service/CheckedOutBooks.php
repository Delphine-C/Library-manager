<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 30/11/2018
 * Time: 13:13
 */

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class CheckedOutBooks
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getCheckedOutBooks()
    {
        $loans = $this->em->getRepository('AppBundle:Loans')->findBy(['returnedOn' => null]);

        return $loans;
    }
}