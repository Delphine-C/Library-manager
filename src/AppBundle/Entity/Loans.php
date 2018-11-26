<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loans
 *
 * @ORM\Table(name="loans")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LoansRepository")
 */
class Loans
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="book_id", type="integer")
     */
    private $bookId;

    /**
     * @var int
     *
     * @ORM\Column(name="patron_id", type="integer")
     */
    private $patronId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="loaned_on", type="date")
     */
    private $loanedOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="return_by", type="date")
     */
    private $returnBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="returned_on", type="date")
     */
    private $returnedOn;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bookId
     *
     * @param integer $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * Get bookId
     *
     * @return int
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * Set patronId
     *
     * @param integer $patronId
     */
    public function setPatronId($patronId)
    {
        $this->patronId = $patronId;
    }

    /**
     * Get patronId
     *
     * @return int
     */
    public function getPatronId()
    {
        return $this->patronId;
    }

    /**
     * Set loanedOn
     *
     * @param \DateTime $loanedOn
     */
    public function setLoanedOn($loanedOn)
    {
        $this->loanedOn = $loanedOn;
    }

    /**
     * Get loanedOn
     *
     * @return \DateTime
     */
    public function getLoanedOn()
    {
        return $this->loanedOn;
    }

    /**
     * Set returnBy
     *
     * @param \DateTime $returnBy
     */
    public function setReturnBy($returnBy)
    {
        $this->returnBy = $returnBy;
    }

    /**
     * Get returnBy
     *
     * @return \DateTime
     */
    public function getReturnBy()
    {
        return $this->returnBy;
    }

    /**
     * Set returnedOn
     *
     * @param \DateTime $returnedOn
     */
    public function setReturnedOn($returnedOn)
    {
        $this->returnedOn = $returnedOn;
    }

    /**
     * Get returnedOn
     *
     * @return \DateTime
     */
    public function getReturnedOn()
    {
        return $this->returnedOn;
    }
}

