<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="ticket_num", type="string", length=8, unique=true)
     */
    private $ticketNum;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_name", type="string", length=255)
     */
    private $ticketName;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_description", type="text")
     */
    private $ticketDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ticket_date_start", type="date")
     */
    private $ticketDateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ticket_date_end", type="date", nullable=true)
     */
    private $ticketDateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ticket_last_update", type="date", nullable=true)
     */
    private $ticketLastUpdate;

    /**
     * @ORM\ManyToOne(targetEntity="Priority")
     * @ORM\JoinColumn(name="priority_id", referencedColumnName="id", nullable=false)
     */
    private $ticketPriority;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     */
    private $ticketCustomer;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_owner_id", referencedColumnName="id", nullable=false)
     */
    private $ticketUserOwner;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_manager_id", referencedColumnName="id", nullable=false)
     */
    private $ticketUserManager;

    /**
     * @ORM\ManyToOne(targetEntity="Squad")
     * @ORM\JoinColumn(name="squad_id", referencedColumnName="id", nullable=false)
     */
    private $ticketSquad;

    /**
     * Get squad
     *
     * @return Squad
     */
    public function getTicketSquad()
    {
        return $this->ticketSquad;
    }

    /**
     * Add squad
     *
     * @param Squad $squad
     */
    public function setTicketSquad($squad)
    {
        $this->ticketSquad = $squad;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getTicketUserManager()
    {
        return $this->ticketUserManager;
    }

    /**
     * Add userOwner
     *
     * @param User $user
     */
    public function setTicketUserManager($user)
    {
        $this->ticketUserManager = $user;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getTicketUserOwner()
    {
        return $this->ticketUserOwner;
    }

    /**
     * Add userOwner
     *
     * @param User $user
     */
    public function setTicketUserOwner($user)
    {
        $this->ticketUserOwner = $user;
    }

    /**
     * Get customer
     *
     * @return Customer
     */
    public function getTicketCustomer()
    {
        return $this->ticketCustomer;
    }

    /**
     * Add customer
     *
     * @param Customer $customer
     */
    public function setTicketCustomer($customer)
    {
        $this->ticketCustomer = $customer;
    }

    /**
     * Get priority
     *
     * @return Priority
     */
    public function getTicketPriority()
    {
        return $this->ticketPriority;
    }

    /**
     * Add priority
     *
     * @param Priority $priority
     */
    public function setTicketPriority($priority)
    {
        $this->ticketPriority = $priority;
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
     * Set ticketNum
     *
     * @param string $ticketNum
     *
     * @return Ticket
     */
    public function setTicketNum($ticketNum)
    {
        $this->ticketNum = $ticketNum;

        return $this;
    }

    /**
     * Get ticketNum
     *
     * @return string
     */
    public function getTicketNum()
    {
        return $this->ticketNum;
    }

    /**
     * Set ticketName
     *
     * @param string $ticketName
     *
     * @return Ticket
     */
    public function setTicketName($ticketName)
    {
        $this->ticketName = $ticketName;

        return $this;
    }

    /**
     * Get ticketName
     *
     * @return string
     */
    public function getTicketName()
    {
        return $this->ticketName;
    }

    /**
     * Set ticketDescription
     *
     * @param string $ticketDescription
     *
     * @return Ticket
     */
    public function setTicketDescription($ticketDescription)
    {
        $this->ticketDescription = $ticketDescription;

        return $this;
    }

    /**
     * Get ticketDescription
     *
     * @return string
     */
    public function getTicketDescription()
    {
        return $this->ticketDescription;
    }

    /**
     * Set ticketDateStart
     *
     * @param \DateTime $ticketDateStart
     *
     * @return Ticket
     */
    public function setTicketDateStart($ticketDateStart)
    {
        $this->ticketDateStart = $ticketDateStart;

        return $this;
    }

    /**
     * Get ticketDateStart
     *
     * @return \DateTime
     */
    public function getTicketDateStart()
    {
        return $this->ticketDateStart;
    }

    /**
     * Set ticketDateEnd
     *
     * @param \DateTime $ticketDateEnd
     *
     * @return Ticket
     */
    public function setTicketDateEnd($ticketDateEnd)
    {
        $this->ticketDateEnd = $ticketDateEnd;

        return $this;
    }

    /**
     * Get ticketDateEnd
     *
     * @return \DateTime
     */
    public function getTicketDateEnd()
    {
        return $this->ticketDateEnd;
    }

    /**
     * Set ticketLastUpdate
     *
     * @param \DateTime $ticketLastUpdate
     *
     * @return Ticket
     */
    public function setTicketLastUpdate($ticketLastUpdate)
    {
        $this->ticketLastUpdate = $ticketLastUpdate;

        return $this;
    }

    /**
     * Get ticketLastUpdate
     *
     * @return \DateTime
     */
    public function getTicketLastUpdate()
    {
        return $this->ticketLastUpdate;
    }

    public function __toString() {
      return $this->ticketNum;
    }
}
