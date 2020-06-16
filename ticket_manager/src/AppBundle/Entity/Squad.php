<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Squad
 *
 * @ORM\Table(name="squad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SquadRepository")
 */
class Squad
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
     * @ORM\Column(name="squad_date", type="date")
     */
    private $squadDate;

    /**
     * @var string
     *
     * @ORM\Column(name="squad_name", type="string", length=255)
     */
    private $squadName;

    /**
     * @var int
     * @Assert\Range(
     *      min = 0,
     *      max = 50,
     *      minMessage = "Vérifier la limite minimal > {{ limit }}",
     *      maxMessage = "Vérifier la limite maximal < {{ limit }}"
     * )
     * @ORM\Column(name="squad_capacity", type="integer")
     */
    private $squadCapacity;


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
     * Set squadDate
     *
     * @param \DateTime $squadDate
     *
     * @return Squad
     */
    public function setSquadDate($squadDate)
    {
        $this->squadDate = $squadDate;

        return $this;
    }

    /**
     * Get squadDate
     *
     * @return \DateTime
     */
    public function getSquadDate()
    {
        return $this->squadDate;
    }

    /**
     * Set squadName
     *
     * @param string $squadName
     *
     * @return Squad
     */
    public function setSquadName($squadName)
    {
        $this->squadName = $squadName;

        return $this;
    }

    /**
     * Get squadName
     *
     * @return string
     */
    public function getSquadName()
    {
        return $this->squadName;
    }

    /**
     * Set squadCapacity
     *
     * @param integer $squadCapacity
     *
     * @return Squad
     */
    public function setSquadCapacity($squadCapacity)
    {
        $this->squadCapacity = $squadCapacity;

        return $this;
    }

    /**
     * Get squadCapacity
     *
     * @return int
     */
    public function getSquadCapacity()
    {
        return $this->squadCapacity;
    }

    public function __toString(){
      return $this->squadName;
    }
}
