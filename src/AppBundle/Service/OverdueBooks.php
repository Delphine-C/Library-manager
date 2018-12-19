<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 19/12/2018
 * Time: 15:25
 */

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class OverdueBooks
{
    private $em;

    public function __construct(ObjectManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getOverdueBooks()
    {
        $query = $this->em
            ->getRepository('AppBundle:Loans')
            ->createQueryBuilder('l')
            ->where('l.returnBy < :today')
            ->andWhere('l.returnedOn is NULL')
            ->setParameter('today', new \DateTime())
            ->getQuery();

        $loans = $query->getResult();

        return $loans;
    }
}