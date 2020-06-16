<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment
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
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date", type="date")
     */
    private $commentDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_value", type="text")
     */
    private $commentValue;

    /**
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id", nullable=false, onDelete="CASCADE"))
     */
    private $commentTicket;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false, onDelete="CASCADE"))
     */
    private $commentUser;

    /**
     * Get user
     *
     * @return User
     */
    public function getCommentUser()
    {
        return $this->commentUser;
    }

    /**
     * Add user
     *
     * @param User $user
     */
    public function setCommentUser($user)
    {
        $this->commentUser = $user;
    }

    /**
     * Get ticket
     *
     * @return Ticket
     */
    public function getCommentTicket()
    {
        return $this->commentTicket;
    }

    /**
     * Add ticket
     *
     * @param Ticket $ticket
     */
    public function setCommentTicket($ticket)
    {
        $this->commentTicket = $ticket;
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
     * Set commentDate
     *
     * @param \DateTime $commentDate
     *
     * @return Comment
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;

        return $this;
    }

    /**
     * Get commentDate
     *
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * Set commentValue
     *
     * @param string $commentValue
     *
     * @return Comment
     */
    public function setCommentValue($commentValue)
    {
        $this->commentValue = $commentValue;

        return $this;
    }

    /**
     * Get commentValue
     *
     * @return string
     */
    public function getCommentValue()
    {
        return $this->commentValue;
    }

    public function __toString() {
      return $this->commentValue;
    }
}
