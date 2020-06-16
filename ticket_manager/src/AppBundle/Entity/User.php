<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="user_phone_number", type="string", length=20)
     */
    private $userPhoneNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Application")
     * @ORM\JoinColumn(name="user_application_id", referencedColumnName="id", nullable=false, onDelete="CASCADE"))
     */
    private $userApplication;

    /**
     * @ORM\ManyToOne(targetEntity="Squad")
     * @ORM\JoinColumn(name="user_squad_id", referencedColumnName="id", nullable=false, onDelete="CASCADE"))
     */
    private $userSquad;

    /**
     * Get Application
     *
     * @return Application
     */
    public function getUserApplication()
    {
        return $this->userApplication;
    }

    /**
     * Add application
     *
     * @param Application app
     */
    public function setUserApplication($app)
    {
        $this->userApplication = $app;
    }

    /**
     * Get Squad
     *
     * @return SquadgetUserPhoneNumber
     */
    public function getUserSquad()
    {
        return $this->userSquad;
    }

    /**
     * Add squad
     *
     * @param Squad squad
     */
    public function setUserSquad($squad)
    {
        $this->userSquad = $squad;
    }

    /**
     * Get phone
     *
     * @return String
     */
    public function getUserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }

    /**
     * Add phone
     *
     * @param String phone
     */
    public function setUserPhoneNumber($phone)
    {
        $this->userPhoneNumber = $phone;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function __toString() {
      return parent::getUserName();
    }
}
