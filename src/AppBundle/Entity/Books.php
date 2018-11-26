<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BooksRepository")
 */
class Books
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max=255,maxMessage = "The title is longer than 255 characters.")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length( max=255,maxMessage = "The author is longer than 255 characters.")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max=255,maxMessage = "The genre is longer than 255 characters.")
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="first_published", type="integer", nullable=true)
     * @Assert\Type("integer",message="The year is not valid.")
     */
    private $firstPublished;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set genre
     *
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set firstPublished
     *
     * @param integer $firstPublished
     */
    public function setFirstPublished($firstPublished)
    {
        $this->firstPublished = $firstPublished;
    }

    /**
     * Get firstPublished
     *
     * @return int
     */
    public function getFirstPublished()
    {
        return $this->firstPublished;
    }
}

