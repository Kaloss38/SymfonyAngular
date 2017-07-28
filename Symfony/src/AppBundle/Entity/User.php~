<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="\DD\AdminBundle\Entity\Project", inversedBy="users")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project_id;
    /**
     * @ORM\OneToMany(targetEntity="\DD\AdminBundle\Entity\Comment", mappedBy="user")
     */
    private $comments;
    /**
     * @ORM\OneToMany(targetEntity="\DD\AdminBundle\Entity\Note", mappedBy="user")
     */
    private $notes;
    
    public function __construct()
    {
        parent::__construct();
        $this->projects = new ArrayCollection();
    }

    /**
     * Set projectId
     *
     * @param \AppBundle\Entity\Project $projectId
     *
     * @return User
     */
    public function setProjectId(\DD\AdminBundle\Entity\Project $projectId)
    {
        $this->project_id = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Add note
     *
     * @param \AppBundle\Entity\Note $note
     *
     * @return User
     */
    public function addNote(\DD\AdminBundle\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param \AppBundle\Entity\Note $note
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
     * Add projectId
     *
     * @param \DD\AdminBundle\Entity\Comment $projectId
     *
     * @return User
     */
    public function addProjectId(\DD\AdminBundle\Entity\Comment $projectId)
    {
        $this->project_id[] = $projectId;

        return $this;
    }

    /**
     * Remove projectId
     *
     * @param \DD\AdminBundle\Entity\Comment $projectId
     */
    public function removeProjectId(\DD\AdminBundle\Entity\Comment $projectId)
    {
        $this->project_id->removeElement($projectId);
    }

    /**
     * Add comment
     *
     * @param \DD\AdminBundle\Entity\Comment $comment
     *
     * @return User
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
