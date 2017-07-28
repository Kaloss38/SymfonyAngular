<?php

namespace DD\AdminBundle\Entity;

/**
 * Project
 */
class Project
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $autor;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $date;

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Project
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set autor
     *
     * @param string $autor
     *
     * @return Project
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Project
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Project
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add note
     *
     * @param \DD\AdminBundle\Entity\Note $note
     *
     * @return Project
     */
    public function addNote(\DD\AdminBundle\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param \DD\AdminBundle\Entity\Note $note
     */
    public function removeNote(\DD\AdminBundle\Entity\Note $note)
    {
        $this->notes->removeElement($note);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;


    /**
     * Add user
     *
     * @param \DD\AdminBundle\Entity\User $user
     *
     * @return Project
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \DD\AdminBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;


    /**
     * Add comment
     *
     * @param \DD\AdminBundle\Entity\Comment $comment
     *
     * @return Project
     */
    public function addComment(\DD\AdminBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \DD\AdminBundle\Entity\Comment $comment
     */
    public function removeComment(\DD\AdminBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
