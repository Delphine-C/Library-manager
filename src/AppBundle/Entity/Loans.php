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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Books", cascade={"persist"})
     */
    private $book;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Patrons", cascade={"persist"})
     */
    private $patron;

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
     * @ORM\Column(name="returned_on", type="date", nullable=true)
     */
    private $returnedOn;

    public function __construct()
    {
        $this->loanedOn = new \DateTime();
        $this->returnBy = new \DateTime('+7 days');
    }

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
     * Set book
     *
     * @param integer $book
     */
    public function setBook($book)
    {
        $this->book = $book;
    }

    /**
     * Get book
     *
     * @return int
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set patron
     *
     * @param integer $patron
     */
    public function setPatron($patron)
    {
        $this->patron = $patron;
    }

    /**
     * Get patron
     *
     * @return int
     */
    public function getPatron()
    {
        return $this->patron;
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

